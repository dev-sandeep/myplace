<!DOCTYPE html>
<!-- This is the main template file for the site This template contains the overall layout and includes the main site stylesheets and scripts -->
<html lang="en">
    <head>
        
            <title>
                Sandeep Gantait | Portfolio Website 
            </title>
       
        <meta charset="UTF-8">
        <meta name="HandheldFriendly" content="true" />
        <meta name="MobileOptimized" content="320" />
        <meta name="Viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" 
              content="Sandeep Gantait , sandeep , gantait , sandy , unitedwolf , uplinksandy9 , wolfpack , travel , blog , software engineer , web , web developer ,
              bengali , arya college of engineering & it , arya , accrete globus technology , portfolio , web developer , sandeep gantait , blog" />
        <meta name="robots" content="index,follow" />
        
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,400italic,500italic,300italic,100italic,100,700italic,900,900italic,700' rel='stylesheet' type='text/css'>
        <!-- Favicon  -->
        <link rel="icon" href="images/fav.jpg" type="image/x-icon" />
        <!-- Adding Stylesheets -->
        <?php if (isset($stylesheets)): ?>
            <?= $stylesheets; ?>
        <?php endif; ?>

        <!--Adding Header Scripts-->
        <?php if (isset($header_scripts)): ?>
            <?= $header_scripts; ?>
        <?php endif; ?>

        <!--Other head data-->
        <?php if (isset($head)): ?>
            <?php print $head; ?>
        <?php endif; ?>                                                                                                                                                       
    </head>

    <body class="sticky_menu <?php print implode(" ", JPath::urlArgs()); ?>">
        <!--<div id="preloader"></div>-->

        <!--layout-->

        <section id="status-messages"><?php print Theme::getFormattedScreenMessages(); ?></section>
            <?php if (isset($content)): ?>
                <?php print $content; ?>
            <?php endif; ?>

        <!--Adding Footer Scripts-->
        <?php if (isset($footer_scripts)): ?>
            <?= $footer_scripts; ?>
        <?php endif; ?>
        <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid="></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    </body>
</html>