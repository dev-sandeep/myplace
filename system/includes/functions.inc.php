<?php

/*
 * @author Joshua Kissoon
 * @date Very Long Ago
 * @file This file contains general functions that are not specific to any class or application
 */

/**
 * @desc Checks the validity of an expression
 * @return Boolean Whether the expression is valid or not
 */
function valid($expression = "")
{
    if (!isset($expression))
    {
        return false;
    }

    if (is_array($expression) || is_object($expression))
    {
        return true;
    }

    $ex = trim($expression);
    if (isset($ex) && !is_null($ex) && $ex != "")
    {
        return true;
    }
    return false;
}

function valid_var($var = null)
{
    if ($var == "")
    {
        return "";
    }
    if (!empty($var))
    {
        return $var;
    }

    if (isset($var))
    {
        return $var;
    }

    return "";
}

function valid_tpl($var = null)
{
    if (!empty($var))
    {
        return $var;
    }

    if (isset($var))
    {
        return $var;
    }

    System::redirectInternal("page/error");
}

function hprint($data, $show_html = false)
{
    /*
     * Takes in an array or an object and prints it out hiearchically to the screen
     */
    if ($show_html)
    {
        /* If html is needed to be shown, html elements needs to be sanitized to be displayed on the screen */
        print htmlentities('<pre>' . print_r($data, TRUE) . '</pre>');
    } else
    {
        print '<pre>' . print_r($data, TRUE) . '</pre>';
    }
}

function random_alphanumeric_string($length = 12)
{
    /* Function that returns a random AlphaNumeric String of a specified length */
    $alphNums = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $newString = str_shuffle(str_repeat($alphNums, rand(1, $length)));
    return substr($newString, rand(0, strlen($newString) - $length), $length);
}

function random_password($length = 0)
{
    /* Function that generates a random password of a specified length */
    $length = ($length == 0) ? 10 : $length;
    $characters = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM!@#$%^&*()_+=";
    $token = "";
    for ($i = 0; $i < $length; $i++)
    {
        $value = strlen($characters) - 1;
        $token .= $characters[rand(0, $value)];
    }
    return $token;
}

function string_teaser($string, $length, $add_dots = false, $concat_end = "")
{
    /*
     * Functions that trims a string to a specific length
     * @params
     *  $string - The string to trim
     *  $length - the length to trim this string to
     *  $add_dots - add dots to the end of the trimmed string ?
     *  $concat_end - any value to concatenate to the end of the trimmed string
     */
    if ($add_dots)
    {
        $end = " ...";
    }
    if (strlen($string) > $length)
    {
        return substr($string, 0, $length) . @$end . " $concat_end";
    } else
    {
        return $string . " $concat_end";
    }
}

function get_ordinal_number($number)
{
    if ($number == 1)
    {
        return "first";
    } else if ($number == 2)
    {
        return "second";
    } else if ($number == 3)
    {
        return "third";
    } else if ($number == 4)
    {
        return "fourth";
    } else if ($number == 5)
    {
        return "fifth";
    } else if ($number == 6)
    {
        return "sixth";
    }
}

function get_age_years($dob)
{
    list($Y, $m, $d) = explode("-", $dob);
    return( date("md") < $m . $d ? date("Y") - $Y - 1 : date("Y") - $Y );
}

/**
 * generate the order id
 * 
 * @param integer $id Transaction id
 * @package datetime $date  Created_ts
 */
function generateOrderId($id, $date)
{
    $date = explode("-", $date);
    $txndate = explode(" ", $date[1] . $date[2]);
    $trans_id = "RC" . str_pad($id, 7, '0', STR_PAD_LEFT) . $txndate[0];
    return $trans_id;
}

/**
 * generate transaction id saved from Order ID
 * 
 * @param integer $id Transaction id
 * @package datetime $date  Created_ts
 */
function generateOidFromTid($id)
{
    $tid = ltrim(substr($id, 2, 7), 0);
    return $tid;
}

/**
 * @desc Checks the spwcial characters existance of an expression
 * @return Boolean Whether the expression is valid or not
 */
function check_special_chars($expression = "")
{
    if (!isset($expression))
    {
        return false;
    }

    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $expression))
    {
        return true;
    }
    return false;
}

/*
 * validating date in YYYY-MM-DD format
 */

function validate_date_MMDDYYYY($date)
{
    if (strlen($date) > 10)
    {
        return FALSE;
    } else
    {
        $pieces = explode('/', $date);
        if (count($pieces) != 3)
        {
            return FALSE;
        } else
        {
            $day = $pieces[0];
            $month = $pieces[1];
            $year = $pieces[2];
            return checkdate($day, $month, $year);
        }
    }
}

/**
 * generates the product code
 */
function generate_product_code($iid, $isid)
{
    return "RC" . $isid . "P" . $iid;
}

/**
 * get the discounted pice
 */
function get_dioscounted_price($discount, $price)
{
    return (1 - $discount / 100) * $price;
}

/**
 * Remove special character from string
 * @param type $string
 * @return type
 */
function clean($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

/* get only the keys and not the value */
function removeArrayKey($array)
{
    $arr = array();
    foreach ($array as $key=>$val)
    {
        $arr[] = $val;
    }
    return $arr;
}

