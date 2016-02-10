<?php
namespace Mtu\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/** 
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */
class Pages {
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=120, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 120
     * )
     */
    private $title;
    
    /**
     * @ORM\Column(type="string", length=480)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 480
     * )
     */    
    private $description;
    
    /**
     * @ORM\Column(type="string", length=120, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 120
     * )
     */
    private $titleEng;
    
    /**
     * @ORM\Column(type="string", length=480)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 480
     * )
     */    
    private $descriptionEng;
    
    /**
     * @ORM\Column(type="string", length=20, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 20
     * )
     */
    private $name;
    
    /**
     * @ORM\Column(type="string", length=20, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 20
     * )
     */
    private $nameEng;
 

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Pages
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Pages
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set titleEng
     *
     * @param string $titleEng
     * @return Pages
     */
    public function setTitleEng($titleEng)
    {
        $this->titleEng = $titleEng;

        return $this;
    }

    /**
     * Get titleEng
     *
     * @return string 
     */
    public function getTitleEng()
    {
        return $this->titleEng;
    }

    /**
     * Set descriptionEng
     *
     * @param string $descriptionEng
     * @return Pages
     */
    public function setDescriptionEng($descriptionEng)
    {
        $this->descriptionEng = $descriptionEng;

        return $this;
    }

    /**
     * Get descriptionEng
     *
     * @return string 
     */
    public function getDescriptionEng()
    {
        return $this->descriptionEng;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Pages
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nameEng
     *
     * @param string $nameEng
     * @return Pages
     */
    public function setNameEng($nameEng)
    {
        $this->nameEng = $nameEng;

        return $this;
    }

    /**
     * Get nameEng
     *
     * @return string 
     */
    public function getNameEng()
    {
        return $this->nameEng;
    }
    
}
