<?php

namespace Universidad\Bundle\AutenticacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UniversidadAutenticacionBundle:Default:index.html.twig', array('name' => $name));
    }
}
