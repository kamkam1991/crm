<?php

namespace CrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @Route("/bookkeeping")
*/
class BookkeepingController extends Controller
{
    /**
     * @Route(
     *      "/",
     *      name = "bookkeeping_list",
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
     *      "/bookkeeping_add",
     *      name = "bookkeeping_add",
     * )
     * @Template
     */
    public function bookkeepingAddAction()
    {
        return array(
            
        );
    }
    
    /**
     * @Route(
     *      "/bookkeeping_update/{id}",
     *      name = "bookkeeping_update",
     *      defaults = {"id" = 0}
     * )
     * @Template
     */
    public function bookkeepingUpdateAction($id)
    {
        return array(
            
        );
    }
    
    /**
     * @Route(
     *      "/bookkeeping_find/{tag}",
     *      name = "bookkeeping_find",
     *      defaults = {"tag" = 0}
     * )
     * @Template
     */
    public function bookkeepingFindAction($tag)
    {
        return array(
            
        );
    }
}
