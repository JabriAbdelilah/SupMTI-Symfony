<?php

namespace App\Form;

use App\Entity\Player;
use App\Entity\Team;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\Range;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('dateOfBirth', DateType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new GreaterThanOrEqual([
                        'value' => '1980-01-01',
                        'message' => 'Date of birth must not be earlier than 1980.',
                    ]),
                    new LessThanOrEqual([
                        'value' => '2010-12-31',
                        'message' => 'Date of birth must not be later than 2010.',
                    ]),
                ],
            ])
            ->add('shirtNumber', IntegerType::class, [
                'constraints' => [
                    new Range([
                        'min' => 1,
                        'max' => 99,
                        'notInRangeMessage' => 'Shirt number must be between {{ min }} and {{ max }}.',
                    ]),
                ],
            ])
            ->add('team', EntityType::class, [
                'class' => Team::class,
                'choice_label' => 'abbreviation',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
