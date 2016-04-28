<?php

namespace CrmBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
     * @ORM\Entity
     * @ORM\Table(name="client")
     */
class Client {
    
    /**
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(
     *      targetEntity = "File",
     *      mappedBy = "clientId"
     * )
     */
    protected $fileId;
    
    /**
     * @ORM\OneToMany(
     *      targetEntity = "Project",
     *      mappedBy = "clientId"
     * )
     */
    protected $projectId;
    
    /**
     * @ORM\OneToMany(
     *      targetEntity = "Task",
     *      mappedBy = "clientId"
     * )
     */
    protected $taskId;
    
    /**
     * @ORM\OneToMany(
     *      targetEntity = "TimeLine",
     *      mappedBy = "clientId"
     * )
     */
    protected $timeLineId;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      max=20
     * )
     */
    private $firstName;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      max=50
     * )
     */
    private $lastName;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      max=255
     * )
     */
    private $companyName = 'null';
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      max=255
     * )
     */
    private $city = 'null';
    
    /**
     * @ORM\Column(type="string", length=6)
     * @Assert\Length(
     *      max=6
     * )
     */
    private $postCode = 'null';
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      max=255
     * )
     */
    private $street = 'null';
    
    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(
     *      max=100
     * )
     */
    private $numberBuild  = 'null';
    
    /**
     * @ORM\Column(type="string", length=150)
     * @Assert\Length(
     *      max=150
     * )
     */
    private $email = 'null';
    
    /**
     * @ORM\Column(type="string", length=16)
     * @Assert\NotBlank
     * @Assert\Length(
     *      max=16
     * )
     */
    private $telNumber;
    
    /**
     * @ORM\Column(type="integer", length=11)
     * @Assert\Length(
     *      max=11
     * )
     */
    private $pesel = 0;
    
    /**
     * @ORM\Column(type="string", length=16)
     * @Assert\Length(
     *      max=16
     * )
     */
    private $identity = 'null';
    
    /**
     * @ORM\Column(type="integer", length=11)
     * @Assert\Length(
     *      max=11
     * )
     */
    private $nip = 0;
    
    /**
     * @ORM\Column(type="integer", length=20)
     * @Assert\Length(
     *      max=20
     * )
     */
    private $regon = 0;
    
    public function getId() {
        return $this->id;
    }

    public function getFileId() {
        return $this->fileId;
    }

    public function getTaskId() {
        return $this->taskId;
    }

    public function getTimeLineId() {
        return $this->timeLineId;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getCompanyName() {
        return $this->companyName;
    }

    public function getCity() {
        return $this->city;
    }

    public function getPostCode() {
        return $this->postCode;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getNumberBuild() {
        return $this->numberBuild;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelNumber() {
        return $this->telNumber;
    }

    public function getPesel() {
        return $this->pesel;
    }

    public function getIdentity() {
        return $this->identity;
    }

    public function getNip() {
        return $this->nip;
    }

    public function getRegon() {
        return $this->regon;
    }

    public function setFileId($fileId) {
        $this->fileId = $fileId;
        return $this;
    }
    
    public function getProjectId() {
        return $this->projectId;
    }

    public function setProjectId($projectId) {
        $this->projectId = $projectId;
        return $this;
    }

        
    public function setTaskId($taskId) {
        $this->taskId = $taskId;
        return $this;
    }

    public function setTimeLineId($timeLineId) {
        $this->timeLineId = $timeLineId;
        return $this;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
        return $this;
    }

    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    public function setPostCode($postCode) {
        $this->postCode = $postCode;
        return $this;
    }

    public function setStreet($street) {
        $this->street = $street;
        return $this;
    }

    public function setNumberBuild($numberBuild) {
        $this->numberBuild = $numberBuild;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setTelNumber($telNumber) {
        $this->telNumber = $telNumber;
        return $this;
    }

    public function setPesel($pesel) {
        $this->pesel = $pesel;
        return $this;
    }

    public function setIdentity($identity) {
        $this->identity = $identity;
        return $this;
    }

    public function setNip($nip) {
        $this->nip = $nip;
        return $this;
    }

    public function setRegon($regon) {
        $this->regon = $regon;
        return $this;
    }


}
