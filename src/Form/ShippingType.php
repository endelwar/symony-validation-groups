<?php

namespace App\Form;

use App\DTO\ShippingDTO;
use App\Validation\ValidationGroup;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Valid;

class ShippingType extends AbstractType
{
    private ValidationGroup $validationGroup;

    public function __construct(ValidationGroup $validationGroup)
    {
        $this->validationGroup = $validationGroup;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('shippingMethod', ChoiceType::class, [
                'required' => true,
                'choices' => [
                    'Default address' => ShippingDTO::DEFAULT_ADDRESS,
                    'Add new address' => ShippingDTO::NEW_ADDRESS,
                ],
                'multiple' => false,
                'expanded' => true,
                'data' => ShippingDTO::DEFAULT_ADDRESS,
                'validation_groups' => ['defaultAddress', 'newAddress']
            ])
            ->add('name', TextType::class, [
                'required' => false,
                'validation_groups' => ['newAddress']
            ])
            ->add('surname', TextType::class, [
                'required' => false,
                'validation_groups' => ['newAddress']
            ])
            ->add('addressDTO', AddressType::class, [
                'required' => false,
                'validation_groups' => ['newAddress'],
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ShippingDTO::class,
            'validation_groups' => $this->validationGroup
        ]);
    }
}
