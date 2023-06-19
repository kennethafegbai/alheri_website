@extends('layout.admin')
@section('content')
<main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                  <a href="/admin/rooms/categories/create" class="btn btn-primary" href="">Add Category</a>
              </div>
            <div class="card-body">
              <h5 class="card-title">All Room Categories</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Total rooms/active/free</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                  </tr>
                </thead>
                <tbody>
                    @if(count($categories)>0)
                    @foreach($categories as $category)
                  <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td><img src="{{URL::asset('storage/' .$category->image)}}" width=50 height=50></td>
                    <td>345/45/6</td>
                    <td>
                         <a href="/admin/rooms/categories/{{$category->id}}"><i class="bi bi-pencil"></i></a>
                    </td>

                    <td>
                         <a href="#"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  @endif
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