@extends('layout.admin')
@section('content')
<main id="main" class="main">
    <section class="section">
    <a href="/admin/reserves/create" class="btn btn-primary float-end" href="">Book room</a>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Reservations</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Room</th>
                    <th scope="col">Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Available</th>
                    <th scope="col">Arrival</th>
                    <th scope="col">Departure</th>
                    <th scope="col">Check in/out</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($reserves as $reserve)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$reserve->customer_name}}</td>
                    <td>{{$reserve->customer_email}} <span>{{$reserve->customer_tel}}</span></td>
                    <td>{{$reserve->category}}</td>
                    <td>{{$reserve->room}}</td>
                    <td>paid</td>
                    <td>
                     <input class="{{$reserve->status ? 'btn btn-danger':'btn btn-success'}}" type="button" value="{{$reserve->status ? 'Active':'Not active'}}">
                    </td>
                    <td>{{$reserve->arrival}}</td>
                    <td>{{$reserve->departure}}</td>

                    <td>
                          <input data-id="{{$reserve->id}}" class="form-check-input reserveToggle" type="checkbox" id="check{{$reserve->id}}" {{$reserve->status ? 'checked':''}} />
                    
                    </td>
                    <td>
                         <a href="/admin/reservations/{{$reserve->id}}"><i class="bi bi-pencil"></i></a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->

<script src="{{URL::asset('assets/js/jquery-2.2.4.js')}}"></script>
<script>   
    $('tbody').on('click', '.reserveToggle', function(){
    let id = $(this).data('id');
    let status = $(this).prop('checked') == true ? 1 : 0;
    $.ajax({
    type:'get',
    dataType:'json',
    url:'/checkin-out',
    data:{'id':id, 'status':status},
    success:function(response){
      console.log(response.message);
      window.location.reload();
    }
    });

    });
  </script>
@endsection
