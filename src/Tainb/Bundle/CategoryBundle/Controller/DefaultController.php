<?php

namespace Tainb\Bundle\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TainbCategoryBundle:Default:index.html.twig');
    }
}
