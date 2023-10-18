<?php
$viewTitle = "À propos...";
$viewContent = <<<HTML
     <div class="aboutContainer">
        <h2>Gestionnaire de contacts</h2>
        <hr>
        <p>
            Petite application de gestion de contacts à titre de démonstration
            d'utilisation de page maitresse et d'interface utilisateur réactive.
        </p>
        <p>
            Auteur: Nicolas Chourot
        </p>
        <p>
            Collège Lionel-Groulx, automne 2023
        </p>
    </div>
HTML;
$viewScript = <<<HTML
    <script defer>
       $("#createContactCmd").hide();
       $("#abortCmd").show();
    </script>
HTML;
include "views/master.php";
?>