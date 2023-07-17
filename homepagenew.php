
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- anima la finestra dello scopri di più con jquery-->
<script> $(document).ready(function(){ 
    $("#prima").click(function(){ 
        $(".scopri").animate({ 
            width: '70%', height :'300px' 
        }, 500); 
        $("#dopo").show().animate({opacity: 1}, 2000); 
        $(".fa-angle-up").show().animate({opacity: 1}, 1000);
        $(".fa-angle-down").animate({opacity: 0}, 1000).hide();
    }); 
    $(".fa-angle-up").click(function(){ 
        $(".scopri").animate({ 
            width: '30%', height :'58px' 
        }, 1000); 
        $(".dopo").animate({opacity: 0}, 1000).hide();
        $(".fa-angle-down").show().animate({opacity: 1}, 1000);
        $(".fa-angle-up").animate({opacity: 0}, 1000).hide();
    }); 
}); 
</script>

<?php 

?>
<section class="home" id="home">
            <div class="home-text">
                <h1>New Arrival of <br>OFF-White</h1>
                <a id = "compra" href="../Clothe-u_Finale/?page=prodotti.php" class="btn">Compra <span>Ora</span></a>
            </div>
            <div class="home-img">
                <img src="../Clothe-u_Finale/images/store.jpg" alt="">

            </div>
</section>

<section class="new" id="new">
    <div class="heading">
        <h1>Nuovi <span>Arrivi</span></h1>
    </div>
    <div class="sezione2">
        <div class = "contenitore5">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <a href = "http://localhost/Clothe-u_Finale/?page=view-product.php&id=28">
                <img  class="d-block w-100" src="../Clothe-u_Finale/images/Air-Jordan---Jordan-3---Cement---Feature---2.webp" alt="">
                </a>    
                </div>
                <div class="carousel-item">
                <a href = "http://localhost/Clothe-u_Finale/?page=view-product.php&id=29">
                <img class="d-block w-100" src="../Clothe-u_Finale/images/895585fb48f4034145395ae32ce32d23.png" alt="Second slide">
                </a>
                </div>
                <div class="carousel-item">
                <a href = "http://localhost/Clothe-u_Finale/?page=view-product.php&id=21">
                <img class="d-block w-100" src="../Clothe-u_Finale/images/18588862_1768287323186758_4063439800357514009_o.jpg" alt="Third slide">
                </a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
        <div class = "testo">
            SENZA PREOCCUPAZIONI<br>

            La protezione di € 5 copre i danni accidentali di lieve entità, quali strappi, macchie e cuciture, assicurando la tranquillità degli utenti.<br><br>
            MODALITÀ DI CONSUMO SOSTENIBILE<br>

            Sostenendo l'adozione di una moda circolare, si può acquistare o noleggiare scarpe già indossate, riducendo gli sprechi e concedendo una seconda opportunità a aclzature di valore, senza però rinunciare allo stile e alla moda.<br><br>
            ULTIMA MODA<br>

            Abiti e accessori selezionati dalle collezioni più recenti dei marchi più in voga del momento.<br><br>
            RIVOLUZIONA IL TUO CONSUMO<br>

            Optando per il noleggio di calzature, è possibile ridefinire il proprio modo di intendere lo stile e il proprio guardaroba, senza dover per forza acquistare nuove scarpe e liberandosi della preoccupazione del prezzo.
            Scegli la tua taglia e la data in cui vuoi noleggiare le tue scarpe, la logistica e la consegna saranno a nostro carico. Il noleggio inizia il giorno prima dell'evento.
            Alla cassa, inserisci le informazioni richieste e fai la tua scelta tra il ritiro gratuito presso la nostra sede oppure la consegna a pagamento al tuo domicilio.<br>
        </div>
    </div>
    
</section>

<section class = "finestra">
    <div class = "scopri">
        <p id = "prima" class= "prima"> Scopri di più <i class="fa fa-angle-down"></i></p>
        <p id = "dopo" class = "dopo"> Seleziona un periodo e controlla la disponibilità del prodotto. Con pochi semplici click potrai noleggiare le migliori calzature e streetware disponibili sul mercato.<br>
        Contattaci per ulteriori informazioni sul servizio nella sezione "Contattaci" inviandoci una email con le tue domande.<br><br><i class="fa fa-angle-up"></i></p>
        
    </div>
</section>
<section>
    <div class="services" id="services">
            <div class="heading">
                <h1> I Nostri<span>Servizi</span></h1>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit omnis, ipsa natus obcaecati voluptatibus reiciendis recusandae voluptatem ex assumenda voluptates aperiam corporis eaque excepturi. Molestias officia obcaecati commodi quas iste? Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas delectus consequatur nisi exercitationem nam accusantium sequi officiis, repellat enim magni non est perspiciatis minima placeat saepe iusto, fugit fuga assumenda!</p>
            <div class="container_servizi">
                <div class="box_servizi">
                    <div class="icon_servizi">
                    <i class="fas fa-building fa-lg" ></i>
                    </div>
                    <div class="details_servizi">
                        <h3>Azienda sempre in crescita</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti eius ratione expedita labore dolor in impedit molestiae dolorum. Tenetur, repellendus eligendi eum beatae laudantium ab voluptas omnis autem minus quis.
                        </p>
                    </div>
                </div>

                <div class="box_servizi">
                    <div class="icon_servizi">
                    <i class="fa-regular fa-heart fa-2xl"></i>
                    </div>
                    <div class="details_servizi">
                        <h3>Lavoro nato dall'amore per le scarpe</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti eius ratione expedita labore dolor in impedit molestiae dolorum. Tenetur, repellendus eligendi eum beatae laudantium ab voluptas omnis autem minus quis.
                        </p>
                    </div>
                </div>

                <div class="box_servizi">
                    <div class="icon_servizi">
                    <i class="fa-solid fa-bolt fa-2xl"></i>
                    </div>
                    <div class="details_servizi">
                        <h3>Consegne rapide</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti eius ratione expedita labore dolor in impedit molestiae dolorum. Tenetur, repellendus eligendi eum beatae laudantium ab voluptas omnis autem minus quis.
                        </p>
                    </div>
                </div>
            </div>

    </div>
</section>

<section>
    <section class="reviews" id="reviews">
                <div class="heading">
                    <h1> I<span>Creatori</span></h1>
                </div>

                <div class="reviews-container">
                    <div class="box">
                        <img src="../Clothe-u_Finale/images/Leonardo.jpg" alt="">
                        
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi, ut consequatur voluptatem reiciendis assumenda obcaecati placeat tempore sequi odit itaque explicabo neque, necessitatibus excepturi quis corrupti. Praesentium aut ipsa labore.</p>
                        <h2>Leonardo Catini</h2>
                    </div>
                    <div class="box">
                        <img src="../Clothe-u_Finale/images/mario.jpg" alt="">
                        
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi, ut consequatur voluptatem reiciendis assumenda obcaecati placeat tempore sequi odit itaque explicabo neque, necessitatibus excepturi quis corrupti. Praesentium aut ipsa labore.</p>
                        <h2>Marian madalin Dascalu</h2>
                    </div>
                </div>
    </section>
</section>
