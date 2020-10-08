<?php

namespace App\Form;

use App\Entity\Cita;
use App\Entity\Especialidad;
use App\Entity\Paciente;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Security\Core\Security;

class CitaType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

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
            ->addEventListener(
                FormEvents::POST_SUBMIT,
                [$this, 'onPostSubmit']
            )
        ;
    }
    public function onPostSubmit(FormEvent $event)
    {
        $cita = $event->getData();

        $fecha    = $cita->getFecha();
        $paciente = $cita->getPaciente();
        $especialidad = $cita->getEspecialidad();

        $form = $event->getForm();
        $entity = $this->em->getRepository(Cita::class)->findBy([
            'fecha'=>$fecha,
            'Paciente'=>$paciente,
            'Especialidad'=>$especialidad,
            ]);
        if(count($entity) > 0){
            $event->getForm()->addError(new FormError('Paciente tiene misma cita el mismo dia en la misma especialidad'));
        }
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cita::class,
        ]);
    }
}
