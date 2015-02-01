<?php

/**
 * This class can be used to compose a generalized ajax response.
 * 
 * Why this class?
 * - We can use different ajax response formats, and dynamically switch between them
 * -- eg - json now... maybe the standard will change later
 * - There are some data that we want to send generally in a json response
 * -- This class makes the naming of the data variables consistent throughout
 * - Here we can provide easy methods to compose the ajax response
 * -- Not having json array conversions all over the place....
 * 
 * @todo Build a javascript parallel class
 *
 * @author Joshua Kissoon
 * @since 20140625
 */
class AjaxResponse {

    private
            $success;
    private
            $msg;
    private
            $data;
    private
            $custom_data;

    /**
     * Create an instance of the class
     */
    public
            function __construct($success, $data = null) {
        $this->success = $success;

        if ($data) {
            $this->setData($data);
        }

        return $this;
    }

    public
            function setSuccess($success = true) {
        $this->success = $success;
    }

    public
            function setMessage($msg) {
        $this->msg = $msg;
    }

    public
            function setData($data) {
        $this->data = $data;
    }
    public
            function setCustomData($data) {
        $this->custom_data = $data;
    }

    public
            function getOutput() {
        return $this->getJsonData();
    }

    /** Json Encode the data and send it */
    private
            function getJsonData() {
        return json_encode($this->getReturnData());
    }

    private
            function getReturnData() {
        /* Create an array of objects to return */
        $ret = array("success" => $this->success);

        /* Put valid data in the return array */
        if (isset($this->msg)) {
            $ret["msg"] = $this->msg;
        }

        if (isset($this->data)) {
            $ret["data"] = $this->data;
        }
        
        if (isset($this->custom_data)) {
            $ret["custom_data"] = $this->custom_data;
        }

        return $ret;
    }

    /**
     * Handle casting the object automatically to string when printing
     */
    public
            function __toString() {
        return $this->getOutput();
    }

}
