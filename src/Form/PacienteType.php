<?php

namespace App\Form;

use App\Entity\Paciente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PacienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dui',TextType::class, [
                'label' => 'DUI',
                'attr' => [ 'class' => 'form-control', 'autofocus' => 'autofocus']
            ])
            ->add('expediente',TextType::class, [
                'label' => 'No de Expediente *',
                'attr' => [ 'class' => 'form-control']
            ])
            ->add('nombre',TextType::class, [
                'label' => 'Nombre Completo *',
                'attr' => [ 'class' => 'form-control']
            ])
            ->add('fecha',DateType::class, [
                'widget' => 'choice',
                'label' => 'Fecha de nacimiento *',
            ])
            ->add('direccion',TextType::class, [
                'label' => 'Direccion',
                'attr' => [ 'class' => 'form-control']
            ])
            ->add('telefono')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Paciente::class,
        ]);
    }
}
