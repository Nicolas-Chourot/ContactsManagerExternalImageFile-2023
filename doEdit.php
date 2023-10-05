<?php
require 'models/contacts.php';
ContactsFile()->update(new Contact($_POST));
header('Location: index.php'); 