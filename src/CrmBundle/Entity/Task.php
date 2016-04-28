<?php

namespace CrmBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
     * @ORM\Entity
     * @ORM\Table(name="task")
     */
class Task {
    
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
     *      inversedBy = "taskId"
     * )
     * @ORM\JoinColumn(
     *      name = "client_id",
     *      referencedColumnName= "id",
     *      onDelete = "SET NULL"
     * )
     */
    private $clientId;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    protected $user;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $taskType;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $content;
    
    public function getId() {
        return $this->id;
    }

    public function getClientId() {
        return $this->clientId;
    }

    public function getUser() {
        return $this->user;
    }

    public function getTaskType() {
        return $this->taskType;
    }

    public function getContent() {
        return $this->content;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setClientId($clientId) {
        $this->clientId = $clientId;
        return $this;
    }

    public function setUser($user) {
        $this->user = $user;
        return $this;
    }

    public function setTaskType($taskType) {
        $this->taskType = $taskType;
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }


}
