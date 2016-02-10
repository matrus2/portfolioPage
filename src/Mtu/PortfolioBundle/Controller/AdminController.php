<?php

namespace Mtu\PortfolioBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Mtu\PortfolioBundle\Entity\Works;


class AdminController extends Controller
{
    
    /**
     * @Route("/",
     * name="mtu_dash"
     * )
     * @Template()
     */
    public function addNewAction(Request $request) {
        
        $work=new Works();
        $status='ok';
        if($request->isMethod('POST')){
            $work->setWorkToUpload($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($work);
            try {
                $em->flush();
            } catch (\Exception $e) {
                $status=$e->getMessage();
            }
            return new \Symfony\Component\HttpFoundation\JsonResponse(array(
                'data' => $status
                ));
        }        
        return array(); 
    }

    /**
     * @Route("/works",
     * name="mtu_works"
     * )
     * @Template()
     */
    public function worksListAction() {
        $worksParams = $this->getDoctrine()->getRepository('MtuPortfolioBundle:Works');
        $works=$worksParams->findAl();
        return array(
            'works' => $works
        );
    }
    
    /**
     * @Route("/work/{id}",
     * name="mtu_work_edit"
     * )
     * @Template()
     */
    public function workEditAction(Request $request,$id) {
        $worksParams = $this->getDoctrine()->getRepository('MtuPortfolioBundle:Works');
        $work=$worksParams->find($id);
        $status='ok';
        if(null === $work){
            throw $this->createNotFoundException('There is no such work in the repository.');
        }
        
        if($request->isMethod('POST')){
            $work->setWorkToUpload($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($work);
            try {
                $em->flush();
            } catch (\Exception $e) {
                $status=$e->getMessage();
            }
            return new \Symfony\Component\HttpFoundation\JsonResponse(array(
                'data' => $status,
                'img'  => $work->getFileToView(),
                'param'=> $work->getRel()
                ));
        } 
        return array(
            'work' => $work
        );    
    }

    /**
     * @Route("/delete/{id}",
     * name="mtu_work_delete"
     * )
     */
    public function deleteAction($id) {
        $worksParams = $this->getDoctrine()->getRepository('MtuPortfolioBundle:Works');
        $work=$worksParams->find($id);
        $status='ok';
        if(null === $work){
            throw $this->createNotFoundException('There is no such work in the repository.');
        }
        try {
            $em = $this->getDoctrine()->getManager();
            $em->remove($work);
            $em->flush();
        } catch (\Exception $e) {
            $status=$e->getMessage();
        }
      
        return $this->redirectToRoute('mtu_works');    
    }

    /**
     * @Route("/front",
     * name="mtu_front"
     * )
     * @Template()
     */
    public function paramsAction(Request $request) {
        $paramsRepo = $this->getDoctrine()->getRepository('MtuPortfolioBundle:Params');
        $params=$paramsRepo->find('7');
        $status='ok';
        if($request->isMethod('POST')){
            $params->form=$request->get('skill');
            $params->setSkills($request);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($params);
            try {
                $em->flush();
            } catch (\Exception $e) {
                $status=$e->getMessage();
            }
            return new \Symfony\Component\HttpFoundation\JsonResponse(array(
                'data' => $status,
                'img'  => $params->getImgToView()
                ));
        } 
        
        
        return array(
            'p' =>  $params,
            'status'=>$status
        );
    }

    /**
     * @Route("/contact",
     * name="mtu_contact"
     * )
     * @Template()
     */
    public function contactAction(Request $request) {
        $daneRepo=$this->getDoctrine()->getRepository('MtuPortfolioBundle:Params');
        $dane=$daneRepo->find('7');
        $status='b';
        if($request->isMethod('POST')){
            try {
                if(null!==$request->files->get('avatar')){
                    $dane->setFileA($request->files->get('avatar'));
                    $status='c';
                } else {
                   $params = $request->getContent();
                    $dane->setRDane($params);
                };
                $em = $this->getDoctrine()->getManager();
                $em->persist($dane);
                $em->flush();
            } catch (\Exception $e) {
                $status=$e->getMessage();
            }
            return new \Symfony\Component\HttpFoundation\JsonResponse(array(
                'data' => $status,
                'img'  =>  $status=='c' ? $dane->getFileAToView() : 0,
                //'param'=> $params
                ));
        } 
        return array(
            'dane'  =>  $dane
        );    
    }

    /**
     * @Route("/pages",
     * name="mtu_pages"
     * )
     * @Template()
     */
    public function pagesAction(Request $request) {
        $pageRepo=$this->getDoctrine()->getRepository('MtuPortfolioBundle:Pages');
        $pages=$pageRepo->findAll();
        $status='b';
        if($request->isMethod('post')){
            
            try {
            $var=$request->get('page');
            $page=$pages[$var];
            $page->setName($request->get('name'))
                        ->setNameEng($request->get('nameEng'))
                        ->setTitle($request->get('title'))
                        ->setTitleEng($request->get('titleEng'))
                        ->setDescription($request->get('desc'))
                        ->setDescriptionEng($request->get('descEng'));
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($page);

                $em->flush();
            } catch (\Exception $e) {
                $status=$e->getMessage();
            }
            return new \Symfony\Component\HttpFoundation\JsonResponse(array(
                'data' => $status,
                'param' =>$page

                
                ));
        }
        return array(
            'page'  =>  $pages,
            'param' => $pages[0]
        );
    }
}


