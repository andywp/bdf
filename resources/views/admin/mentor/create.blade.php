@extends('layouts.admin-panel')
@section('title','Mentor')
@section('styles')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" >Add Mentor</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.mentor.store') }}" class="needs-validation" method="POST" novalidate>
                        <div class="mb-3 row">
                            <label for="validationTooltip01" class="col-form-label col-md-2">Nama</label>
                            <div class="col-sm-10" >
                                <input type="text" name="name" class="form-control form-control-sm @error('name') is-invalid @enderror" id="validationTooltip01" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="exampleInputUsername" class="form-label col-md-2">Username</label>
                            <div class="col-sm-10" >
                                <input type="text" name="username" class="form-control form-control-sm  @error('username') is-invalid @enderror" id="exampleInputUsername" value="{{ old('username') }}" >
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="exampleInputUsername" class="form-label col-md-2">Email</label>
                            <div class="col-sm-10" >
                                <input type="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="exampleInputUsername" value="{{ old('email')}}" >
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-md-2">Alamat</label>
                            <div class="col-sm-10" >
                                <textarea class="form-control form-control-sm @error('alamat') is-invalid @enderror" name="alamat" > {{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-md-2">Tanggal Lahir</label>
                            <div class="col-sm-10" >
                                <input type="text" name="date_of_brith" class="form-control form-control-sm datepicker  @error('date_of_brith') is-invalid @enderror"   value="{{ old('date_of_brith') }}"  data-dtp="dtp_Imv1S" >
                                @error('date_of_brith')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-md-2">Phone</label>
                            <div class="col-sm-10" >
                                <input type="text" name="phone" class="form-control form-control-sm @error('phone') is-invalid @enderror" value="{{ old('phone') }}" >
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label class="form-label col-md-2">Password</label>
                            <div class="col-sm-10" >
                                <input type="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" value="{{ old('password') }}" >
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="form-label col-md-2">Re Password</label>
                            <div class="col-sm-10" >
                                <input type="password" name="re-password" class="form-control form-control-sm @error('re-password') is-invalid @enderror" value="{{ old('re-password') }}" >
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="pt-3">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary  mb-2 w-100">Save</button>
                            <a  href="{{ route('admin.mentor.index') }}" class="btn btn-outline-danger  mb-2 w-100" >Beck</a>
                        </div>
                    </form>
                </div>
            </div>
                
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript" >

</script>

@endsection
