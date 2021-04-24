<footer class="site-footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="foot-about">
                        <h1 style="color:#fd7e14;">No Food Waste</h1>
                        {{--<h2><a class="foot-logo" href="#"><img src="{{asset('frontEnd/images')}}/foot-logo.png" alt=""></a></h2>--}}

                        <p>Waste No Food is a [non-profit organization] that provides a web-based food rescue "marketplace" allowing excess food to be donated from the food service industry to qualified charities that work with the needy</p>

                        <ul class="d-flex flex-wrap align-items-center">
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            {{--<li><a href="#"><i class="fa fa-dribbble"></i></a></li>--}}
                            {{--<li><a href="#"><i class="fa fa-behance"></i></a></li>--}}
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div><!-- .foot-about -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-6 mt-5 mt-md-0">
                    <div class="foot-contact">
                        <h2>Contact</h2>

                        <ul>
                            <li><i class="fa fa-phone"></i><span>01711556677</span></li>
                            <li><i class="fa fa-envelope"></i><span>wastenofood@gmail.com</span></li>
                            <li><i class="fa fa-map-marker"></i><span>Mu,Sylhet</span></li>
                        </ul>
                    </div><!-- .foot-contact -->

                    <div class="subscribe-form">
                        <form class="d-flex flex-wrap align-items-center" action="{{ route('subscribe') }}" method="post">
                            @csrf
                            <input type="email" placeholder="Your email" name="email">
                            <input type="submit" value="send">
                        </form><!-- .flex -->
                    </div><!-- .search-widget -->

                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .footer-widgets -->

    <div class="footer-bar">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="m-0">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved..
                </div><!-- .col-12 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .footer-bar -->
</footer>
<!-- .site-footer -->