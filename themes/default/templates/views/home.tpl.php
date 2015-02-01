<section id="main-slider" class="no-margin padding-home">
    <div class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">Hi there ! This is Corlate, <br>Your online travel partner.</h1>
                                <h2 class="animation animated-item-2">Faster - Smoother - Comfortable</h2>
                                <!--<a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <!--<img src="images/slider/img1.png" class="img-responsive">-->
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--/.item-->

            <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">Use our flawless service to ignore the inconvenience due to last minute planning. </h1>
                                <h2 class="animation animated-item-2">Try our 24X7 Award winning Customer Support</h2>
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="images/slider/img2.png" class="img-responsive">
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--/.item-->

            <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">You decide to go,<br> We plan your journey</h1>
                                <h2 class="animation animated-item-2">Try our 24X7 Award winning Customer Support</h2>
                                
                            </div>
                        </div>
                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="images/slider/img3.png" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="fa fa-chevron-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="fa fa-chevron-right"></i>
    </a>
</section><!--/#main-slider-->

<section id="recent-works">
    <div class="container padding-home">
        <div class="center wow fadeInDown">
            <h2><i class="fa fa-search"></i> Search Places</h2>
            <p class="lead">Search the best places to stay across India at best prices.<br>with the best amenities nearby. </p>
        </div>

        <!-- Hotel Search form goes here -->
        <div class="search-hotel">
            <section id="contact-page">
                <div class="">
                    <div class="row contact-wrap"> 
                        <div class="status alert alert-success" style="display: none"></div>

                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                <label>State *</label>
                                <select class="form-control" id="state">
                                    <option value="0">Nothing Selected</option>
                                    <?= $state ?>
                                </select>
                            </div>         
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>City *</label>
                                <select class="form-control disabled" id="district">
                                    <option value="0">Nothing Selected</option>
                                </select>
                            </div>              
                            <div class="form-group text-right">
                                <button id="search" type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Search</button>
                            </div>
                        </div>

                    </div><!--/.row-->
                </div><!--/.container-->
            </section>
        </div><!--/.container-->
</section><!--/#recent-works-->

<section id="services" class="service-item">
    <div class="container padding-home search-res-place">
        <div class="center wow fadeInDown">
            <h2>Our Service</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="row">

            
            <div class="col-sm-6 col-md-4">
                <div class="media services-wrap wow fadeInDown">
                    <div class="pull-left">
                        <img class="img-responsive" src="images/services/services2.png">
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Fastest Booking</h3>
                        <p>Lorem ipsum dolor sit ame consectetur adipisicing elit</p>
                    </div>
                </div>
            </div>

            
            <div class="col-sm-6 col-md-4">
                <div class="media services-wrap wow fadeInDown">
                    <div class="pull-left">
                        <img class="img-responsive" src="images/services/services4.png">
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Trip Planner</h3>
                        <p>Lorem ipsum dolor sit ame consectetur adipisicing elit</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="media services-wrap wow fadeInDown">
                    <div class="pull-left">
                        <img class="img-responsive" src="images/services/services5.png">
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">Mobile Booking</h3>
                        <p>Lorem ipsum dolor sit ame consectetur adipisicing elit</p>
                    </div>
                </div>
            </div>

                                                            
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#services-->
<div id="map-view"></div>
<section id="middle">
    <div class="container padding-home">
        <div class="row">
            
            
            <div class="col-xs-12 col-sm-8 wow fadeInDown">
                <div class="tab-wrap"> 
                    <div class="media">
                        <div class="parrent pull-left">
                            <ul class="nav nav-tabs nav-stacked">
                                <li class=""><a href="#tab1" data-toggle="tab" class="analistic-01">Great Team</a></li>
                                <li class="active"><a href="#tab2" data-toggle="tab" class="analistic-02">Fast Service</a></li>
                                <li class=""><a href="#tab3" data-toggle="tab" class="tehnical">Amazing Customer Support</a></li>
                                <li class=""><a href="#tab4" data-toggle="tab" class="tehnical">Our Philosopy</a></li>
                                <li class=""><a href="#tab5" data-toggle="tab" class="tehnical">What We Do?</a></li>
                            </ul>
                        </div>

                        <div class="parrent media-body">
                            <div class="tab-content">
                                <div class="tab-pane fade" id="tab1">
                                    <div class="media">
                                        <div class="pull-left">
                                            <img class="img-responsive" src="images/tab2.png">
                                        </div>
                                        <div class="media-body">
                                            <h2>Adipisicing elit</h2>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade active in" id="tab2">
                                    <div class="media">
                                        <div class="pull-left">
                                            <img class="img-responsive" src="images/tab1.png">
                                        </div>
                                        <div class="media-body">
                                            <h2>Adipisicing elit</h2>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab3">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
                                </div>

                                <div class="tab-pane fade" id="tab4">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words</p>
                                </div>

                                <div class="tab-pane fade" id="tab5">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures,</p>
                                </div>
                            </div> <!--/.tab-content-->  
                        </div> <!--/.media-body--> 
                    </div> <!--/.media-->     
                </div><!--/.tab-wrap-->               
            </div><!--/.col-sm-6-->

            <div class="col-xs-12 col-sm-4 wow fadeInDown">
                <div class="testimonial">
                    <h2>Testimonials</h2>
                    <div class="media testimonial-inner">
                        <div class="pull-left">
                            <img class="img-responsive img-circle" src="images/testimonials1.png">
                        </div>
                        <div class="media-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                            <span><strong>-John Doe/</strong> Director of corlate.com</span>
                        </div>
                    </div>

                    <div class="media testimonial-inner">
                        <div class="pull-left">
                            <img class="img-responsive img-circle" src="images/testimonials1.png">
                        </div>
                        <div class="media-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                            <span><strong>-John Doe/</strong> Director of corlate.com</span>
                        </div>
                    </div>

                </div>
            </div>


        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#middle-->



<section id="partner">
    <div class="container padding-home">
        <div class="center wow fadeInDown">
            <h2>Our Partners</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>    

        <div class="partners">
            <ul>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="images/partners/partner2.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="images/partners/partner3.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="images/partners/partner4.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="images/partners/partner5.png"></a></li>
            </ul>
        </div>        
    </div><!--/.container-->
</section><!--/#partner-->

<section id="conatcat-info">
    <div class="container padding-home">
        <div class="row">
            <div class="col-sm-8">
                <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="pull-left">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="media-body">
                        <h2>Have a question or need a custom quote?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation +0123 456 70 80</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.container-->    
</section><!--/#conatcat-info-->