<?php

namespace CrmBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
     * @ORM\Entity
     * @ORM\Table(name="timeLine")
     */
class TimeLine {
    
    /**
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(
     *      targetEntity = "Client",
     *      inversedBy = "timeLineId"
     * )
     * @ORM\JoinColumn(
     *      name = "client_id",
     *      referencedColumnName= "id",
     *      onDelete = "SET NULL"
     * )
     */
    private $clientId;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    private $date;
        
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      max=255
     * )
     */
    private $content;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      max=255
     * )
     */
    private $type;
    
    public function getId() {
        return $this->id;
    }

    public function getClientId() {
        return $this->clientId;
    }

    public function getDate() {
        return $this->date;
    }

    public function getContent() {
        return $this->content;
    }

    public function getType() {
        return $this->type;
    }

    public function setClientId($clientId) {
        $this->clientId = $clientId;
        return $this;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }


}
