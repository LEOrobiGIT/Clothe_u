<?php
unset($loggedInUser);
unset($_SESSION['user']);
session_unset();
echo '<script>location.href = "'.'http://localhost/Clothe-u_Finale/'.'?page=homepagenew.php"</script>';
exit;
?>