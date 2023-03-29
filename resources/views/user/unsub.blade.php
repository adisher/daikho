@extends('layouts.base')
@section('title','Bulk Unsub')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" 
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" >
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-6 col-sm-6">
                                <div class="example">
                                    <h4 class="card-title">Unsub</h4>
                                    <h6 class="card-subtitle">Format <code>03YYXXXXXXX</code></h6>
                                    <form id="bulk-form">
                                        <input type="text" name="msisdn" id="msisdn" class="form-control">
                                   

                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <h4 class="card-title">Submit</h4>
                                <h6 class="card-subtitle"><code>click to unsub</code></h6>
                                    <button type="submit" class="btn btn-danger">Unsubscribe</button>
                                </form>
                            </div> --}}

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-12 col-sm-12">
                                <div class="example">

                                    <div class="table-responsive">
                                        <table id="footer_callback" class="table table-striped table-bordered display" style="width:100%">
                                            <thead>
                                                    <tr>
                                                        <th>MSISDN</th>
                                                        <th>DATE CREATED</th>
                                                        <th>UNSUB BY</th>
                                                        <th>UNSUB ON</th>
                                                        <th>ACTION</th>
                                                        
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
                </div>
            </div>
        </div>
</div>
@endsection
@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="{{asset('assets/dist/js/pages/datatable/datatable-advanced.init.js')}}"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#footer_callback').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'copyHtml5' },//, footer: true },
                    { extend: 'excelHtml5'},//, footer: true },
                    { extend: 'csvHtml5'},//, footer: true },
                    { extend: 'pdfHtml5'}//, footer: true }
                ],
            fixedHeader: {
                header: true,
                footer: false,
                headerOffset: $('.topbar').height()
            },
            "paging":false
            });
        });

        $('#msisdn').keyup(function() {
    
    if (this.value.length == 11 && $.isNumeric( this.value )) {
    
        var msisdn = $('#msisdn').val();
        $.ajax({
            type: "GET",
            url: "{{ route('get-user') }}",
            data: {msisdn:msisdn},
            success: function (response) {
                
                if (response.user.length != 0) {
                    
            
                if (response.status == 1) {
                    //console.log(response);
                    populateTable(response);
                }else{
                    toastr.options =
                     {
                        "closeButton" : true,
                        "progressBar" : true
                     }
  		               toastr.error(response.message);
                }
            }else{
                toastr.options =
                     {
                        "closeButton" : true,
                        "progressBar" : true
                     }
  		               toastr.error(response.message);
            }

            }
        });

    }
        
    });

    function populateTable(data){
        var table = $('#footer_callback').DataTable();
        var row = '';
        data = data.user;
        if (data.is_subscribed == 1) {
            row = '<button class="btn btn-danger" id="unsub" onclick="unsubme(`'+data.msisdn+'`)">Unsubscribe</button>';
        }
            table.clear().draw();
            table.row.add( [
                data.msisdn,
                data.dateCreated,
                data.unsub_by,
                data.unsub_date,
                row
            ] ).draw( false );
    }

    function unsubme(msisdn){
        alert(msisdn);
        $.ajax({
            type: "GET",
            url: "{{ route('unsub') }}",
            data: {msisdn:msisdn},
            success: function (response) {
                if (response.status == 1) {
                    populateTable(response);
                    toastr.options =
                     {
                        "closeButton" : true,
                        "progressBar" : true
                     }
  		               toastr.success(response.message);
                }else{
                    toastr.options =
                     {
                        "closeButton" : true,
                        "progressBar" : true
                     }
  		               toastr.error(response.message);
                }
            }
        });
    }

        $(document).on({
            ajaxStart: function(){
                // $("body").addClass("loading"); 
                $('.preloader').fadeIn();
            },
            ajaxStop: function(){ 
                // $("body").removeClass("loading"); 
                $('.preloader').fadeOut();
            }    
        });
    </script>
@endsection