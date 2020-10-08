<?php


namespace App\Controller;

use App\Entity\Cita;
use App\Repository\EspecialidadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 * @Route("/reporte")
 */
class ReporteController extends AbstractController
{

    /**
     * @Route("/consultas", name="app_consultasxespecialidad", methods={"GET","POST"})
     */
    public function consultasAction(EspecialidadRepository $especialidadRepository): Response
    {
        $date = new \DateTime();        
        $entityManager = $this->getDoctrine()->getManager();
        $especialidades = $entityManager->getRepository(Cita::class)->sumaCitas($date);
        /*$consultas = [
            ['id'=> 1, 'nombre'=> 'pediatría','total'=> 1,],
            ['id'=> 2, 'nombre'=> 'dermatología,','total'=> 5,],
            ['id'=> 3, 'nombre'=> 'cirugía','total'=> 7,],
            ['id'=> 4, 'nombre'=> 'otorrinolaringología','total'=> 4,],
            ['id'=> 5, 'nombre'=> 'ortopedia.','total'=> 190,]
            ];*/
        return $this->render('reporte/consultas.html.twig',[
            //'consultas' => $consultas,
            'especialidades' => $especialidades,
        ]);
    }
}