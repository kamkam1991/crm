<?php

namespace CrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @Route("/test")
*/
class DefaultController extends Controller
{
    /**
     * @Route(
     *      "/",
     *      name="index"
     * )      
     * @Template
     */
    public function indexAction()
    {
        return array(
            'kontroller' => 'kontroller'
        );
    }
}
