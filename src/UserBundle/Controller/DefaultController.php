<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Materie;
use UserBundle\Entity\citta;
use UserBundle\Entity\Provincia;
use UserBundle\Entity\User;





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
        if(($request->request->get('citta')==null||$request->request->get('livello')==null||$request->request->get('materia')==null))
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
}
