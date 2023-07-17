<?php
    $page = isset ($_GET["page"]) ? $_GET["page"] : 'homepagenew.php'; 
?>
<?php include './inc/init.php'?>
<!---------Header------------>
<?php include ROOT_PATH . 'template-parts/headernuovo.php'?>  

    <!-- Pagina corrente -->
    <?php include $page ?>
    
<!--------- Footer ------->
<?php include ROOT_PATH . 'template-parts/footerNew.php'?>
    