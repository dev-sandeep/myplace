<?php

/**
 * handles the admin section
 * 
 * @author Sandeep Gantait
 * @since 20140917
 */
$theme = Sweia::getInstance()->getThemeRegistry();
$url = Sweia::getInstance()->getURL();

if (!Session::isLoggedIn())
{
    System::redirectInternal("home");
}

$url[1] = isset($url[1]) ? $url[1] : "";

if (isset($_POST['submit']))
{
    switch ($_POST['submit'])
    {
        case "blog-add":
            blog_add_submit($_POST);
            break;
        case "blog-edit":
            blog_edit_submit($_POST);
            break;
        case "logout-user":
            echo blog_logout_user();
            break;
    }
}

if (isset($url[1]))
{
    switch ($url[1])
    {

        case "blog-add":
        default :
            $theme->setContent("content", load_blog_add_page());
            break;
        case "blog-edit":
            $urlq = isset($url[2]) ? $url[2] : System::redirectInternal("home");
            $theme->setContent("content", load_blog_edit_page($urlq));
            break;
    }
}

/**
 * load the form to add new blog
 */
function load_blog_add_page()
{
    $tpl = new Template(SiteConfig::templatesPath() . "forms/admin/blog-add");
    $tpl->categories = BlogManager::getAllCategories();
    return $tpl->parse();
}

/**
 * adds a new blog into the system
 */
function blog_add_submit($values)
{
    $blog = new Blog();

    $blog->setUid(Session::loggedInUid());
    $blog->setTitle(htmlentities($values['title']));
    $blog->setCid($values['category']);
    $blog->setTags(htmlentities($values['tags']));
    $blog->setBody(htmlentities($values['body']));
    $blog->setImage($values['image']);
    
    if ($blog->insert())
    {
        ScreenMessage::setMessage("Congratulations! your blog has been published", ScreenMessage::MESSAGE_TYPE_SUCCESS);
    } else
    {
        ScreenMessage::setMessage("Error occured while saving your blog", ScreenMessage::MESSAGE_TYPE_ERROR);
    }
}

/**
 * logout user for the admin
 */
function blog_logout_user()
{
    Session::logoutUser();
    $resp = new AjaxResponse(true);
    $resp->setSuccess(true);
    ScreenMessage::setMessage("Logout user successfully", ScreenMessage::MESSAGE_TYPE_ERROR);
    $resp->setData(ScreenMessage::getMessages());
    $resp->getOutput();
    exit();
}

/**
 * load the form to edit the blog
 */
function load_blog_edit_page($bid)
{
    $tpl = new Template(SiteConfig::templatesPath() . "forms/admin/blog-edit");
    $tpl->categories = BlogManager::getAllCategories();
    /* get all the details of this blog */
    $tpl->blog = new Blog($bid);
    return $tpl->parse();
}

/**
 *  handles the form submition of form edit page 
 */
function blog_edit_submit($values)
{
   $blog = new Blog($values['bid']);

    $blog->setUid(Session::loggedInUid());
    $blog->setTitle(htmlentities($values['title']));
    $blog->setCid($values['category']);
    $blog->setTags(htmlentities($values['tags']));
    $blog->setBody(htmlentities($values['body']));
    $blog->setImage($values['image']);
    if($blog->update())
    {
        ScreenMessage::setMessage("Blog updated successfully",  ScreenMessage::MESSAGE_TYPE_SUCCESS);
    }
    else
    {
        ScreenMessage::setMessage("Failed to update blog",  ScreenMessage::MESSAGE_TYPE_ERROR);
    }
}