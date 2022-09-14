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
                            <button class="btn btn-outline-info btn-sm reportrange"> <i class="fa fa-calendar"></i> <span></span></button>
                            <a id="downloadexcel" data-url="{{route('admin.physical.index')}}/excel"  href="{{route('admin.physical.excel' , [ 'start' => date('Y-m-d'), 'end' => date('Y-m-d')] )}}" class="btn btn-outline-primary btn-sm" >
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
    var start = moment().subtract(29, 'days');
    var end = moment();
    

    $('.reportrange').on('apply.daterangepicker', (e, picker) => {
      console.log(picker,'picker');
    });

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let loadData=(start,end)=>{
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
                    dataType: 'json',
                    data:{startdate:start,enddate:end}        
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
    
    function cb(start, end) {
        
        $('.reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        let startDate=start.format('YYYY-MM-DD');
        let endDate=end.format('YYYY-MM-DD');

        let download=$('#downloadexcel');
        let url=download.data('url')+'/'+startDate+'/'+endDate;
        download.attr('href',url);

        $('#datamentor').dataTable().fnDestroy();
        loadData(startDate,endDate);
    }

    $('.reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

   
});

@if (session('success'))
    notif('{{ session('success') }}');
@endif
</script>

@endsection