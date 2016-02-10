<?php

namespace Mtu\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

/**
 * @ORM\Entity(repositoryClass="Mtu\PortfolioBundle\Repository\WorksRepository")
 * @ORM\Table(name="works")
 * @ORM\HasLifecycleCallbacks
 */
class Works {
    
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
    private $header;
    /**
     * @ORM\Column(type="string", length=120, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 120
     * )
     */
    private $headerEng;
        /**
     * @ORM\Column(type="string", length=120, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 120
     * )
     */
    private $subHeader;
    /**
     * @ORM\Column(type="string", length=120, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 120
     * )
     */
    private $subHeaderEng;
    
    /**
     * @ORM\Column(type="array")
     * 
     * @Assert\NotBlank
     */
    private $services;
    
    /**
     * @ORM\Column(type="array")
     * 
     * @Assert\NotBlank
     */
    private $servicesEng;
    
    /**
     * @ORM\Column(type="array")
     * 
     * @Assert\NotBlank
     */
    private $technologies;
    
    /**
     * @ORM\Column(type="string", length=120, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 120
     * )
     */
    private $url;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     * 
     */    
    private $rel="FALSE";

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;
    
     /**
     * @Assert\File(
     *     maxSize = "5M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *     maxSizeMessage = "The maxmimum allowed file size is 5MB.",
     *     mimeTypesMessage = "Only the filetypes image are allowed."
     * )
     */
    private $file;

    private $temp;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile($file)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath();
        if ($file!=='initial' && null!==$file) {
            unlink($file);
        }
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../public_html/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads';
    }
    
    public function getFileToView()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return '/../'.$this->getUploadDir().'/'.$this->path;
    }
    
    public function setWorkToUpload(Request $request){
        $tech=explode(',',$request->get('Technologies'));
        $servPl=explode(',',$request->get('ServicesPl'));;
        $servEn=explode(',',$request->get('ServicesEng'));;
        //odbior parametrów
        $this->setHeader($request->get('HeaderPl'))
                ->setHeaderEng($request->get('HeaderEng'))
                ->setSubHeader($request->get('SubHeaderPl'))
                ->setSubHeaderEng($request->get('SubHeaderEng'))
                ->setUrl($request->get('Url'))
                ->setServices($servPl)
                ->setServicesEng($servEn)
                ->setTechnologies($tech);
        if (null!==$request->files->get('workimg')) $this->setFile($request->files->get('workimg'));
        if (null!==$request->get('rel')) $this->setRel('1');
       
        return $this;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Works
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
     * Set header
     *
     * @param string $header
     * @return Works
     */
    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Get header
     *
     * @return string 
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Set headerEng
     *
     * @param string $headerEng
     * @return Works
     */
    public function setHeaderEng($headerEng)
    {
        $this->headerEng = $headerEng;

        return $this;
    }

    /**
     * Get headerEng
     *
     * @return string 
     */
    public function getHeaderEng()
    {
        return $this->headerEng;
    }

    /**
     * Set subHeader
     *
     * @param string $subHeader
     * @return Works
     */
    public function setSubHeader($subHeader)
    {
        $this->subHeader = $subHeader;

        return $this;
    }

    /**
     * Get subHeader
     *
     * @return string 
     */
    public function getSubHeader()
    {
        return $this->subHeader;
    }

    /**
     * Set subHeaderEng
     *
     * @param string $subHeaderEng
     * @return Works
     */
    public function setSubHeaderEng($subHeaderEng)
    {
        $this->subHeaderEng = $subHeaderEng;

        return $this;
    }

    /**
     * Get subHeaderEng
     *
     * @return string 
     */
    public function getSubHeaderEng()
    {
        return $this->subHeaderEng;
    }


    /**
     * Set services
     *
     * @param array $services
     * @return Works
     */
    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * Get services
     *
     * @return array 
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Set servicesEng
     *
     * @param array $servicesEng
     * @return Works
     */
    public function setServicesEng($servicesEng)
    {
        $this->servicesEng = $servicesEng;

        return $this;
    }

    /**
     * Get servicesEng
     *
     * @return array 
     */
    public function getServicesEng()
    {
        return $this->servicesEng;
    }

    /**
     * Set technologies
     *
     * @param array $technologies
     * @return Works
     */
    public function setTechnologies($technologies)
    {
        $this->technologies = $technologies;

        return $this;
    }

    /**
     * Get technologies
     *
     * @return array 
     */
    public function getTechnologies()
    {
        return $this->technologies;
    }

    /**
     * Set rel
     *
     * @param boolean $rel
     * @return Works
     */
    public function setRel($rel)
    {
        $this->rel = $rel;

        return $this;
    }

    /**
     * Get rel
     *
     * @return boolean 
     */
    public function getRel()
    {
        return $this->rel;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Works
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
    public function getArray()
    {
        return array(
                'header' => $this->header,
                'headereng' => $this->headerEng,
                'subheader' => $this->subHeader,
                'subheadereng' => $this->subHeaderEng,
                );
    }

}
