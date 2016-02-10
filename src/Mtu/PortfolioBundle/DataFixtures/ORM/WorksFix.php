<?php

namespace Mtu\PortfolioBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mtu\PortfolioBundle\Entity\Works;

class WorksFix implements FixtureInterface {
    public function load(ObjectManager $manager)
    {
        $worksList=array(
            array(
                'header'    =>  'Dachy Jakub Perek',
                'headerEng' =>  'Jakub Perek',
                'subHeader' =>  'Ciesielstwo i dekarstwo',
                'subHeaderEng'=>'Carpentry & tiling',
                'img1'      =>  '',
                'services'  =>  array('Strona internetowa'),
                'servicesEng'=> array('Website'),
                'technologies'=>array('Flash','Photoshop'),
                'url'       =>  'http://perek.matrus.pl/'
            ),array(
                'header'    =>  'Serwis RTV',
                'headerEng' =>  'RTV Service',
                'subHeader' =>  'Domowa naprawa telewizorów',
                'subHeaderEng'=>'Remote home repair',
                'img1'      =>  '',
                'services'  =>  array('Dostosowanie wyglądu','Kodowanie','Optymalizacja SEO'),
                'servicesEng'=> array('Layout adjustment','Coding','SEO Optimization'),
                'technologies'=>array('HTML & CSS','Photoshop'),
                'url'       =>  'http://www.domowanaprawatv.pl/'
            ),array(
                'header'    =>  'Mirskas Cleaning Service',
                'headerEng' =>  'Mirskas Cleaning Service',
                'subHeader' =>  'Firma usługowa na terenie Florydy',
                'subHeaderEng'=>'Professional cleaning services',
                'img1'      =>  '',
                'services'  =>  array('Dostosowanie wyglądu','Kodowanie','Optymalizacja SEO'),
                'servicesEng'=> array('Layout adjustment','Coding','SEO Optimization'),
                'technologies'=>array('HTML & CSS','Cufon'),
                'url'       =>  'http://cleaningservice.matrus.pl/'
            ),array(
                'header'    =>  'www.saunabud.pl',
                'headerEng' =>  'www.saunabud.pl',
                'subHeader' =>  'Branża Wellness i SPA',
                'subHeaderEng'=>'Wellness & SPA',
                'img1'      =>  '',
                'services'  =>  array('Projekt graficzny','Kodowanie','Podpięcie CMS'),
                'servicesEng'=> array('Website layout','Coding','CMS'),
                'technologies'=>array('SmodCMS','Flash'),
                'url'       =>  'http://beka.matrus.pl/'
            ),array(
                'header'    =>  'e-petrol',
                'headerEng' =>  'e-petrol',
                'subHeader' =>  'Portal branży paliwowej',
                'subHeaderEng'=>'Fuel industry information aggregator',
                'img1'      =>  '',
                'services'  =>  array('Kodowanie','Dostosowywanie wyglądu'),
                'servicesEng'=> array('Coding','Layout adjustment'),
                'technologies'=>array('HTML & CSS','CMS'),
                'url'       =>  'http://www.e-petrol.pl/'
            ),array(
                'header'    =>  'www.minmax.pl',
                'headerEng' =>  'www.minmax.pl',
                'subHeader' =>  'Strona dla studentów Politechniki Wrocławskiej',
                'subHeaderEng'=>'Website for University students',
                'img1'      =>  '',
                'services'  =>  array('Projekt graficzny','Kodowanie','Podpięcie CMS'),
                'servicesEng'=> array('Website layout','Coding','CMS'),
                'technologies'=>array('Wordpress','Photoshop'),
                'url'       =>  'http://www.minmax.pl/'
            ),array(
                'header'    =>  'Kalkulator kredytowy',
                'headerEng' =>  'Credit Calculator',
                'subHeader' =>  'Kredyt ze stałą lub malejącą ratą',
                'subHeaderEng'=>'Credit with constant and diminishing rate',
                'img1'      =>  '',
                'services'  =>  array('Programowanie','Kodowanie'),
                'servicesEng'=> array('Programming','Coding'),
                'technologies'=>array('AngularJS','Bootstrap'),
                'url'       =>  'http://minmax.pl/kalk/',
                'rel'       =>  TRUE

            ),array(
                'header'    =>  'Health & Body',
                'headerEng' =>  'Health & Body',
                'subHeader' =>  'Akademia sportów wodnych',
                'subHeaderEng'=>'Water Sports Academy',
                'img1'      =>  '',
                'services'  =>  array('Lokalizacja skórki','Programowanie','Przeniesienie treści'),
                'servicesEng'=> array('Template localization','Programming','Content transfer'),
                'technologies'=>array('Wordpress','JavaScript'),
                'url'       =>  'http://health-body.pl/'
            ),
            array(
                'header'    =>  'Cheerleaders Wrocław',
                'headerEng' =>  'Cheerleaders Wrocław',
                'subHeader' =>  'Profesjonalna grupa taneczna',
                'subHeaderEng'=>'Profesional Dancers Group',
                'img1'      =>  '',
                'services'  =>  array('Projekt graficzny','Kodowanie','Podpięcie CMS'),
                'servicesEng'=> array('Website layout','Coding','CMS'),
                'technologies'=>array('Wordpress','jQuery','RWD'),
                'url'       =>  'http://cheerleaders.matrus.pl/'
            ));
        
            foreach ($worksList as $key=>$value){
                $newWork = new Works();
                $newWork->setHeader($value['header'])
                        ->setHeaderEng($value['headerEng'])
                        ->setSubHeader($value['subHeader'])
                        ->setSubHeaderEng($value['subHeaderEng'])
                        ->setServices($value['services'])
                        ->setServicesEng($value['servicesEng'])
                        ->setTechnologies($value['technologies'])
                        ->setUrl($value['url']);
                $manager->persist($newWork);
            }
        $manager->flush();
    }
}


