<?php
$error = false;
$newImage = true;
    
include_once "models/contacts.php";
if (isset($_GET["id"])) {

    $contact = ContactsFile()->get((int) $_GET['id']);

    if (isset($contact)) {
        $newImage = false;
        $viewTitle = "Modificaton de contact";
        $id = $contact->Id();
        $name = $contact->Name();
        $phone = $contact->Phone();
        $email = $contact->Email();
        $avatar = $contact->avatar();
        $action = "doEdit.php";
    } else {
        $error = true;
    }
} else {
    $viewTitle = "Ajout de contact";
    $contact = new Contact();
    $id = 0;
    $name = "";
    $phone = "";
    $email = "";
    $avatar = "images/no-avatar.png";
    $action = "doAdd.php";
}
if (!$error) {
    $viewContent = <<<HTML
        <form class="form" action="$action" method="post" id="contactForm">
            <input type="hidden" name="Id" id="Id" value="$id"/>

            <label for="Name" class="form-label">Nom </label>
            <input 
                class="form-control Alpha"
                type="text"
                name="Name" 
                id="Name" 
                placeholder="Nom"
                required
                RequireMessage="Veuillez entrer votre nom"
                InvalidMessage="Caractère illégal"
                CustomErrorMessage ="Conflict de nom avec un autre contact"
                value="$name"
            />
            <label for="Phone" class="form-label">Téléphone </label>
            <input
                class="form-control Phone"
                name="Phone"
                id="Phone"
                placeholder="(000) 000-0000"
                required
                requireMessage="Veuillez entrer votre téléphone"
                invalidMessage="Veuillez entrer un téléphone valide"
                value="$phone" 
            />
            <label for="Email" class="form-label">Courriel </label>
            <input 
                class="form-control Email"
                name="Email"
                id="Email"
                placeholder="Courriel"
                required
                requireMessage="Veuillez entrer votre adresse de courriel"
                invalidMessage="Veuillez entrer un courriel valide"
                value="$email"
            />
             <!-- nécessite le fichier javascript 'imageControl.js' -->
             <label class="form-label">Avatar </label>
             <div   class='imageUploader' 
                    newImage='$newImage' 
                    controlId='Avatar' 
                    imageSrc='$avatar' 
                    waitingImage="images/Loading_icon.gif">
            </div>
            <br>
            <input type="submit" value="Enregistrer" id="saveContact" class="btn btn-primary">
            <input type="button" value="Annuler" id="cancel" class="btn btn-secondary" onclick="window.location.href='index.php';">
        </form>
    HTML;
} else {
    $viewContent = <<<HTML
        <div class="errorContainer">
            Contact introuvable!
        </div>
    HTML;
}
$viewScript = "js/validation.js";
$localScript = <<<HTML
    <script src="js/ImageControl.js"></script>
    <script defer>
       //initFormValidation();
       $("#createContactCmd").hide();
       $("#abortCmd").show();
       addConflictValidation('testConflict.php', 'Name', 'saveContact' );
    </script>
HTML;
include "views/master.php";
?>