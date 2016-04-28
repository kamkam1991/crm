<?php

namespace CrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;

use CrmBundle\Entity\File;
use CrmBundle\Entity\TimeLine;
use CrmBundle\Entity\Project;
use CrmBundle\Entity\Client;
use CrmBundle\Form\ClientType;
use CrmBundle\Form\ClientFindType;
use CrmBundle\Form\TimelineType;
use CrmBundle\Form\FileType;


/**
* @Route("/client")
*/
class ClientController extends Controller
{
    /**
     * @Route(
     *      "/",
     *      name = "client_list",
     * )
     * @Template
     */
    public function indexAction()
    {
        $Repo1 = $this->getDoctrine()->getRepository('CrmBundle:Client');
        $ClientList = $Repo1->findAll();
        return array(
            'clientList' => $ClientList,
        );
    }
    
    /**
     * @Route(
     *      "/client_add",
     *      name = "client_add",
     * )
     * @Template
     */
    public function clientAddAction(Request $Request)
    {
        $Entity = new Client();
        $ClientForm = $this->createForm(new ClientType(), $Entity);
        $ClientForm->handleRequest($Request);
        if($Request->isMethod('POST')){
            if($ClientForm->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($Entity);
                $em->flush();
                return $this->redirect($this->generateUrl('client_list'));
            }
        }
        return array(
            'ClientForm' => $ClientForm->createView(),
        );
    }
    
    /**
     * @Route(
     *      "/client_update/{id}",
     *      name = "client_update",
     *      defaults = {"id" = 0}
     * )
     * @Template
     */
    public function clientUpdateAction(Request $Request, $id)
    {
        $Repo = $this->getDoctrine()->getRepository('CrmBundle:Client');
        $Entity = $Repo->find($id);
        
        if(NULL == $Entity ){
            throw $this->createNotFoundException('Nie znaleziono takiej kategorii');
        }       
        $clientForm = $this->createForm(new ClientType(), $Entity);        
        if($Request->isMethod('POST')){
            $clientForm->handleRequest($Request);
            if($clientForm->isValid()){     
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                return $this->redirect($this->generateUrl(
                        'client_detail', array('id' => $id)                
                ));
                
            }
        }        
        return array(
           
            'clientForm' => $clientForm->createView()
        );
    }
    
    /**
     * @Route(
     *      "/client_find/{city}",
     *      name = "client_find",
     *      defaults = {"city" = null}
     * )
     * @Template
     */
    public function clientFindAction(Request $Request, $city = null)
    {
        if( $city == null){
            $Entity = new Client();
            $formSearch = $this->createForm(new ClientFindType(), $Entity);
            $ClientForm->handleRequest($Request);
            if($Request->isMethod('POST')){
                if($ClientForm->isValid()){
                    $Repo2 = $this->getDoctrine()->getRepository('CrmBundle:Client');
                    $listClient =$Repo2->findBy(array('city' => $city));
                    return $this->redirect($this->generateUrl('client_find', array('city' => $Request->get($city))));
                }
            }
            return array(
                'formSearch' => $formSearch->createView(),
            );
        } else {
            $Repo1 = $this->getDoctrine()->getRepository('CrmBundle:Client');
            $findList = $Repo1->findBy(array('city' => $city));
            return array(
                'findList' => $findList
            );
        }        
    }
    /**
     * @Route(
     *      "/client_detail/{id}",
     *      name = "client_detail",
     *      defaults = {"id" = 0}
     * )
     * @Template
     */
    public function clientDetailsAction(Request $Request, $id)
    {        
        $Repo1 = $this->getDoctrine()->getRepository('CrmBundle:Client');
        $dataList = $Repo1->findBy(array('id' => $id));
        $Repo2 = $this->getDoctrine()->getRepository('CrmBundle:Project');
        $projectList = $Repo2->findBy(array('clientId' => $id));
        $Repo3 = $this->getDoctrine()->getRepository('CrmBundle:Timeline');
        $timeline = $Repo3->findBy(array('clientId' => $id));
        $Repo4 = $this->getDoctrine()->getRepository('CrmBundle:File');
        $fileList = $Repo4->findBy(array('clientId' => $id));
        
        $EntityTimeline = new TimeLine(); 
        $timelineForm = $this->createForm(new TimeLineType(), $EntityTimeline);
        $timelineForm->handleRequest($Request);
        if($Request->isMethod('POST')){
            if($timelineForm->isValid()){       
                $em = $this->getDoctrine()->getManager();
                $em->persist($EntityTimeline); 
                $em->flush();
                return $this->redirect($this->generateUrl('client_detail', array('id' => $id)));
            }
        }
        
        $EntityFile = new File();
        $fileForm = $this->createForm(new FileType(), $EntityFile);
        $fileForm->handleRequest($Request);
        if($Request->isMethod('POST')){
            if($fileForm->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($EntityFile);
                $em->flush();
                return $this->redirect($this->generateUrl('client_detail', array('id' => $id)));
            }
        }
        
        return array(
            'dataList' => $dataList,
            'projectList' => $projectList,
            'timeline' => $timeline,
            'fileList' => $fileList,
            'formTimeline' => $timelineForm->createView(),
            'fileForm' => $fileForm->createView(),
        );
    }
    /**
     * @Route(
     *      "/filedelete/{id}",
     *      name="client_file_delete",
     * )
     */
    public function deleteFileAction($id)
    {
        $Repo = $this->getDoctrine()->getRepository('CrmBundle:File');
        $row = $Repo->findBy(array('id' => $id));
        if(NULL == $row ){
            throw $this->createNotFoundException('Nie znaleziono takiego pliku');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($row);
        $em->flush();
        return $this->redirect($this->generateUrl('client_detail', array('id'=> $id)));
    }
}
