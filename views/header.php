<?php
    $pageTitle = "Gestionnaire de contacts";
    if (!isset($viewTitle)) $viewTitle = "";
    $viewHead = <<< HTML
        <img src="images/contact-logo.svg" class="appLogo" alt="" title="Gestionnaire de contacts">
        <h4>$viewTitle</h4>
        <a href="form.php" class="cmdIcon fa fa-plus" id="createContactCmd" title="Ajouter un contact"></a>
        <a href="index.php" class="cmdIcon fa fa-times" id="abortCmd" title="Annuler"></a>
        <div class="dropdown ms-auto">
            <div data-bs-toggle="dropdown" aria-expanded="false">
                <i class="cmdIcon fa fa-ellipsis-vertical"></i>
            </div>
            <div class="dropdown-menu noselect">
                <!--<div class="dropdown-item" id="loginCmd">
                        <i class="menuIcon fa fa-sign-in mx-2"></i> Connexion
                    </div>
                    <div class="dropdown-divider"></div>
                -->
                <a href="about.php" class="dropdown-item" id="aboutCmd">
                    <i class="menuIcon fa fa-info-circle mx-2"></i> À propos...
                </a>
            </div>
        </div>
    HTML;
?>