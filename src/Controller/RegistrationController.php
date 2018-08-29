<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="registration", methods={"GET"})
     */
    public function index()
    {
        $regForm = $this->createForm(UserType::class);
        return $this->render('registration/index.html.twig',[
            'regForm' => $regForm->createView()
        ]);
    }

    /**
     * @Route("/registration", name="actionRegistration", methods={"POST"})
     */
    public function actionRegistration(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $this->getDoctrine()->getManager()->persist($user);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('login');
        }

        return $this->render('registration/index.html.twig',[
            'regForm' => $form->createView()
        ]);
    }
}
