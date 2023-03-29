
<?php $__env->startSection('title','Ideation Report'); ?>
<?php $__env->startSection('head'); ?>
  
    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/libs/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" >
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        .custom-select{
            background: url('assets/images/custom-select.png') right .75rem center/8px 10px no-repeat #fff;
        }
        table.dataTable tfoot {background-color:	#00FA9A}
        
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <form id="reportForm">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-10 col-sm-10">
                            <div class="example">
                                <h4 class="card-title">Select Date Range</h4>
                                <h6 class="card-subtitle">Just click <code>input</code> field</h6>
                                <div class="input-daterange input-group" id="date-range">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info b-0 text-white">FROM</span>
                                    </div>
                                    <input type="text" class="form-control" name="start" id="start" required/>
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-info b-0 text-white">TO</span>
                                    </div>
                                    <input type="text" class="form-control" name="end" id="end" required/>
                                </div>
                            </div>
                        </div>
                      
                                <div class="col-md-2 col-lg-2 col-2 col-sm-2">
                                    <h4 class="card-title">Submit Button</h4>
                                    <h6 class="card-subtitle">Click to get results</h6>
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </form>
                       <!-- Footer callback -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="footer_callback" class="table table-striped table-bordered display" style="width:100%">
                                        <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>User Base</th>
                                                    <th>Customer Landed</th>
                                                    <th>Opted in Portal</th>
                                                    <th>Opted in Mobile</th>
                                                    <th>Opted In</th>

                                                    <th>Successful Subs</th>
                                                    <th>Daily Renewal</th>
                                                    <th>Weekly Renewal</th>
                                                    <th>Monthly Renewal</th>
                                                    <th>Success Renewal</th>
                                                    <th>Renewal Base</th>
                                                    <th>Success Renewal %</th>
                                                    <th>Daily Revenue Renewal</th>
                                                    <th>Weekly Revenue Renewal</th>
                                                    <th>Monthly Revenue Renewal</th>
                                                    <th>Revenue Renewal</th>
                                                    <th>Subscription Revenue</th>
                                                    <th>Total Revenue</th>
                                                    <th>Purged Once Charged</th>
                                                    <th>Purged Never Charged</th>
                                                    <th>Purged Total</th>
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
  
    <?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('assets/libs/moment/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/select2/dist/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/select2/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/dist/js/pages/forms/select2/select2.init.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    
    <script src="<?php echo e(asset('assets/dist/js/pages/datatable/datatable-advanced.init.js')); ?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" 
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
    // Date Picker
    jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
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
            header: false,
            footer: false,
            headerOffset: $('.topbar').height()
        },
        "paging":false //,
//         "footerCallback": function(row, data, start, end, display) {
        
//         var api = this.api(),
//             data;

//         //Remove the formatting to get integer data for summation
//         var intVal = function(i) {
//             return typeof i === 'string' ?
//                 i.replace(/[\$,]/g, '') * 1 :
//                 typeof i === 'number' ?
//                 i : 0;
//         };

//         // Total over all pages
//         for (let index = 1; index < 12; index++) {
//             if (index == 7) {
//                 var total_p = this.fnSettings().fnRecordsTotal() * 100;
//                 total = api
//             .column(index)
//             .data()
//             .reduce(function(a, b) {
//                 return intVal(a) + intVal(b);
//             }, 0);

//         // Total over this page
//         pageTotal = api
//             .column(index, { page: 'current' })
//             .data()
//             .reduce(function(a, b) {
                
//                 return intVal(a) + intVal(b);
//             }, 0);

//         // Update footer
//         $(api.column(index).footer()).html(
//             ((pageTotal / total_p )*100).toFixed(2) 
//         );
//             }else{
//                 total = api
//             .column(index)
//             .data()
//             .reduce(function(a, b) {
//                 return intVal(a) + intVal(b);
//             }, 0);

//         // Total over this page
//         pageTotal = api
//             .column(index, { page: 'current' })
//             .data()
//             .reduce(function(a, b) {
//                 return intVal(a) + intVal(b);
//             }, 0);

//         // Update footer
//         $(api.column(index).footer()).html(
//              pageTotal 
//         );
//             }
            

//         }
        
//     }
});



  });

  //form submit
  $('#reportForm').submit(function (e) { 
       e.preventDefault();
       var start_date=$('#start').val();
       var end_date=$('#end').val();
       var table = $('#footer_callback').DataTable();

        $.ajax({
            type: "GET",
            url: "<?php echo e(route('getideationreport')); ?>",
            data: {
                start_date:start_date,
                end_date:end_date,
                
            },
           
            success: function (response) {
                //console.log(response);
                if (response.status==false) {
                    table.clear().draw();
                    toastr.options =
                     {
                        "closeButton" : true,
                        "progressBar" : true
                     }
  		               toastr.error("Input is Invalid! Try Again");
                }
                else{
               
                let data=response.data;
               
                if (data.length < 1) {
                    toastr.options =
                     {
                        "closeButton" : true,
                        "progressBar" : true
                     }
  		               toastr.error("No data Found");
                      
                    //   $('#footer_callback tbody').empty();
                    //   $('#footer_callback tfoot').empty();
                    table.clear().draw();
                }else{
                    
                    
                    //var t = $('#footer_callback').DataTable();
                    populateTable(data);
                    
                    //$('#searchtable').append("<tr class='row--16jZlysVSE quiz' ><td class='cell--3QhdjYDo1X' style='background-color:#90ee90'><div class='cell-content quiz-title'>TOTAL</div></td><td class='cell--3QhdjYDo1X' style='background-color:#90ee90' ><div class='cell-content quiz-title'>"+landedcount+"</div></td><td class='cell--3QhdjYDo1X' style='background-color:#90ee90'><div class='cell-content quiz-title'>"+uniquecount+"</div></td><td class='cell--3QhdjYDo1X' style='background-color:#90ee90'><div class='cell-content quiz-title'>"+trialcount+"</div></td><td class='cell--3QhdjYDo1X' style='background-color:#90ee90'><div class='cell-content quiz-title'>"+convertedcount+"</div></td></tr>");
                }
           
                }
                
            }
        });
       
   });
   
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

function updateRow(element){
alert('inside');
    console.log(element.data.data);
    var record = element.data[0];
    $("#myModal").modal('show');
    $('#total_base').val(record.user_base);
    $('#active_users').val(record.active_users);
    $('#revenue').val(record.daily_revenue);

    
}

function populateTable(data){
    
    var table = $('#footer_callback').DataTable();
    table.clear().draw();
    data.forEach(element => {
                 
                 //$('#footer_callback').append("<tr><td>"+element.date+"</td><td>"+element.total_landed+"</td> <td>"+element.total_unique+"</td></td> <td>"+element.trial+"</td><td>"+element.converted+"</td></tr>");
                 table.row.add( [
                     element.date,
                     element.user_base,
                     element.customer_landed,
                     element.opted_in_mobile,
                     element.opted_in_portal,
                     element.opted_in,
                     element.success_subscription,
                     element.renewal_base_daily,
                     element.renewal_base_weekly,
                     element.renewal_base_monthly,
                     element.success_renewal,
                     element.renewal_base,
                     element.success_renewal_ratio,
                     element.renewal_revenue_daily,
                     element.renewal_revenue_weekly,
                     element.renewal_revenue_monthly,
                     element.renewal_revenue,
                     element.subs_revenue,
                     element.total_revenue,
                     element.purged_once,
                     element.purged_never,
                     element.purged_total
                     
                     ] ).draw( false );

                 });
}


    </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mini_app/deikhodashboard/resources/views/reportideation.blade.php ENDPATH**/ ?>