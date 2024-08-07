<?php 
$crdate = "2024";
?>

</body>

<?php if (!isMobile()): ?>
    <footer class="container-fluid footer py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-2 text-start">
                    <ul class="px-0">
                        <li>
                            <a href="/index.php" class="hoverlink"><i class="bi bi-chevron-right pe-2"></i>Start</a>
                        </li>
                        <li>
                            <?php if(isset($user) && $user != null):?>
                                <a href="/logout.php" class="hoverlink"><i class="bi bi-chevron-right pe-2"></i>Abmelden</a>
                            <?php else: ?>
                                <a href="/login.php" class="hoverlink"><i class="bi bi-chevron-right pe-2"></i>Anmelden</a>
                            <?php endif;?>
                        </li>
                        <li>
                            <a href="https://www.ihk-bildungshaus.de/" class="hoverlink"><i class="bi bi-chevron-right pe-2"></i>IHK Bildungshaus</a>
                        </li>
                    </ul>
                </div>
                <div class="col-2 text-start">
                    <ul class="px-0">
                        <li>
                            <a href="/disclaimer.php" class="hoverlink"><i class="bi bi-chevron-right pe-2"></i>Disclaimer</a>
                        </li>
                        <li>
                            <a href="/impressum.php" class="hoverlink"><i class="bi bi-chevron-right pe-2"></i>Impressum</a> 
                        </li>
                        <li>
                            <a href="/datenschutz.php" class="hoverlink"><i class="bi bi-chevron-right pe-2"></i>Datenschutz</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-end align-items-center">
            <div class="col-4 text-start"><a href="https://github.com/Chaosjan44/UEBA-IHK-Bildungshaus-Grundbach" target="#" class="me-2"><i class="bi ctext text-size-x-large bi-github"></i></a></div>
            <div class="col-4 text-center ctext light"><a href="/internal/internal.php" class="text-center ctext light">&copy; <?=$crdate?> Jan Schniebs & Robert Cellary</a></div>
            <div class="col-4 d-flex justify-content-end">
                <input onchange="toggleStyle()" class="styleswitcher" type="checkbox" name="switch" id="style_switch" <?php if (check_style() == "dark"): print("checked"); endif; ?> >
                <label class="styleswitcherlabel" for="style_switch"></label>
            </div>
        </div>
    </footer>
<?php else: ?>
    <footer class="container-fluid footer py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 text-start ps-2">
                    <ul class="px-0">
                        <li>
                            <a href="/" class="link ctext"><i class="bi bi-chevron-right pe-2"></i>Start</a>
                        </li>
                        <li>
                            <?php if(isset($user) && $user != null):?>
                                <a href="/logout.php" class="link ctext"><i class="bi bi-chevron-right pe-2"></i>Abmelden</a>
                            <?php else: ?>
                                <a href="/login.php" class="link ctext"><i class="bi bi-chevron-right pe-2"></i>Anmelden</a>
                            <?php endif;?>
                        </li>
                        <li>
                            <a href="https://www.ihk-bildungshaus.de/" class="hoverlink"><i class="bi bi-chevron-right pe-2"></i>IHK Bildungshaus</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 text-start ps-2">
                    <ul class="px-0">
                        <li>
                            <a href="/disclaimer.php" class="link ctext"><i class="bi bi-chevron-right pe-2"></i>Disclaimer</a>
                        </li>
                        <li>
                            <a href="/impressum.php" class="link ctext"><i class="bi bi-chevron-right pe-2"></i>Impressum</a> 
                        </li>
                        <li>
                            <a href="/datenschutz.php" class="link ctext"><i class="bi bi-chevron-right pe-2"></i>Datenschutz</a>
                        </li>
                    </ul>
                </div>
                <div class="row justify-content-between align-items-center">
                    <div class="col-4 text-start"><a href="https://github.com/Chaosjan44/UEBA-IHK-Bildungshaus-Grundbach" target="#" class="me-2"><i class="bi ctext text-size-x-large bi-github"></i></a></div>
                    <div class="col-4 ctext text-start light ps-0"><a href="/internal/internal.php" class="ctext light">&copy; <?=$crdate?><br>Jan Schniebs & Robert Cellary</a></div>
                    <div class="col-4 d-flex justify-content-end">
                        <input onchange="toggleStyle()" class="styleswitcher" type="checkbox" name="switch" id="style_switch" <?php if (check_style() == "dark"): print("checked"); endif; ?> >
                        <label class="styleswitcherlabel" for="style_switch"></label>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>

<script src="/js/custom.js"></script>

</html>