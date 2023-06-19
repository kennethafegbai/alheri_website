@extends('layout.admin')
@section('content')
<main id="main" class="main">
<section class="section">
  <div class="row">

    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Create Reservation</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="/admin/reservations" method="post">
          @csrf
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Customer name</label>
              <input type="text" class="form-control" id="" name="customer_name">
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Customer Telephone</label>
              <input type="text" class="form-control" id="" name="customer_tel">
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Customer email</label>
              <input type="text" class="form-control" id="" name="customer_email">
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Customer address</label>
              <input type="text" class="form-control" id="" name="customer_address">
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">How many persons?</label>
              <input type="text" class="form-control" id="" name="persons">
            </div>
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Room Category</label>
              <select class="form-control" id="category_id" name="category_id">
                <option value="">Select</option>
                @foreach($categories as $category)
                <option data-category_id="{{$category->id}}" value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Room Number</label>
              <select class="form-control" id="room_id" name="room_id">
                <option value="">Select</option>
              </select>
            </div>

            <div class="col-12">
              <label for="inputEmail4" class="form-label">Amount</label>
              <input type="text" class="form-control" id="" name="amount">
            </div>

            <div class="col-12">
              <label for="inputEmail4" class="form-label">Invoice Number</label>
              <input type="text" readonly class="form-control" id="" name="invoice" value="{{time()}}">
            </div>

            <div class="col-12">
              <label for="inputEmail4" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="inputEmail4" name="arrival">
            </div>

            <div class="col-12">
              <label for="inputEmail4" class="form-label">End Date</label>
              <input type="date" class="form-control" id="inputEmail4" name="departure">
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Book now</button>
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
    $('#category_id').change(function(){
    let category_id  = $(this).children(":selected").attr("value");
    $.ajax({
    type:'get',
    dataType:'json',
    url:'/admin/categories/rooms',
    data:{'category_id':category_id},
    success:function(response){
      let rooms = '';
      $('#room_id').find('option').remove().end();
      console.log(response);
      if(response.length > 0){
        $.each(response, function(index, value){
          rooms += `<option value="${value.id}">${value.number}</option>`;
        });
      }else{
        rooms += `<option>No data</option>`;
      }
      $('#room_id').append(rooms);
    }
    });

    });
  </script>

@endsection