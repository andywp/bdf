@extends('layouts.admin-panel')
@section('title','Profile')
@section('styles')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" >Profile</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home"><i class="la la-user me-2"></i> Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile"><i class="las la-shield-alt me-2"></i> Change Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home" role="tabpanel">
                                <div class="pt-4">
                                    <h4 class="mb-3" >Profile</h4>
                                    <form action="{{ route('admin.profile.update',$data->id) }}" class="needs-validation" method="POST" novalidate autocomplete="off">
                                        <div class="mb-3 row">
                                            <label for="validationTooltip01" class="col-form-label col-md-2">Nama</label>
                                            <div class="col-sm-10" >
                                                <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" id="validationTooltip01" value="{{ $data->name }}" autocomplete="off">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label for="exampleInputUsername" class="form-label col-md-2">Email</label>
                                            <div class="col-sm-10" >
                                                <input type="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="exampleInputUsername" value="{{ $data->email }}" autocomplete="off">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="pt-3">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <button type="submit" class="btn btn-outline-primary  mb-2 ">Update</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <div class="pt-4">
                                    <h4 class="mb-3" > Change Password</h4>
                                    <form action="{{ route('admin.profile.password',$data->id) }}" class="needs-validation" method="POST" novalidate autocomplete="off">
                                        <div class="mb-3 row">
                                            <label for="validationTooltip01" class="col-form-label col-md-2">Old Password</label>
                                            <div class="col-sm-10" >
                                                <input type="text" name="current_password" class="form-control form-control-sm @error('current_password') is-invalid @enderror" id="validationTooltip01"  autocomplete="off">
                                                @error('current_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label for="exampleInputUsername1" class="form-label col-md-2">New Password</label>
                                            <div class="col-sm-10" >
                                                <input type="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="exampleInputUsernam1" autocomplete="off">
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="exampleInputUsername2" class="form-label col-md-2">Re Password</label>
                                            <div class="col-sm-10" >
                                                <input type="password" name="password_confirmation" class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror" id="exampleInputUsername2" autocomplete="off">
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="pt-3">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <button type="submit" class="btn btn-outline-primary  mb-2 ">Update Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                    
                </div>
            </div>
                
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript" >

</script>

@endsection
