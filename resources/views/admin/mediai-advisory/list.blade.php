@extends('layouts.admin-panel')
@section('title','Media Advisory '. $dataAlbum->title)
@section('styles')
<link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('vendor/laravel-filemanager/css/dropzone.min.css')}}" rel="stylesheet">

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center w-100">
                        <h4 class="card-title" >Media Advisory {{ $dataAlbum->title }}</h4>
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
                        <form id="updatephoto" action="{{ route('admin.advisory.updateFile') }}" class="form" method="POST" novalidate>
                            <table id="galleryfoto" class="table table-striped table-bordered display w-100">
                                <thead>
                                    <tr>
                                        <th>File</th>
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
                            <a href="{{ route('admin.advisory.index')}}" class="btn btn-md btn-outline-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="createVideo" tabindex="-1"  data-bs-backdrop="static" aria-labelledby="createAlbumLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
           
                <div class="modal-content " style="height: 80vh;" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="createAlbumLabel">Add File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                    <p>Hanya diijinkan file .pdf</p>
                    <div class="error-msg"></div>
                    <form id="dropzone" action="{{ route('admin.advisory.storeFile') }}" class="dropzone" method="POST" novalidate>
                        <input type="hidden" name="category_id" value="{{ $dataAlbum->id }}" >
                        @csrf
                         
                    </form>
                          

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-xs btn-primary done-upload">Done</button>
                       
                    
                    </div>
                </div>
           
        </div>
    </div>
@endsection






@section('scripts')

<script type="text/javascript" src="{{ asset('vendor/laravel-filemanager/js/dropzone.min.js') }}"></script> 

<script type="text/javascript" >
$(document).ready(function(){
   
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('.done-upload').click(function() {
        $('.error-msg').empty();
        $('#createVideo').modal('toggle');
        $('#albumtable').dataTable().fnDestroy();
        loadData();
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
                    url:"{{route('admin.advisory.dataTableFile',$dataAlbum->id)}}",
                    type: "POST" ,
                    dataType: 'json'        
                },
                columns: [
                    {
                        orderable: false, 
                        searchable: false,
                        width: "100px",
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
                        width: "20px"    
                    },    
                ],
                fnDrawCallback : function() {
                    $('.togglepublish').bootstrapToggle();
                    $('[data-bs-toggle="tooltip"]').tooltip();
                   // $('.box-video').lightGallery(); 
                   //videojs(document.querySelector('.video-js'));
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
        $('.dz-preview').remove();
        loadData();
    });


    $('#albumtable').on('click', '.edit', function (){
        $('#editAlbum').modal('show');
        $('#inputAlbum').val($(this).data('album'));
        $('#albumId').val($(this).data('id'));
    
    });

    $("#updatephoto").submit(function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.advisory.updateFile') }}",
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



    $('#galleryfoto').on('click', '.delete', function (){
            // e.preventDefault();
        Swal.fire({
                title: "Warning..!",
                text: "Do you want to delete Album "+$(this).data('title')+" ?",
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
                            console.log(data);
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
});

</script>
<script>
                 Dropzone.options.dropzone =
                    {
                        maxFilesize: 120,
                        renameFile: function(file) {
                            var name=file.name;
                            var dt = new Date();
                            var time = dt.getTime();
                        return name;
                        },
                        acceptedFiles: ".pdf",
                        addRemoveLinks: true,
                        timeout: 50000,
                        maxFilesize: 3,
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
                
                        success: function(file, response) 
                        {
                            /* $('#albumtable').dataTable().fnDestroy();
                            loadData(); */
                        },
                        error: function(file, response)
                        {
                            //return false;
                            //console.log(file,'asmkaksaksj');
                            //console.log(response,'response');

                            let msgalrt=`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>`+file.name+`</strong> `+response+`
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        </div>`;
                            $('.error-msg').append(msgalrt);

                        }
            };
     
       
 function validate(formData, jqForm, options) {
    
  /*   var form = jqForm[0];
    if (!form.file.value) {
        alert('File not found');
        return false;
    } */
} 
</script>
@endsection
