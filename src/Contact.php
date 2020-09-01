<?php

namespace ApiChef\NotifyLK;

class Contact
{
    /** @var string */
    private $firstName;

    /**@var string|null */
    private $lastName;

    /** @var string|null */
    private $email;

    /** @var string|null */
    private $address;

    /** @var string|null */
    private $group;

    public function __construct(
        string $firstName,
        string $lastName = null,
        string $email = null,
        string $address = null,
        string $group = null
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->address = $address;
        $this->group = $group;
    }

    public function toArray(): array
    {
        $data = ['contact_fname' => $this->firstName];

        if ($this->lastName) {
            $data['contact_lname'] = $this->lastName;
        }

        if ($this->email) {
            $data['contact_email'] = $this->email;
        }

        if ($this->address) {
            $data['contact_address'] = $this->address;
        }

        if ($this->group) {
            $data['contact_group'] = $this->group;
        }

        return $data;
    }
}
