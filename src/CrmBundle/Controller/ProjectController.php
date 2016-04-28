<?php

namespace CrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use CrmBundle\Entity\Client;
use CrmBundle\Entity\Project;
use CrmBundle\Form\ProjectType;

/**
* @Route("/project")
*/
class ProjectController extends Controller
{
    /**
     * @Route(
     *      "/",
     *      name = "project_list",
     * )
     * @Template
     */
    public function indexAction()
    {
        $Repo1 = $this->getDoctrine()->getRepository('CrmBundle:Project');
        $ProjectList = $Repo1->findAll();
        return array(
            'projectList' => $ProjectList,
        );
    }
    
    /**
     * @Route(
     *      "/project_add",
     *      name = "project_add",
     * )
     * @Template
     */
    public function projectAddAction(Request $Request)
    {
        $Entity = new Project();
        $ProjectForm = $this->createForm(new ProjectType(), $Entity);
        $ProjectForm->handleRequest($Request);
        if ($Request->isMethod('POST')){
             if($ProjectForm->isValid()){
                 $em = $this->getDoctrine()->getManager();
                 $em->persist($Entity);
                 $em->flush();
             }
        }
        return array(
            'ProjectForm' => $ProjectForm->createView(),
        );
    }
    
    /**
     * @Route(
     *      "/project_update/{id}",
     *      name = "project_update",
     *      defaults = {"id" = 0}
     * )
     * @Template
     */
    public function projectUpdateAction($id)
    {
        return array(
            
        );
    }
    
    /**
     * @Route(
     *      "/peojectdelete/{id}",
     *      name="project_delete",
     * )
     */
    public function deleteProjectAction($id)
    {
        $Repo = $this->getDoctrine()->getRepository('CrmBundle:Project');
        $row = $Repo->find($id);
        if(NULL == $row ){
            throw $this->createNotFoundException('Nie znaleziono takiego projektu');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($row);
        $em->flush();
        return $this->redirect($this->generateUrl('project_list'));
    }
    
    /**
     * @Route(
     *      "/project_find/{tag}",
     *      name = "project_find",
     *      defaults = {"tag" = 0}
     * )
     * @Template
     */
    public function projectFindAction($tag)
    {
        return array(
            
        );
    }
}
