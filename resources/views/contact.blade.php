@extends('layout.main')
@section('content')
  <!--================Banner Area =================-->
  <section class="banner_area">
        <div class="container">
            <div class="banner_inner_content">
                <h3>Contact Us</h3>
                <ul>
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/contact">Contact us</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Get Contact Area =================-->
    <section class="get_contact_area">
        <div class="container">
            <div class="row get_contact_inner">
                <div class="col-md-6">
                    <div class="left_ex_title">
                        <h2>get in <span>touch</span></h2>
                    </div>
                    @if($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    </div>
                    @endif
                    <form class="contact_us_form row m0" action="/customer-inquiry" method="post" id="contactForm">
                    @csrf
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="What do you want to talk about?">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Tell us in details"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" value="submit" class="btn submit_btn form-control">submit now</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="right_contact_info">
                        <div class="contact_info_title">
                            <h3>Contact info</h3>
                            <p>Have any Queries? Let us know. We will clear it for you at the best.</p>
                        </div>
                        <div class="contact_info_list">
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Office</h4>
                                    <p>{{$setting->address}}</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Email</h4>
                                    <a href="#">{{$setting->email}}</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Phone</h4>
                                    <a href="#">{{$setting->phone}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Get Contact Area =================-->

@endsection