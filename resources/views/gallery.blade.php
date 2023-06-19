@extends('layout.main')
@section('content')
 <!--================Banner Area =================-->
 <section class="banner_area">
        <div class="container">
            <div class="banner_inner_content">
                <h3>Our Gallery</h3>
                <ul>
                    <li class="active"><a href="/">Home</a></li>
                    <li>
                        <a href="/gallery">Gallery</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================End Banner Area =================-->
    <section class="grid_gallery_area">
        <div class="container">
            <div class="grid_gallery_inner">
                <ul class="gallery_filter">
                    <li class="active" data-filter="*"><a href="#">All</a></li>
                    <li data-filter=".rooms"><a href="#">Rooms</a></li>
                    <li data-filter=".activites"><a href="#">Activites</a></li>
                    <li data-filter=".event"><a href="#">Events</a></li>
                </ul>
                <div class="row grid_gallery_item_inner imageGallery1">
                    @foreach($galleries as $gallery)
                    <div class="col-md-4 col-xs-6 {{$gallery->eventName}}">
                        <div class="grid_gallery_item">
                            <img src="{{URL::asset('storage/' .$gallery->image)}}" alt="">
                            <div class="resort_g_hover">
                                <div class="resort_hover_inner">
                                    <a class="light" href="{{URL::asset('storage/' .$gallery->image)}}"><i class="fa fa-expand" aria-hidden="true"></i></a>
                                    <h5>Our Gallery</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                       
                </div>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

@endsection