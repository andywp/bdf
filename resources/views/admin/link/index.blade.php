@extends('layouts.admin-panel')
@section('title','External Link')
@section('styles')
<link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center w-100">
                        <h4 class="card-title" >External Link</h4>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addslider">
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
                    <form id="updateSlider" action="{{ route('admin.advisory.updateFile') }}" class="form" method="POST" novalidate>
                        <table id="albumtable" class="table table-striped table-bordered display w-100">
                            <thead>
                                <tr>
                                    <th>images</th>
                                    <th>Title</th>
                                    <th>URL</th>
                                    <th>Order</th>
                                    <th>publish</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                        @csrf
                        <button type="submit" class="btn btn-md  btn-outline-primary">save changes</button>
                        <a href="{{ route('admin.link.index')}}" class="btn btn-md btn-outline-danger">Back</a>
                    </form>
                    </div>
                </div>
            </div>
                
        </div>
    </div>


    <!-- Modal -->
<div class="modal fade" id="addslider" tabindex="-1"  data-bs-backdrop="static"  aria-labelledby="createAlbumLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="addslidermodal"  class="needs-validation" method="POST"  enctype="multipart/form-data" novalidate>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAlbumLabel">Add External Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="validationTooltip01" class="form-label">Title</label>
                        <input type="text" name="title" id="inputAlbum" class="form-control form-control-sm" id="validationTooltip01" value="">
                        <span class="text-danger" id="EditalbumError"></span>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <span class="text-danger" id="TitleUPError"></span>
                    </div>
                    <div class="mb-3">
                        <label for="validationTooltip02" class="form-label">Url</label>
                        <input type="text" name="url" id="inputurl" class="form-control form-control-sm" id="validationTooltip02" value="">
                        <span class="text-danger" id="EditURLError"></span>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <span class="text-danger" id="TitleUPError"></span>
                    </div>
                    <span class="text-danger mt-2" id="ImggUPError"></span>
                    <div class="upload-file">
                        
                        <div class="preview">
                            <div><img  id="preview_add_post_image" src="{{ asset('assets/images/default.jpg') }}"></div>
                        </div>
                        <div class="upload-file-input">	
                            <!-- <a id="btn_remove_add_content_image" href="javascript:void(0)" class="delFile" onclick="return removeFile_add_content_image()"><i class="fa fa-trash"></i></a> -->
                            <a id="btn_restore_add_content_image" href="javascript:void(0)" class="restoreFile" onclick="return restoreFile_add_content_image()" style="display:none"><i class="fa fa-reply"></i></a>
                            <p class="button">
                            <button type="button" id="button_add_post_image" data-input="thumbnail"  data-preview="preview_add_post_image" class="off position-relative">
                            <i class="fa fa-upload"></i>
                            <input 
                                    id="fileupload" 
                                    data-default-src="{{ asset('assets/images/default.jpg') }}" 
                                    type="file" name="post_image" 
                        
                                    class="upload-input" 
                                    readonly accept="image/*">    
                            </button>
                            </p>		
                        </div>
                        <input id="thumbnail" class="form-control" type="hidden" name="filepath">
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


<!-- <div class="modal fade" id="editAlbum" tabindex="-1" aria-labelledby="editAlbumLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="editalbum"  class="needs-validation" method="POST"  enctype="multipart/form-data" novalidate>
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
</div> -->
@endsection



@section('scripts')
<script type="text/javascript" >
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#fileupload').on('change', event => {
        $('#del').show();
        let input =event.currentTarget;
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = event => {
                $('#preview_add_post_image').attr('src', event.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            //$('#banner_remove').val(0); 
        }
    });


    $("#addslidermodal").on('submit',(function(e) {
        e.preventDefault();
        
        let data = new FormData($(this)[0]);
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            url: "{{ route('admin.link.store') }}",
            data: data,
            //dataType: 'json',
            success: function(data){
                $(":input","#addslidermodal")
                .not(":button, :submit, :reset, :hidden")
                .val("")
                .removeAttr("checked")
                .removeAttr("selected");
                $('#addslider').modal('toggle');
                notif(data.success);
                $('#albumtable').dataTable().fnDestroy();
                loadData();

                let defautlImages=$('#fileupload').data('default-src');
                $('#preview_add_post_image').attr('src',defautlImages);

            },
            error:function (response) {
                $('#TitleUPError').text(response.responseJSON.errors.title);
                $('#ImggUPError').text(response.responseJSON.errors.post_image);
                //EditURLError
                $('#EditURLError').text(response.responseJSON.errors.url);
            }
        });

    }));
    

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
                    url:"{{route('admin.link.data')}}",
                    type: "POST" ,
                    dataType: 'json'        
                },
                columns: [
                    {
                        width: "100px",
                        className: "text-center",
                        data: 'images',
                    },
                    {
                        data: 'title',                                    
                    },
                    {
                        data: 'url',                                    
                    },
                    {
                        data: 'order_link',  
                        width: "80px",                                  
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
                },
                createdRow: function (row, data, dataIndex) {
                    $(row).addClass('gall'+data.id);
                    
                }
            });
        }
    }


    loadData();


    //updateSlider
    $("#updateSlider").submit(function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.link.update') }}",
            data: $("#updateSlider").serialize(),
            dataType: 'json',
            success: function(data){
               
                notif(data.success);
                $('#albumtable').dataTable().fnDestroy();
                loadData();
            },
            error:function (response) {
                //$('#EditalbumError').text(response.responseJSON.errors.album);
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
                text: "Do you want to delete Slider "+$(this).data('name')+" ?",
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
                    //$('#fd'+$(this).data('id')).submit();
                    $.ajax({
                        type: 'POST',
                        url: $('#fd'+$(this).data('id')).attr('action'),
                        data: $('#fd'+$(this).data('id')).serialize(),
                        dataType: 'json',
                        success: function(data){
                            //console.log(data);
                            notif(data.success);

                            $('.gall'+data.id).remove();

                            //$('#galleryfoto').dataTable().fnDestroy();
                            //loadData();
                        },
                        error:function (response) {
                            $('#EditalbumError').text(response.responseJSON.errors.album);
                        }
                    });

                }else{
                    return false;
                }
        });
        return false;
    });


    /** update slider */
    $('#albumtable').on('change', '.togglepublish', function() {
        let publish = $(this).is(':checked')?1:0;
        let id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.link.publish') }}",
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
});
</script>

@endsection
