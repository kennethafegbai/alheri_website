@extends('layout.main')
@section('content')
 <!--================Banner Area =================-->
 <section class="banner_area">
        <div class="container">
            <div class="banner_inner_content">
                <h3>Rooms</h3>
                <ul>
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/room">Rooms</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Explor Room Area =================-->
    <section class="explor_room_area explore_room_list">
        <div class="container">
            <div class="explor_title row m0">
                <div class="left_ex_title">
                    <h2>Explor Our <span>rooms</span></h2>
                    <p>choose room according to budget</p>
                </div>
            </div>
            <div class="row explor_room_item_inner">
                @if(count($categories)>0)
                @foreach($categories as $category)
                <div class="col-md-4 col-sm-6">
                    <div class="explor_item">
                        <a href="/room/{{$category->id}}" class="room_image">
                            <img src="{{URL::asset('storage/'.$category->image)}}" alt="" width=400 height=300>
                        </a>
                        <div class="explor_text">
                            <a href="/room/{{$category->id}}">
                                <h4>{{$category->name}} <span>rooms</span></h4>
                            </a>
                            <ul>
                                <li class="text-info p-3">Total <a href="#">{{$category->total}}</a></li>
                                <li class="text-danger p-3">Active <a href="#">{{$category->active}}</a></li>
                                <li class="text-success p-3">Inactive <a href="#">{{$category->total - $category->active}}</a></li>
                            </ul>
                            <div class="explor_footer">
                                <div class="pull-left">
                                    <h3><s>N</s>{{$category->price}} <span>/ Night</span></h3>
                                </div>
                                <div class="pull-right">
                                    <a class="book_now_btn" href="/room/{{$category->id}}">View details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
              @endif
            </div>
            <!-- <nav aria-label="Page navigation" class="room_pagination">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </nav> -->
            @if(count($categories)>0)
                {{$category->links}}
            @endif
        </div>
    </section>
    <!--================End Explor Room Area =================-->
@endsection