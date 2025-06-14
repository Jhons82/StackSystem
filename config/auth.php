<?php
/* echo '<pre>'; print_r($_SESSION); echo '</pre>';
exit; */
if (!isset($_SESSION["id"])) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}