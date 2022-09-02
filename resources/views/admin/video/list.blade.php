@extends('layouts.admin-panel')
@section('title','Album Video')
@section('styles')
<link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('vendor/laravel-filemanager/css/dropzone.min.css')}}" rel="stylesheet">
<link href="https://vjs.zencdn.net/7.20.2/video-js.css" rel="stylesheet" />
<style>
    .video-js {
        width: 200px;
    }
    .video-js .vjs-big-play-button {
        font-size: 2em;
        line-height: 1.5em;
        height: 1.63332em;
        width: 2em;
        display: block;
        position: absolute;
        top: 42%;
        left: 39%;
        padding: 0;
        cursor: pointer;
        opacity: 1;
        border: 0.06666em solid #fff;
        background-color: #2B333F;
        background-color: rgba(43, 51, 63, 0.7);
        border-radius: 0.3em;
        transition: all 0.4s;
    }
</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center w-100">
                        <h4 class="card-title" >Video</h4>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createVideo">
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
                        <form id="updatephoto" action="{{ route('admin.gallery.updatephoto') }}" class="form" method="POST" novalidate>
                            <table id="galleryfoto" class="table table-striped table-bordered display w-100">
                                <thead>
                                    <tr>
                                        <th>Video</th>
                                        <th>Title</th>
                                        <th>Create Date</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                            @csrf
                            <button type="submit" class="btn btn-md  btn-outline-primary">save changes</button>
                            <a href="{{ route('admin.video.index')}}" class="btn btn-md btn-outline-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="createVideo" tabindex="-1"  data-bs-backdrop="static" aria-labelledby="createAlbumLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
            <form id="uploadFile" method="POST" action="{{ route('admin.video.storevideo') }}" enctype="multipart/form-data">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="createAlbumLabel">Add Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title">
                                <span class="text-danger" id="EditalbumError"></span>
                            </div> 
                            <div class="form-group mb-3">
                                <label>Video</label>
                                <div class="form-file">
                                    <input name="video" type="file" class="form-file-input form-control">
                                    <span class="text-danger" id="inputVideoError"></span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Thumbnail</label>
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
                                <span class="text-danger" id="inputpost_imageError"></span>
                            </div>
                            <div class="form-group mb-4">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                </div>
                            </div>
                          

                        
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="category_id" value="0">
                        <button type="button" class="btn btn-xs  btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit"  value="Upload" class="btn btn-xs btn-primary">
                       
                    
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection






@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="https://vjs.zencdn.net/7.20.2/video.min.js"></script>
<!-- <script type="text/javascript" src="{{ asset('vendor/laravel-filemanager/js/dropzone.min.js') }}"></script> -->
<script>
        
/*         Dropzone.options.dropzone =
         {
            maxFilesize: 5,
            renameFile: function(file) {
                var name=file.name.replace(/\s/g, '');
                var dt = new Date();
                var time = dt.getTime();
               return 'video-'+time+name;
            },
            acceptedFiles: ".mp4,.mov,.avi,.mpeg4,.flv,.3gpp",
            autoProcessQueue: true,
            parallelUploads: 20,
            addRemoveLinks: true,
            //timeout: 50000,
            maxFilesize: 300,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ route("admin.gallery.deletephoto") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            accept: function(file, done) {
                var ext = (file.name).split('.')[1]; // get extension from file name
                if (ext == 'mp4' || ext == 'mov') {
                done("Dont like those extension"); // error message for user
                }
                else { done(); } // accept file
            },
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
}; */
 function validate(formData, jqForm, options) {
    
  /*   var form = jqForm[0];
    if (!form.file.value) {
        alert('File not found');
        return false;
    } */
} 
</script>
<script type="text/javascript" >
$(document).ready(function(){
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

    function removeFile_add_content_image(){
        $("#preview_add_content_image").html('');
        $("#file_add_content_image").val('');
        $("#btn_remove_add_content_image").hide();
        $("#btn_restore_add_content_image").show();
        return false;
    }

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#uploadFile').ajaxForm({
        beforeSubmit: validate,
        beforeSend: function () {
            var percentage = '0';
        },
        uploadProgress: function (event, position, total, percentComplete) {
            var percentage = percentComplete;
            $('.progress .progress-bar').css("width", percentage+'%', function() {
                return $(this).attr("aria-valuenow", percentage) + "%";
            })
        },
        complete: function (xhr) {
            console.log(xhr,'File has uploaded');
            if(!xhr.responseJSON.errors){
                $('#createVideo').modal('toggle');
                $('#galleryfoto').dataTable().fnDestroy();
                loadData();
                $(":input","#uploadFile")
                    .not(":button, :submit, :reset, :hidden")
                    .val("")
                    .removeAttr("checked")
                    .removeAttr("selected");
                    $('.progress .progress-bar').css("width",'0%');
                notif('Video has uploaded');
            }
        },
        error: function(response){
            
            $('#EditalbumError').text(response.responseJSON.errors.title);
            //inputVideoError
            $('#inputVideoError').text(response.responseJSON.errors.video);
            //inputpost_imageError
            $('#inputpost_imageError').text(response.responseJSON.errors.post_image);
        }
    });


    $("#album").submit(function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.gallery.store') }}",
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
            url: "{{ route('admin.gallery.update') }}",
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
                $('#galleryfoto').dataTable().fnDestroy();
                loadData();
            },
            error:function (response) {
                $('#EditalbumError').text(response.responseJSON.errors.album);
            }
      });

    });

    /*data table */

    let loadData=()=>{
        if (! $.fn.dataTable.isDataTable('#galleryfoto') ) {
            var tbl = $('#galleryfoto').DataTable({
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
                    url:"{{route('admin.video.datavideo',0)}}",
                    type: "POST" ,
                    dataType: 'json'        
                },
                columns: [
                    {
                        orderable: false, 
                        searchable: false,
                        width: "200px",
                        className: "text-center",
                        data: 'file',                                    
                    },
                    {
                        data: 'title',
                    },
                    {
                        width: "120px",
                        data: 'created_at'      
                    },
                                                 
                    {
                        data: 'action',
                        className: "text-center",
                        orderable: false, 
                        searchable: false,
                        width: "200px"    
                    },    
                ],
                fnDrawCallback : function() {
                    $('.togglepublish').bootstrapToggle();
                    $('[data-bs-toggle="tooltip"]').tooltip();
                   // $('.box-video').lightGallery(); 
                   if($(".video-js").length ){
                        videojs(document.querySelector('.video-js'));
                   }
                   
                },
                createdRow: function (row, data, dataIndex) {
                    //console.log(data,'data');
                    $(row).addClass('gall'+data.id);
                    
                }
            });
        }
    }


    loadData();

    /** update foro */
    $('#galleryfoto').on('change', '.togglepublish', function() {
        let publish = $(this).is(':checked')?1:0;
        let id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.gallery.publish') }}",
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

    $('.done-upload').click(function() {
        $('#createAlbum').modal('toggle');
        $('#galleryfoto').dataTable().fnDestroy();
        $('.progress .progress-bar').css("width",'0%');
        loadData();
    });


    $("#updatephoto").submit(function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.gallery.updatephoto') }}",
            data: $("#updatephoto").serialize(),
            dataType: 'json',
            success: function(data){
               
                notif(data.success);
                //$('#galleryfoto').dataTable().fnDestroy();
                //loadData();
            },
            error:function (response) {
                $('#EditalbumError').text(response.responseJSON.errors.album);
            }
        });
    });

    $('#albumtable').on('click', '.edit', function (){
        $('#editAlbum').modal('show');
        $('#inputAlbum').val($(this).data('album'));
        $('#albumId').val($(this).data('id'));
    
    });

    $('#galleryfoto').on('click', '.delete', function (){
            // e.preventDefault();
        Swal.fire({
                title: "Warning..!",
                text: "Do you want to delete Video "+$(this).data('title')+" ?",
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
                    /* $('#fd'+$(this).data('id')).submit(); */
                    $.ajax({
                        type: 'POST',
                        url: $('#fd'+$(this).data('id')).attr('action'),
                        data: $('#fd'+$(this).data('id')).serialize(),
                        dataType: 'json',
                        success: function(data){
                            //console.log(data);
                            notif(data.success);
                            //loadData();
                            $('.gall'+data.id).remove();

                            //$('#galleryfoto').dataTable().fnDestroy();
                            loadData();
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
});

</script>

@endsection
