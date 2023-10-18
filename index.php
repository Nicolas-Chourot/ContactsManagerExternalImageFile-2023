<?php
include_once "models/contacts.php";
$list = ContactsFile()->toArray();
$viewContent = "";
$viewTitle = "Liste des contacts";
foreach ($list as $contact) {
    $id = strval($contact->id());
    $name = $contact->name();
    $phone = $contact->phone();
    $email = $contact->Email();
    $avatar = $contact->Avatar();
    $contactHTML = <<<HTML
    <div class="contactRow" contact_id="$id">
        <div class="contactContainer noselect">
            <div class="contactLayout">
                <div class="avatar" style="background-image:url('$avatar')"></div>
                <div class="contactInfo">
                    <span class="contactName">$name</span>
                    <span class="contactPhone">$phone</span>
                    <a href="mailto:$email" class="contactEmail" target="_blank" >$email</a>
                </div>
            </div>
            <div class="contactCommandPanel">
                <a href="form.php?id=$id" class="editCmd cmdIcon fa fa-pencil" title="Modifier $name"></a>
                <a href="confirmDelete.php?id=$id" class="deleteCmd cmdIcon fa fa-trash" title="Effacer $name"></a>
            </div>
        </div>
    </div>           
    HTML;
    $viewContent = $viewContent . $contactHTML;
}
$viewScript = <<<HTML
<script defer>
   $("#createContactCmd").show();
   $("#abortCmd").hide();
   restoreContentScrollPosition();
</script>
HTML;

include "views/master.php";
?>