<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Materie;
use UserBundle\Entity\citta;
use UserBundle\Entity\Provincia;
use UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use UserBundle\Form\Type\UserFormType;


class DefaultController extends Controller
{

    public function indexAction()
    {
      $materie=$this->getDoctrine()->getRepository('UserBundle:Materie')->findAll();
      $cities=$this->getDoctrine()->getRepository('UserBundle:citta')->findAll();
      $users=$this->getDoctrine()->getRepository('UserBundle:User')->getLivelloScol();

        return $this->render('UserBundle:Default:index.html.twig', array(
            'materie' => $materie,
            'users'=>$users,
            'cities'=>$cities,
        ));


    }


        public function aboutAction()
    {
        return $this->render('UserBundle:Default:about.html.twig');
    }


        public function docenteAction(Request $request)
    {
        if(($request->request->get('citta')==null&&$request->request->get('livello')==null&&$request->request->get('materia')==null))
      {
              $docenti = $this->getDoctrine()->getRepository('UserBundle:User')->findAll();
      }
      else{
              $citta=$request->request->get('citta');
              $materia=$request->request->get('materia');
              $livello=$request->request->get('livello');
              $docenti = $this->getDoctrine()->getRepository('UserBundle:User')->getRicerca($citta,$livello,$materia);

              
      }

        return $this->render('UserBundle:Default:profilo.docenti.html.twig', array(
            'docenti' => $docenti,

        ));
    }

            public function doceAction()
    {

     return $this->render('UserBundle:Default:docente.html.twig');
    }


public function editProfiloAction(Request $request)
    {
        $utente = new User();
//$utente = $this->getDoctrine()->getRepository('UserBundle:User')->find($request->get('id'));

  if (!$utente) {
   throw new NotFoundHttpException();
   }
  $form = $this->createForm(UserFormType::class, $utente);
  $form->handleRequest($request);
  if ($form->isSubmitted() && $form->isValid()) {
         // Salvo cose.
   $utente = $form->getData();
   $em = $this->getDoctrine()->getManager();
   $em->persist($utente);
   $em->flush();

   $this->addFlash(
     'notice',
     'Aula modificata con successo'
     );

 }
    return $this->render('UserBundle:Default:modifica.profilo.html.twig', array(
           'form' => $form->createView(),
        ));

    }


}
