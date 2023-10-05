<?php
include_once 'models/contacts.php';
ContactsFile()->remove((int)$_GET['id']);
header('Location: index.php'); 