<?php

include_once 'models/records.php';
include_once 'utilities/guid.php';
include_once 'utilities/formUtilities.php';
include_once 'utilities/imageFiles.php';

const ContactsFile = "data/contacts.data";
const avatarsPath = "data/images/avatars/";

class Contact extends Record
{
    private $name;
    private $email;
    private $phone;
    private $avatar;

    public function setName($name)
    {
        if (is_string($name))
            $this->name = $name;
    }
    public function setEmail($email)
    {
        if (is_string($email))
            $this->email = $email;
    }
    public function setPhone($phone)
    {
        if (is_string($phone))
            $this->phone = $phone;
    }
    public function setAvatar($avatar)
    {
        if (is_string($avatar))
            $this->avatar = $avatar;
    }
    public function Name()
    {
        return $this->name;
    }
    public function Email()
    {
        return $this->email;
    }
    public function Phone()
    {
        return $this->phone;
    }
    public function Avatar()
    {
        return $this->avatar;
    }
    public static function compare($contact_a, $contact_b)
    {
        $string_a = no_Hyphens($contact_a->Name());
        $string_b = no_Hyphens($contact_b->Name());
        return strcmp($string_a, $string_b);
    }
    static function keyCompare($contact_a, $contact_b) {
        self::compare($contact_a, $contact_b);
    }
}

class ContactsFile extends Records
{
    public function add($contact)
    {
        $contact->setAvatar(saveImage(avatarsPath, $contact->avatar()));
        parent::add($contact);
    }
    public function update($contact)
    {
        $contactToUpdate = $this->get($contact->id());
        if ($contactToUpdate != null) {
            $contact->setAvatar(saveImage(avatarsPath, $contact->avatar(), $contactToUpdate->avatar()));
            parent::update($contact);
        }
    }
    public function remove($id)
    {
        $contactToRemove = $this->get($id);
        if ($contactToRemove != null) {
            unlink($contactToRemove->avatar());
            return parent::remove($id);
        }
        return false;
    }
}

function ContactsFile()
{
    return new ContactsFile(ContactsFile);
}