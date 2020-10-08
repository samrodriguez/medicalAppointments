<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class PacientexController extends AbstractController
{

    /**
     * @Route("/paciente", name="app_paciente", methods={"GET","POST"})
     */
    public function pacienteAction(): Response
    {
        return $this->render('paciente/index.html.twig');
    }
}