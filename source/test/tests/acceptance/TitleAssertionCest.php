<?php
use \AcceptanceTester;

class TitleAssertionCest
{

    // tests
    public function LoginPageTitleTest(AcceptanceTester $I)
    {
        $Page = "Login";
        $title = "Co-Work :: Login";
        $I->amOnPage('login.php');
        $I->canSeeInTitle($Page);
        $I->canSee($title,"title");
    }

    public function DashboardTitleTest(AcceptanceTester $I)
    {
        $Page = "DashBoard";
        $title = "Co-Work :: DashBoard";
        $I->amOnPage('dashboard.php');
        $I->canSeeInTitle($Page);
        $I->canSee($title,"title");
    }

    public function RegisterNewAdminTitleTest(AcceptanceTester $I)
    {
        $Page = "Register Admin";
        $title = "Co-Work :: Register Admin";
        $I->amOnPage('register_admin.php');
        $I->canSeeInTitle($Page);
        $I->canSee($title,"title");
    }

    public function RegisterNewStartupTitleTest(AcceptanceTester $I)
    {
        $Page = "Register Startup";
        $title = "Co-Work :: Register Startup";
        $I->amOnPage('register_startup.php');
        $I->canSeeInTitle($Page);
        $I->canSee($title,"title");
    }

    public function AddNewSpaceTitleTest(AcceptanceTester $I)
    {
        $Page = "Add Space";
        $title = "Co-Work :: Add Space";
        $I->amOnPage('add_new_space.php');
        $I->canSeeInTitle($Page);
        $I->canSee($title,"title");
    }

    public function ResetPasswordTitleTest(AcceptanceTester $I)
    {
        $Page = "Reset Password";
        $title = "Co-Work :: Reset Password";
        $I->amOnPage('change_password.php');
        $I->canSeeInTitle($Page);
        $I->canSee($title,"title");
    }

    public function SpaceTitleTest(AcceptanceTester $I)
    {
        $Page = "Space";
        $title = "Co-Work :: Space";
        $I->amOnPage('spaces.php');
        $I->canSeeInTitle($Page);
        $I->canSee($title,"title");
    }
}