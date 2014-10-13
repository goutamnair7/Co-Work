<?php
use \AcceptanceTester;

class ChangePasswordTestCest
{
    // tests
    public function ChangePasswordSuccessTests(AcceptanceTester $I)
    {
        $password = md5("testpasswordforcodeception");
        $I->haveInDatabase('admins', array(
            'email' => 'testexample@exampledomain.com',
            'password' => $password,
            'first_name' => 'Tester',
            'last_name' => '123'
        ));
        
        //Login And Move to Reset Password Page
        $I->amOnPage('login.php');
        $I->fillField('email','testexample@exampledomain.com');
        $I->fillField('password','testpasswordforcodeception');
        $I->click('Login');
        $I->seeInCurrentUrl('dashboard.php');
        $I->canSee("Co-Work :: DashBoard","title");
        $I->amOnPage('navbar-col.php');
        $I->click('Reset Password');
        $I->seeInCurrentUrl('change_password.php');
        $I->canSee("Co-Work :: Reset Password","title");

        //Fill in Form and submit
        $I->fillField('#reset_email','testexample@exampledomain.com');
        $I->fillField('#reset_old_password','testpasswordforcodeception');
        $I->fillField('#reset_new_password','testpasswordforcodeception123');
        $I->fillField('#reset_confirm_password','testpasswordforcodeception123');
        $I->click('Reset Password','#changepass');
        $I->canSee("Successfully changed");
        $I->seeInCurrentUrl('change_password.php');

        //Logout and login again with new password
        $I->amOnPage('navbar-col.php');
        $I->click('Logout');
        $I->seeInCurrentUrl('login.php');
        $I->fillField('email','testexample@exampledomain.com');
        $I->fillField('password','testpasswordforcodeception123');
        $I->click('Login');
        $I->seeInCurrentUrl('dashboard.php');
    }

    public function ChangePasswordFailTests(AcceptanceTester $I)
    {
        $password = md5("testpasswordforcodeception");
        $I->haveInDatabase('admins', array(
            'email' => 'testexample@exampledomain.com',
            'password' => $password,
            'first_name' => 'Tester',
            'last_name' => '123'
        ));

        //Login And Move to Reset Password Page
        $I->amOnPage('login.php');
        $I->fillField('email','testexample@exampledomain.com');
        $I->fillField('password','testpasswordforcodeception');
        $I->click('Login');
        $I->seeInCurrentUrl('dashboard.php');
        $I->canSee("Co-Work :: DashBoard","title");
        $I->amOnPage('navbar-col.php');
        $I->click('Reset Password');
        $I->seeInCurrentUrl('change_password.php');
        $I->canSee("Co-Work :: Reset Password","title");

        //Fill in form with incorrect Current Password.
        $I->fillField('#reset_email','testexample@exampledomain.com');
        $I->fillField('#reset_old_password','testpasswordforcodecept');
        $I->fillField('#reset_new_password','testpasswordforcodeception123');
        $I->fillField('#reset_confirm_password','testpasswordforcodeception123');
        $I->click('Reset Password','#changepass');
        $I->canSee("Incorrect Password or Email");
        $I->seeInCurrentUrl('change_password.php');

        //Fill in form with incorrect Email.
        $I->amOnPage('change_password.php');
        $I->fillField('#reset_email','testexample@example.com');
        $I->fillField('#reset_old_password','testpasswordforcodeception');
        $I->fillField('#reset_new_password','testpasswordforcodeception123');
        $I->fillField('#reset_confirm_password','testpasswordforcodeception123');
        $I->click('Reset Password','#changepass');
        $I->canSee("Incorrect Password or Email");
        $I->seeInCurrentUrl('change_password.php');

        //Fill in form with New Password and Confirm Password Mismatch
        $I->amOnPage('change_password.php');
        $I->fillField('#reset_email','testexample@exampledomain.com');
        $I->fillField('#reset_old_password','testpasswordforcodeception');
        $I->fillField('#reset_new_password','testpasswordforcodeception987');
        $I->fillField('#reset_confirm_password','testpasswordforcodeception123');
        $I->click('Reset Password','#changepass');
        $I->canSee("Passwords don't match");
        $I->seeInCurrentUrl('change_password.php');
    }

}