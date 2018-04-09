<?php

namespace Meuprojeto\UploadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MeuprojetoUploadBundle:Default:index.html.twig');
    }
    
}
