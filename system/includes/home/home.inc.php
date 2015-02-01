<?php

/**
 * handles the home page of the website
 * 
 * @author Sandeep Gantait
 * @since 20140917
 */
$theme = Sweia::getInstance()->getThemeRegistry();
$url = Sweia::getInstance()->getURL();
$themeRegistry = Sweia::getInstance()->getThemeRegistry();
$themeRegistry->addScript(SiteConfig::themeScriptsUrl() . "search.js");
$url[1] = isset($url[1]) ? $url[1] : "";

if (isset($_POST['submit'])) {
    switch ($_POST['submit']) {
        case "populate-district":
            echo populate_district($_POST);
            exit();
        case "search-places":
            echo search_place($_POST);
            exit();
        case "map-full-view":
            echo load_map_full_view($_POST);
            exit();
        case "map-detailed-full-view":
            echo load_detailed_map_full_view($_POST);
            exit();
        case "map-search":
            echo load_map_search_view($_POST);
            exit();
    }
}

if (isset($url[1])) {
    switch ($url[1]) {
        case "refine-data":
            $theme->setContent("content", save_places_count_in_district());
            break;
        case "view":
        default :
            $theme->setContent("content", load_home());
            break;
    }
}

function load_map_search_view($values)
{
    $tpl = new Template(SiteConfig::templatesPath() . "views/pages/map-view");
    $resp = new AjaxResponse(true);
    $tpl->search = $values['coordinates'];
    $tpl->address = $values['address'];
    $tpl->dosearch = $values['address'].$values['search']."+search";
    $tpl->id = $values['id'];
    $resp->setData($tpl->parse());
    echo $resp->getOutput();
    exit();
}

function load_detailed_map_full_view($values) {
    /* load map */
    $tpl = new Template(SiteConfig::templatesPath() . "views/pages/map-view");
    $datas = DataManager::searchByData(null,null,$values['id']);
    $resp = new AjaxResponse(true);
    $tpl->search = $datas[0]->lat.",".$datas[0]->lang;
    $tpl->address = $datas[0]->address.",+".$datas[0]->district.",+".$datas[0]->state."+";
    $tpl->id = $values['id'];
    $resp->setData($tpl->parse());
    /* load header */
    $tpl = new Template(SiteConfig::templatesPath() . "views/pages/search-full-detail");
    $mgr = new DataManager();
    $arr = array();
    $mgr->setAddress(implode(", ",json_decode($datas[0]->data)));
    array_push($arr, $mgr);
    $tpl->datas = $datas;
    $tpl->custom_address = $datas[0]->address;
    $resp->setCustomData($tpl->parse());
    echo $resp->getOutput();
    exit();
}

function load_map_full_view($values) {
    /* get the coordinates and address against the address */
    $datas = DataManager::searchByData(null, $values['address']);
    
    $tpl = new Template(SiteConfig::templatesPath() . "views/pages/map-view");
    $tpl->address = $datas[0]->address.",+".$datas[0]->district."+";
    $tpl->search = $datas[0]->lat.",".$datas[0]->lang;
    $tpl->id = $datas[0]->id;
    $resp = new AjaxResponse(true);
    $resp->setData($tpl->parse());

    if (count($datas) > 1) {
        $tpl = new Template(SiteConfig::templatesPath() . "views/pages/search-detailed-result");
        $tpl->datas = $datas;
        $tpl->addr = $values['address'];
    } else {
        $tpl = new Template(SiteConfig::templatesPath() . "views/pages/search-result");
        $mgr = new DataManager();
        $arr = array();
        $mgr->setAddress($values['address']);
        array_push($arr, $mgr);
        $tpl->datas = $arr;
    }



    $resp->setCustomData($tpl->parse());
    echo $resp->getOutput();
    exit();
}

/**
 * get the detailed address from the given data
 */
function get_detailed_address($data) {
    return implode(", ", $data);
}

function populate_district($values) {
    $resp = new AjaxResponse(true);
    $resp->setData(DataManager::getDistrictDropdown($values['stid']));
    echo $resp->getOutput();
    exit();
}

/**
 * Search places
 */
function search_place($values) {
    $district = DataManager::getDistrictName($values['did']);
    $search = DataManager::searchByData($district);
    $tpl = new Template(SiteConfig::templatesPath() . "views/pages/search-result");
    $tpl->datas = $search;
    $resp = new AjaxResponse(true);
    $resp->setData($tpl->parse());
    echo $resp->getOutput();
    exit();
}

function load_home() {

    $tpl = new Template(SiteConfig::templatesPath() . "views/home");
    $tpl->state = DataManager::getStateDropdown();
    return $tpl->parse();
}

/**
 * refines the existing data
 */
function refine_existing_data() {
    /* get all the data from the master table */
    $datas = RefineData::getMasterData();
    foreach ($datas as $data) {
        /* refine data from Google API and get the details  */
        $add = geo2address($data->lat, $data->lang);
        /* update the address, district , state */
        if (!RefineData::updateDetails($data->id, json_encode($add))) {
            ScreenMessage::setMessage("Error Occured", ScreenMessage::MESSAGE_TYPE_ERROR);
        }
    }
    ScreenMessage::setMessage("All is Well", ScreenMessage::MESSAGE_TYPE_SUCCESS);
}

function geo2address($lat, $long) {
    $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=false";
    $curlData = file_get_contents($url);
    $address = json_decode($curlData);
    $a = $address->results[0];
    return explode(",", $a->formatted_address);
}

/**
 * refine the data
 */
function refine_data() {
    $datas = RefineData::getMasterData();
    foreach ($datas as $data) {
        /* json decode the data fields */
        $arr = array();
        $mapData = json_decode($data->data);
        $length = count($mapData);

        $i = $length - 2;
        if ($i < 0) {
            $arr[0] = '';
        } else {
            $arr['0'] = $mapData[$i--]; //state
        }
        if ($i < 0) {
            $arr[1] = '';
        } else {
            $arr['1'] = $mapData[$i--]; //district
        }
        if ($i < 0) {
            $arr[2] = '';
        } else {
            $arr[2] = isset($mapData[$i]) ? $mapData[$i] : ""; //place
        }

        if (!RefineData::updateDetails($arr[2], $arr[1], $arr[0], $data->id)) {
            ScreenMessage::setMessage("Error in :" . $id, ScreenMessage::MESSAGE_TYPE_SUCCESS);
            echo $id;
            exit();
        }
    }
}

/**
 * get the unique state from the data and insert them
 */
function save_district_state() {
    $datas = RefineData::getMasterData();
    foreach ($datas as $data) {
        insert_district($data->state, $data->district);
    }
}

function insert_state($state) {
    /* search if the state exists */
    if (!RefineData::isStateExists($state)) {
        RefineData::insertState(remove_numbers($state));
    }
}

function insert_district($state, $district) {
    /* check if the district exists */
    if (!RefineData::isDistrictExists($district)) {
        $stid = RefineData::getStateId(substr($state, 0, 5));
        RefineData::insertDistrict($stid, $district);
    }
}

/**
 * remove numbers from the string
 */
function remove_numbers($string) {
    $vowels = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", " ");
    $string = str_replace($vowels, ' ', $string);
    return $string;
}

/**
 * get the counts of no. of places to reside in this district
 */
function save_places_count_in_district()
{
    $districts = DataManager::getDistricts();
    foreach ($districts as $dis)
    {
        $count = DataManager::getPlaceCountOnDistrict(substr($dis->district, 0,6));
        /* update */
    }
}