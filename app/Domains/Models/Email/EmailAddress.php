<?php

namespace App\Domains\Models\Email;

class EmailAddress
{
    /**
     * @var string $address
     */
    private $address;

    /**
     * @param string $address
     */
    public function __construct(string $address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->address;
    }
}