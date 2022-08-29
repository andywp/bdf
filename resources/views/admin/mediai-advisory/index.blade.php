@extends('layouts.admin-panel')
@section('title','Media Advisory')
@section('styles')
<link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center w-100">
                        <h4 class="card-title" >Media Advisory</h4>
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
                        <table id="albumtable" class="table table-striped table-bordered display w-100">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Manage File</th>
                                    <th>Create Date</th>
                                    <th>publish</th>
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


    <!-- Modal -->
<div class="modal fade" id="createAlbum" tabindex="-1" aria-labelledby="createAlbumLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="album" action="{{ route('admin.advisory.store') }}" class="needs-validation" method="POST" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAlbumLabel">Create Album</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="validationTooltip01" class="form-label">Title</label>
                        
                        <input type="text" name="title" class="form-control form-control-sm @error('album') is-invalid @enderror" id="validationTooltip01" value="{{ old('album') }}">
                        <span class="text-danger" id="albumError"></span>
                        @error('album')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
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


<div class="modal fade" id="editAlbum" tabindex="-1" aria-labelledby="editAlbumLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="editalbum"  class="needs-validation" method="POST" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAlbumLabel">Edit Album</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="validationTooltip01" class="form-label">Album</label>
                        
                        <input type="text" name="title" id="inputAlbum" class="form-control form-control-sm" id="validationTooltip01" value="">
                        <span class="text-danger" id="EditalbumError"></span>
                        @error('album')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                    </div>
                </div>
                <div class="modal-footer">
                    @csrf
                    <input type="hidden" value="" id="albumId" name="id">
                    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-md btn-primary">Save</button>
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
    

    $("#album").submit(function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.advisory.store') }}",
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
                $('#albumtable').dataTable().fnDestroy();
                loadData();
            },
            error:function (response) {
                $('#albumError').text(response.responseJSON.errors.album);
            }
      });

    });


    $("#editalbum").submit(function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.advisory.update') }}",
            data: $("#editalbum").serialize(),
            dataType: 'json',
            success: function(data){
                $(":input","#editalbum")
                .not(":button, :submit, :reset, :hidden")
                .val("")
                .removeAttr("checked")
                .removeAttr("selected");
                $('#editAlbum').modal('toggle');
                notif(data.success);
                $('#albumtable').dataTable().fnDestroy();
                loadData();
            },
            error:function (response) {
                $('#EditalbumError').text(response.responseJSON.errors.album);
            }
      });

    });

    /*data table */

    let loadData=()=>{
        if (! $.fn.dataTable.isDataTable('#albumtable') ) {
            var tbl = $('#albumtable').DataTable({
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
                    url:"{{route('admin.advisory.data')}}",
                    type: "POST" ,
                    dataType: 'json'        
                },
                columns: [
                    {
                        data: 'title',                                    
                    },
                    {
                        width: "90px",
                        className: "text-center",
                        data: 'file',
                    },
                    {
                        width: "90px",
                        data: 'created_at'      
                    },
                    {
                        width: "90px",
                        data: 'publish'     
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


    $('#albumtable').on('change', '.togglepublish', function() {
        let publish = $(this).is(':checked')?1:0;
        let id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.advisory.publish') }}",
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


    $('#albumtable').on('click', '.edit', function (){
        $('#editAlbum').modal('show');
        $('#inputAlbum').val($(this).data('album'));
        $('#albumId').val($(this).data('id'));
    
    });

    $('#albumtable').on('click', '.delete', function (){
            // e.preventDefault();
        Swal.fire({
                title: "Warning..!",
                text: "Do you want to delete Album "+$(this).data('album')+" ?",
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
</script>

@endsection
