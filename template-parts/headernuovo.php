<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clothe-u</title>
        <!----- IMPORT ----->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Font  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- Stile  -->
        <link rel="stylesheet" href="../Clothe-u_Finale/css/styleHomeNew.css">
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        
        <link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="../Clothe-u_Finale/js/jquery-3.7.0.js"></script>
    </head>

        
    <body>
        <!-- Header-------->
        <header class = "myheader">
        
        <input type="checkbox" name="" id="toggler">
        
            <label for="toggler" class="fas fa-bars" type="button" id="menu"></label>
          
            <!--<img src="../Clothe-u_Finale/images/CLothe-u rent.png" alt="">-->
            <a href="http://localhost/Clothe-u_Finale/?page=homepagenew.php" class="logo">Clothe-u <span>.</span></span></a>
            

            <nav class="navbar">
                <a href="http://localhost/Clothe-u_Finale/?page=homepagenew.php">Home</a>
                <a href="http://localhost/Clothe-u_Finale/?page=prodotti.php">Prodotti</a>
                <a href="http://localhost/Clothe-u_Finale/?page=aboutus.php">About us</a>
                <a href="http://localhost/Clothe-u_Finale/?page=contattaci.php">Contattaci</a>
                <div class="icons">

                <a href="http://localhost/Clothe-u_Finale/?page=carrello.php" class="fas fa-shopping-cart">
                <span class="badge rounded-pill text-bg-#333 js-prodottitotali"></span>
                </a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="fas fa-user"></div>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if (!$loggedInUser):?>
                            <a class="dropdown-item" href="http://localhost/Clothe-u_Finale/?page=login.php">Login</a>
                        <?php endif;?>
                        <!-- mostra altre informazioni se loggati-->
                        <?php if ($loggedInUser):?>
                        <a class="dropdown-item" href="http://localhost/Clothe-u_Finale/?page=profilo.php">Profilo</a>
                        <a class="dropdown-item" href="http://localhost/Clothe-u_Finale/?page=ordini.php">Ordini</a>
                        <a class="dropdown-item" href="http://localhost/Clothe-u_Finale/?page=logout.php">Logout</a>
                        <?php endif;?>
                    </div>
            </div>
            </nav>
            
            </div>
            
            </nav>
            
        
        </header>
        <!-- navbar per pagina ristretta -->
        <nav class="navbar2" id="navbar2">
                <a class = "collegamento" href="http://localhost/Clothe-u_Finale/?page=homepagenew.php">Home</a>
                <a class = "collegamento" href="http://localhost/Clothe-u_Finale/?page=prodotti.php">Prodotti</a>
                <a class = "collegamento" href="http://localhost/Clothe-u_Finale/?page=carrello.php">Carrello</a>
                <a class = "collegamento" href="http://localhost/Clothe-u_Finale/?page=aboutus.php">About us</a>
                <a class = "collegamento" href="http://localhost/Clothe-u_Finale/?page=contattaci.php">Contattaci</a>
            </nav>
            <script> 
            //mostra navbar2 se si preme il pulsante
                const menu = document.getElementById('menu');  
                const navbar2 = document.getElementById('navbar2'); 
                menu.addEventListener('click', function() { 
                    navbar2.classList.toggle('visible');
                }); 
                
            </script>
            <script>
                //nasconde navbar2 se si allrga la pagina
                const element = document.getElementById('navbar2');
                const threshold = 768; // larghezza in pixel della soglia

                function checkSize() {
                var larghezza = window.innerWidth;
                
                if (larghezza > threshold) {
                    element.classList.remove('visible');
                    
                } 
                }

                checkSize(); // esegui la verifica della dimensione al caricamento della pagina

                window.addEventListener('resize', checkSize); // ascolta l'evento di ridimensionamento della finestra
            </script>
        
    <script src = "https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src = "https://bootswatch.com/_vendor/prismjs/prism.js"></script>
    <script src="../Clothe-u_Finale/js/main.js"></script>
      <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>    
</body>
<?php
    //associa un carrello al cliente attuale 
    $cm = new CartManager();
    $cartId = $cm->getCurrentCartId();
    $totale_carrello = $cm->getTotaleCarrello($cartId);
?>