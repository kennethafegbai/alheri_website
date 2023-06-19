@extends('layout.admin')
@section('content')
<main id="main" class="main">
<section class="section">
  <div class="row">

    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Upload gallery image</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="/admin/galleries" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Event Category</label>
              <select name="eventName" id=""class="form-control">
                <option value="activities">Activities</option>
                <option value="event">Event</option>
                <option value="rooms">Rooms</option>
              </select>
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Image</label>
              <input name="image" type="file" class="form-control" id="">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
@endsection