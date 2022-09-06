@extends('layouts.admin-panel')
@section('title','User Register')
@section('styles')
<link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center w-100">
                        <h4 class="card-title" >User Account Register</h4>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createAlbum">
                                <i class="fas fa-plus"></i> Add New
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Notifikasi menggunakan flash session data -->
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
                    <div class="table-responsive">
                        <table id="datamentor" class="table table-striped table-bordered display w-100">
                            <thead>
                                <tr>
                                    <!-- <th>Image</th> -->
                                    <th>Nama</th>
                                    <th>username</th>
                                    <th>email </th>
                                    <th>type </th>
                                    <th>active</th>
                                    <th>Password</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                
        </div>
    </div>


    <div class="modal fade" id="createAlbum" tabindex="-1" aria-labelledby="createAlbumLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="album" action="" class="needs-validation" method="POST" novalidate>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createAlbumLabel">Create User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="validationTooltip01" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control form-control-sm @error('album') is-invalid @enderror" id="validationTooltip01">
                            <span class="text-danger error-input" id="nameError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="validationTooltip02" class="form-label">Username </label>
                            <input type="text" name="username" class="form-control form-control-sm @error('email') is-invalid @enderror" id="validationTooltip02">
                            <span class="text-danger error-input" id="usernameError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="validationTooltip02" class="form-label">Email </label>
                            <input type="text" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="validationTooltip02">
                            <span class="text-danger error-input" id="emailError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="validationTooltip03" class="form-label">Password </label>
                            <input type="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="validationTooltip03">
                            <span class="text-danger error-input" id="passwordError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="validationTooltip04" class="form-label">Type</label>
                            <select name="type"  class="form-control form-select">
                                <option value="">Pilih</option>
                                <option value="Physical Attendance">Physical Attendance</option>
                                <option value="Virtual Attendance">Virtual Attendance</option>
                                <option value="Media">Media</option>
                                <option value="Guest">Guest</option>
                                <option value="Commitee">Commitee</option>
                            </select>
                            <span class="text-danger error-input" id="typeError"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @csrf
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- edit -->
    <div class="modal fade" id="edituser" tabindex="-1" aria-labelledby="createAlbumLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="formedit" action="" class="needs-validation" method="POST" novalidate>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createAlbumLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="validationTooltip012" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-sm" id="validationTooltip012">
                            <span class="text-danger Editerror-input" id="nameErrorEdit"></span>
                        </div>
                        <div class="mb-3">
                            <label for="validationTooltip02" class="form-label">Username </label>
                            <input type="text" name="username" id="username" class="form-control form-control-sm " id="validationTooltip022">
                            <span class="text-danger Editerror-input" id="usernameErrorEdit"></span>
                        </div>
                        <div class="mb-3">
                            <label for="validationTooltip032" class="form-label">Email </label>
                            <input type="text" name="email" id="email" class="form-control form-control-sm" id="validationTooltip032">
                            <span class="text-danger Editerror-input" id="emailErrorEdit"></span>
                        </div>
                        
                        <div class="mb-3">
                            <label for="validationTooltip04" class="form-label">Type</label>
                            <select name="type" id="type" class="form-control form-select">
                                <option value="">Pilih</option>
                                <option value="Physical Attendance">Physical Attendance</option>
                                <option value="Virtual Attendance">Virtual Attendance</option>
                                <option value="Media">Media</option>
                                <option value="Guest">Guest</option>
                                <option value="Commitee">Commitee</option>
                            </select>
                            <span class="text-danger Editerror-input" id="typeErrorEdit"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @csrf
                        <input type="hidden" name="id" id="iduserinpu" value="" >
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-md btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="formPassword" tabindex="-1" aria-labelledby="createAlbumLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="formeditpassword" action="" class="needs-validation" method="POST" novalidate>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createAlbumLabelpassword">Update Password User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="validationTooltip012password" class="form-label">New Password</label>
                            <input type="text" name="password" id="namepassword" class="form-control form-control-sm" id="validationTooltip012password">
                            <span class="text-danger password-input" id="nameErrorpasswordpassword"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @csrf
                        <input type="hidden" name="id" id="iduserinpupassword" value="" >
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-md btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript" >
$(document).ready(function(){

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let loadData=()=>{
        if (! $.fn.dataTable.isDataTable('#datamentor') ) {
            var tbl = $('#datamentor').DataTable({
                pageLength: 10,
                lengthChange: true,
                bFilter: true,
                destroy: true,
                processing: true,
                serverSide: true,
                order: [[ 0, "desc" ]],
                oLanguage: {
                    sZeroRecords: "Tidak Ada Data",
                    sSearch: "Pencarian _INPUT_",
                    sLengthMenu: "_MENU_",
                    sInfo: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    sInfoEmpty: "0 data",
                    oPaginate: {
                        sNext: "<i class='fa fa-angle-right'></i>",
                        sPrevious: "<i class='fa fa-angle-left'></i>"
                    }
                },
                ajax: {
                    url:"{{route('admin.userreg.data')}}",
                    type: "POST" ,
                    dataType: 'json'        
                },
                columns: [
                    {
                         data: 'name',                                    
                    },
                    {
                        data: 'username',                                    
                    },
                    {
                        data: 'email',                                    
                    },
                    {
                        data: 'type_user',                                    
                    },
                    {
                        data : 'active',
                        width: "80px"
                    },
                    {
                        data : 'password',
                        className: "text-center",
                        orderable: false, 
                        searchable: false,
                        width: "80"
                    },                                
                    {
                        data: 'action',
                        className: "text-center",
                        orderable: false, 
                        searchable: false,
                        width: "40px"    
                    },   
                ],
                fnDrawCallback : function() {
                    $('.togglepublish').bootstrapToggle();
                    $('[data-bs-toggle="tooltip"]').tooltip();
                }
            });
        }
    }


    loadData();
    //$("[data-toggle='toggle']").bootstrapToggle();

    $("#album").submit(function( event ) {
        event.preventDefault();
        $('.error-input').html();
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.userreg.store') }}",
            data: $("#album").serialize(),
            dataType: 'json',
            success: function(data){
                $(":input","#album")
                .not(":button, :submit, :reset, :hidden")
                .val("")
                .removeAttr("checked")
                .removeAttr("selected");
                $('#createAlbum').modal('toggle');
                notif(data.success);
                $('#datamentor').dataTable().fnDestroy();

                $('.error-input').html();
                loadData();
            },
            error:function (response) {
                $('#nameError').text(response.responseJSON.errors.name);
                $('#emailError').text(response.responseJSON.errors.email);
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#typeError').text(response.responseJSON.errors.type);
                $('#usernameError').text(response.responseJSON.errors.username);
            }
      });

    });

    /**modal edit */
    $('#datamentor').on('click', '.edit', function (){
        $('#edituser').modal('show');
        $('#iduserinpu').val($(this).data('id'));
        $('#name').val($(this).data('name'));
        $('#username').val($(this).data('username'));
        $('#email').val($(this).data('email'));
        $('#type').val($(this).data('type'));
        $('.Editerror-input').html();
        event.preventDefault();
    });

    /* formedit */
    $("#formedit").submit(function( event ) {
        event.preventDefault();
        $('.error-input').html();
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.userreg.update') }}",
            data: $("#formedit").serialize(),
            dataType: 'json',
            success: function(data){
                $(":input","#formedit")
                .not(":button, :submit, :reset, :hidden")
                .val("")
                .removeAttr("checked")
                .removeAttr("selected");
                $('#edituser').modal('toggle');
                notif(data.success);
                $('#datamentor').dataTable().fnDestroy();
                $('.Editerror-input').html();
                loadData();
            },
            error:function (response) {
                $('#nameErrorEdit').text(response.responseJSON.errors.name);
                $('#emailErrorEdit').text(response.responseJSON.errors.email);
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#typeErrorEdit').text(response.responseJSON.errors.type);
                $('#usernameErrorEdit').text(response.responseJSON.errors.username);
            }
        });
    });
    
    /**password */
    /**modal edit */
    $('#datamentor').on('click', '.password', function (){
        $('#formPassword').modal('show');
        $('#nameErrorpasswordpassword').html();
        $('#iduserinpupassword').val($(this).data('id'));
        event.preventDefault();
    });


    //formeditpassword
    $("#formeditpassword").submit(function( event ) {
        event.preventDefault();
        $('#nameErrorpasswordpassword').html();
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.userreg.password') }}",
            data: $("#formeditpassword").serialize(),
            dataType: 'json',
            success: function(data){
                $(":input","#formeditpassword")
                .not(":button, :submit, :reset, :hidden")
                .val("")
                .removeAttr("checked")
                .removeAttr("selected");
                $('#formPassword').modal('toggle');
                notif(data.success);
                $('#datamentor').dataTable().fnDestroy();
                $('#nameErrorpasswordpassword').html();
                loadData();
            },
            error:function (response) {
                $('#nameErrorpasswordpassword').text(response.responseJSON.errors.password);
            }
        });
    });

    $('#datamentor').on('click', '.delete', function (){
            // e.preventDefault();
        Swal.fire({
                title: "Warning..!",
                text: "Do you want to delete Artikel "+$(this).data('name')+" ?",
                icon: "warning",
                showCancelButton:true,
                confirmButtonText: 'Ok',
                cancelButtonColor: '#d33',
                buttons: true,
                dangerMode: true,
            })
            .then((value) => {
                //console.log(value,'value');
                if(value.value){
                    $('#fd'+$(this).data('id')).submit();
                }else{
                    return false;
                }
        });
        return false;
    });
});

$('#datamentor').on('change', '.togglepublish', function() {
    let publish = $(this).is(':checked')?1:0;
    let id = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: "{{ route('admin.bdf.publish') }}",
        data: {id:id,publish:publish},
        dataType: 'json',
        success: function(data){
          if(!data.error){
            notif(data.pesan);
          }else{
            notif('Error omething wrong','warning');
          }
        }
      });

});

@if (session('success'))
    notif('{{ session('success') }}');
@endif
</script>

@endsection
