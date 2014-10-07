<?php 
$title = "Co-Work :: Login";
$I = new AcceptanceTester($scenario);
$I->wantTo('Test Common Elements of a Login Page');
$I->amOnPage('/login.php');
$I->canSeeInTitle($title);
$I->canSee("Forgot password?","a");
$I->canSee("Login","button");