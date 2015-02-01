<?php

/**
 * Manages all the blogs in the system
 *
 * @author sandeep
 */
class BlogManager
{

    public static $likes = array();
    public static $comments = array();

    public static function getAllCategories()
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT cid,name FROM " . SystemTables::DB_TBL_CATEGORY;
        $rs = $db->query($sql);

        $arr = array();
        while ($row = $db->fetchObject($rs))
        {
            $arr[$row->cid] = $row->name;
        }
        return $arr;
    }

    /**
     * Load most recent blogs
     */
    public static function getRecentBlogs($cid = null)
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT * FROM " . SystemTables::DB_TBL_BLOG . " ORDER BY bid DESC LIMIT 3";
        if (isset($cid))
        {
            $sql = "SELECT * FROM " . SystemTables::DB_TBL_BLOG . " WHERE cid = $cid ORDER BY bid DESC LIMIT 3";
        }
        $rs = $db->query($sql);

        $arr = array();
        while ($row = $db->fetchObject($rs))
        {
            $arr[$row->bid] = $row;
            self::$likes[$row->bid] = self::countLikes($row->bid);
            self::$comments[$row->bid] = self::countComments($row->bid);
        }
        return $arr;
    }

    /**
     * get available categories and number of blogs under it
     */
    public static function getCategoryBlogCount()
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT DISTINCT(bl.cid),cat.name , count(bl.cid) AS count FROM " . SystemTables::DB_TBL_BLOG . " bl
                    INNER JOIN " . SystemTables::DB_TBL_CATEGORY . " cat ON cat.cid = bl.cid
                        GROUP BY bl.cid ";
        $rs = $db->query($sql);

        $arr = array();
        while ($row = $db->fetchObject($rs))
        {
            $arr[$row->cid] = $row;
        }
        return $arr;
    }

    /**
     * get the category's name on the basis of the cid
     */
    public static function getCategoryName($cid)
    {
        $db = Sweia::getInstance()->getDB();
        $rs = $db->getFieldValue(SystemTables::DB_TBL_CATEGORY, "name", "cid = $cid");
        return $rs;
    }

    /**
     * load all the comments under a particular blog
     */
    public static function loadBlogComments($bid)
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT coid, bid, name, email, comment, updated_ts FROM " . SystemTables::DB_TBL_COMMENT . " WHERE bid = '::bid'";
        $rs = $db->query($sql, array('::bid' => $bid));
        $arr = array();
        while ($row = $db->fetchObject($rs))
        {
            $arr[$row->coid] = $row;
        }

        return $arr;
    }

    /**
     * check if the ip-address have already liked the blog
     */
    public static function checkIfLiked($bid, $ip_address)
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT lid FROM " . SystemTables::DB_TBL_LIKE . " WHERE bid = ::bid AND ip_address = '::ip_address'";
        $rs = $db->query($sql, array("::bid" => $bid, "::ip_address" => $ip_address));

        if ($db->resultNumRows($rs) > 0)
        {
            return true;
        } else
        {
            return false;
        }
    }

    /**
     * count the number of likes
     */
    public static function countLikes($bid)
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT count(*) AS count FROM " . SystemTables::DB_TBL_LIKE . " WHERE bid = ::bid";
        $rs = $db->query($sql, array('::bid' => $bid));

        $row = $db->fetchObject($rs);
        $count = $row->count;
        if ($count > 0)
        {
            return $count;
        } else
        {
            return 0;
        }
    }

    /**
     * count the number of likes
     */
    public static function countComments($bid)
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT count(*) AS count FROM " . SystemTables::DB_TBL_COMMENT . " WHERE bid = ::bid";
        $rs = $db->query($sql, array('::bid' => $bid));

        $row = $db->fetchObject($rs);
        $count = $row->count;
        if ($count > 0)
        {
            return $count;
        } else
        {
            return 0;
        }
    }

    /**
     * get the Top 3 recent comments
     */
    public static function getRecentComments($bid)
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT c.*,b.title FROM  " . SystemTables::DB_TBL_COMMENT . " c INNER JOIN blog b ON b.bid = c.bid AND b.bid = ::bid ORDER BY c.coid DESC LIMIT 3";
        $rs = $db->query($sql, array('::bid' => $bid));
        $arr = array();
        while ($row = $db->fetchObject($rs))
        {
            $arr[$row->coid] = $row;
        }

        return $arr;
    }

    //SELECT count(month(updated_ts)) AS count, updated_ts FROM `blog` GROUP BY month(updated_ts) ORDER BY date(updated_ts) DESC

    /**
     * get the counts of archive blogs
     */
    public static function getArchieveBlogCount()
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT count(month(updated_ts)) AS count,updated_ts FROM " . SystemTables::DB_TBL_BLOG . " GROUP BY month(updated_ts) ORDER BY date(updated_ts) DESC";
        $rs = $db->query($sql);
        $arr = array();
        while($row = $db->fetchObject($rs))
        {
            $arr[] = $row;
        }
        return $arr;
    }
    
    /**
     * get top 6 images of diifferent blog
     */
    public static function getBlogImage()
    {
        $db = Sweia::getInstance()->getDB();
        $sql = "SELECT bid, image, title FROM ".SystemTables::DB_TBL_BLOG." LIMIT 6";
        $rs = $db->query($sql);
        $arr = array();
        while($row = $db->fetchObject($rs))
        {
            $arr[] = $row;
        }
        return $arr;
    }
}

