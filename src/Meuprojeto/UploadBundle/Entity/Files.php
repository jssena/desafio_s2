<?php

namespace Meuprojeto\UploadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Files
 *
 * @ORM\Table(name="files")
 * @ORM\Entity(repositoryClass="Meuprojeto\UploadBundle\Repository\FilesRepository")
 */
class Files
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
 

    /**
     * @var string
     *
    * @Assert\NotBlank(message="Please, upload the file as XML file.")
     * @Assert\File(mimeTypes={ "text/xml" })
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;
    // all of your properties

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Files
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }
}
