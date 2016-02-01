<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class BookAfspraakType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('symptoms', TextType::class, array(
                'label' => "Symptoms",
                'required' => true,
                'attr' => array(
                    "placeholder" => "Enter symptoms",
                    "class" => 'form-control'
                )
            ))
            ->add('row', HiddenType::class, array())
            ->add('col', HiddenType::class, array());

    }
}
