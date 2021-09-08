<?php

namespace FiftySq\Commerce\Support\Data;

class Contact extends DataObject
{
    protected string $firstName;
    protected string $lastName;
    protected ?string $email;
    protected ?string $phone;

    /**
     * Contact constructor.
     *
     * @param  string  $firstName
     * @param  string  $lastName
     * @param  string|null  $email
     * @param  string|null  $phone
     */
    public function __construct(string $firstName, string $lastName, string $email = null, string $phone = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return "{$this->getFirstName()} {$this->getLastName()}";
    }
}
