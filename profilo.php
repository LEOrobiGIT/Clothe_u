<link rel="stylesheet" href="../Clothe-u_Finale/css/styleProfiloo.css">
<?php
$userMgr = new UserManager();
$dati_utente = $userMgr->getDatiUtente($_SESSION["user"]);
$dati = $dati_utente[0];
//gestione del submit
if (isset($_POST['invia'])) {
  
  $email = $dati['email'];
  $password = $_POST['password'];
  $encr_password = md5($password);
  $nome_utente = $_POST['nome'];
  $nome = $_POST['nome'];
  $cognome =$_POST['cognome'];
  $indirizzo = $_POST['indirizzo'];
  $civico = $_POST['civico'];
  $cap = $_POST['cap'];
  $telefono = $_POST['telefono'];
  $userMgr = new UserManager();
  $userObj = $userMgr->aggiorna($nome_utente,$email, $nome,$cognome,$indirizzo,$civico,$cap,$telefono,$encr_password);
  if (!$userObj){
    $message = "Credenziali non corrette";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }else{
    echo "<meta http-equiv='refresh' content='0'>";
  }
}

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
      $(document).ready(function() {
        // Gestione del click sul pulsante "Elimina"
        $('#elimina').click(function() {
          var id = $(this).data('id');  
          // Chiamata Ajax per eliminare i dati dal database
          $.ajax({
            url: 'elimina.php',
            type: 'post',
            data: {id: id},
            success: function(response) {
              alert("L'account è stato eliminato correttamente");
              window.location.href = "http://localhost/Clothe-u_Finale/?page=logout.php";
            }
          });
        });
      });
    </script>

<form action="http://localhost/Clothe-u_Finale/?page=profilo.php" method="post" class = "pagina-utente" name = "utente" id ="utente" onsubmit="return validaForm()">
<section class="vh-100" style="background-color: #ffffff;">
  <div class="container py-5 h-100" id ="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0" id = "main">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;"  >
              <img src="./images/profilo-generico.png"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <i type = "button" class = "button fas fa-edit fa-lg mb-5 bottone" id ="modifica"></i>
              <h3><?php echo $dati['email'] ?></h3>
              <p class ="utente"><?php echo $dati['utente'] ?></p>
              <button type = "button" class = "elimina" id ="elimina" data-id="<?php echo $dati['id_utente'] ?>"> Elimina Account</button>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Informazioni</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Nome Utente</h6>
                    <input name = "utente" class="text-muted" value = "<?php echo $dati['utente'] ?>" disabled minlength = "4" maxlength ="20" required>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Nome</h6>
                    <input name="nome" class="text-muted" value ="<?php echo $dati['nome'] ?>" disabled minlength = "2" maxlength = "50" required>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Cognome</h6>
                    <input name="cognome" class="text-muted" value ="<?php echo $dati['cognome'] ?>" disabled minlength = "2" maxlength = "50" required>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Indirizzo</h6>
                    <input name="indirizzo" class="text-muted" value ="<?php echo $dati['indirizzo'] ?>" disabled minlength = "4" maxlength = "50">
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Civico</h6>
                    <input name="civico" class="text-muted" value ="<?php echo $dati['civico'] ?>" disabled maxlength = "10">
                  </div>
                  <div class="col-6 mb-3">
                    <h6>CAP</h6>
                    <input name="cap" class="text-muted" value ="<?php echo $dati['cap'] ?>" disabled maxlength ="5">
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Telefono</h6>
                    <input name="telefono" class="text-muted" value ="<?php echo $dati['telefono'] ?>" disabled minlength = "3" maxlength ="20">
                  </div>
                  <div class="col-6 mb-3" style="display:none;" id = "psswrd">
                    <h6>Password</h6>
                    <input name="password" id="password" type="password" class="text-muted" value ="" disabled required>
                  </div>
                  
                </div>
                <!--<h6>Projects</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Recent</h6>
                    <p class="text-muted">Lorem ipsum</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Most Viewed</h6>
                    <p class="text-muted">Dolor sit amet</p>
                  </div>
                </div>
                <div class="d-flex justify-content-start">
                  <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                </div>-->
              </div>
              <button type="submit" id="submit-btn" style="display:none;" name="invia">Invia</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
<script>
  //gestione del tast modifica ed elimina e abilita input del form
  var editBtn = document.getElementById("modifica");
  editBtn.addEventListener("click", function() {
    var inputs = document.getElementsByTagName("input");
    
    for(var i=0; i<inputs.length; i++) {
      inputs[i].disabled = false;
    }
    var psswrd = document.getElementById("psswrd");
    var submitBtn = document.getElementById("submit-btn");
    psswrd.style.display = "block";
    submitBtn.style.display = "block";
  });

  var delBtn = document.getElementById("elimina");
  editBtn.addEventListener("click", function() {
    
  });


</script>
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
