@extends('layout.admin')
@section('content')
<main id="main" class="main">
<section class="section">
<a href="/admin/galleries/create" class="btn btn-primary pb-2 mb-3" href="">Add Gallery</a>
<div class="row">
@if(count($galleries)>0)
@foreach($galleries as $gallery)
<div class="col-lg-3">
<!-- Card with an image on top -->
<div class="card">
  <img src="{{URL::asset('storage/' .$gallery->image)}}" class="card-img-top" alt="">
  <div class="card-body">
    <!-- <h5 class="card-title">{{$gallery->eventName}}</h5> -->
    <a href="#" class="card-text p-5 text-danger"><i class="bi bi-trash"></i> Delete</a>
    <a href="/admin/galleries/{{$gallery->id}}" class="card-text"><i class="bi bi-pencil"></i> Edit</a>

  </div>
</div><!-- End Card with an image on top -->
</div>
@endforeach
@else 
<p>No Gallery added</p>
@endif

  </div>
  </section>

  </main><!-- End #main -->
@endsection