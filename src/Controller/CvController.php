<?php

namespace App\Controller;

use App\Entity\Hobbie;
use App\Entity\Projet;
use App\Form\HobbieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

class CvController extends AbstractController
{
    private $formFactory;
    private $entityManager;
    private $router;

    
public function __construct(FormFactoryInterface $formFactory, EntityManagerInterface $entityManager,
RouterInterface $router)
{
    $this->formFactory = $formFactory;
    $this->entityManager = $entityManager;
    $this->router = $router;
}


    /**
     * @Route("/cv", name="cv")
     */
    public function index()
    {
        $repository = $this -> getDoctrine()-> getRepository(Hobbie::class);
        $hobbies = $repository->findAll();
        

     
        $repository = $this -> getDoctrine()-> getRepository(Projet::class);
        $projet = $repository->findAll();
      
    

    return $this->render('cv/index.html.twig', [
        'hobbie' => $hobbies,
        'projet' => $projet
    ]);
    
}

 /**
     * @Route("/add", name="hobbie_add")
     */
    public function add(Request $request)
    {
        $hobbies = new Hobbie();
        $form = $this->formFactory->create(HobbieType::class, $hobbies);
        $form -> handleRequest($request);       
        if($form->isSubmitted() && $form->isValid()){
            $this->entityManager->persist($hobbies);
            $this->entityManager->flush();
            return new RedirectResponse(
                $this->router ->generate('cv')
            );
        }
        return $this->render('cv/add.html.twig', [
            'form' => $form->createView()
     ]);
    }

 /**
     * @Route("/cv/show/{id}", name="projet_show")
     */
    public function show($id)
    {        
        
        $repository = $this -> getDoctrine()-> getRepository(Projet::class);
        $projet = $repository->find($id);
        return $this->render('cv/show.html.twig', [
        'projet' => $projet
        ]);
    }
}
