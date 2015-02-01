<?php

/**
 * Class providing utility support methods for Sweia
 *
 * @author Joshua Kissoon
 * @since 20140616
 */
class Utility
{

    /**
     * Logs a message to the database
     * 
     * @param $type The type of message to log
     * @param $message
     */
    public static function log($type, $message)
    {
        $db = Sweia::getInstance()->getDB();

        $res = $db->query("INSERT INTO system_log (type, message) VALUES (':type', ':message')", array(":type" => $type, ":message" => $message));
        return ($res) ? true : false;
    }

    /**
     * Set a variable in the site table that can be used later 
     * 
     * @param $vid The id by which to store the variable
     * @param $value The actual value to store
     */
    public static function variableSet($vid, $value)
    {
        $db = Sweia::getInstance()->getDB();

        $args = array("::vid" => $vid, "::value" => $value);
        $sql = "INSERT INTO variable (vid, value) VALUES ('::vid', '::value')
                ON DUPLICATE KEY UPDATE value='::value'";
        $res = $db->query($sql, $args);
        return $res;
    }

    /**
     * Retrieves a variable that was set earlier in the site variable table
     * 
     * @param $vid The id by of the variable to retrieve
     */
    public static function variableGet($vid)
    {
        $db = Sweia::getInstance()->getDB();

        $vid = $db->escapeString($vid);
        $res = $db->query("SELECT value FROM variable WHERE vid='::vid'", array("::vid" => $vid));
        $variable = $db->fetchObject($res);
        if (isset($variable->value))
        {
            return $variable->value;
        }
        else
        {
            return false;
        }
    }

    /**
     * @return The website's name
     */
    public static function getSiteName()
    {
        return self::variableGet("sitename");
    }

    public static function ifImageExists($file_path, $image_name)
    {
        if (valid($image_name))
        {
            return BaseConfig::FILES_URL . $file_path . $image_name;
        }
        return BaseConfig::FILES_URL . "/default.jpg";
    }

    public static function ifCoverExists($file_path, $image_name)
    {
        if (valid($image_name))
        {
            return BaseConfig::FILES_URL . $file_path . $image_name;
        }
        return BaseConfig::FILES_URL . "/cover/default.jpg";
    }

    /**
     * Error page
     */
    public static function errorPage($message)
    {
        $theme = Sweia::getInstance()->getThemeRegistry();
        $tpl = new Template(SiteConfig::templatesPath() . "inner/error-page");
        $tpl->message = $message;
        $page = $tpl->parse();
        $theme->addContent("content", $page);
    }

    /**
     * cut short the long description if it is more then 60 characters
     */
    public static function subStrDescription($string)
    {
        return (strlen($string) > 230) ? substr($string, 0, 230) . "..." : $string;
    }
    
    /**
     * gets a random image from the category
     */
    public static function getRanndomImage()
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT image FROM ".SystemTables::DB_TBL_CATEGORY." ORDER BY RAND( ) LIMIT 1";
        $rs = $db->query($sql);
        if(!$rs)
        {
            return false;
        }
        return $db->fetchObject($rs)->image;
    }

}
