<?php

namespace App\Models;
class User
{
    private $name;
    private $lastName;
    private $email;
    private $emailVeriables = array();




    public function setFirstName(string $fname): void
    {
        $this->name = trim($fname);
    }

    public function getFirstName(): string
    {
        return $this->name;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lname): void
    {
        $this->lastName = trim($lname);
    }

    public function setEmailAddress(string $email): void
    {
        $this->email = $email;
    }

    public function getEmailAddress(): string
    {
        return $this->email;
    }

    public function getFullName(): string
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function getEmailVeriables(): array
    {
       return $this->emailVeriables = [
            'email' => $this->getEmailAddress(),
            'full_name' => $this->getFullName()
        ];
    }

}