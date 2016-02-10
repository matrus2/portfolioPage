<?php
namespace Mtu\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;


/**
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Mtu\PortfolioBundle\Repository\WorksRepository")
 * @ORM\Table(name="params")
 */
class Params {
    
    public $form;
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
    private $header1;

    /**
     * @ORM\Column(type="string", length=120, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 120
     * )
     */
    private $header1Eng;
    
    /**
     * @ORM\Column(type="string", length=120, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 120
     * )
     */
    private $header2;

    /**
     * @ORM\Column(type="string", length=120, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 120
     * )
     */
    private $header2Eng;
    
    /**
     * @ORM\Column(type="string", length=120, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 120
     * )
     */
    private $header3;

    /**
     * @ORM\Column(type="string", length=120, unique=true)
     * 
     * @Assert\NotBlank
     * 
     * @Assert\Length(
     *      max = 120
     * )
     */
    private $header3Eng;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path2;
    
     /**
     * @Assert\File(
     *     maxSize = "5M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *     maxSizeMessage = "The maxmimum allowed file size is 5MB.",
     *     mimeTypesMessage = "Only the filetypes image are allowed."
     * )
     */
    private $file2;
    
    private $temp2;        
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path3;
    
     /**
     * @Assert\File(
     *     maxSize = "5M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *     maxSizeMessage = "The maxmimum allowed file size is 5MB.",
     *     mimeTypesMessage = "Only the filetypes image are allowed."
     * )
     */
    private $file3;

    private $temp3; 
    
    /**
     * @ORM\Column(type="text")
     * 
     * @Assert\NotBlank
     */
    private $desc1;
    
     /**
     * @ORM\Column(type="text")
     * 
     * @Assert\NotBlank
     */
    private $desc1Eng;
    
    /**
     * @ORM\Column(type="text")
     * 
     * @Assert\NotBlank
     */
    private $desc2;
    
    /**
     * @ORM\Column(type="text")
     * 
     * @Assert\NotBlank
     */
    private $desc2Eng;
    
    /**
     * @ORM\Column(type="text")
     * 
     * @Assert\NotBlank
     */
    private $desc3;
    
     /**
     * @ORM\Column(type="text")
     * 
     * @Assert\NotBlank
     */
    private $desc3Eng;

     /**
     * @ORM\Column(type="object")
     * 
     * @Assert\NotBlank
     */
    private $dane;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pathA;
    
     /**
     * @Assert\File(
     *     maxSize = "5M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png", "image/tiff"},
     *     maxSizeMessage = "The maxmimum allowed file size is 5MB.",
     *     mimeTypesMessage = "Only the filetypes image are allowed."
     * )
     */
    private $fileA;

    private $tempA; 
    
    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $email;
    
    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile2()
    {
        return $this->file2;
    }
    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile3()
    {
        return $this->file3;
    }
    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileA()
    {
        return $this->fileA;
    }
    
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

    public function setFile2($file)
    {
        $this->file2 = $file;
        // check if we have an old image path
        if (isset($this->path2)) {
            // store the old name to delete after the update
            $this->temp2 = $this->path2;
            $this->path2 = null;
        } else {
            $this->path2 = 'initial';
        }
    }
    public function setFile3($file)
    {
        $this->file3 = $file;
        // check if we have an old image path
        if (isset($this->path3)) {
            // store the old name to delete after the update
            $this->temp3 = $this->path3;
            $this->path3 = null;
        } else {
            $this->path3 = 'initial';
        }
    }
    public function setFileA($file)
    {
        $this->fileA = $file;
        // check if we have an old image path
        if (isset($this->pathA)) {
            // store the old name to delete after the update
            $this->tempA = $this->pathA;
            $this->pathA = null;
        } else {
            $this->pathA = 'initial';
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
        if (null !== $this->getFile2()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path2 = $filename.'.'.$this->getFile2()->guessExtension();
        }
        if (null !== $this->getFile3()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path3 = $filename.'.'.$this->getFile3()->guessExtension();
        }
        if (null !== $this->getFileA()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->pathA = $filename.'.'.$this->getFileA()->guessExtension();
        }

    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null !== $this->getFile()) {
            $this->getFile()->move($this->getUploadRootDir(), $this->path);
            if (null !== $this->temp) {
                unlink($this->getUploadRootDir().'/'.$this->temp);
                $this->temp = null;
            }
            $this->file = null;
        }
        if (null !== $this->getFile2()) {
            $this->getFile2()->move($this->getUploadRootDir(), $this->path2);
            if (null !== $this->temp2) {
                unlink($this->getUploadRootDir().'/'.$this->temp2);
                $this->temp2 = null;
            }
            $this->file2 = null;
        }
        if (null !== $this->getFile3()) {
            $this->getFile3()->move($this->getUploadRootDir(), $this->path3);
            if (null !== $this->temp3) {
                unlink($this->getUploadRootDir().'/'.$this->temp3);
                $this->temp3 = null;
            }
            $this->file3 = null;
        }
        if (null !== $this->getFileA()) {
            $this->getFileA()->move($this->getUploadRootDir(), $this->pathA);
            if (null !== $this->tempA) {
                unlink($this->getUploadRootDir().'/'.$this->tempA);
                $this->tempA = null;
            }
            $this->fileA = null;
        }
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
    public function getFile2ToView()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return '/../'.$this->getUploadDir().'/'.$this->path2;
    }
    public function getFile3ToView()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return '/../'.$this->getUploadDir().'/'.$this->path3;
    }
    public function getFileAToView()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return '/../'.$this->getUploadDir().'/'.$this->pathA;
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
    /**
     * Get path
     *
     * @return string 
     */
    public function getPath2()
    {
        return $this->path2;
    }
    /**
     * Get path
     *
     * @return string 
     */
    public function getPath3()
    {
        return $this->path3;
    }
    /**
     * Get path
     *
     * @return string 
     */
    public function getPathA()
    {
        return $this->pathA;
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
     * Set header1
     *
     * @param string $header1
     * @return Params
     */
    public function setHeader1($header1)
    {
        $this->header1 = $header1;

        return $this;
    }

    /**
     * Get header1
     *
     * @return string 
     */
    public function getHeader1()
    {
        return $this->header1;
    }

    /**
     * Set header1Eng
     *
     * @param string $header1Eng
     * @return Params
     */
    public function setHeader1Eng($header1Eng)
    {
        $this->header1Eng = $header1Eng;

        return $this;
    }

    /**
     * Get header1Eng
     *
     * @return string 
     */
    public function getHeader1Eng()
    {
        return $this->header1Eng;
    }

    /**
     * Get img3
     *
     * @return string 
     */
    public function getImg3()
    {
        return $this->img3;
    }

    /**
     * Set desc1
     *
     * @param string $desc1
     * @return Params
     */
    public function setDesc1($desc1)
    {
        $this->desc1 = $desc1;

        return $this;
    }

    /**
     * Get desc1
     *
     * @return string 
     */
    public function getDesc1()
    {
        return $this->desc1;
    }

    /**
     * Set desc1Eng
     *
     * @param string $desc1Eng
     * @return Params
     */
    public function setDesc1Eng($desc1Eng)
    {
        $this->desc1Eng = $desc1Eng;

        return $this;
    }

    /**
     * Get desc1Eng
     *
     * @return string 
     */
    public function getDesc1Eng()
    {
        return $this->desc1Eng;
    }

    /**
     * Set desc2
     *
     * @param string $desc2
     * @return Params
     */
    public function setDesc2($desc2)
    {
        $this->desc2 = $desc2;

        return $this;
    }

    /**
     * Get desc2
     *
     * @return string 
     */
    public function getDesc2()
    {
        return $this->desc2;
    }

    /**
     * Set desc2Eng
     *
     * @param string $desc2Eng
     * @return Params
     */
    public function setDesc2Eng($desc2Eng)
    {
        $this->desc2Eng = $desc2Eng;

        return $this;
    }

    /**
     * Get desc2Eng
     *
     * @return string 
     */
    public function getDesc2Eng()
    {
        return $this->desc2Eng;
    }

    /**
     * Set desc3
     *
     * @param string $desc3
     * @return Params
     */
    public function setDesc3($desc3)
    {
        $this->desc3 = $desc3;

        return $this;
    }

    /**
     * Get desc3
     *
     * @return string 
     */
    public function getDesc3()
    {
        return $this->desc3;
    }

    /**
     * Set desc3Eng
     *
     * @param string $desc3Eng
     * @return Params
     */
    public function setDesc3Eng($desc3Eng)
    {
        $this->desc3Eng = $desc3Eng;

        return $this;
    }

    /**
     * Get desc3Eng
     *
     * @return string 
     */
    public function getDesc3Eng()
    {
        return $this->desc3Eng;
    }

    /**
     * Set dane
     *
     * @param object $dane
     * @return Params
     */
    public function setDane($dane)
    {
        $this->dane = $dane;

        return $this;
    }

    /**
     * Get dane
     *
     * @return array 
     */
    public function getDane()
    {
        return $this->dane;
    }

    /**
     * Set header2
     *
     * @param string $header2
     * @return Params
     */
    public function setHeader2($header2)
    {
        $this->header2 = $header2;

        return $this;
    }

    /**
     * Get header2
     *
     * @return string 
     */
    public function getHeader2()
    {
        return $this->header2;
    }

    /**
     * Set header2Eng
     *
     * @param string $header2Eng
     * @return Params
     */
    public function setHeader2Eng($header2Eng)
    {
        $this->header2Eng = $header2Eng;

        return $this;
    }

    /**
     * Get header2Eng
     *
     * @return string 
     */
    public function getHeader2Eng()
    {
        return $this->header2Eng;
    }

    /**
     * Set header3
     *
     * @param string $header3
     * @return Params
     */
    public function setHeader3($header3)
    {
        $this->header3 = $header3;

        return $this;
    }

    /**
     * Get header3
     *
     * @return string 
     */
    public function getHeader3()
    {
        return $this->header3;
    }

    /**
     * Set header3Eng
     *
     * @param string $header3Eng
     * @return Params
     */
    public function setHeader3Eng($header3Eng)
    {
        $this->header3Eng = $header3Eng;

        return $this;
    }

    /**
     * Get header3Eng
     *
     * @return string 
     */
    public function getHeader3Eng()
    {
        return $this->header3Eng;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Params
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
        
     /**
     * Set img3
     *
     * @param string $img3
     * @return Params
     */
    public function setImg3($img3)
    {
        $this->img3 = $img3;

        return $this;
    }

    
    public function setRDane($a){
        unset($this->dane);
        $a = array_map(function($i){
            $b = explode('=',$i);
            return array($b[0]=>$b[1]);
        },explode('&', $a));

        $key1=array();
        $key2=array();
        $value1=array();
        $value2=array();

        foreach($a as $val){
            foreach($val as $key => $value){
                if($key==='key1') array_push($key1,urldecode($value));
                if($key==='key2') array_push($key2,urldecode($value));
                if($key==='value1') array_push($value1,urldecode($value));
                if($key==='value2') array_push($value2,urldecode($value));
            }
        }
        $lenght=count($key1);

        for($i=0;$i<$lenght;$i++){
            $this->dane[$i]=array(
                'key1'      =>    $key1[$i],
                'key2'      =>    $key2[$i],
                'value1'    =>    $value1[$i],
                'value2'    =>    $value2[$i]  
            );
        };
        return $this;
    }
    
    public function setSkills(Request $request){
        switch($this->form){
            case 1:
                $this->setHeader1($request->get('header1'))
                        ->setHeader1Eng($request->get('header1eng'))
                        ->setDesc1($request->get('desc1'))
                        ->setDesc1Eng($request->get('desc1eng'));
            if (null!==$request->files->get('img1')) $this->setFile($request->files->get('img1'));
            break;
            case 2:
                $this->setHeader2($request->get('header2'))
                        ->setHeader2Eng($request->get('header2eng'))
                        ->setDesc2($request->get('desc2'))
                        ->setDesc2Eng($request->get('desc2eng'));
            if (null!==$request->files->get('img2')) $this->setFile2($request->files->get('img2'));
            break;
            case 3:
                $this->setHeader3($request->get('header3'))
                        ->setHeader3Eng($request->get('header3eng'))
                        ->setDesc3($request->get('desc3'))
                        ->setDesc3Eng($request->get('desc3eng'));
            if (null!==$request->files->get('img3')) $this->setFile3($request->files->get('img3'));
            break;
        }
    }
    
    public function getImgToView(){
        switch($this->form){
            case 1:
                return $this->getFileToView();
                break;
            case 2:
                return $this->getFile2ToView();
                break;
            case 3:
                return $this->getFile3ToView();
                break;
        }
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Params
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Set path2
     *
     * @param string $path2
     *
     * @return Params
     */
    public function setPath2($path2)
    {
        $this->path2 = $path2;

        return $this;
    }

    /**
     * Set path3
     *
     * @param string $path3
     *
     * @return Params
     */
    public function setPath3($path3)
    {
        $this->path3 = $path3;

        return $this;
    }

    /**
     * Set pathA
     *
     * @param string $pathA
     *
     * @return Params
     */
    public function setPathA($pathA)
    {
        $this->pathA = $pathA;

        return $this;
    }
}
