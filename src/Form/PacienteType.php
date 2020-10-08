<?php

namespace App\Form;

use App\Entity\Paciente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class PacienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*->add('dui',TextType::class, [
                'label' => 'DUI',                
                'attr' => [ 'class' => 'form-control', 'autofocus' => 'autofocus']
            ])*/
            /*->add('expediente',TextType::class, [
                'label' => 'No de Expediente *',
                'attr' => [ 'class' => 'form-control']
            ])*/
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
                'required' => false,
                'attr' => [ 'class' => 'form-control']
            ])
            ->add('telefono', TextType::class, [
                'label' => 'Telefono',
                'required' => false,
                'attr' => [ 'class' => 'form-control']
            ])
        ;
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $paciente = $event->getData();
            $form = $event->getForm();

            // checks if the Product object is "new"
            // If no data is passed to the form, the data is "null".
            // This should be considered a new "Product"
            if (!$paciente || null === $paciente->getId()) {
                $random = random_int(1000,9999).'-'.random_int(1,9);
                $form->add('dui',TextType::class, [
                    'label' => 'DUI',
                    'attr' => [ 'class' => 'form-control', 'autofocus' => 'autofocus']
                ]);
                $form->add('expediente',TextType::class, [
                    'label' => 'No de Expediente *',
                    'attr' => [ 'class' => 'form-control'],
                    'data' => $random,
                ]);

            }else{
                $form->add('dui',TextType::class, [
                    'disabled' => true,
                    'label' => 'DUI',
                    'attr' => [ 'class' => 'form-control', 'autofocus' => 'autofocus']
                ]);
                $form->add('expediente',TextType::class, [

                    'label' => 'No de Expediente *',
                    'attr' => [ 'class' => 'form-control'],

                ]);
            }
        });

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Paciente::class,
        ]);
    }
}
