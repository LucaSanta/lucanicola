<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserBundle:Default:index.html.twig');
    }


        public function aboutAction()
    {
        return $this->render('UserBundle:Default:about.html.twig');
    }


        public function docenteAction()
    {
        return $this->render('UserBundle:Default:profilo.docenti.html.twig');
    }
}
