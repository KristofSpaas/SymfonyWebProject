<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;



class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',TextType::class,array(
                'label' => "username",
                'required' => true,
                'attr' => array(
                    "placeholder" => "Enter Username",
                    "class" => 'form-control'
                )
            ))
            ->add('firstname',TextType::class,array(
                'label' => "firstname",
                'required' => true,
                'attr' => array(
                    "placeholder" => "Enter First Name",
                    "class" => 'form-control'
                )
            ))
            ->add('lastname',TextType::class,array(
                'label' => "Last Name",
                'required' => true,
                'attr' => array(
                    "placeholder" => "Enter Last Name",
                    "class" => 'form-control'
                )
            ))
            ->add('email',EmailType::class,array(
                'label' => "Email",
                'required' => true,
                'attr' => array(
                    "placeholder" => "Enter Email",
                    "class" => 'form-control'
                )
            ))
            ->add('password',TextType::class,array(
                'label' => "Password",
                'required' => true,
                'attr' => array(
                    "placeholder" => "Enter Password",
                    "class" => 'form-control'
                )
            ))

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }
}
