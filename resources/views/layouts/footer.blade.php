
    <!--=== Footer v4 ===-->
    <div id="footer-v4" class="footer-v4">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <!-- About -->
                    <div class="col-md-4 md-margin-bottom-40">
                        <a href="/"><img class="footer-logo" src="{{ url('/') }}/assets/img/logo-bw.png" alt=""></a>
                        <p>CustomerFirst is a simple platform for small business owners to track, sell and engage with their customers.</p>
                        <br>
                        <ul class="list-unstyled address-list margin-bottom-20">
                            <li><i class="fa fa-angle-right"></i>Dar es salaam, Tanzania</li>
                            <li><i class="fa fa-angle-right"></i>Phone: +255 756 056007</li>
                            <li><i class="fa fa-angle-right"></i>Email: customerfirst@martian4x.com</li>
                        </ul>

                        <ul class="list-inline shop-social">
                            <li><a href="#"><i class="fb rounded-1x fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="tw rounded-1x fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="gp rounded-1x fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="yt rounded-1x fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    <!-- End About -->

                    <!-- Simple List -->
                    <div class="col-md-2 col-sm-3">
                        <div class="row">
                            <div class="col-sm-12 col-xs-6">
                                <h2 class="thumb-headline">Products Types</h2>
                                <ul class="list-unstyled simple-list margin-bottom-20">
                                    <li><a href="#">Agriculture</a></li>
                                    <li><a href="#">Textile</a></li>
                                    <li><a href="#">Clothing </a></li>
                                    <li><a href="#">Craft</a></li>
                                    <li><a href="#">Minerals</a></li>
                                </ul>
                            </div>

                            <div class="col-sm-12 col-xs-6">
                                <h2 class="thumb-headline">Quick Links</h2>
                                <ul class="list-unstyled simple-list">
                                    <li><a href="/pages/about_us">About Us</a></li>
                                    <li><a href="/pages/contact">Contact Us</a></li>
                                    <li><a href="/pages/report_abuse">Report Abuse </a></li>
                                    <li><a href="/pages/report_bug">Report Problem </a></li>
                                    <li><a href="/pages/privacy_policy">Privacy Policy </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-3">
                        <div class="row">
                            <div class="col-sm-12 col-xs-6">
                                <h2 class="thumb-headline">Help and Training</h2>
                                <ul class="list-unstyled simple-list margin-bottom-20">
                                    <li><a href="/pages/help">Help</a></li>
                                    <li><a href="/pages/tos">Terms</a></li>
                                    <li><a href="/pages/faq">FAQ</a></li>
                                    <li><a href="/pages/payment_info">Making Payment</a></li>
                                    <li><a href="/pages/training">Training</a></li>
                                </ul>
                            </div>

                            <div class="col-sm-12 col-xs-6">
                                <h2 class="thumb-headline">Sellers</h2>
                                <ul class="list-unstyled simple-list">
                                    <li><a href="/manage/supplier">Seller Home</a></li>
                                    <li><a href="/pages/sellers">Sellers List</a></li>
                                    <li><a href="/pages/sellers">Sellers Info</a></li>
                                    <li><a href="/pages/exporting_importing">Exporting/Importing</a></li>
                                    <li><a href="/pages/consultation">Consultation Service</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-3">
                        <div class="row">
                            <h2 class="thumb-headline">Exporting</h2>

                        </div>
                    </div>

                    <div class="col-md-2 col-sm-3">
                        <div class="row">
                            <h2 class="thumb-headline">Importing</h2>

                        </div>
                    </div>
                    <!-- End Simple List -->
                </div>
            </div><!--/end continer-->
        </div><!--/footer-->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p>
                        {{ date('Y') }} &copy; All rights reserved. <a href="/">sellyou.com</a>. Selling and Customer Relation Platform | Powered by <a href="http://bahariweb.com" target="_blank">BahariWeb.com</a> | <a href="#" data-toggle="modal" data-target=".bs-terms-modal-lg">Terms of Service</a>
                    </p>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline sponsors-icons pull-right">
                            <li><i class="fa fa-cc-paypal"></i></li>
                            <li><i class="fa fa-cc-visa"></i></li>
                            <li><i class="fa fa-cc-mastercard"></i></li>
                            <li><i class="fa fa-cc-discover"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--/copyright-->
    </div>
    <!--=== End Footer v4 ===-->

@include('modals.terms')