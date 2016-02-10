<?php
namespace Mtu\PortfolioBundle\Twig\Extension;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;

class PortfolioExtension extends \Twig_Extension{
    
    /**
     *
     * @var Doctrine
     */
    private $doctrine;
    
    /**
     *
     * @var \Twig_Environment
     */
    private $environment;
    
    public function initRuntime(\Twig_Environment $environment) {
        $this->environment=$environment;
    }
    
       
    function __construct(Doctrine $doctrine) {
        $this->doctrine = $doctrine;
    }

    public function getName() {
        return 'mtu_portfolio_extension';
    }
    
    public function printLatestWorks(){
        $repo=$this->doctrine->getRepository('MtuPortfolioBundle:Works');
        $works=$repo->getThreeWorks();
        return $this->environment->render('MtuPortfolioBundle:Templates:homePortfolio.html.twig', array(
            'works'=>$works));     
    }
    
    
    public function printAdminMenu(){
        $adminMenu = array(
            array(
                'name' =>'Add work',
                'route' => 'mtu_dash'),
            array(
                'name' =>'Works',
                'route' => 'mtu_works'),
            array(
                'name' =>'Front Page',
                'route' => 'mtu_front'),
            array(
                'name' =>'Contact Page',
                'route' => 'mtu_contact'),
            array(
                'name' =>'Pages',
                'route' => 'mtu_pages'),
        );
                
        return $this->environment->render('MtuPortfolioBundle:Templates:adminMenu.html.twig', array(
            'adminMenu' => $adminMenu
        ));
    }
    
    
    
    public function printContactFields(){
        $repoParams=$this->doctrine->getRepository('MtuPortfolioBundle:Params');
        $params=$repoParams->getContactDane();
        
        return $this->environment->render('MtuPortfolioBundle:Templates:contactFields.html.twig', array(
            'params' => $params[0]
        ));
    }
    
    
    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction('mtu_print_admin',array($this,'printAdminMenu'),array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('mtu_print_latest',array($this,'printLatestWorks'),array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('mtu_print_contact',array($this,'printContactFields'),array('is_safe' => array('html')))
        );
    }
}
