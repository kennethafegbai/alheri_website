@extends('layout.admin')
@section('content')
<main id="main" class="main">
<section class="section">
  <div class="row">

    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Uploaded gallery image</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="/admin/galleries/{{$gallery->id}}" method="post" enctype="multipart/form-data">
          @csrf 
          @method('PATCH')
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Event Category</label>
              <select name="eventName" id=""class="form-control">
                <option {{$gallery->eventName == 'activities' ? 'selected':''}} value="activities">Activities</option>
                <option {{$gallery->eventName == 'event' ? 'selected':''}} value="event">Event</option>
                <option {{$gallery->eventName == 'rooms' ? 'selected':''}} value="rooms">Rooms</option>
              </select>            
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Image</label>
              <input name="image" type="file" class="form-control" id="">
              <br>
              <img src="{{URL::asset('storage/' .$gallery->image)}}" alt="" width="200" height="200">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
@endsection