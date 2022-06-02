<?php
declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final class ShippingDTO
{
    public const DEFAULT_ADDRESS = 'D';
    public const NEW_ADDRESS = 'N';

    /**
     * @Assert\NotNull()
     * @Assert\Choice(callback="getAddressChoices")
     */
    public string $shippingMethod;

    /**
     * @Assert\NotNull(groups={"newAddress"})
     * @Assert\Length(groups={"newAddress"}, min="2")
     */
    public string $name;

    /**
     * @Assert\NotNull(groups={"newAddress"})
     * @Assert\Length(groups={"newAddress"}, min="2")
     */
    public string $surname;

    /**
     * @Assert\Valid(groups={"newAddress"})
     */
    public AddressDTO $addressDTO;

    public function __construct()
    {
        $this->addressDTO = new AddressDTO();
    }

    public function getAddressChoices(): array
    {
        return [
            self::DEFAULT_ADDRESS,
            self::NEW_ADDRESS,
        ];
    }
}
