<?php

/*
 * Refines an existing data with the google API
 * 
 * @author Sandeep Gantait
 * @since 20140131
 */

class RefineData {

    /**
     * Get all the existing data from the my
     */
    public static function getMasterData() {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT * FROM " . SystemTables::DB_TBL_MASTER;
        $rs = $db->query($sql);
     
        $arr = array();
        while ($row = $db->fetchObject($rs)) {
            $arr[$row->id] = $row;
        }
        return $arr;
    }

    /**
     * Update the other details of the loacation
     */
    public static function updateDetails($add,$dist,$state,$id) {
        $db = Sweia::getInstance()->getDB();
        $sql = "UPDATE " . SystemTables::DB_TBL_MASTER . " SET address = '::address', district = '::district', state = '::state' WHERE id = ::id";
        $args = array(
            "::id"=>$id,
            "::address"=>  $add,
            "::district"=>$dist,
            "::state"=>$state
        );
        $rs = $db->query($sql,$args);
        if(!$rs)
        {
            return false;
        }
        return true;
    }
    
    /**
     * insert state
     */
    public static function insertState($state)
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "INSERT INTO ".SystemTables::DB_TBL_STATE." (state) VALUES('::state')";
        $rs = $db->query($sql,array("::state"=>$state));
        if($db->lastInsertId() > 0 && $rs)
        {
            return true;
        }
        return false;
    }
    /**
     * insert district
     */
    public static function insertDistrict($stid,$district)
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "INSERT INTO ".SystemTables::DB_TBL_DISTRICT." (stid, district) VALUES(::stid,'::district')";
        $rs = $db->query($sql,array("::stid"=>$stid,"::district"=>$district));
        if($db->lastInsertId() > 0 && $rs)
        {
            return true;
        }
        return false;
    }
    /**
     * check state
     */
    public static function isStateExists($state)
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT * FROM ".SystemTables::DB_TBL_STATE." WHERE state LIKE '%$state%'";
        $db->query($sql);
        
        if(!$db->resultNumRows() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
                
    }
    
    /**
     * check district
     */
    public static function isDistrictExists($district)
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT * FROM ".SystemTables::DB_TBL_DISTRICT." WHERE district LIKE '%$district%'";
        $db->query($sql);
        
        if(!$db->resultNumRows() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    /**
     * get stid on the basis of the name of the state
     */
    public static function getStateId($state)
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT stid FROM ".SystemTables::DB_TBL_STATE." WHERE state LIKE '%".$state."%' LIMIT 1";
        $rs = $db->query($sql);
       
        if(!$rs || !$db->resultNumRows() > 0)
        {
            return false;
        }
        return $db->fetchObject($rs)->stid;
    }
    
}