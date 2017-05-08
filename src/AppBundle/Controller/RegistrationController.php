<?php
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller 
{

 /**
     * @Route("/register", name="register")
     */

	public function registerAction (Request $request)
	{
		$user = new User();
		$form = $this->createForm(UserType::class, $user);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid())
		{
			//Encode users password securaly

			$encoder = $this->get('security.password_encoder');
			$password = $encoder->encodePassword($user, $user->getPlainPassword());
			$user->setPassword($password);


			$user->setRole('ROLE_USER');
			//Save the user
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();

			return $this->redirectToRoute('login');
		}

		  return $this->render('AppBundle:Pokemon:auth/register.html.twig', [
            'form' => $form->createView(),
        ]);
	}
}