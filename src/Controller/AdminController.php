<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * Accueil
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('admin/home.html.twig', [
            'controller_name' => 'AdminController',
            ]);
        }
        
    /**
     * Users list
     * @Route("/users", name="users")
     */
    public function usersList(UserRepository $userRepository)
    {
        return $this->render('admin/users.html.twig', [
            'userslist' => $userRepository->findAll()
        ]);

    }

    /**
     * Edit user
     * @Route("/user/edit/{id}", name="edit_user")
     */
    public function editUser(User $user, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($user);
            $manager->flush();

            $this->addFlash('message', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('admin_users');
        }
        return $this->render('admin/edituser.html.twig', [
            'userform' => $form->createView()
        ]);

    }
}
