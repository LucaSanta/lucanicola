<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Materie;
use UserBundle\Entity\citta;
use UserBundle\Entity\Provincia;
use UserBundle\Entity\User;
use UserBundle\Entity\Agende;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use UserBundle\Form\Type\UserFormType;
use UserBundle\Form\Type\AgendaFormType;


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

            public function doceAction(Request $request)

    {
          $url = $_SERVER['REQUEST_URI'];
          $parts = Explode('/', $url);
          $part = $parts[2];
    $agenda = $this->getDoctrine()->getRepository('UserBundle:Agende')->findAll();

     $docenti=$this->getDoctrine()->getRepository('UserBundle:User')->findById($part);


     return $this->render('UserBundle:Default:docente.html.twig' , array(
           'docenti' => $docenti,
           'agenda' => $agenda,

        ));
    }


public function editProfiloAction(Request $request)
    {
        $utente = new User();
        $utente=$this->getDoctrine()->getRepository('UserBundle:User')->find($request->get('id'));
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
     'Profilo docente modificato con successo'
     );
   return $this->RedirectToRoute('agende', array ('id'=> $request->get('id')));

}
    return $this->render('UserBundle:Default:modifica.profilo.html.twig', array(
           'form' => $form->createView(),
            ));
       }

    public function editAgendeAction(Request $request)
    {


        $agende=$this->getDoctrine()->getRepository('UserBundle:Agende')->find($request->get('id'));
  if ($agende==NULL) {
    $agende= new Agende();


  $form = $this->createForm(AgendaFormType::class, $agende);
  $form->handleRequest($request);
  if ($form->isSubmitted() && $form->isValid()) {
         // Salvo cose.
   $agende = $form->getData();
   $em = $this->getDoctrine()->getManager();
   $em->persist($agende);
   $em->flush();

   $this->addFlash(
     'notice',
     'Profilo docente modificato con successo'
     );
   return $this->redirectToRoute('docenti');
   }
}

  $form = $this->createForm(AgendaFormType::class, $agende);
  $form->handleRequest($request);
  if ($form->isSubmitted() && $form->isValid()) {
         // Salvo cose.
   $agende = $form->getData();
   $em = $this->getDoctrine()->getManager();
   $em->persist($agende);
   $em->flush();

   $this->addFlash(
     'notice',
     'Profilo docente modificato con successo'
     );
   return $this->redirectToRoute('docenti');
}



    return $this->render('UserBundle:Default:agende.html.twig', array(
           'form' => $form->createView(),
   ));


    }


}
