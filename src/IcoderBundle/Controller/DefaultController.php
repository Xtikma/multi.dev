<?php

namespace IcoderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IcoderBundle:Default:index.html.twig');
    }
}
