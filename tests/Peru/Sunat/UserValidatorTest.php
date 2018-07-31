<?php


namespace Tests\Peru\Sunat;
use Peru\Sunat\UserValidator;

/**
 * Class UserValidatorTest
 */
class UserValidatorTest extends \PHPUnit_Framework_TestCase
{
    use UserValidatorTrait;

    public function testValidezCorrect()
    {
        $consulta = new UserValidator($this->getClientMock(true));

        $result = $consulta->valid('20000000001', 'HUAFDSMU');

        $this->assertTrue($result);
    }

    public function testValidezInCorrect()
    {
        $consulta = new UserValidator($this->getClientMock(false));

        $result = $consulta->valid('20000000001', 'HUAFDSMU');

        $this->assertFalse($result);
    }
}