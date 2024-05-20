<?php 
ob_start();
require_once("templates/header.php"); 
$buffer=ob_get_contents();
ob_end_clean();

$title = "ÜBA - IHK Bildungshaus Region Stuttgart - Startseite";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
echo $buffer;
?>

<div class="container-fluid py-3">
    <div class="container" style="min-height: 80vh;">
        <div class="ctext">
            <h1 class="display-4 text-center mb-0">Webseite noch im Bau!</h1>
        </div>
    </div>
</div>





<?php require_once("templates/footer.php"); ?>