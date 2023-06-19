@extends('layout.admin')
@section('content')
<main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
              <div class="card-header">
                  <a href="/admin/rooms/create" class="btn btn-primary" href="">Add Room</a>
              </div>
            <div class="card-body">
              <h5 class="card-title">All Rooms</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date added</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($rooms as $room)
                  <tr>
                    <th scope="row">{{$room->id}}</th>
                    <td>{{$room->name}}</td>
                    <td>{{$room->number}}</td>
                    <td>{{$room->status ? 'active':'available'}}</td>
                    <td>{{$room->created_at}}</td>
                    <td>
                         <a href="/admin/rooms/{{$room->id}}"><i class="bi bi-pencil"></i></a>
                    </td>

                    <td>
                         <a href="#"><i class="bi bi-trash"></i></a>
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
@endsection