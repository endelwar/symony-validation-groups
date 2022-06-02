<?php
declare(strict_types=1);
namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final class AddressDTO
{
    /**
     * @Assert\NotNull()
     * @Assert\Length(min="3")
     */
    public string $street;

    /**
     * @Assert\NotNull()
     * @Assert\Regex(pattern="^[0-9]{5}")
     */
    public string $zip;

    /**
     * @Assert\NotNull()
     * @Assert\Length(min="5")
     */
    public string $city;
}
