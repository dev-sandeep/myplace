<?php

/*
 * handles all the admin-related queries
 * 
 * @author: Sandeep gantait
 * @since: 20140923
 */

class Admin
{

    private $email, $password,$uid;

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $this->hashPassword($password);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getId()
    {
        return $this->uid;
    }

        
    /**
     * authenticate the user with the given credentials
     * 
     * @return Boolean Weather the user's email and Password is authentic
     */
    public function authenticate()
    {
        /* authenticate if the login credentials are correct */
        $db = Sweia::getInstance()->getDB();
        $args = array(
            ":email" => $this->getEmail(),
            ":password" => $this->password
        );
        $sql = "SELECT email,uid FROM " . SystemTables::DB_TBL_USER . " WHERE email = ':email' AND password = ':password' AND status != 4 LIMIT 1";
        $res = $db->query($sql, $args);
        if ($res && $db->resultNumRows($res) == 1)
        {
            $data = $db->fetchObject($res);
            $this->uid = 1;
            return true;
        }

        return false;
    }

    /**
     * Do the hashing function on the given password
     * 
     * @param Variable $password Passes the password from the setPassword method for hashing it
     * @return Variable Returns the hashed password back to the caller
     */
    private function hashPassword($password)
    {
        $salt = md5(BaseConfig::PASSWORD_SALT);
        return sha1($salt . $password);
    }

}
