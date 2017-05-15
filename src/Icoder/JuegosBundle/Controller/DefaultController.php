<?php

namespace Icoder\JuegosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IcoderJuegosBundle:Default:index.html.twig');
    }
}
