<?php

namespace Mtu\PortfolioBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Mtu\PortfolioBundle\Form\Type\ContactType;
use Symfony\Component\Security\Core\Security;

class DefaultController extends Controller
{
    /**
     * @Route(
     *      "/{_locale}", 
     *      name = "mtu_portfolio_index",
     *      requirements={"_locale":"pl|en"},
     *      defaults={"_locale":"en"}
     * ) 
     * 
     * @Template()
     */
    public function indexAction(Request $request)
    {
        //$locale = $request->getLocale();
        $repoParams=$this->getDoctrine()->getRepository('MtuPortfolioBundle:Params');
        $params=$repoParams->findAll();
        
        $repoPages=$this->getDoctrine()->getRepository('MtuPortfolioBundle:Pages');
        $page=$repoPages->findAll(array('nameEng'=>'Home'));

        $preData=array(
            'name'=>'Jan Kowalski',
            'email'=>'twoj@email.pl',
            'title'=>'np. Spotkanie',
            'message'=>'Tekst wiadomości'
        );

        $form = $this->createForm(new ContactType(),$preData);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if($form->isValid()){
                $formData=$form->getData();
                try {
                    $emailRepo = $this->getDoctrine()->getRepository('MtuPortfolioBundle:Params');
                    $objEmail = $emailRepo->getContactEmail();
                    $sendToEmail=$objEmail['email'];

                    $sendFromEmail=$formData['email'];
                    $emailBody = $this->renderView('MtuPortfolioBundle:Email:contact.html.twig', array(
                        'formData' => $formData,
                        'clientIp' => $request->getClientIp()));

                    $emailTitle=$formData['title'].' [matrus.pl]';

                    $email = \Swift_Message::newInstance()
                        ->setSubject($emailTitle)
                        ->setTo($sendToEmail)
                        ->setFrom($sendFromEmail)
                        ->setBody($emailBody, 'text/html','utf-8')
                        ->setReplyTo($sendFromEmail);

                    $this->get('mailer')->send($email);

                    $status='success';

                } catch(\Exception $e){
                    $status='failure';
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                };

            } else {
                $status='failure';
            }
            return new \Symfony\Component\HttpFoundation\JsonResponse(array(
                'status' => $status,
            ));
        }

        return array(
            'page'  =>  $page[0],
            'status' => 'asdsadsa',
            'params'=>  $params,
            'form'  =>  $form->createView(),
//            'menu'  =>  $this->getMainMenu($page)
            );
    }
//     /**
//     * @Route(
//     *      "/portfolio/{_locale}",
//     *      name = "mtu_portfolio_portfolio",
//     *      requirements={"_locale":"pl|en"},
//     *      defaults={"_locale":"en"}
//     * )
//     * @Template()
//     */
//    public function portfolioAction()
//    {
//        $repoWorks=$this->getDoctrine()->getRepository('MtuPortfolioBundle:Works');
//        $works=$repoWorks->findAll();
//
//        $repoPages=$this->getDoctrine()->getRepository('MtuPortfolioBundle:Pages');
//        $page=$repoPages->findAll();
//
//        return array(
//            'page'  =>  $page[1],
//            'works'  =>  $works,
//            'menu'  =>  $this->getMainMenu($page)
//        );
//    }
//    /**
//     * @Route(
//     *      "/contact/{_locale}",
//     *      name = "mtu_portfolio_contact",
//     *      requirements={"_locale":"pl|en"},
//     *      defaults={"_locale":"en"}
//     *
//     * )
//     * @Template()
//     *
//     * method="POST"
//     */
//    public function contactAction(Request $request)
//    {
//
//        $preData=array(
//            'name'=>'Jan Kowalski',
//            'email'=>'twoj@email.pl',
//            'title'=>'np. Spotkanie',
//            'message'=>'Tekst wiadomości'
//        );
//
//        $form = $this->createForm(new ContactType(),$preData);
//
//        $repoPages=$this->getDoctrine()->getRepository('MtuPortfolioBundle:Pages');
//        $page=$repoPages->findAll();
//
//        return array(
//                    'page'  =>  $page[2],
//                    'form'  =>  $form->createView(),
//                    'menu'  =>  $this->getMainMenu($page)
//        );
//    }
    
    /**
     * @Route(
     *      "/update", 
     *      name = "mtu_portfolio_update",
     * )
     * 
     * method="POST"
     */
    public function updateAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
             return new Response('', 404, 
             array('Content-Type' => 'application/json'));
        }
        $ciasto=$request->cookies->get('oceniacz');
        if ($ciasto==""){
            return new Response('', 404, 
            array('Content-Type' => 'application/json'));
        }
        $data['hits']=$request->get('hits');
        $data['value']=$request->get('value');
        $saveFile = $this->get('kernel')->getRootDir().'/../web/bundles/mtuportfolio/js/total.json';
        file_put_contents($saveFile, json_encode($data));
        return new \Symfony\Component\HttpFoundation\JsonResponse(array(
                'status' => json_last_error_msg(),
                'data'  => $data
        ));
    }
    
    /**
     * @Route("/login", name="login_route")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(Security::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                Security::AUTHENTICATION_ERROR
            );
        } elseif (null !== $session && $session->has(Security::AUTHENTICATION_ERROR)) {
            $error = $session->get(Security::AUTHENTICATION_ERROR);
            $session->remove(Security::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(Security::LAST_USERNAME);

        return array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
        );
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
    }
    
    public function getMainMenu($pages){
        return array(
            array(
                'name'      => $pages[0]->getName(),
                'nameEng'   => $pages[0]->getNameEng(),   
                'route'     => 'mtu_portfolio_index',
                'class'     => 'nav_home'),
            array(
                'name'      => $pages[1]->getName(),
                'nameEng'   => $pages[1]->getNameEng(),   
                'route'     => 'mtu_portfolio_portfolio',
                'class'     => 'nav_port'),
            array(
                'name'      => $pages[2]->getName(),
                'nameEng'   => $pages[2]->getNameEng(),   
                'route'     => 'mtu_portfolio_contact',
                'class'     => 'nav_kont')
        );
    }
}



