<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectFormType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ProjectController extends AbstractController
{

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('project/home.html.twig', [
            'name' => 'fofo',
        ]);
    }

    /**
     * @Route("/projects", name="projects")
     */
    public function listProject(ProjectRepository $repo)
    {
        $projects =$repo->findAll();
 
        return $this->render('project/index.html.twig', [
            'projects' => $projects,
        ]);
    }

    /**
     * @Route("/project/show/{id}", name="show_project")
     */

    public function show(Project $project){
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

    /**
     * @isGranted("ROLE_ADMIN")
     * @Route("/project/add", name="add_project")
     */
    public function add(Request $request){
        $project= new Project();
        // $project->setProposePar($this->getUser());
        $form = $this ->createForm(ProjectFormType::class, $project);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();
            $this->addFlash('success', 'Le projet a bien été proposé');
            return $this->redirectToRoute("projects");

        }
        return $this->render('project/add.html.twig', [
            'form' => $form->createView(),
            'project' => $project
        ]);

    }

    /**
     * Edit Project
     * @Route("project/edit/{id}", name="edit_project")
     */
    public function editProject(Request $request, Project $project){
        $this->denyAccessUnlessGranted('ROLE_ADMIN'); //sans la notation @isGranted

        $form = $this->createForm(ProjectFormType::class, $project);
        $form->handleRequest($request);
        


    }
}
