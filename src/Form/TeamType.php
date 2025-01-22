<?php

namespace App\Form;

use App\Entity\Team;
use App\Utils\Constants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('abbreviation', TextType::class, [
                'constraints' => [
                    new Length([
                        'min' => 3,
                        'max' => 3,
                        'exactMessage' => 'The abbreviation must be exactly {{ limit }} characters long.',
                    ]),
                ],
            ])
            ->add('city', ChoiceType::class, [
                'choices' => array_combine(Constants::MOROCCAN_CITIES, Constants::MOROCCAN_CITIES),
                'placeholder' => 'Choose a city',
            ]);

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}
