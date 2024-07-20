<?php
chdir ($_SERVER['DOCUMENT_ROOT']);
require_once("php/functions.php");
$user = check_user();
if ($user == false) {
    print("<script>location.href='/login.php'</script>");
} else if ($user['perm_login'] == 1) {
    $disheadercheck = true;
    ob_start();
    require_once("templates/header.php"); 
    $buffer=ob_get_contents();
    ob_end_clean();

    $title = "ÜBA - Intern";
    $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
    echo $buffer;
    ?>

    <div class="container-fluid py-3" style="min-height: 80vh;">
        <div class="text-center mb-3">
            <span class="display-6">
                Herzlich Willkommen <?=$user['firstname']; if ($user['student'] == 0) print(' '.$user['surname']);?>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--theme-color-primary)">
                    <path d="M360-80v-529q-91-24-145.5-100.5T160-880h80q0 83 53.5 141.5T430-680h100q30 0 56 11t47 32l181 181-56 56-158-158v478h-80v-240h-80v240h-80Zm120-640q-33 0-56.5-23.5T400-800q0-33 23.5-56.5T480-880q33 0 56.5 23.5T560-800q0 33-23.5 56.5T480-720Z"/>
                </svg>
            </span>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card shadow px-3">
                    <div class="card-body text-center">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow px-3">
                    <div class="card-body text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
} 
require_once("templates/footer.php"); ?>