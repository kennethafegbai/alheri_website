@extends('layout.admin')
@section('content')
<main id="main" class="main">
<section class="section">
  <div class="row">

    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Room Category</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="/admin/rooms/categories/{{$category->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Name</label>
              <input name="name" type="text" class="form-control" id="" value="{{$category->name}}">
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Description</label>
              <input type="text" name="desc" class="form-control" id=""  value="{{$category->desc}}">
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Price</label>
              <input type="text" name="price" class="form-control" id=""  value="{{$category->price}}">
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Image</label>
              <input type="file" name="image" class="form-control" id="">

              <img src="{{URL::asset('storage/' .$category->image)}}" alt="" width="300" height="200">

            </div>
            <div class="container1 pt-2">
                @php 
                  if(!empty($category->service)){
                      $services = explode(',', $category->service);
                  }else{
                      $services =[];
                  }
                @endphp
            <button class="add_form_field btn btn-primary">Add Service&nbsp; 
              <span style="font-size:16px; font-weight:bold;">+ </span>
            </button>
            @if(count($services)>0)
              @foreach($services as $service)
              <div class="pt-3"><input type="text" name="service[]" value="{{$service}}"/><a href="#" class="delete btn btn-danger">Delete</a></div>              @endforeach
              @else
              <div class="pt-3"><input type="text" name="service[]"></div>            
            @endif
            <!-- <div class="pt-3"><input type="text" name="service[]"></div> -->
          </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Save</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
<script src="{{URL::asset('assets/js/jquery-2.2.4.js')}}"></script>
<script>
  $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div class="pt-3"><input type="text" name="service[]"/><a href="#" class="delete btn btn-danger">Delete</a></div>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>
@endsection