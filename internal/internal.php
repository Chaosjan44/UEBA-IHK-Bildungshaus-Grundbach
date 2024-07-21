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
                Herzlich Willkommen <?=$user['student'] ? $user['firstname'] : $user['firstname'].' '.$user['surname']?>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--theme-color-primary)">
                    <path d="M360-80v-529q-91-24-145.5-100.5T160-880h80q0 83 53.5 141.5T430-680h100q30 0 56 11t47 32l181 181-56 56-158-158v478h-80v-240h-80v240h-80Zm120-640q-33 0-56.5-23.5T400-800q0-33 23.5-56.5T480-880q33 0 56.5 23.5T560-800q0 33-23.5 56.5T480-720Z"/>
                </svg>
            </span>
        </div>
        <div class="row">
            <div class="col-8 pb-3">
                <div class="card shadow px-3">
                    <div class="card-body text-center">
                        <span>Calender and stuff will go here</span>
                    </div>
                </div>
            </div>
            <div class="col-4 pb-3">
                <div class="card shadow px-3">
                    <div class="card-body text-center">
                        <div class="row mb-3">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <h3 class="display-6 mb-0"><?=$user['student'] ? 'Deine' : 'Ihre'?> Daten</h3>
                            </div>
                            <div class="col-3 justify-content-end d-inline-flex">
                                <button type="submit" name="action" value="save" class="btn btn-primary text-light"><i class="bi bi-gear-fill text-light"></i></button>
                            </div>
                        </div>
                        <div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-start" style="width: 45%"></th>
                                        <th style="width: 10%"></th>
                                        <th class="text-end" style="width: 45%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-start">Anmeldename</td>
                                        <td>-</td>
                                        <td class="text-end"><?=$user['login']?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php if ($user['student']): ?>
                                        <tr class="placeholder-glow">
                                            <td class="text-start">Firma</td>
                                            <td>-</td>
                                            <td class="text-end"><span class="col-12 placeholder"></span></td>
                                        </tr>
                                        <tr class="placeholder-glow">
                                            <td class="text-start">Ausbilder*in</td>
                                            <td>-</td>
                                            <td class="text-end"><span class="col-12 placeholder"></span></td>
                                        </tr>
                                        <tr class="placeholder-glow">
                                            <td class="text-start">Beruf</td>
                                            <td>-</td>
                                            <td class="text-end"><span class="col-12 placeholder"></span></td>
                                        </tr>
                                    <?php endif?>
                                    <tr>
                                        <td class="text-start">Name</td>
                                        <td>-</td>
                                        <td class="text-end"><?=$user['firstname'].' '.$user['surname']?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">E-Mail</td>
                                        <td>-</td>
                                        <td class="text-end"><?=$user['email']?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Telefon</td>
                                        <td>-</td>
                                        <td class="text-end"><?=$user['tel']?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Geburtstag</td>
                                        <td>-</td>
                                        <td class="text-end"><?=date('d.m.Y', strtotime($user['birthday']))?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Pronomen</td>
                                        <td>-</td>
                                        <td class="text-end"><?=$user['pronouns']?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!$user['student']): ?>
            <div class="col-8">

            </div>
            <div class="col-4">
                <div class="card shadow px-3">
                    <div class="card-body text-center">
                        <h3 class="display-6 mb-0">Notizen über Sie</h3>
                        <div class="text-start">
                            <span><?=$user['notes']?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

<?php 
} 
require_once("templates/footer.php"); ?>