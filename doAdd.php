<?php
include_once 'models/contacts.php';
ContactsFile()->add(new Contact($_POST));
header('Location: index.php'); 