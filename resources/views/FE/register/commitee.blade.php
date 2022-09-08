@extends('layouts.bdf')
@section('styles')
<link rel="stylesheet" href="{{ asset('bdf/assets/css/form.css') }}" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<section class="first_section" id="publication">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="title-section text-center">Commite Attendance</h2>
          </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error Input</h4>
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
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
        <div class="row mt-md-5 mt-3">
          <div class="col-12">
            <div class="login-form">
                <form action="{{ route('commitee_create') }}" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
                @csrf
                    <h3 class="text-center title-form">Panitia</h3>
                    <!--
                    <div class="form-outline mb-4">
                        <label class="form-label" for="gelar">Gelar</label>
                        <input type="text" id="gelar" class="form-control @error('gelar') is-invalid @enderror" name="gelar" value="{{ old('gelar') }}" placeholder="- Title -" />
                        @error('gelar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    -->

                    <div class="form-outline mb-4">
                        <label class="form-label" for="nama-lengkap">Nama Lengkap</label>
                        <input type="text" id="nama-lengkap" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror"  value="{{ old('nama_lengkap') }}" placeholder="" />
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="badge-name">Nama untuk dicetak di Badge</label>
                        <input type="text" id="badge-name" name="prefered_name_on_badge" class="form-control  @error('prefered_name_on_badge') is-invalid @enderror" value="{{ old('prefered_name_on_badge') }}" placeholder="(Maks. 25 karakter, boleh mencantumkan gelar, contoh: H.E.)" />
                        @error('prefered_name_on_badge')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="jabatan">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" class="form-control  @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}" placeholder="" />
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="nip">NIP (Boleh Kosong)</label>
                        <input type="text" id="nip" name="nik" class="form-control @error('nik') is-invalid @enderror"  value="{{ old('nik') }}" placeholder="" />
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="satuan-kerja">Satuan Kerja</label>
                        <input type="text" id="satuan-kerja" name="satuan_kerja" class="form-control  @error('satuan_kerja') is-invalid @enderror" value="{{ old('satuan_kerja') }}" placeholder="" />
                        @error('satuan_kerja')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="bidang-kepanitiaan">Bidang Kepanitiaan</label>
                        <input type="text" id="bidang-kepanitiaan" name="bidang_kepanitiaan" class="form-control  @error('bidang_kepanitiaan') is-invalid @enderror" value="{{ old('bidang_kepanitiaan') }}" placeholder="" />
                        @error('bidang_kepanitiaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="nomor-rekening">Nomor Rekening</label>
                        <input type="text" id="nomor-rekening" name="nomor_rekening" class="form-control  @error('nomor_rekening') is-invalid @enderror" value="{{ old('nomor_rekening') }}" placeholder="" />
                        @error('nomor_rekening')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="bank">Bank</label>
                        <input type="text" id="bank" name="bank" class="form-control @error('bank') is-invalid @enderror" value="{{ old('bank') }}" placeholder="" />
                        @error('bank')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- contact detail -->
                    <h3 class="text-center title-form mt-5">Kontak</h3>
                    
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="telphone">Phone</label>
                        <input type="tel" id="telphone" name="phone" class="form-control  @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" placeholder="+62213441508" />
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Penerbangan -->
                    <h3 class="text-center title-form mt-5">Penerbangan</h3>

                    <h5 class="text-left mb-3 text-bold">Keberangkatan</h5>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="nomor-pesawat">Nomor Pesawat</label>
                        <input type="text" id="nomor-pesawat" name="nomor_pesawat" class="form-control   @error('nomor_pesawat') is-invalid @enderror"  value="{{ old('nomor_pesawat') }}" placeholder="" />
                        @error('nomor_pesawat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="tgl-keberangkatan">Tanggal</label>
                        <input type="date" id="tgl-keberangkatan" name="tanggal" class="form-control  @error('tanggal') is-invalid @enderror"  value="{{ old('tanggal') }}" placeholder="" />
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="jam-keberangkatan">Jam</label>
                        <input type="time" id="jam-keberangkatan" name="jam" class="form-control @error('jam') is-invalid @enderror" value="{{ old('jam') }}" />
                        @error('jam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <h5 class="text-left mb-3 mt-4 text-bold">Kepulangan</h5>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="nomorPesawat-kepulangan">Nomor Pesawat</label>
                        <input type="text" id="nomorPesawat-kepulangan" name="nomor_pesawat_pulang" class="form-control  @error('nomor_pesawat_pulang') is-invalid @enderror" value="{{ old('nomor_pesawat_pulang') }}" placeholder="" />
                        @error('nomor_pesawat_pulang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="tanggal-kepulangan">Tanggal</label>
                        <input type="date" id="tanggal-kepulangan" name="tanggal_pulang" class="form-control @error('tanggal_pulang') is-invalid @enderror" value="{{ old('tanggal_pulang') }}" placeholder="" />
                        @error('tanggal_pulang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                         <label class="form-label" for="jam-kepulangan">Jam</label>
                        <input type="time" id="jam-kepulangan" name="jam_pulang" class="form-control  @error('jam_pulang') is-invalid @enderror" value="{{ old('jam_pulang') }}" />
                        @error('jam_pulang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <h3 class="text-center title-form mt-5">Unggah Lampiran</h3>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="foto">
                        Foto
                        <p><small>(Dengan latar belakang putih Maks. 1MB: jpg)</small></p>
                      </label>
                      <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" />
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-5">
                      <label class="form-label" for="id-ktp">
                        KTP
                        <p><small>(Dengan latar belakang putih Maks. 1MB: jpg)</small></p>
                      </label>
                      <input type="file" id="id-ktp" name="ktp" class="form-control @error('ktp') is-invalid @enderror" />
                        @error('ktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="agree" value="1" id="agreement" lass="form-control @error('agree') is-invalid @enderror" >
                        <label class="form-check-label" for="agreement">
                        By filling out this form, you agree to the handling of your data by this website
                        </label>
                        @error('agree')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror    
                    </div>
                                        
                    <button type="submit" class="btn primary-btn mb-4">Send</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>

   
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.optionselect').select2();
    });
</script>

@endsection