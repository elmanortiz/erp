<?php

namespace ERP\CRMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/admin/CRM/configuracion")
     */
    public function indexAction()
    {
        return $this->render('ERPCRMBundle:general:configuracion.html.twig');
    }
}
