@extends('./Home')

@section('conteiner-middle')
<div class="col-md-12 mb-3">
    <form class="user" method="GET" action="">
        @csrf
</div>
<div class="col-md-12">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control add-billing-address-input" name="name" id="name" value="{{auth()->user()->name}}">
    </div>
</div>
<div class="col-md-12">
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value='{{auth()->user()->email}}'>
    </div>
</div>
<div class="col-12">
    <div class="mb-4">
        <label class="form-label">Password</label>
        <input type="text" class="form-control" name="password">
    </div>
</div>
@endsection