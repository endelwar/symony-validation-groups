<?php
declare(strict_types=1);
namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final class AddressDTO
{
    /**
     * @Assert\NotNull(groups={"Default", "newAddress"})
     * @Assert\Length(groups={"Default", "newAddress"}, min="3")
     */
    public string $street;

    /**
     * @Assert\NotNull(groups={"Default", "newAddress"})
     * @Assert\Regex(groups={"Default", "newAddress"}, pattern="^[0-9]{5}")
     */
    public string $zip;

    /**
     * @Assert\NotNull(groups={"Default", "newAddress"})
     * @Assert\Length(groups={"Default", "newAddress"}, min="5")
     */
    public string $city;
}
