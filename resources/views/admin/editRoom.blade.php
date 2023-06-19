@extends('layout.admin')
@section('content')
<main id="main" class="main">
<section class="section">
  <div class="row">

    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Room</h5>

           <!-- Vertical Form -->
        <form class="row g-3" method="post" action="/admin/rooms/{{$room->id}}">
          @csrf
          @method('PATCH')
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Category</label>
              <select class="form-control" id="" name="category_id">
                <option value="">Select</option>
                <option selected value="{{$room->category_id}}">{{$room->name}}</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Number</label>
              <input type="text" class="form-control" id="inputEmail4" name="number" value="{{$room->number}}">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- Vertical Form -->
        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
@endsection