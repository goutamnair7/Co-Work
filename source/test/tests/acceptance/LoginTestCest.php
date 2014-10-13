<?php
use \AcceptanceTester;

class LoginTestCest
{

    // tests
    public function LoginFailTest(AcceptanceTester $I)
    {
        //Wrong Email Id
        $I->amOnPage('login.php');
        $I->fillField('email','');
        $I->fillField('password','hello123');
        $I->click('Login');
        $I->seeInCurrentUrl('login.php');
        $I->canSee("Co-Work :: Login","title");
        $I->canSee("Invalid Email ID or Password");

        //Wrong Password
        $I->amOnPage('login.php');
        $I->fillField('email','gaurav@gaurav.com');
        $I->fillField('password','');
        $I->click('Login');
        $I->seeInCurrentUrl('login.php');
        $I->canSee("Co-Work :: Login","title");
        $I->canSee("Invalid Email ID or Password");
    }

    public function LoginSuccessTest(AcceptanceTester $I)
    {
        $password = md5("testpasswordforcodeception");
        $I->haveInDatabase('admins', array(
            'email' => 'testexample@exampledomain.com',
            'password' => $password,
            'first_name' => 'Tester',
            'last_name' => '123'
        ));
        $I->amOnPage('login.php');
        $I->fillField('email','testexample@exampledomain.com');
        $I->fillField('password','testpasswordforcodeception');
        $I->click('Login');
        $I->seeInCurrentUrl('dashboard.php');
        $I->canSee("Co-Work :: DashBoard","title");
    }
}