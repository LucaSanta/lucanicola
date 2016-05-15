<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
      $materie=$this->getDoctrine()->getRepository('UserBundle:Materie')->findAll();
      $cities=$this->getDoctrine()->getRepository('UserBundle:citta')->findAll();
      $province=$this->getDoctrine()->getRepository('UserBundle:Provincia')->findAll();

        return $this->render('UserBundle:Default:index.html.twig', array(
            'materie' => $materie,
            'province'=>$province,
            'cities'=>$cities,
        ));


    }


        public function aboutAction()
    {
        return $this->render('UserBundle:Default:about.html.twig');
    }


        public function docenteAction()
    {
        return $this->render('UserBundle:Default:profilo.docenti.html.twig');
    }

            public function doceAction()
    {
        return $this->render('UserBundle:Default:docente.html.twig');
    }
}
