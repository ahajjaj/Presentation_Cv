<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ProjectController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function show()
    {        
        
        return $this->render('home/show.html.twig', [
        'projet' => "coucou"
        ]);
    }
}
