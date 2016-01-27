<?php

namespace Tests\AppBundle\Form;

use AppBundle\Entity\User;
use AppBundle\Form\ProfileType;
use Symfony\Component\Form\Test\TypeTestCase;

class ProfileTypeTest extends TypeTestCase
{
    public function testProfileFormSuccess()
    {
        $formData = array(
            'username' => 'Kristof01',
            'firstname' => 'Kristof',
            'lastname' => 'Spaas'
        );

        $form = $this->factory->create(ProfileType::class);

        $user = new User();
        $object = $user->fromArray($formData);

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($object, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }

    public function testProfileFormFailure()
    {
        $formData = array(
            'username' => 'Kristof01',
            'firstname' => 'Kristof',
            'lastname' => 'Spaas'
        );

        $form = $this->factory->create(ProfileType::class);

        // submit the data to the form directly
        $form->submit($formData);

        $user = new User();
        $user->setUsername('Jan01');
        $user->setFirstname('Jan');
        $user->setLastname('Peeters');

        $this->assertTrue($form->isSynchronized());
        $this->assertNotEquals($user, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }

}
