<?php
require 'models/contacts.php';

$contact = new Contact();
$contact->setName($_GET['Name']);
$contact->setId((int)$_GET['Id']);
$result = ContactsFile()->Conflict($contact);

header('Content-type: application/json');
echo json_encode( $result );