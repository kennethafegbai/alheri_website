@extends('layout.main')
@section('content')
 <!--================Banner Area =================-->
 <section class="banner_area">
        <div class="container">
            <div class="banner_inner_content">
                <h3>About Us</h3>
                <ul>
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/about">About us</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Resort Story Area =================-->
    <section class="introduction_area resort_story_area">
        <div class="container">
            <div class="row introduction_inner">
                <div class="col-md-5">
                    <a href="#" class="introduction_img">
                        <img src="assets/img/resort-story-img.jpg" alt="">
                    </a>
                </div>
                <div class="col-md-7">
                    <div class="introduction_left_text">
                        <div class="resort_title">
                            <h2>our Hotel <span>story</span></h2>
                            <h5>give best service to our customers</h5>
                        </div>
                        <h4>We are Available for business</h4>
                        <p>It is our pleasure to introduce to you Alheri Suites & Hospitality. 
                            Alheri Suites & Hospitality Ibadan is a Three- Star hotel where we have redefined customer’s satisfaction. 
                            The hotel is designed to give every guest a taste of royalty and a desired to return at all times.</p>
                        <p>Alheri Suites & Hospitality is a place of relaxation and lodging with different categories of 
                            tastefully-furnished and well maintained rooms and suites begins from our prestigious and unique Canadian Suites down to the England Deluxe Suites. 
                            The hotel is located in a serene environment and it is of a world standard.</p>
                        <a class="about_btn_b" href="#">contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Resort Story Area =================-->

    <!--================Choose Resot Area =================-->
    <section class="choose_resot_area">
        <div class="container">
            <div class="center_title">
                <h2>why choose our <span>Hotel</span></h2>
                <p>In recognition of the need for quality delivery of service, ensuring both internal and external well-being of all our guests/clients and 
                    to strengthen Hotel Business in the ancient city of Ibadan, it is the wish of Alheri Suites& Hospitality to identify and render you a 
                    taste of Royalty in suitable, relax and rejuvenate environment.</p>
            </div>
            <div class="row choose_resot_inner">
                <div class="col-md-5">
                    <div class="resot_list">
                        <ul>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>24 hours Electricity</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>VIP bar</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Executive Lounge</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Restaurant</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Barbecue Garden</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Free Wi-Fi</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>24 hours CCTV Camera</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Adequate and Maximum Security</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Pool Bar</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Executive Bar</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Laundry</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Free car wash.</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="choose_resot_slider owl-carousel">
                        <div class="item">
                            <img src="assets/img/resot/resot-1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="assets/img/resot/resot-1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="assets/img/resot/resot-1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Choose Resot Area =================-->
@endsection