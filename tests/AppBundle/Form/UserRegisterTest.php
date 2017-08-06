<?php
namespace Tests\AppBundle\Form;

use AppBundle\Form\UserRegister;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\FormTypeInterface;

class UserRegisterTest extends TestCase
{
    public function testConstruct()
    {
        $form = new UserRegister();
        $this->assertInstanceOf(FormTypeInterface::class, $form);


    }
}
