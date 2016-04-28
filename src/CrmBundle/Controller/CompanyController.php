<?php

namespace CrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @Route("/company")
*/
class CompanyController extends Controller
{
    /**
     * @Route(
     *      "/",
     *      name = "reguest_list",
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
     *      "/reguest_add",
     *      name = "reguest_add",
     * )
     * @Template
     */
    public function requestAddAction()
    {
        return array(
            
        );
    }
    
    /**
     * @Route(
     *      "/company_update/{id}",
     *      name = "company_update",
     *      defaults = {"id" = 0}
     * )
     * @Template
     */
    public function companyUpdateAction($id)
    {
        return array(
            
        );
    }
    
}
