<?php


namespace App\Controller;

use App\Entity\Cita;
use App\Repository\EspecialidadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 *
 * @Route("/reporte")
 */
class ReporteController extends AbstractController
{

    /**
     * @Route("/consultas", name="app_consultasxespecialidad", methods={"GET","POST"})
     */
    public function consultasAction(Request $request): Response
    {
        $date = new \DateTime(); 
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('app_consultasxespecialidad'))
            ->setMethod('POST')
            ->add('fecha', DateType::class, ['label'=>false])
            ->add('save', SubmitType::class, ['label'=>'Filtrar'])
            ->getForm(); 
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $date = $form["fecha"]->getData();
        }       
        $entityManager = $this->getDoctrine()->getManager();
        $especialidades = $entityManager->getRepository(Cita::class)->sumaCitas($date);
        return $this->render('reporte/consultas.html.twig',[
            'especialidades' => $especialidades,
            'date' => $date,
            'form' => $form->createView(),
        ]);
    }
}