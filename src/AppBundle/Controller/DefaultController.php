<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/index", name="indexhomepage")
     */
    public function getIndexAction(){
        return $this->render('@App/index.html.twig');
    }
    /**
     * @Route("/login2", name="login2page")
     */
    public function loginAction(){
        return $this->render('@App/login.html.twig');
    }
    /**
     * @Route("/register2", name="register2page")
     */
    public function registerAction(){
        return $this->render('@App/register.html.twig');
    }
}
