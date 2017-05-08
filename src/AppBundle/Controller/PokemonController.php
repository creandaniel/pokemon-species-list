<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Serializer\Serializer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\Response;


use AppBundle\Entity\Pokemon;
use AppBundle\Form\PokemonType;


class PokemonController extends Controller
{
   /**
   * @Route("/", name="welcome")
   */


   public function indexAction(Request $request)
   {

      $em = $this->getDoctrine()->getManager();

      $pokemons = $em->getRepository('AppBundle:Pokemon')->findAll();

     $paginator = $this->get('knp_paginator');

      $result = $paginator->paginate($pokemons, 
         $request->query->getInt('page', 1),
         $request->query->getInt('limit', 5)
       );

      return $this->render('AppBundle:Pokemon:auth/index.html.twig', array(
         'pokemons'=> $result,
         ));
   }

   public function showAction($id)
   {
      $em = $this->getDoctrine()->getManager();

      $pokemon =  $em->getRepository('AppBundle:Pokemon')->find($id);

      $delete_form = $this->createFormBuilder()
         ->setAction($this->generateUrl('pokemon_delete', array('id'=>$id)))
         ->setMethod('DELETE')
         ->add('save', SubmitType::class, array('label' => 'Delete Pokemon'))
         ->getForm();

      return $this->render('AppBundle:Pokemon:auth/show.html.twig', array(
         'pokemon'=> $pokemon,
         'delete_form'=> $delete_form->createView()
         ));
   }


   public function newAction()
   {
      $pokemon = new Pokemon();


      // $form = $this->createForm(new PokemonType::class, $pokemon, array(
      $form = $this->createForm(PokemonType::class, $pokemon, array(
         'action' => $this->generateUrl('pokemon_create'),
         'method' => 'POST'
         )
      );

      // $form->add('submit', 'submit', array('label'=>'Create Book'));
      $form->add('save', SubmitType::class, array('label' => 'Create Book'));
      return $this->render('AppBundle:Pokemon:auth/new.html.twig', array(
         'form'=> $form->createView()
         ));
   }

   public function createAction(Request $request)
   {
      $pokemon = new Pokemon();

      //$form = $this->createForm(new PokemonType(), $pokemon, array(
      $form = $this->createForm(PokemonType::class, $pokemon, array(
         'action' => $this->generateUrl('pokemon_create'),
         'method' => 'POST'
         ));

      //$form->add('submit', 'submit', array('label'=>'Create Pokemon'));

      $form->add('save', SubmitType::class, array('label' => 'Create Pokemon'));

      $form->handleRequest($request);

      if ($form->isValid())
      {
         // This line fetches Doctrine's entity manager object, which is responsible for the process of persisting      objects to, and fetching objects from, the database.
         $em = $this->getDoctrine()->getManager();
         // tells Doctrine you want to (eventually) save the Product (no queries yet)
         $em->persist($pokemon);
         // actually executes the queries (i.e. the INSERT query). A  Doctrine\ORM\ORMException  will be called if this fails
         $em->flush();

         $this->get('session')->getFlashBag()->add('msg', 'Your pokemon has been created');

         return $this->redirect($this->generateUrl('pokemon_show', array('id' =>$pokemon->getId())));
      }
      $this->get('session')->getFlashBag()->add('msg', '');

      return $this->render('AppBundle:Pokemon:auth/new.html.twig', array('form'=>$form->createView()));
   }

   public function editAction($id)
   {
      $em = $this->getDoctrine()->getManager();

      $pokemon = $em->getRepository('AppBundle:Pokemon')->find($id);

      $form = $this->createForm(PokemonType::class, $pokemon, array(
      // $form = $this->createForm(new BookType(), $pokemon, array(
         'action' =>$this->generateUrl('pokemon_update', array('id'=>$pokemon->getId())),
         'method'=> 'PUT'  
         ));

      //$form->add('submit', 'submit', array('label'=>'Update Book'));
      $form->add('save', SubmitType::class, array('label' => 'Create Book'));
      return $this->render('AppBundle:Pokemon:auth/new.html.twig', array(
         'form'=>$form->createView()
         ));

   }

   public function updateAction(Request $request, $id)
   {
      $em = $this->getDoctrine()->getManager();

      $pokemon = $em->getRepository('AppBundle:Pokemon')->find($id);

      $form = $this->createForm(PokemonType::class, $pokemon, array(
      // $form = $this->createForm(new BookType(), $pokemon, array(
         'action' =>$this->generateUrl('pokemon_update', array('id'=>$pokemon->getId())),
         'method'=> 'PUT'  
         ));

      //$form->add('submit', 'submit', array('label'=>'Create Book'));
      $form->add('save', SubmitType::class, array('label' => 'Create Book'));

      $form->handleRequest($request);

      if ($form->isValid())
      {
         $em->flush();

         $this->get('session')->getFlashBag()->add('msg', 'The book has been update sucessfully');

         return $this->redirect($this->generateUrl('pokemon_show', array('id'=>$id)));
      }
      return $this->render('AppBundle:Pokemon:auth/edit.html.twig', array(
         'form'=>$form->createView()
         ));
   }

      public function deleteAction(Request $request, $id)
   {
      $delete_form = $this->createFormBuilder()
         ->setAction($this->generateUrl('pokemon_delete', array('id'=> $id)))
         ->setMethod('DELETE')
         ->add('save', SubmitType::class, array('label' => 'Delete Pokemon'))
         ->getForm();
         

      $delete_form->handleRequest($request);

      if ($delete_form->isValid())
      {
         $em = $this->getDoctrine()->getManager();
         $pokemon = $em->getRepository('AppBundle:Pokemon')->find($id);
         $em->remove($pokemon);
         $em->flush();

      }
      $this->get('session')->getFlashBag()->add('msg', 'Your book has been deleted');
      
       return $this->render('AppBundle:Pokemon:auth/new.html.twig', array('form'=>$form->createView()));
   }

}

