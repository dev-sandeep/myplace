<?php

/**
 * Base Configuration to be entered by the webmaster
 *
 * @author Joshua Kissoon
 * @since 20140621
 */
class BaseConfig
{

    /** Is the site in a specific folder within your web directory */
    const SITE_FOLDER = "myplace";

    /* Home URL */
    const HOME_URL = "home";
    
    /* Database Access Information */
    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "myplace";

    /* Themes Information */
    const THEME = "default";
    const ADMIN_THEME = "default";
    /* Sender Email */
    const SENDER_EMAIL = "info@redchisel.accreteglobus.co.in";

    /* Value used to as a salt when hashing passwords */
    const PASSWORD_SALT = "K<47`5n9~8H5`*^Ks.>ie5&";

    /**
     * Files directory and whether the given directory is relative to the base directory of the system.
     * 
     * These constants can be changed if we're using a CDN later, or a separate files server
     * 
     * @note Exclude leading and trailing slashes
     */
    const FILES_DIR = "http://128.199.246.57/rkfiles";
   
    const FILES_DIR_RELATIVE = false;

    /**
     * The URL for files and whether the URL is relative to the base directory of the system
     * 
     * These constants can be changed if we're using a CDN later, or a separate files server
     * 
     * @note Exclude leading and trailing slashes
     */
    const FILES_URL = "http://128.199.246.57/rkfiles";
    const FILES_URL_RELATIVE = false;
    const SYS_DIR = "/var/www/html/redchisel/";
}
