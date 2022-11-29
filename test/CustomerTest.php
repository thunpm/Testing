<?php
    require_once ('./app/models/Customer.php');
    use PHPUnit\Framework\TestCase;

    class CustomerTest extends TestCase {

        public function testSaveSuccess(): void {
            $name = "Hoa";
            $phoneNumber = "0987654321";
            $username = "hoa123";
            $password = "Abc12345";

            Customer::isRegister(0, $username, $password, $name, $phoneNumber, );
            $result = Customer::getbyUsername($username);

            self::assertEquals($name, $result->fullname);
            self::assertEquals($phoneNumber, $result->phoneNumber);
            self::assertEquals($password, $result->password);
        }
    }

?>