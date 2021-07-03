<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Mime\NamedAddress;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;


class SecurityController extends AbstractController
{
    private $passwordEncoder;
    private $verifyEmailHelper;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder,VerifyEmailHelperInterface $helper, MailerInterface $mailer)
    {
        $this->em = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
        $this->verifyEmailHelper = $helper;
        $this->mailer = $mailer;
    }
    /**
     * @Route("/inscription", name="security_registration")
     */
/*     public function registration(Request $request, EntityManagerInterface $manager,UserPasswordEncoderInterface $passwordEncoder, MailerInterface $mailer)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $hash = $passwordEncoder->encodePassword($user, $user->getPassword());

            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush(); 

        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
 */
    /**
     * @Route("/connexion", name="security_login")
     */
    public function login()
    {
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout()
    {

    }
}
