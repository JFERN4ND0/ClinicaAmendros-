@extends('Home')

@section('datos')
<div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
    <!-- <form id="general-info" class="section general-info" action="" method="POST"> -->
    <form class="user" action="{{ route('data-update', ['id' => auth()->user()->id])}} " method="POST" enctype="multipart/form-data">
        <!-- {{ route('data-update', ['id' => auth()->user()->id])}} -->
        @method('PATCH')
        @csrf
        @error('message')
        <h6 class='alert alert-success'> {{ $message }} </h6>
        @enderror
        <div class="info">
            <h6 class="">General Information</h6>
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <div class="row">
                        <div class="upload mt-4 pr-md-4">
                            <input type="file" id="input-file-max-fs" class="dropify" data-default-file="assets/img/200x200.jpg" data-max-file-size="2M" name="file" accept="image/*" />
                            <p class="mt-2">
                                <i class="flaticon-cloud-upload mr-1"></i>
                                Upload Picture
                            </p>
                        </div>
                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                            <div class="form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" class="form-control mb-4" name='name' value="{{auth()->user()->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profession">Email</label>
                                    <input type="text" class="form-control mb-4" name='email' value="{{auth()->user()->email}}">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-secondary w-100">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection