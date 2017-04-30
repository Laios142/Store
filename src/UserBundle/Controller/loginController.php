<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Login;


class loginController extends Controller
{
    /**
     * @Route("/register", name="newUser")
     */
    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $form = $this->createFormBuilder(new Login())
            ->add("username")
            ->add("password")
            ->add("salt")
            ->add("submit", SubmitType::class, array('label' => 'Créer'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $article = $form->getData();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute("/");
        }

        return $this->render('UserBundle:Login:register.html.twig', array(
            'form' => $form->createView()
        ));
    }
    public function loginAction()
    {
        // If user is already authenticated, we redirect him to home page
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('home');
        }

        // The service authentication_utils allows to get user name
        // and an error when the forms was already submitted but invalid
        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render('UserBundle:Login:login.html.twig', array(
            'last_username' => $authenticationUtils->getLastUsername(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
        ));
    }

}