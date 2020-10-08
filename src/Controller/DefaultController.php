<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="app_menu", methods={"GET"})
     */
    public function menuAction(): Response
    {
        return $this->render('default/menu.html.twig');
    }
}