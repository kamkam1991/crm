<?php

namespace CrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @Route("/task")
*/
class TaskController extends Controller
{
    /**
     * @Route(
     *      "/",
     *      name = "task_list",
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
     *      "/task_add",
     *      name = "task_add",
     * )
     * @Template
     */
    public function taskAddAction()
    {
        return array(
            
        );
    }
    
    /**
     * @Route(
     *      "/task_update/{id}",
     *      name = "task_update",
     *      defaults = {"id" = 0}
     * )
     * @Template
     */
    public function taskUpdateAction($id)
    {
        return array(
            
        );
    }
    
    /**
     * @Route(
     *      "/task_find/{tag}",
     *      name = "task_find",
     *      defaults = {"tag" = 0}
     * )
     * @Template
     */
    public function taskFindAction($tag)
    {
        return array(
            
        );
    }
}
