<?php

/**
 * handles the home page of the website
 * 
 * @author Sandeep Gantait
 * @since 20140917
 */
$theme = Sweia::getInstance()->getThemeRegistry();
$url = Sweia::getInstance()->getURL();

$url[1] = isset($url[1]) ? $url[1] : "";


if (isset($url[1]))
{
    switch ($url[1])
    {

        case "view":
        default :
            $theme->setContent("content", load_contact_page());
            break;
    }
}

function load_contact_page()
{

    $tpl = new Template(SiteConfig::templatesPath() . "views/contact/contact");
    return $tpl->parse();

}
