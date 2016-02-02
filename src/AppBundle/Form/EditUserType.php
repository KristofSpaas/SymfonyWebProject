<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class EditUserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array(
                'label' => "Username",
                'required' => true,
                'attr' => array(
                    "placeholder" => "Enter Username",
                    "class" => 'form-control'
                )
            ))
            ->add('firstname', TextType::class, array(
                'label' => "First Name",
                'required' => true,
                'attr' => array(
                    "placeholder" => "Enter First Name",
                    "class" => 'form-control'
                )
            ))
            ->add('lastname', TextType::class, array(
                'label' => "Last Name",
                'required' => true,
                'attr' => array(
                    "placeholder" => "Enter Last Name",
                    "class" => 'form-control'
                )
            ))
            ->add('email', EmailType::class, array(
                'label' => "Email",
                'required' => true,
                'attr' => array(
                    "placeholder" => "Enter Email",
                    "class" => 'form-control'
                )
            ));
    }

}
