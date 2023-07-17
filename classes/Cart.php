
<?php

//contiene le classi che costruiscono gli oggetti che rappresentano le tabelle del DB

class CartManager extends DBManager{
    //Tabella Carrello
    public $clientId;
    
    public function __construct(){
        parent::__construct();
        $this->columns = array( 'id_carrello', 'utente' );
        $this->tableName = 'carrello';
        $this -> _initializeClientIdFromSession();
      }

    //ritorna il numero totale dei pezzi nel carrello e il loro costo totale
    public function getTotaleCarrello($cartId){
        $result = $this->db->query("
        SELECT SUM(c.quantita) AS numero_p, SUM(p.prezzo * c.quantita * DATEDIFF(c.fine,c.inizio)) AS costo_totale
        FROM prodotti p JOIN prod_carrello c ON p.id = c.id_prodotto
        WHERE c.id_carrello = $cartId;
        ");
        
        return $result[0];
    }

    //ritorna l'insieme dei prodotti del carrello specificato
    public function getProdottiCarrello($cartId){
        return $this->db->query("
        SELECT prodotti.nome as nome, prodotti.foto as foto, prod_carrello.taglia as taglia, prodotti.prezzo as prezzo, prod_carrello.quantita as quantita,prodotti.id as id,prodotti.colore as colore,prod_carrello.inizio,prod_carrello.fine,prod_carrello.id as id_prod_carrello
        FROM prodotti INNER JOIN prod_carrello ON prodotti.id = prod_carrello.id_prodotto
        WHERE prod_carrello.id_carrello = $cartId;
        ");
    }

    //come getProdottiCarrello più generico(non necessario)
    public function getProd_Carrello($cartId){
        return $this->db->query("
        SELECT id as id, id_carrello as id_carrello, id_prodotto as id_prodotto, taglia as taglia, quantita as quantita,inizio as inizio,fine as fine
        FROM prod_carrello
        WHERE id_carrello = $cartId;
        ");
    }

    //aggiunge un prodotto al carrello
    public function addtoCart($cartId,$productId,$size,$inizio,$fine){
        $quantita = 0;
        $result = $this -> db->query("SELECT quantita FROM prod_carrello WHERE id_carrello = '$cartId' AND id_prodotto = '$productId' AND taglia = '$size' AND inizio = '$inizio' AND fine='$fine'");
        if (count($result) >0){
            $quantita = $result[0]['quantita'];
        }
        $quantita = $quantita + 1;
        if (count($result) >0){
            $this -> db->execute("UPDATE prod_carrello SET quantita = '$quantita' WHERE id_carrello = '$cartId' AND id_prodotto = '$productId' AND taglia = '$size' AND inizio = '$inizio' AND fine='$fine' ");
        } else{
            $cartItemManager = new CartItemManager();
            $newId = $cartItemManager -> create([
                'id_carrello' =>$cartId,
                'id_prodotto' =>$productId,
                'taglia' => $size,
                'quantita'=>$quantita,
                'inizio'=>$inizio,
                'fine'=>$fine
            ]);
        }
        
    }
    //agiorna un il periodo di noleggio del prodotto specificato nel carrello
    public function updateCart($cartId,$productId,$inizio,$fine){
        $this -> db->execute("UPDATE prod_carrello SET inizio = '$inizio',fine = '$fine' WHERE id = '$productId'");   
    }
    //rimuove dal carrello un certo prodotto
    public function removefromCart($cartId,$productId,$size,$inizio,$fine){
        $quantita = 0;
        $result = $this -> db->query("SELECT quantita,id FROM prod_carrello WHERE id_carrello = '$cartId' AND id_prodotto = '$productId' AND taglia = '$size' AND inizio = '$inizio' AND fine='$fine'");
        $prod_car_id = $result[0]['id'];
        if (count($result) >0){
            $quantita = $result[0]['quantita'];
        }
        $quantita = $quantita - 1;
        if ($quantita >0){
            $this -> db->execute("UPDATE prod_carrello SET quantita = '$quantita' WHERE id_carrello = '$cartId' AND id_prodotto = '$productId' AND taglia = '$size' AND inizio = '$inizio' AND fine='$fine' ");
        } else{
            $cartItemManager = new CartItemManager();
            $newId = $cartItemManager -> delete($prod_car_id);
        }
    }

    
    //restituisce l'id del carrello dell'utente clientid
    public function getCurrentCartId(){
        $cartId = 0;
        if (isset($_SESSION['user'])){
            $utente =$_SESSION['user'] ;
            $result = $this -> db->query("SELECT * FROM carrello WHERE utente = '$utente'");
        }else{
            $result = $this -> db->query("SELECT * FROM carrello WHERE utente = '$this->clientId'");
        }
        if (count($result) > 0) {
            $cartId = $result[0]['id_carrello'];
        }else{
            $cartId = $this ->create([
                'utente' => $this -> clientId
            ]);
        }
        return $cartId;
    }

    

    //inizializza client id generando una stringa random di 20 caratteri esegue anche il controllo per la stringa generata controllando nel file "stringhe_generate.txt"
    private function _initializeClientIdFromSession(){
        if (isset($_SESSION['client_id'])){
            $this ->clientId = $_SESSION['client_id'];
        }else{
            
            $random_string = "";
            $alreadyGenerated = true;
            while ($alreadyGenerated) {
                for ($i = 0; $i < 20; $i++) {
                    $random_string .= rand(0, 9);
                }
            
                // Apriamo il file di testo contenente le stringhe già generate
                $filename = "./file/stringhe_generate.txt";
                $file = fopen($filename, "r");

                // Verifichiamo se la stringa random generata esiste già nel file
                $alreadyGenerated = false;
                while (!feof($file)) {
                    $line = fgets($file);
                    if (trim($line) == trim($random_string)) {
                        $alreadyGenerated = true;
                        break;
                    }
                }

                // Se la stringa random non è stata generata in passato, la aggiorniamo nel file
                if (!$alreadyGenerated) {
                    $file = fopen($filename, "a");
                    fwrite($file, $random_string . "\n");
                    $_SESSION['client_id'] = $random_string;
                    $this ->clientId = $random_string;
                }
                // Chiudiamo il file
                fclose($file);
                
            }
            
            $this ->clientId = $random_string;
        }
    }
    //fonde i carrelli dell'utente e del client provvisorio se ha un carrello
    public function mergeCarts(){
        $utente = $_SESSION['user'];
        $oldUserCart = $this->db->query("SELECT id_carrello FROM carrello where utente = '$utente'");
        $oldClientCart = $this->db->query("SELECT id_carrello FROM carrello where utente = '$this->clientId'");
        
        
        //var_dump($oldUserCart, $oldClientCart, $this->userId, $this->clientId); die;
        if (count($oldClientCart) > 0 AND count($oldUserCart) == 0){
            echo "L'utente non aveva un carrello, ora lo creo";
        ////cambia update con insert_one per non eliminare vecchio carrello client.----------------------------------------------------------------------------
          $result = $this->db->query("UPDATE carrello SET utente = $utente WHERE utente = '$this->clientId'");
        }
  
        else if (count($oldClientCart) > 0 AND count($oldUserCart) > 0 ) {
            //L'utente aveva un carrello, ora li unisco;
          $userCartId = $oldUserCart[0]['id_carrello'];
          $userCartItems = $this->getProdottiCarrello($userCartId);
  
          $clientCartId = $oldClientCart[0]['id_carrello'];
          $clientCartItems = $this->getProdottiCarrello($clientCartId);
          
  
          foreach($clientCartItems as $clientItem){
            
            $isAlreadyInCart = false;
            $clientProductId = $clientItem['id'];
  
            foreach($userCartItems as $userItem){
              if ($userItem['id'] == $clientProductId){
                $isAlreadyInCart = true;
                $newQuantity = $userItem['quantita'] + $clientItem['quantita'];
                $this->db->query("UPDATE prod_carrello SET quantita = $newQuantity  WHERE id_carrello = $userCartId AND id_prodotto = $clientProductId");
                $this->db->query("DELETE FROM prod_carrello WHERE id_carrello = $clientCartId AND id_prodotto = $clientProductId");
                break;
              }
            }
  
            if (!$isAlreadyInCart) {
              $this->db->query("UPDATE prod_carrello SET id_carrello = $userCartId  WHERE id_carrello = $clientCartId AND id_prodotto = $clientProductId");
            }
          }
  
          $result = $this->db->query("DELETE FROM carrello WHERE id_carrello = $clientCartId");
        }
  
        //unset($_SESSION['client_id']);
        return $result;
      }
    
}

// rappresenta la tabella prod_carrello
class CartItemManager extends DBManager{
    public function __construct(){
        parent::__construct();
        $this->columns = array( 'id', 'id_carrello', 'id_prodotto','taglia','quantita','inizio','fine' );
        $this->tableName = 'prod_carrello';
      }
}
?>
