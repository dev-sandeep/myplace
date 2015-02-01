

<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2014 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">SandeepG</a>. All Rights Reserved | Powered by sweia &reg;
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Faq</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <?php if(Session::isLoggedIn() == true): ?>
                    <li><a id="login" status="2" href="#">Logout!</a></li>
                    <?php else: ?>
                    <li><a id="login" status="1" href="#">Ola Sandy!</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->