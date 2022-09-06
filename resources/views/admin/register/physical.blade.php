@extends('layouts.admin-panel')
@section('title','Physical Attendance')
@section('styles')
<link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<style>
    .register-img img {
        width: 210px;
        height: 210px;
        object-fit: contain;
    }
</style>
@endsection

@section('content')
<div class="row">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center w-100">
                        <h4 class="card-title" >Register Physical Attendance</h4>
                        <div class="ms-auto">
                            <a href="{{route('admin.physical.excel')}}" class="btn btn-outline-primary btn-sm" >
                                <i class="fas fa-file-excel"></i> Download Excel
                            </a>
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
                                    <th>Name</th>
                                    <th>Nationality</th>
                                    <th>country organization</th>
                                    <th>email</th>
                                    <th>Telephone</th>
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
                    url:"{{route('admin.physical.physicaldataTable')}}",
                    type: "POST" ,
                    dataType: 'json'        
                },
                columns: [
                    {
                         data: 'name',                                    
                    },
                    {
                         data: 'country_organization',                                    
                    },
                    {
                        data: 'nationality',                                    
                    },
                    {
                        data: 'email',                                    
                    },     
                    {
                        data: 'telephone',                                    
                    },                           
                    {
                        data: 'action',
                        //className: "text-center",
                        orderable: false, 
                        searchable: false,
                        width: "80px"    
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
});

@if (session('success'))
    notif('{{ session('success') }}');
@endif
</script>

@endsection