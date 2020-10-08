<?php

namespace App\Form;

use App\Entity\AbcDay;
use App\Entity\Cita;
use App\Entity\Especialidad;
use App\Entity\Paciente;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CitaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha',DateType::class, [
                    'widget' => 'choice',
                    'label' => 'Fecha de Cita *',
                ])
            ->add('Paciente',EntityType::class, [
                'label' => 'Paciente',
                'class' => Paciente::class,
                'choice_label' => 'nombre',
            ])
            ->add('Especialidad',EntityType::class, [
                'label' => 'Especialidad',
                'class' => Especialidad::class,
                'choice_label' => 'nombre',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cita::class,
        ]);
    }
}
