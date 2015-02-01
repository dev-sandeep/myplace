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

        case "aboutus":
        default :
            $theme->setContent("content", load_about_us());
            break;
        case "services":
            $theme->setContent("content", load_services());
            break;
        case "portfolio":
            $theme->setContent("content", load_portfolio());
            break;
    }
}

function load_about_us()
{
    $tpl = new Template(SiteConfig::templatesPath() . "views/pages/aboutus");
    return $tpl->parse();
}

function load_services()
{
    $tpl = new Template(SiteConfig::templatesPath() . "views/pages/services");
    return $tpl->parse();
}

function load_portfolio()
{
    $tpl = new Template(SiteConfig::templatesPath() . "views/pages/portfolio");
    return $tpl->parse();
}
