<?php

namespace CrmBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
     * @ORM\Entity
     * @ORM\Table(name="file")
     */
class File {
    
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
     *      inversedBy = "fileId"
     * )
     * @ORM\JoinColumn(
     *      name = "client_id",
     *      referencedColumnName= "id",
     *      onDelete = "SET NULL"
     * )
     */
    private $clientId;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\File(
     *      maxSize="25M",
     *      
     * )
     */
    private $file;
    
    public function getId() {
        return $this->id;
    }

    public function getClientId() {
        return $this->clientId;
    }

    public function getPath() {
        return $this->path;
    }

    public function getFile() {
        return $this->file;
    }

    public function setClientId($clientId) {
        $this->clientId = $clientId;
        return $this;
    }

    public function setPath($path) {
        $this->path = $path;
        return $this;
    }

    public function setFile($file) {
        $this->file = $file;
        return $this;
    }

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/client/';
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // zrób cokolwiek chcesz aby wygenerować unikalną nazwę
            $this->setPath(uniqid().'.'.$this->file->guessExtension());
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // musisz wyrzucać tutaj wyjątek jeśli plik nie może zostać przeniesiony
        // w tym przypadku encja nie zostanie zapisana do bazy
        // metoda move() obiektu UploadedFile robi to automatycznie
        //dump($this->getUploadRootDir()); die; 
        $this->file->move($this->getUploadRootDir(), $this->path);
        unset($this->file);
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }   
}
