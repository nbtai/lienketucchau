<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
//    /**
//     * @Route("/", name="homepage")
//     */
//    public function indexAction(Request $request)
//    {
//        // replace this example code with whatever you need
//        return $this->render('default/index.html.twig', array(
//            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
//        ));
//    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $auth = $this->container->get('security.context');
        if ($auth->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->render('default/index.html.twig', array(
                'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            ));
        } else {
            return $this->redirect('login');
        }
    }
}
