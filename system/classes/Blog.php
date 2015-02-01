<?php

/**
 * Handles all the requests related to a particular blog
 *
 * @author sandeep
 * @since 20140923
 */
class Blog
{
    /* blogs */

    private $uid, $title, $tags, $cid, $body, $image, $bid, $ip_address;
    /* comments */
    private $name, $email, $comment;

    public function getIpAddress()
    {
        return $this->ip_address;
    }

    public function setIpAddress($ip_address)
    {
        $this->ip_address = $ip_address;
    }

    public function setBid($bid)
    {
        $this->bid = $bid;
    }

    public function getBid()
    {
        return $this->bid;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function getCid()
    {
        return $this->cid;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function setCid($cid)
    {
        $this->cid = $cid;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function __construct($bid = null)
    {
        /* Load the user info for a specific uid, or load data for an anonymous user */
        if (!isset($bid))
        {
            return false;
        }
        if (valid($bid))
        {
            $this->bid = $bid;
            return $this->load();
        }
    }

    public function insert()
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "INSERT INTO " . SystemTables::DB_TBL_BLOG . " (uid, title, tags, cid, body, image) VALUES (::uid, '::title', '::tags', ::cid, '::body', '::image')";
        $args = array(
            "::uid" => $this->uid,
            "::title" => $this->title,
            "::tags" => $this->tags,
            "::cid" => $this->cid,
            "::body" => $this->body,
            "::image" => $this->image
        );

        $rs = $db->query($sql, $args);

        if (!$rs)
        {
            return false;
        }

        if ($db->lastInsertId() > 0)
        {
            return true;
        } else
        {
            return false;
        }
    }

    public function update()
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "UPDATE " . SystemTables::DB_TBL_BLOG . " SET title = '::title', cid = ::cid, tags = '::tags', body = '::body', image = '::image' WHERE bid = ::bid";
        $args = array(
            "::uid" => $this->uid,
            "::title" => $this->title,
            "::tags" => $this->tags,
            "::cid" => $this->cid,
            "::body" => $this->body,
            "::image" => $this->image,
            "::bid" => $this->bid
        );
        $rs = $db->query($sql,$args);
        return ($rs)?true:false;
    }

    public function load()
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT bl.*,cat.cid,cat.name FROM " . SystemTables::DB_TBL_BLOG . " bl INNER JOIN " . SystemTables::DB_TBL_CATEGORY . " cat ON cat.cid = bl.cid AND bl.bid = ::bid ";

        $rs = $db->query($sql, array("::bid" => $this->bid));

        if (!$rs)
        {
            return false;
        }
        $row = $db->fetchObject($rs);
        foreach ($row as $key => $value)
        {
            $this->$key = $value;
        }
        return true;
    }

    public static function isExists($bid)
    {
        $db = Sweia::getInstance()->getDB();
        $rs = $db->getFieldValue(SystemTables::DB_TBL_BLOG, "bid", "bid = $bid");
        if ($rs == $bid)
        {
            return true;
        } else
        {
            return false;
        }
    }

    public static function isCidExists($cid)
    {
        $db = Sweia::getInstance()->getDB();
        $rs = $db->getFieldValue(SystemTables::DB_TBL_BLOG, "cid", "cid = $cid");
        if ($rs == $cid)
        {
            return true;
        } else
        {
            return false;
        }
    }

    /**
     * Adds a comment to a particular blog
     */
    public function insertBlogComment()
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "INSERT INTO " . SystemTables::DB_TBL_COMMENT . " (bid, name, email, comment) VALUES(::bid, '::name', '::email', '::comment')";
        $args = array(
            "::bid" => $this->bid,
            "::name" => $this->name,
            "::email" => $this->email,
            "::comment" => htmlentities($this->comment)
        );
        $rs = $db->query($sql, $args);
        if (!$rs)
        {
            return false;
        }

        if ($db->lastInsertId() > 0)
        {
            return true;
        } else
        {
            return false;
        }
    }

    /**
     * Like a blog
     */
    public function insertLike()
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "INSERT INTO " . SystemTables::DB_TBL_LIKE . " (bid, ip_address) VALUES (::bid, '::ip_address')";
        $rs = $db->query($sql, array("::bid" => $this->bid, "::ip_address" => $this->ip_address));

        if (!$rs)
        {
            return false;
        }
        if ($db->lastInsertId() > 0)
        {
            return true;
        } else
        {
            return false;
        }
    }

}
