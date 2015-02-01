<?php

/**
 * Handles the blog page
 * 
 * @author Sandeep Gantait
 * @since 20140923
 */
$url[1] = isset($url[1]) ? $url[1] : "view";

if (isset($url[1]))
{
    switch ($url[1])
    {
        case "view":
        default :
            $theme->setContent("content", load_recent_blogs());
            break;
        case "detail":
            $url = isset($url[2]) ? "$url[2]" : System::redirectInternal("home");
            $theme->setContent("content", load_full_blog($url));
            break;
        case "category":
            $url = isset($url[2]) ? "$url[2]" : System::redirectInternal("home");
            $theme->setContent("content", load_full_category($url));
            break;
    }
}

if (isset($_POST['submit']))
{
    switch ($_POST['submit'])
    {
        case "add-comment":
            blog_add_comment($_POST);
            break;
        case "like-blog":
            blog_like_button($_POST);
            break;
    }
}

/**
 * Loads most recent blogs
 */
function load_recent_blogs()
{
    $tpl = new Template(SiteConfig::templatesPath() . "views/blog/blog-view");
    $tpl->blogs = BlogManager::getRecentBlogs();
    /* get all the categories and blogs */
    $tpl->categories = widget_get_category();
    /* count - likes */
    $tpl->likes_count = BlogManager::$likes;
    /* count - comments */
    $tpl->comments_count = BlogManager::$comments;
    return $tpl->parse();
}

/**
 * Loads th full details of a particular blog
 */
function load_full_blog($bid)
{
    if (!Blog::isExists($bid))
    {
        System::redirectInternal("home");
    }

    $tpl = new Template(SiteConfig::templatesPath() . "views/blog/blog-detail");
    /* get all the details of this blog */
    $tpl->blog = new Blog($bid);
    /* get all the categories and blogs */
    $tpl->categories = widget_get_category();
    /* load all the comments */
    $tpl->comments = BlogManager::loadBlogComments($bid);
    /* check if the blog is liked */
    $ip_address = $_SERVER['REMOTE_ADDR'];
    if (BlogManager::checkIfLiked($bid, $ip_address))
    {
        $tpl->liked = true;
    }
    /* Likes - count */
    $tpl->likes_count = BlogManager::countLikes($bid);
    /* Comment - count */
    $tpl->comments_count = BlogManager::countComments($bid);
    /* recent - comments */
    $tpl->recent_comments = BlogManager::getRecentComments($bid);
    /* get - archieve blogs count */
    $tpl->archieve_count = BlogManager::getArchieveBlogCount();
    /* get the latest image */
    $tpl->images = BlogManager::getBlogImage();
    /* get the session */
    if(Session::isLoggedIn())
    {
        $tpl->login  = true;
    }
    return $tpl->parse();
}

/**
 * get all the categories and number pof blogs under them
 */
function widget_get_category()
{
    $categories = BlogManager::getCategoryBlogCount();
    return $categories;
}

/**
 * get all the blogs under a category
 */
function load_full_category($cid)
{
    if (!Blog::isExists($cid))
    {
        System::redirectInternal("home");
    }

    $tpl = new Template(SiteConfig::templatesPath() . "views/blog/blog-view");
    $tpl->blogs = BlogManager::getRecentBlogs($cid);
    $tpl->category = BlogManager::getCategoryName($cid);
    /* get all the categories and blogs */
    $tpl->categories = widget_get_category();
    /* count - likes */
    $tpl->likes_count = BlogManager::$likes;
    /* count - comments */
    $tpl->comments_count = BlogManager::$comments;
    return $tpl->parse();
}

/**
 * adds a comment to the blog
 */
function blog_add_comment($values)
{
    $blog = new Blog();
    $blog->setBid($values['bid']);
    $blog->setName($values['name']);
    $blog->setEmail($values['email']);
    $blog->setComment($values['message']);
    if ($blog->insertBlogComment())
    {
        ScreenMessage::setMessage("Your comment added successfully!", ScreenMessage::MESSAGE_TYPE_SUCCESS);
        System::redirectInternal("blog/detail" . "/" . $values['bid']);
    } else
    {
        ScreenMessage::setMessage("Internel error occured. try again later", ScreenMessage::MESSAGE_TYPE_ERROR);
    }
}

/**
 * Like a blog
 */
function blog_like_button($values)
{
    $blog = new blog($values['bid']);
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $blog->setIpAddress($ip_address);
    /* check if the reader have already liked the post */
    if (BlogManager::checkIfLiked($values['bid'], $ip_address))
    {
        getMessage("You have already liked this blog post.");
    }

    if ($blog->insertLike())
    {
        ScreenMessage::setMessage("Thank you, for liking this blog. ", ScreenMessage::MESSAGE_TYPE_SUCCESS);
        $resp = new AjaxResponse(true);
        $resp->setData(ScreenMessage::getMessages());
        echo $resp->getOutput();
        exit();
    } else
    {
        getMessage("Error Occured");
    }
}

function getMessage($message)
{
    ScreenMessage::setMessage($message, ScreenMessage::MESSAGE_TYPE_ERROR);
    $resp = new AjaxResponse(false);
    $resp->setData($message);
    echo $resp->getOutput();
    exit();
}