<?php

namespace App\Validation;

use App\DTO\ShippingDTO;
use Symfony\Component\Form\FormInterface;

/**
 * @see https://symfony.com/doc/current/form/validation_group_service_resolver.html
 */
class ValidationGroup
{
    public function __invoke(FormInterface $form): array
    {
        $groups = ['Default', 'defaultAddress'];

        if ($form->getData() !== null && ShippingDTO::NEW_ADDRESS === $form->getData()->shippingMethod) {
            $groups = ['Default', 'newAddress'];
        }

        return $groups;
    }
}
