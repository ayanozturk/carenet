<?php
namespace Tests\AppBundle\Form;

use AppBundle\Entity\User;
use AppBundle\Form\Type\UserRegister;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Test\TypeTestCase;

class UserRegisterTest extends TypeTestCase
{
    public function testConstruct()
    {
        $form = new UserRegister();
        $this->assertInstanceOf(FormTypeInterface::class, $form);
    }


    public function testSubmitValidData()
    {
        $formData = [
            'first_name' => 'Test First Name',
            'last_name'  => 'Test Last Name',
            'email'      => 'testuser@testemail.com',
            'password'   => 'mypassword',
        ];

        $form = $this->factory->create(UserRegister::class);

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $user = $form->getData();

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($formData['first_name'], $user->getFirstName());
        $this->assertEquals($formData['last_name'], $user->getLastName());
        $this->assertEquals($formData['email'], $user->getEmail());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
