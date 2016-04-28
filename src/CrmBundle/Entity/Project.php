<?php

namespace CrmBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
     * @ORM\Entity
     * @ORM\Table(name="project")
     */
class Project {
    
    /**
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      max=30
     * )
     */
    private $nameProject;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * 
     */
    private $captionProject;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      max=255
     * )
     */
    private $urlTest = 'null';
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      max=255
     * )
     */
    private $urlProd = 'null';
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      max=60
     * )
     */
    private $ftpLogin = 'null';
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      max=60
     * )
     */
    private $ftpPass = 'null';
    
    /**
     * @ORM\Column(type="text", length=10)
     * @Assert\Length(
     *      max=10
     * )
     */
    private $status = 'null';
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      max=255
     * )
     */
    private $gitLink = 'null';
    
    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
     protected $date;
    
    /**
     * @ORM\ManyToOne(
     *      targetEntity = "Client",
     *      inversedBy = "projectId"
     * )
     * @ORM\JoinColumn(
     *      name = "client_id",
     *      referencedColumnName= "id",
     *      onDelete = "SET NULL"
     * )
     */
    private $clientId;

    public function getId() {
        return $this->id;
    }

    public function getNameProject() {
        return $this->nameProject;
    }

    public function getCaptionProject() {
        return $this->captionProject;
    }

    public function getUrlTest() {
        return $this->urlTest;
    }

    public function getUrlProd() {
        return $this->urlProd;
    }

    public function getFtpLogin() {
        return $this->ftpLogin;
    }

    public function getFtpPass() {
        return $this->ftpPass;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getGitLink() {
        return $this->gitLink;
    }

    public function getDate() {
        return $this->date;
    }

    public function getClientId() {
        return $this->clientId;
    }

    public function setNameProject($nameProject) {
        $this->nameProject = $nameProject;
        return $this;
    }

    public function setCaptionProject($captionProject) {
        $this->captionProject = $captionProject;
        return $this;
    }

    public function setUrlTest($urlTest) {
        $this->urlTest = $urlTest;
        return $this;
    }

    public function setUrlProd($urlProd) {
        $this->urlProd = $urlProd;
        return $this;
    }

    public function setFtpLogin($ftpLogin) {
        $this->ftpLogin = $ftpLogin;
        return $this;
    }

    public function setFtpPass($ftpPass) {
        $this->ftpPass = $ftpPass;
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function setGitLink($gitLink) {
        $this->gitLink = $gitLink;
        return $this;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    public function setClientId($clientId) {
        $this->clientId = $clientId;
        return $this;
    }


}
