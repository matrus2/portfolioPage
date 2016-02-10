<?php

namespace Mtu\PortfolioBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Validator\Constraints as Assert;


class ContactType extends AbstractType {
        
    public function getName() {
        return 'contact';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name', 'text', array(
                'label' => 'Imię i nazwisko',
                'constraints' => array(
                    new Assert\NotBlank()
                ),
                'error_bubbling'=>true
            ))
            ->add('email', 'email', array(
                'label' => 'Adres email',
                'constraints' => array(
                    new Assert\NotBlank(),
                    new Assert\Email()),
                'error_bubbling'=>true
            ))
            ->add('title', 'text', array(
                'label' => 'Temat wiadomości',
                'constraints' => array(
                    new Assert\NotBlank()
                ),
                'error_bubbling'=>true
            ))
            ->add('message', 'textarea', array(
                'label' => 'Treść wiadomości',
                'constraints' => array(
                    new Assert\NotBlank()
                ),
                'error_bubbling'=>true
            ))
            ->add('save', 'submit', array(
                'label' => 'Wyślij'
            ));
    }
}
