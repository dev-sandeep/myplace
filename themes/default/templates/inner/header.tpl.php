<header id="header">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-4">
                    <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
                </div>
                <div class="col-sm-6 col-xs-8">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                        <div class="search">
                            <form role="form">
                                <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->
    </div><!--/.top-bar-->

    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?= JPath::fullUrl("home") ?>">Home</a></li>
                    <li><a href="<?= JPath::fullUrl("page/aboutus") ?>">About Us</a></li>
                    <li><a href="<?= JPath::fullUrl("page/services") ?>">Services</a></li>
                    <li><a href="<?= JPath::fullUrl("page/portfolio") ?>">Portfolio</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog-item.html">Blog Single</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="shortcodes.html">Shortcodes</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= JPath::fullUrl("blog/view") ?>">Blog</a></li> 
                    <li><a href="<?= JPath::fullUrl("contact/view") ?>">Contact</a></li>                        
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->

<!-- modal box -->
<div class="modal m_top_200" id="login-modalBox">
    <div class="container modal-style">
        <form method="post">
            <div class="modal-header t_align_c">
                <h2 style="color: #0073b2">Wanna write blog?</h2>
                <small>Fill in your credentials</small>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="email" placeholder="email" class="form-control" name="email" required>
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="password" placeholder="password" class="form-control" name="password" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-danger" value="login-submit"><i class="fa fa-check-circle-o"></i>&nbsp;&nbsp;Log in</button>
            </div>
        </form>
    </div>
</div>
