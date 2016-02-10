<?php

namespace Mtu\PortfolioBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mtu\PortfolioBundle\Entity\Pages;

class PagesFix implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $pageList=array(
            array(
                'title'             =>  'Programowanie Aplikacji Interenetowych, Responsywne Strony Www',
                'description'       =>  'Doświadczenie w tworzeniu stron internetowych opartych o różne systemy zarządzania treścią. Zmotywowany do doskonalenia praktycznych umiejętności tworzenia kompleksowych, responsywnych aplikacji internetowych z wykorzystaniem nowoczesnych technologii.',
                'title_en'=>'Web Aplications Programming, Responsive webdesign',
                'description_en'    =>  'Experience in developing websites based on different open-source platforms. Motivated in improving practical skills to create responsive and complex web applications with the use of modern technologies.',
                'name_pl'           =>  'Strona główna',
                'name_en'           =>  'Home'            
            ),array(
                'title'             =>  'Strony Internetowe, Sklepy Www, Pozycjonowanie i Optymalizacja, Kodowanie oraz Photoshop',
                'description'       =>  'Spis niektórych wykonanych projektów biznesowych. Zapraszam do zapoznania się z portfolio.',
                'title_en'          =>  'Websites, E-Commerce, Web Positioning and Serch Engine Optimization, Web Coding and Photoshop',
                'description_en'    =>  'List of several finished bussiness projects. Do not hestitate to see them all.',
                'name_pl'           =>  'Portfolio',
                'name_en'           =>  'Portfolio'            
            ),array(
                'title'             =>  'Współpraca biznesowa, kontakt',
                'description'       =>  'W celu kontaktu proszę o wypełnienie formularza.',
                'title_en'          =>  'Business co-work. Contact',
                'description_en'    =>  'Feel free to use the web form to contact me.',
                'name_pl'           =>  'Kontakt',
                'name_en'           =>  'Contact'  
            ));
        
            foreach ($pageList as $key=>$value){
                $newPage = new Pages();
                $newPage->setTitle($value['title'])
                        ->setDescription($value['description'])
                        ->setTitleEng($value['title_en'])
                        ->setDescriptionEng($value['description_en'])
                        ->setName($value['name_pl'])
                        ->setNameEng($value['name_en']);
                $manager->persist($newPage);
            }
        $manager->flush();
    }
}