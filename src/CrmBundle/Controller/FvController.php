<?php

namespace CrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @Route("/fv")
*/
class FvController extends Controller
{
    /**
     * @Route(
     *      "/",
     *      name = "fv_list",
     * )
     * @Template
     */
    public function indexAction()
    {
        return array(
            
        );
    }
    
    /**
     * @Route(
     *      "/fv_add",
     *      name = "fv_add",
     * )
     * @Template
     */
    public function fvAddAction()
    {
        return array(
            
        );
    }
    
    /**
     * @Route(
     *      "/fv_update/{id}",
     *      name = "fv_update",
     *      defaults = {"id" = 0}
     * )
     * @Template
     */
    public function fvUpdateAction($id)
    {
        return array(
            
        );
    }
    
    /**
     * @Route(
     *      "/fv_find/{tag}",
     *      name = "fv_find",
     *      defaults = {"tag" = 0}
     * )
     * @Template
     */
    public function fvFindAction($tag)
    {
        return array(
            
        );
    }
}
