@extends('layouts.admin-panel')
@section('title','About')
@section('styles')
<link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center w-100">
                        <h4 class="card-title" >History</h4>
                        <div class="ms-auto">
                            <a href="{{ route('admin.about.create')}}" class="btn btn-outline-primary btn-sm" ><i class="fas fa-plus"></i> Add New</a>
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
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th>published</th>
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
@endsection

@section('scripts')
<script type="text/javascript" >
$(document).ready(function(){

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#datamentor').DataTable({
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
            url:"{{route('admin.about.data')}}",
            type: "POST" ,
            dataType: 'json'        
        },
        columns: [
            /* {
                data: 'post_image',
                width: "80px",
                className: "text-center",  
                orderable: false, 
                searchable: false,                                  
            }, */
            {
                data: 'post_title',                                    
            },
            {
                data: 'posts_author',
                width: "120px"      
            },
            {
                data: 'created_at',
                width: "150px"     
            },
            {
                data : 'publish',
                width: "80px"
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
        }

    });
    //$("[data-toggle='toggle']").bootstrapToggle();
 
    $('#datamentor').on('click', '.delete', function (){
            // e.preventDefault();
        Swal.fire({
                title: "Warning..!",
                text: "Do you want to delete  "+$(this).data('name')+" ?",
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
        url: "{{ route('admin.about.publish') }}",
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
