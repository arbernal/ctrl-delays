<?php

namespace Teknei\CtrlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
	/**
	 * @Route("/login")
	 */
	 public function loginAction()
	 
	 
    {
        return $this->render('TekneiCtrlBundle:Security:login.html.twig');
    }
}
