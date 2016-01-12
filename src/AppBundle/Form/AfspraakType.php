<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;




class AfspraakType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('doctor', EntityType::class, array(
	    	'label' => 'Doctor Who?',
                'class' => 'AppBundle:Doctor',
                'choice_label' => 'fullname',
                'required' => false,
                'attr' => array(
                    "class" => 'form-control'
                )
            ))
            ->add('patient', EntityType::class, array(
	    	'label' => 'Who are you?',
                'class' => 'AppBundle:Patient',
                'choice_label' => 'fullname',
                'required' => false,
                'attr' => array(
                    "class" => 'form-control'
                )
            ))
            ->add('bezet',CheckboxType::class, array(
	    	'label' => 'Bezet',
                'required' => false,
                'attr' => array(
                    "class" => 'form-control'
                )
            ))
            ->add('comment', TextType::class, array(
	    	'label' => 'comment',
                'required' => false,
                'attr' => array(
                    "class" => 'form-control'
                )
            ))
            ->add('date', DateTimeType::class, array(
	    	'label' => 'Date',
                'required' => true,
                'attr' => array(
                    "class" => 'form-control'
                )
            ))
        ;
    }



}
