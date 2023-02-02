<footer class="section footer-variant-2 footer-modern context-dark">
    <div class="footer-variant-2-content">
        <div class="container">
            <div class="row row-40 justify-content-between">
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="oh-desktop">
                        <div class="wow slideInRight" data-wow-delay="0s">
                            <div class="footer-brand">
                                <!--Brand--><a class="brand" href="{{ route('main.home') }}"><img class="brand-logo-dark" src="{{ asset(isset(settings()->main_logo)?settings()->main_logo:'') }}" alt="" width="230" height="62" /><img class="brand-logo-light" src="{{ asset(isset(settings()->main_logo)?settings()->main_logo:'') }}" alt="" width="230" height="62" /></a>
                            </div>
                            <p>
                                {{ isset(settings()->decription)?settings()->decription:'' }}
                            </p>
                            <ul class="footer-contacts d-inline-block d-md-block">
                                <li>
                                    <div class="unit unit-spacing-xs">
                                        <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                                        <div class="unit-body">
                                            @isset(contact_us()->phone)
                                                @foreach (explode(",", contact_us()->phone) as $phone)
                                                    <p class="box-contacts-link"><a href="tel:{{ $phone }}">{{ $phone }}</a></p>
                                                @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit unit-spacing-xs">
                                        <div class="unit-left"><span class="icon far fa-envelope"></span></div>
                                        <div class="unit-body">
                                            <p> {{ isset(contact_us()->email)?contact_us()->email:'' }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit unit-spacing-xs">
                                        <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                                        <div class="unit-body"><a class="link-location" href="{{ isset(contact_us()->address)?contact_us()->address:'' }}">{{ isset(contact_us()->address)?contact_us()->address:'' }}</a></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="oh-desktop">
                        <div class="inset-top-18 wow slideInDown" data-wow-delay="0s">
                            <h5 class="text-spacing-75">Let's Stay Connected</h5>
                            <p>Be the first to know about our exciting offers.</p>
                            <form method="post" action="">
                                @csrf
                                <div class="form-wrap">
                                    <input class="form-input" id="subscribe-form-5-email" type="email" name="email" required>
                                    @if($errors->any())

                                        <h6 class="pt-2 bg-info text-danger ">{{ implode('', $errors->all(':message')) }}</h6>

                                    @endif
                                    <label class="form-label" for="subscribe-form-5-email">Enter Your E-mail</label>
                                </div>
                                <button class="button button-block button-secondary button-ujarak" type="submit">Subscribe</button>
                            </form>
                            <div class="group-lg group-middle">
                                <p class="footer-social-list-title">Follow Us</p>
                                <div>
                                    <ul class="list-inline list-inline-xs footer-social-list-2">
                                        @isset(settings()->fb_link)
                                            <li><a class="icon fa fa-facebook" href="{{ settings()->fb_link }}"></a></li>
                                        @endisset
                                        @isset(settings()->in_link)
                                            <li><a class="icon fa fa-linkedin-square" href="{{ settings()->fb_link }}"></a></li>
                                        @endisset
                                        @isset(settings()->insta_link)
                                            <li><a class="icon fa fa-instagram" href="{{ settings()->insta_link }}"></a></li>
                                        @endisset
                                        @isset(settings()->youtube_link)
                                            <li><a class="icon fa fa-youtube" href="{{ settings()->youtube_link }}"></a></li>
                                        @endisset
                                        @isset(settings()->twitter_link)
                                            <li><a class="icon fa fa-twitter" href="{{ settings()->twitter_link }}"></a></li>
                                        @endisset
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3">
                    <div class="oh-desktop">
                        <div class="inset-top-18 wow slideInLeft" data-wow-delay="0s">
                            <h5 class="text-spacing-75">Gallery</h5>
                            <div class="row row-10 gutters-10">



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-variant-2-bottom-panel">
        <div class="container">
            <!-- Rights-->
            <div class="group-sm group-sm-justify">
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span> <span>Italiano</span>. All rights reserved.
                </p>
                <p class="rights"><a href="">Privacy Policy.</a></p>
            </div>
        </div>
    </div>
</footer>
