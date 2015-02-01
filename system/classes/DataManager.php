<?php

/*
 * Provides all the data which would be required in the front end
 * 
 * @author Sandeep Gantait
 * @since 20140131
 */

class DataManager {

    public $address;

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public static function getStateDropdown() {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT * FROM " . SystemTables::DB_TBL_STATE . " ORDER BY state";
        $rs = $db->query($sql);
        if (!$rs) {
            return false;
        }
        $opt = "";
        while ($row = $db->fetchObject($rs)) {
            $opt .= "<option value='" . $row->stid . "'>" . $row->state . "</option>";
        }
        return $opt;
    }

    public static function getDistrictDropdown($stid) {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT * FROM " . SystemTables::DB_TBL_DISTRICT . " WHERE stid = $stid ORDER BY district";
        $rs = $db->query($sql);
        if (!$rs) {
            return false;
        }
        $opt = "";
        while ($row = $db->fetchObject($rs)) {
            $opt .= "<option value='" . $row->did . "'>" . $row->district . "</option>";
        }
        return $opt;
    }

    public static function getDistrictName($did) {
        if ($did == 0 || $did == '') {
            return false;
        }
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT * FROM " . SystemTables::DB_TBL_DISTRICT . " WHERE did = $did LIMIT 1";
        $rs = $db->query($sql);
        if (!$rs || !$db->resultNumRows() > 0) {
            return false;
        }
        return $db->fetchObject($rs)->district;
    }

    public static function searchByData($district = null, $address = null, $id = null) {
        $db = Sweia::getInstance()->getDB();
        if (isset($district)) {
            $sql = "SELECT * FROM " . SystemTables::DB_TBL_MASTER . " WHERE district LIKE '%$district%' GROUP BY address";
        }
        if (isset($address)) {
            $sql = "SELECT * FROM " . SystemTables::DB_TBL_MASTER . " WHERE address LIKE '%$address%'";
        }
        if (isset($id)) {
            $sql = "SELECT * FROM " . SystemTables::DB_TBL_MASTER . " WHERE id = '$id' LIMIT 1";
        }
        $rs = $db->query($sql);

        if (!$rs || !$db->resultNumRows() > 0) {
            return false;
        }
        $arr = array();
        while ($row = $db->fetchObject($rs)) {
            $arr[] = $row;
        }
        return $arr;
    }
    
    public static function getDistricts()
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT * FROM ".SystemTables::DB_TBL_DISTRICT;
        $rs = $db->query($sql);
        $arr = array();
        while($row = $db->fetchObject($rs))
        {
            $arr[] = $row;
        }
        return $arr;
    }
    
    public static function getPlaceCountOnDistrict($district)
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT count(*) AS number FROM ".SystemTables::DB_TBL_MASTER." WHERE district LIKE '%$district%'";
        $rs = $db->query($sql);
        $count = $db->fetchObject($rs)->number;
        if($count > 0)
        {
            return $count;
        }
        return 0;
    }

}
