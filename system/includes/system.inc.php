<?php

/**
 * This file is the controller for the entire system. 
 * It loads and runs all the necessary system objects and handles core system functionalities.
 * 
 * @author Joshua Kissoon
 * @since 20140616
 */
$url = Sweia::getInstance()->getURL();
//    if(isset($_SESSION['product_cart'])){
//        
//        unset($_SESSION['product_cart']);
//    }

/* If we're at admin section! load the admin template */
if (isset($url[0]) && $url[0] == SiteConfig::adminUrlDirectory())
{
    SiteConfig::$useAdminTheme = true;
}


$url = Sweia::getInstance()->getURL();
$theme = Sweia::getInstance()->getThemeRegistry();


/* Lets include all system components since they may be needed by modules on every page */
if (!isset($url[0]))
{
    $url[0] = "home";
}

switch ($url[0])
{
    default :
    case "home":
        include 'home/home.inc.php';
        break;

}


/**
 * Log in module
 */
if (isset($_POST['submit']) || !empty($_POST))
{
    switch ($_POST['submit'])
    {
        case "login-submit":
            login_user($_POST);
            break;
    }
}

function login_user($values)
{
    if($values['email'] == '' || $values['password'] == '')
    {
        ScreenMessage::setMessage("all fields are mandatory.",  ScreenMessage::MESSAGE_TYPE_ERROR);
        return false;
    }
    
    $admin = new Admin();
    $admin->setEmail($values['email']);
    $admin->setPassword($values['password']);
    if($admin->authenticate())
    {
        Session::loginUser($admin);
        ScreenMessage::setMessage("Congratulations, you logged in successfuly!",  ScreenMessage::MESSAGE_TYPE_SUCCESS);
        System::redirectInternal("admin/blog-add");
    }
    else
    {
        ScreenMessage::setMessage("Please check you credentials!",  ScreenMessage::MESSAGE_TYPE_ERROR);
        return false;
    }
    
    
}