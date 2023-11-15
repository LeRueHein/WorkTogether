<?php

namespace App\Form;

use App\DTO\ChoiceTypeUnit;
use App\Entity\TypeUnit;
use App\Entity\Unit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use function Sodium\add;

class ChoiceTypeUnitFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        foreach ($options['units'] as $unit){
        $builder
            ->add('U'.$unit->getId().'O'.$unit->getRack()->getId(),
                    EntityType::class, [
                        'class' => TypeUnit::class,
                        'choice_label' => 'name',
                        'required' => false,
                        'mapped' => false
                    ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'units' => false
        ]);
    }
}
