<?php
$error = false;
include_once 'models/contacts.php';
if (isset($_GET["id"]))
{
    $contact = ContactsFile()->get((int) $_GET['id']);
    $viewTitle = "Retrait de contact";
    
    if (isset($contact)) {
        $id = $contact->Id();
        $name = $contact->Name();
        $phone = $contact->Phone();
        $email = $contact->Email();
        $avatar = $contact->Avatar();
        $action ="doEdit.php";
    } else {
        $error = true;
    }
} else {
    $error = true;
}
if (!$error) {
    $viewContent = <<<HTML
        <div class="contactdeleteForm">
            <h4>Effacer le contact suivant?</h4>
            <br>
            <div class="contactRow">
                <div class="contactContainer">
                    <div class="contactLayout">
                     <div class="avatar" style="background-image:url('$avatar')"></div>
                        <div class="contactInfo">
                            <span class="contactName">$name</span>
                            <span class="contactPhone">$phone</span>
                            <span class="contactEmail">$email</span>
                        </div>
                    </div>
                </div>  
            </div>   
            <br>
            <input type="button" value="Effacer" class="btn btn-primary" onclick="window.location.href='doDelete.php?id=$id';">
            <input type="button" value="Annuler"class="btn btn-secondary" onclick="window.location.href='index.php';">
        </div>
    HTML;
} else {
    $viewContent = <<<HTML
        <div class="errorContainer">
            Contact introuvable!
        </div>
    HTML;
}
$viewScript= "js/validation.js";
$localScript = <<<HTML
    <script defer>
       initFormValidation();
       $("#createContactCmd").hide();
       $("#abortCmd").show();
    </script>
HTML;
include "views/master.php";
?>