@extends('layout.main')
@section('content')
   <!--================Banner Area =================-->
   <section class="banner_area">
        <div class="container">
            <div class="banner_inner_content">
                <h3>Room Details</h3>
                <ul>
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/room">Rooms</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Search Room Area =================-->
    <section class="room_details_area">
        <div class="container">
            <div class="row room_details_inner">
                <div class="col-md-8">
                    <div class="room_details_content">
                        <div class="room_d_main_text">
                            <div class="room_details_img owl-carousel">
                                <div class="item">
                                    <img src="{{URL::asset('storage/' .$roomDetail->image)}}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{URL::asset('storage/' .$roomDetail->image)}}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{URL::asset('storage/' .$roomDetail->image)}}" alt="">
                                </div>
                            </div>
                            <a href="#">
                                <h4>{{$roomDetail->name}} <span>rooms</span></h4>
                            </a>
                            <h5><s>N</s>{{$roomDetail->price}} <span>/ Night</span></h5>
                            <p>{{$roomDetail->desc}}</p>
                        </div>
                        <div class="room_service_list">
                            <h3 class="room_d_title">Room services</h3>
                            <div class="row room_service_list_inner">
                                <div class="col-sm-5 col-md-offset-right-1">
                                    <div class="resot_list">
                                        @php 
                                            if(!empty($roomDetail->service)){
                                                $services = explode(',', $roomDetail->service);
                                            }else{
                                                $services =[];
                                            }
                                         @endphp
                                        <ul>
                                           @if(count($services)>0)
                                            @foreach($services as $service)
                                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>{{$service}}</a></li>
                                            @endforeach
                                            @else
                                            <li>No service available</li>
                                           @endif
                                        </ul>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-5 col-md-offset-right-1">
                                    <div class="resot_list">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>private balcony</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>good room service</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>flat screen tv</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>fully AC</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>mountain view</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>free pick & drop facilies</a></li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="search_right_sidebar">
                        <div class="book_room_area">
                            <form action="{{ route('paystack.post') }}" method="POST" id="paystack-form">
                            @csrf
                            <div class="book_room_box">
                                <div class="book_table_item">
                                    <h3>Fill in details</h3>
                                </div>
                                <div class="book_table_item">
                                    <div class="form-group">
                                        <input class="form-control" name="customer_name" type="text" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="book_table_item">
                                    <div class="form-group">
                                        <input class="form-control" name="customer_tel" type="text" placeholder="Your Tel">
                                    </div>
                                </div>
                                <div class="book_table_item">
                                    <div class="form-group">
                                        <input class="form-control" name="customer_email" type="email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="book_table_item">
                                    <div class="form-group">
                                        <input class="form-control" name="customer_address" type="text" placeholder="Your address">
                                    </div>
                                </div>
                                <div class="book_table_item">
                                    <div class="form-group">
                                        <label for="">Arrival Date</label>
                                        <input class="form-control" name="arrival" type="date" value="" placeholder="Arrival Date">
                                        <!-- <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span> -->
                                    </div>
                                </div>
                                <div class="book_table_item">
                                    <div class="form-group">
                                    <label for="">Departure Date</label>
                                        <input class="form-control" name="departure" type="date" value="" placeholder="Departure Date">
                                        <!-- <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span> -->
                                    </div>
                                </div>
                                <div class="book_table_item">
                                    <select class="selectpicker" name="persons">
                                    <option>Number of persons</option>
                                        @for($i=1; $i<=5; $i++)
                                            <option>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="book_table_item">
                                    <select class="selectpicker" name="room_id">
                                    <option>Select room</option>
                                       @foreach($available_rooms as $available)
                                            <option value="{{$available->id}}">{{$available->number}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="book_table_item">
                                    <input type="hidden" name="category_id" value={{$roomDetail->id}}>
                                    <input type="hidden" name="amount" value={{$roomDetail->price}}>
                                    <button type="submit" class="book_now_btn" href="#">Proceed</button>
                                </div>
                            </div>
                            </form>

                        </div>
                        @include('inc.flash')                                                                                   
                        <!-- <div class="book_now_button">
                            <a class="book_now_btn_black" href="#">Book now</a>
                        </div> -->
                        <!-- <div class="your_book_box">
                            <h4>Your book</h4>
                            <h5>your cart is empty</h5>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Search Room Area =================-->
@endsection