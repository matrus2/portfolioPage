<?php

namespace Mtu\PortfolioBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mtu\PortfolioBundle\Entity\Params;

class ParamsFix implements FixtureInterface {
    public function load(ObjectManager $manager) {
        $Params=array(
            'header1' => '<span>Programowanie</span> aplikacji internetowych',
            'header1Eng' => 'Web Applications <span>Programming</span>',
            'header2' => '<span>Kodowanie</span> i dostosowywanie wyglądu',
            'header2Eng' => 'Interface <span>coding</span> and adjustment',
            'header3' => 'Pozycjonowanie i <span>optymalizacja</span>',
            'header3Eng' => 'SEO <span>optimization</span>',
            'img1' => '',
            'img2'  => '',
            'img3'  => '',
            'desc1' => 'Budowanie kompleksowych aplikacji w oparciu o framework Symfony 2 z wykorzystaniem technologii AJAX, jak i prostych jednostronych aplikacji wykorzystujących framework AngularJS.',
            'desc1Eng' => 'Development of complex dynamic web applications with the use of Symfony 2 framework and also one page apps build with AngularJS.',
            'desc2' => 'Cięcie layoutów stron internetowych według standardów W3C z wykorzystaniem jQuery. Stawiam na rozwiązania responsywne, korzystam z technologii Boostrap. Dostosuję kaźdy szablon do Wordpressa.',
            'desc2Eng' => 'Slicing and coding PSD templates based on web standards (W3C) including responosive solutions. Ability to adjust every template for Wordpress.',
            'desc3' => 'Audyt strony www z zakresu optymalizacji dla wyszukiwarek internetowych oraz doboru odpowiednich słów kluczowych. Mam doświadczenie w pozycjonowaniu stron internetowych.',
            'desc3Eng' => 'Making audit of websites in terms of optimization for search engines as well as properly chosen keywords for your brand. I have experience in web positioning.',
            'dane'=>array(
                array(
                    'key1'  =>  'Numer telefonu',
                    'value1'  =>  '+48 506 054 960',
                    'key2'  =>  'Phone number',
                    'value2'  =>  '+48 506 054 960'
                ),
                array(
                    'key1'  =>  'E-mail',
                    'value1'  =>  'biuro@matrus.pl',
                    'key2'  =>  'E-mail',
                    'value2'  =>  'biuro@matrus.pl'
                ),
                array(
                    'key1'  =>  'Numer konta',
                    'value1'  =>  '19 2340 0009 1320 1030 0000 2320',
                    'key2'  =>  'Account number',
                    'value2'  =>  '19 2340 0009 1320 1030 0000 2320'
                ),
            ),
//            'dane' => array(
//                'Numer telefonu'=>'+48 506 054 960',
//                'E-mail'=>'biuro@matrus.pl',
//                'Numer konta'=>'19 2340 0009 1320 1030 0000 2320'
//            ),
//            'daneEng' => array(
//                'Phone number'=>'+48 506 054 960',
//                'E-mail'=>'biuro@matrus.pl',
//                'Account number'=>'19 2340 0009 1320 1030 0000 2320'
//            ),
            'avatar'  => '',
            'email'   => 'przybyslawski.b@gmail.com'
    );
    $newParams=new Params();
    $newParams->setHeader1($Params['header1'])
            ->setHeader1Eng($Params['header1Eng'])
            ->setHeader2($Params['header2'])
            ->setHeader2Eng($Params['header2Eng'])
            ->setHeader3($Params['header3'])
            ->setHeader3Eng($Params['header3Eng'])
            ->setDesc1($Params['desc1'])
            ->setDesc1Eng($Params['desc1Eng'])
            ->setDesc2($Params['desc2'])
            ->setDesc2Eng($Params['desc2Eng'])
            ->setDesc3($Params['desc3'])
            ->setDesc3Eng($Params['desc3Eng'])
            ->setEmail($Params['email'])
            ->setDane($Params['dane']);
//            ->setDaneEng($Params['daneEng']);
    /*DOPISAC DLA ZDJEC*/
     $manager->persist($newParams);
     $manager->flush();
    }
}