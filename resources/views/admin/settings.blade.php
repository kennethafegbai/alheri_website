@extends('layout.admin')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Profile settings</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
      <li class="breadcrumb-item">Admin</li>
      <li class="breadcrumb-item active">Settings</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-12">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#mail-setting">Configuration Settings</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form method="POST" action="/admin/settings" enctype="multipart/form-data">
              @csrf 
              @method('PUT')
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Logo</label>
                  <div class="col-md-8 col-lg-9">
                    <img src="/admin/assets/img/{{$setting->logo}}" alt="Profile">
                    <div class="pt-2">
                      <!-- <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                      <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                   <input type="file" name="logo" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Businness name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="name" type="text" class="form-control" id="fullName" value="{{$setting->name}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="address" type="text" class="form-control" id="Address" value="{{$setting->address}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="Phone" value="{{$setting->phone}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="{{$setting->email}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="twitter" type="text" class="form-control" id="Twitter" value="{{$setting->twitter}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="facebook" type="text" class="form-control" id="Facebook" value="{{$setting->facebook}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="instagram" type="text" class="form-control" id="Instagram" value="{{$setting->instagram}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="linkedin" type="text" class="form-control" id="Linkedin" value="{{$setting->linkedin}}">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>


            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form method="POST" action="/password-change">
                @csrf  
                @method('PATCH')
                <div class="row mb-3">
                  <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="current_password" type="password" class="form-control" id="current_password">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="Password">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>



            <div class="tab-pane fade pt-3" id="mail-setting">
              <!-- Change Password Form -->
              <form action="{{url('/settings/config')}}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label for="" class="col-md-4 col-lg-3 col-form-label">Mail Host</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="host" type="text" class="form-control" id="" value="{{config('app.mail_host')}}" >
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="" class="col-md-4 col-lg-3 col-form-label">Mail port</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="port" type="text" class="form-control" id="" value="{{config('app.mail_port')}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="" class="col-md-4 col-lg-3 col-form-label">Email Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="username" type="text" class="form-control" id="" value="{{config('app.mail_username')}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="" class="col-md-4 col-lg-3 col-form-label">Email Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="renewPassword"value="{{config('app.mail_password')}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="" class="col-md-4 col-lg-3 col-form-label">Sender Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="from_address" type="text" class="form-control" id="" value="{{config('app.mail_from_address')}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="" class="col-md-4 col-lg-3 col-form-label">Sender Name</label>
                  <div class="col-md-8 col-lg-9">
                   <input name="from_name" type="text" class="form-control" id="" value="{{config('app.mail_from_name')}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="" class="col-md-4 col-lg-3 col-form-label">Encryption</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="encryption" type="text" class="form-control" id=""value="{{config('app.mail_encryption')}}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="" class="col-md-4 col-lg-3 col-form-label">Paystack Public key</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="paystack_public_key" type="text" class="form-control" id="" value="{{config('app.paystack_public_key')}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-md-4 col-lg-3 col-form-label">Paystack Secret key</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="paystack_secret_key" type="text" class="form-control" id="" value="{{config('app.paystack_secret_key')}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-md-4 col-lg-3 col-form-label">Paystack regitered email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="paystack_username" type="text" class="form-control" id="" value="{{config('app.paystack_username')}}">
                  </div>
              </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form><!-- End mail setting -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->
@endsection