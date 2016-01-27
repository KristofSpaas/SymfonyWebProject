<?php

namespace Tests\AppBundle\Form;

use AppBundle\Entity\Location;
use AppBundle\Form\LocationType;
use Symfony\Component\Form\Test\TypeTestCase;

class LocationTypeTest extends TypeTestCase
{
    public function testLocationFormSuccess()
    {
        $formData = array(
            'lokaalNummer' => '9999'
        );

        $form = $this->factory->create(LocationType::class);

        $location = new Location();
        $object = $location->fromArray($formData);

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

    public function testLocationFormFailure()
    {
        $formData = array(
            'lokaalNummer' => '9999'
        );

        $form = $this->factory->create(LocationType::class);

        // submit the data to the form directly
        $form->submit($formData);

        $location = new Location();
        $location->setLokaalNummer("8888");

        $this->assertTrue($form->isSynchronized());
        $this->assertNotEquals($location, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }

}
