<?php

/**
 * This file is the controller for the entire site. 
 * It loads and runs all the necessary site objects and handles core site functionalities.
 * 
 * @author Joshua Kissoon
 * @since 20140616
 */
$theme = Sweia::getInstance()->getThemeRegistry();

/* Setup the navigation bar */
$navbar = new Template(SiteConfig::templatesPath() . "inner/header");

$theme->setContent("nav", $navbar->parse());
$foobar = new Template(SiteConfig::templatesPath() . "inner/footer");
$theme->setContent("footer", $foobar->parse());





