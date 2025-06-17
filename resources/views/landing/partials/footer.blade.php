<!-- START OF FOOTER -->
@php
    $settings = \App\Helpers\SettingsHelper::getPublic();
    $data = [];

    foreach ($settings as $setting) {
        switch ($setting->key) {
            case 'social_facebook':
                $data['social_facebook'] = $setting->value;
                break;
            case 'social_twitter':
                $data['social_twitter'] = $setting->value;
                break;
            case 'social_instagram':
                $data['social_instagram'] = $setting->value;
                break;
            case 'social_linkedin':
                $data['social_linkedin'] = $setting->value;
                break;
            case 'social_youtube':
                $data['social_youtube'] = $setting->value;
                break;
            case 'website_logo':
                $data['website_logo'] = $setting->value;
                break;
            case 'contact_email':
                $data['contact_email'] = $setting->value;
                break;
            case 'contact_phone':
                $data['contact_phone'] = $setting->value;
                break;
            case 'contact_address':
                $data['contact_address'] = $setting->value;
                break;
        }
    }
@endphp
<!--Start footer area-->
<footer class="footer-area">
    <div class="footer">
        <div class="container">
            <div class="row">
                <!--Start single footer widget-->
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 wow animated fadeInUp" data-wow-delay="0.3s">
                    <div class="single-footer-widget">
                        <div class="our-company-info">
                            <div class="footer-logo">
                                <a href="index.html"><img src="assets/images/footer/footer-logo.png" alt="Awesome Footer Logo" title="Logo"></a>
                            </div>
                            <div class="text">
                                <p>Proin tempus, enim lobortis placerat porta, libero mauris feugiat magna, ut
                                    lobortis justo tortor a ipsum. Proin luctus posuere eros porttitor euismod.
                                    Praesent pulvinar.</p>
                            </div>
                            <div class="footer-social-links">
                                <ul class="social-links-style1">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End single footer widget-->
                <!--Start single footer widget-->
                <div class="col-xl-4 col-lg-4 col-md-9 col-sm-12 wow animated fadeInUp" data-wow-delay="0.5s">
                    <div class="single-footer-widget margin50-0">
                        <div class="title">
                            <h3>Information</h3>
                        </div>
                        <div class="pages-box">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <ul class="page-links">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Departments</a></li>
                                        <li><a href="#">Timetable</a></li>
                                        <li><a href="#">Why Us</a></li>
                                        <li><a href="#">Specilaties</a></li>
                                    </ul>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <ul class="page-links">
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Departments</a></li>
                                        <li><a href="#">Timetable</a></li>
                                        <li><a href="#">Why Us</a></li>
                                        <li><a href="#">Specilaties</a></li>
                                        <li><a href="#">Retail</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End single footer widget-->
                <!--Start single footer widget-->
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 wow animated fadeInUp" data-wow-delay="0.7s">
                    <div class="single-footer-widget">
                        <div class="twitter-feed-box">
                            <h3><a href="#">Etiam sapien tortor, dictum</a></h3>
                            <span>July 21, 2018 10:00 AM</span>
                            <div class="border-box"></div>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elieiusmod tempor incididunt
                                    ut labore et dolore magn aliqua. Ut enim ad minim veniam.</p>
                            </div>
                            <div class="bottom">
                                <div class="comments">
                                    <a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i>2 comments</a>
                                </div>
                                <div class="twitter-icon">
                                    <span class="flaticon-twitter-logo-shape"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End single footer widget-->
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="outer-box">
                <div class="copyright-text">
                    <p>Copyright© All Rights Reserved <a href="#">RinBuild.</a></p>
                </div>
                <div class="footer-menu">
                    <ul>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Refund policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End footer area-->
