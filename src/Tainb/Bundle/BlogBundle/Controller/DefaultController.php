<?php

namespace Tainb\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TainbBlogBundle:Default:index.html.twig', array('name' => $name));
    }
}
