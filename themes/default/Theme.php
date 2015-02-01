<?php

/**
 * @desc A general class containing the main methods for the theming system to work with everything else
 * @author Joshua Kissoon
 * @date 20131202
 */
class Theme
{

    /**
     * @desc Add the theme's libraries and scripts 
     */
    public static function init()
    {
        $themeRegistry = Sweia::getInstance()->getThemeRegistry();

        $themeRegistry->addScript(SiteConfig::themeLibrariessUrl() . "jquery/jquery-2.1.1.min.js");
        /* Adding Css */
        //$themeRegistry->addScript(THEME_LIBRARIES_URL . "jquery/jquery-2.0.3.min.js", 2);
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "style.css");
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "bootstrap.min.css");
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "camera.css");
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "colorpicker.css");
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "custom-style.css");
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "jquery.custom-scrollbar.css");
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "font-awesome.css");
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "animate.min.css");
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "font-awesome.min.css");
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "main.css");
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "settings.css");
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "prettyPhoto.css");
        $themeRegistry->addCss(SiteConfig::themeCssUrl() . "responsive.css");

        /* Adding Js */
        $themeRegistry->addScript(SiteConfig::themeScriptsUrl() . "main.min.js", 20);
        $themeRegistry->addScript(SiteConfig::themeScriptsUrl() . "jquery.js");
        $themeRegistry->addScript(SiteConfig::themeScriptsUrl() . "jquery-ui.min.js");
        $themeRegistry->addScript(SiteConfig::themeScriptsUrl() . "bootstrap.min.js");
        $themeRegistry->addScript(SiteConfig::themeScriptsUrl() . "jquery.prettyPhoto.js");
        $themeRegistry->addScript(SiteConfig::themeScriptsUrl() . "jquery.isotope.min.js");
        $themeRegistry->addScript(SiteConfig::themeScriptsUrl() . "main.js");
        $themeRegistry->addScript(SiteConfig::themeScriptsUrl() . "custom-main.js");
        $themeRegistry->addScript(SiteConfig::themeScriptsUrl() . "wow.min.js");
    }

    /**
     * @desc Formats the screen messages
     * @return The formatted screen messages
     */
    public static function getFormattedScreenMessages()
    {
        /* Get the messages from the screen messages class */
        $messages = ScreenMessage::getMessages();

        if (count($messages) < 1)
        {
            return false;
        }

        /* If there are messages, generate the ul */
        $template = new Template(SiteConfig::templatesPath() . "/inner/screen-messages");
        $template->messages = $messages;
        $template->message_count = count($messages);
        return $template->parse();
    }

}
