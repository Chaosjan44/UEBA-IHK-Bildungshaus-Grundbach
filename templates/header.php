<?php
require_once("php/functions.php");
setlocale (LC_ALL, 'de_DE.UTF-8', 'de_DE@euro', 'de_DE', 'de', 'ge', 'de_DE.ISO_8859-1', 'German_Germany');
session_start();
if ($disheadercheck != true) {
    $user = check_user();
}

require_once("templates/imports.php");
?>

<header class="sticky-top">
    <nav class="navbar navbar-expand-lg ctext navv">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/images/IHK-logo.svg" class="navbar-icon_light" alt="Navbar Logo">
                <img src="/images/IHK-logo_dark.svg" class="navbar-icon_dark" alt="Navbar Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navv" tabindex="-1" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-lg-0">
                    <?php if(isset($user) && $user != null):?>
                        <li class="nav-item text-size-x-large mx-1">
                            <a class="nav-link clink" aria-current="page" href="/overview.php">Alle Häuser</a>
                        </li>
                    <?php endif;?>
                </ul>
                <ul class="navbar-nav mb-lg-0">
                    <?php if(isset($user) && $user != null):?>
                        <li class="nav-item text-size-x-large mx-1">
                            <a class="nav-link clink" href="/settings.php">Einstellungen</a>
                        </li>
                    <?php endif;?>
                    <?php if(!isset($user) || $user == null):?>
                        <li class="nav-item text-size-x-large mx-1">
                            <a class="nav-link clink" href="/login.php">Anmelden</a>
                        </li>
                    <?php else:?>
                        <li class="nav-item text-size-x-large mx-1">
                            <a class="nav-link clink clink" href="/logout.php">Abmelden</a>
                        </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="header-line text-end">
        <i class="bi bi-telephone-fill"></i>
        <a href="tel:07151 7095-0" class="ctext pe-4">07151 7095-0</a>
    </div>
</header>



<body>
<div class="modal fade" id="cookieModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content cbg3">
            <div class="modal-header cbg3">
                <h4 class="modal-title ctext fw-bold" id="cookieModalLabel">Mhhh Lecker &#x1F36A;!</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ctext cbg fw-normal">
                <div class="px-2">
                    <p>Wir nutzen Cookies auf unserer Webseite.<br>
                    Alle Cookies die wir verwenden sind für die Funktion der Webseite nötig. <br>
                    Die Cookies werden nicht ausgewertet.
                    </p>
                </div>
            </div>
            <div class="modal-footer ctext cbg fw-bold">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick='setCookie("acceptCookies", "false", 365)'>Ablehnen</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick='setCookie("acceptCookies", "true", 365)'>Akzeptieren</button>
            </div>
        </div>
    </div>
</div>

<?php if (!check_cookie()): error_log("e1");?>
    <script type="text/javascript">
        function triggerCookie() {
            const myModal = new bootstrap.Modal('#cookieModal');
            const modalToggle = document.getElementById('cookieModal');
            myModal.show(modalToggle);
        }
        setTimeout(triggerCookie, 2000);
    </script>
<?php endif; ?>