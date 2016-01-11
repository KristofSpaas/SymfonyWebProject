<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;




class DoctorLocationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('doctors', EntityType::class, array(
                'class' => 'AppBundle:Doctor',
                'choice_label' => 'fullname',
                'required' => true,
                'attr' => array(
                    "class" => 'form-control'
                )
            ))
        ;
    }



}
