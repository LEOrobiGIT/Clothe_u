<link rel="stylesheet" href="../Clothe-u_Finale/css/styleRegistrati.css">
<?php
$email = '';
$password = '';
$conferma_password = '';
$nome_utente = '';
$nome = '';
$cognome ='';
$indirizzo = '';
$civico = '';
$cap = '';
$telefono = '';


//gestion del submmit
if (isset($_POST['register'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];
  $encr_password = md5($password);
  
  $conferma_password =  $_POST['conferma_password'];
  $nome_utente = $_POST['nome_utente'];
  $nome = $_POST['nome'];
  $cognome =$_POST['cognome'];
  $indirizzo = $_POST['indirizzo'];
  $civico = $_POST['civico'];
  $cap = $_POST['cap'];
  $telefono = $_POST['telefono'];

  $userMgr = new UserManager();
  if ($userMgr->passwordsMatch($password,$conferma_password)){
    $userObj = $userMgr->register($nome_utente,$email, $nome,$cognome,$indirizzo,$civico,$cap,$encr_password, $telefono);
    if ($userObj){
      echo "<script>location.href='".ROOT_URL."?page=confermaregistrazione.php';</script>";
      exit;
    } else{
      $errMsg = 'registrazione fallita';
    }
  }else{
    $errMsg = 'Errore';
  }
  
  

  
}
?>
<div class = "container2">
  <h1>Registrazione</h1>
  <form method="post" class="mb-4" onsubmit="return validaForm()" action ="">
    <div class="form-group">
      <label for="email">Email</label>
      <input name="email" id="email" type="email" class="form-control" value="<?php echo $email; ?>" required minlength = "6">
    </div>
    <div class="form-group">
      <label for="nome_utente">Nome Utente</label>
      <input name="nome_utente" id="nome_utente" type="text" class="form-control" value="<?php echo $nome_utente; ?>" required minlength = "4" maxlength ="20">
    </div>
    <div class="form-group">
      <label for="nome">Nome </label>
      <input name="nome" id="nome" type="text" class="form-control" value="<?php echo $nome; ?>" required minlength = "2" maxlength = "50">
    </div>
    <div class="form-group">
      <label for="cognome">Cognome </label>
      <input name="cognome" id="cognome" type="text" class="form-control" value="<?php echo $cognome; ?>" required minlength = "2" maxlength = "50">
    </div>
    <div class="form-group">
      <label for="indirizzo">Indirizzo </label>
      <input name="indirizzo" id="indirizzo" type="text" class="form-control" value="<?php echo $indirizzo; ?>" minlength = "4" maxlength = "50">
    </div>
    <div class="form-group">
      <label for="civico">Civico </label>
      <input name="civico" id="civico" type="text" class="form-control" value="<?php echo $civico; ?>" maxlength = "10">
    </div>
    <div class="form-group">
      <label for="cap">CAP </label>
      <input name="cap" id="cap" type="text" class="form-control" value="<?php echo $cap; ?>" minlength = "5" maxlength ="5">
    </div>
    <div class="form-group">
      <label for="telefono">Telefono </label>
      <input name="telefono" id="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" minlength = "3" maxlength ="20">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input name="password" id="password" type="password" class="form-control" value="<?php echo $password; ?>" required minlength = "8" maxlength = "20">
    </div>
    <div class="form-group">
      <label for="conferma_password">Conferma password</label>
      <input name="conferma_password" id="conferma_password" type="password" class="form-control" value="<?php echo $conferma_password; ?>" required minlength = "8" maxlength = "20">
    </div>
    <input class="btn btn-primary right" type="submit" value="Registrati" name="register">
  </form>
  <script>
    //controllo dei campi del form
  function validaForm() {
    var nome = document.getElementById('nome').value;
    var cognome = document.getElementById('cognome').value;
    var indirizzo = document.getElementById('indirizzo').value;
    var civico = document.getElementById('civico').value;
    var cap = document.getElementById('cap').value;
    var telefono = document.getElementById('telefono').value;

    var caratteri = /^[a-zA-Z]+$/;
    var numeri = /^[0-9]+$/;

    if (!caratteri.test(nome)) {
      alert('Inserire solo caratteri per il nome');
      return false;
    }
    if (!caratteri.test(cognome)) {
      alert('Inserire solo caratteri per il cognome');
      return false;
    }
    if (!caratteri.test(indirizzo)) {
      alert('Inserire solo caratteri per l\'indirizzo');
      return false;
    }
    if (!numeri.test(civico)) {
      alert('Inserire solo numeri per il civico');
      return false;
    }
    if (!numeri.test(cap)) {
      alert('Inserire solo numeri per il CAP');
      return false;
    }
    if (!numeri.test(telefono)) {
      alert('Inserire solo numeri per il telefono');
      return false;
    }

    return true;
  }
</script>
</div>

