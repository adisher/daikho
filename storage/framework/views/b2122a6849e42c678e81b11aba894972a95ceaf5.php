
<?php $__env->startSection('title','User Details'); ?>
<?php $__env->startSection('head'); ?>
  
    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/libs/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" >
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <form id="recordform">
                                    <h4 class="card-title">Enter Phone</h4>
                                    <h6 class="card-subtitle">use format <code>03XXYYYYYYY</code></h6>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="03XXYYYYYYY">
                                </form>
                            </div>
                        </div>
 
                    </div>
                  </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Record</h5>
                        <div class="table-responsive">
                            <table id="footer_callback" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                        <tr>
                                            <th>msisdn</th>
                                            <th>Last Charged</th>
                                            <th>Plan_id</th>
                                            <th>Date Created</th>
                                            <th>Is Subscribed</th>
                                            <th>Source</th>
                                            <th>Unsub Date</th>
                                            
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transaction Logs</h5>
                        <div class="table-responsive">
                            <table id="footer_callback_2" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                        <tr>
                                            <th>msisdn</th>
                                            <th>Transaction Id</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Charging Mode</th>
                                            <th>Remarks</th>

                                            
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">System Logs</h5>
                        <div class="table-responsive">
                            <table id="footer_callback_3" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                        <tr>
                                            <th>msisdn</th>
                                            <th>Id</th>
                                            <th>Date</th>
                                            <th>Target</th>
                                            <th>Status</th>
                                            <th>Type</th>

                                            
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
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('assets/libs/moment/moment.js')); ?>"></script>
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
      $(document).ready(function () {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function getHeaderNames(table) {
    // Gets header names.
    //params:
    //  table: table ID.
    //Returns:
    //  Array of column header names.
    
    var header = $(table).DataTable().columns().header().toArray();

    var names = [];
    header.forEach(function(th) {
     names.push($(th).html());
    });
        
    return names;
  }
  
  function buildCols(data) {
    // Builds cols XML.
    //To do: deifne widths for each column.
    //Params:
    //  data: row data.
    //Returns:
    //  String of XML formatted column widths.
    
    var cols = '<cols>';
    
    for (i=0; i<data.length; i++) {
      colNum = i + 1;
      cols += '<col min="' + colNum + '" max="' + colNum + '" width="20" customWidth="1"/>';
    }
    
    cols += '</cols>';
    
    return cols;
  }
  
  function buildRow(data, rowNum, styleNum) {
    // Builds row XML.
    //Params:
    //  data: Row data.
    //  rowNum: Excel row number.
    //  styleNum: style number or empty string for no style.
    //Returns:
    //  String of XML formatted row.
    
    var style = styleNum ? ' s="' + styleNum + '"' : '';
    
    var row = '<row r="' + rowNum + '">';

    for (i=0; i<data.length; i++) {
      colNum = (i + 10).toString(36).toUpperCase();  // Convert to alpha
      
      var cr = colNum + rowNum;
      
      row += '<c t="inlineStr" r="' + cr + '"' + style + '>' +
              '<is>' +
                '<t>' + data[i] + '</t>' +
              '</is>' +
            '</c>';
    }
      
    row += '</row>';
        
    return row;
  }
  
  function getTableData(table, title) {
    // Processes Datatable row data to build sheet.
    //Params:
    //  table: table ID.
    //  title: Title displayed at top of SS or empty str for no title.
    //Returns:
    //  String of XML formatted worksheet.
    
    var header = getHeaderNames(table);
    var table = $(table).DataTable();
    var rowNum = 1;
    var mergeCells = '';
    var ws = '';
    
    ws += buildCols(header);
    ws += '<sheetData>';
    
    if (title.length > 0) {
      ws += buildRow([title], rowNum, 51);
      rowNum++;
      
      mergeCol = ((header.length - 1) + 10).toString(36).toUpperCase();
      
      mergeCells = '<mergeCells count="1">'+
        '<mergeCell ref="A1:' + mergeCol + '1"/>' +
                   '</mergeCells>';
    }
                      
    ws += buildRow(header, rowNum, 2);
    rowNum++;
    
    // Loop through each row to append to sheet.    
    table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
      var data = this.data();
      
      // If data is object based then it needs to be converted 
      // to an array before sending to buildRow()
      ws += buildRow(data, rowNum, '');
      
      rowNum++;
    } );
    
    ws += '</sheetData>' + mergeCells;
        
    return ws;

  }
  
  function setSheetName(xlsx, name) {
    // Changes tab title for sheet.
    //Params:
    //  xlsx: xlxs worksheet object.
    //  name: name for sheet.
    
    if (name.length > 0) {
      var source = xlsx.xl['workbook.xml'].getElementsByTagName('sheet')[0];
      source.setAttribute('name', name);
    }
  }
  
  function addSheet(xlsx, table, title, name, sheetId) {
    //Clones sheet from Sheet1 to build new sheet.
    //Params:
    //  xlsx: xlsx object.
    //  table: table ID.
    //  title: Title for top row or blank if no title.
    //  name: Name of new sheet.
    //  sheetId: string containing sheetId for new sheet.
    //Returns:
    //  Updated sheet object.
    
    //Add sheet2 to [Content_Types].xml => <Types>
    //============================================
    var source = xlsx['[Content_Types].xml'].getElementsByTagName('Override')[1];
    var clone = source.cloneNode(true);
    clone.setAttribute('PartName','/xl/worksheets/sheet' + sheetId + '.xml');
    xlsx['[Content_Types].xml'].getElementsByTagName('Types')[0].appendChild(clone);
    
    //Add sheet relationship to xl/_rels/workbook.xml.rels => Relationships
    //=====================================================================
    var source = xlsx.xl._rels['workbook.xml.rels'].getElementsByTagName('Relationship')[0];
    var clone = source.cloneNode(true);
    clone.setAttribute('Id','rId'+sheetId+1);
    clone.setAttribute('Target','worksheets/sheet' + sheetId + '.xml');
    xlsx.xl._rels['workbook.xml.rels'].getElementsByTagName('Relationships')[0].appendChild(clone);
    
    //Add second sheet to xl/workbook.xml => <workbook><sheets>
    //=========================================================
    var source = xlsx.xl['workbook.xml'].getElementsByTagName('sheet')[0];
    var clone = source.cloneNode(true);
    clone.setAttribute('name', name);
    clone.setAttribute('sheetId', sheetId);
    clone.setAttribute('r:id','rId'+sheetId+1);
    xlsx.xl['workbook.xml'].getElementsByTagName('sheets')[0].appendChild(clone);
    
    //Add sheet2.xml to xl/worksheets
    //===============================
    var newSheet = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'+
      '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac" mc:Ignorable="x14ac">'+
      getTableData(table, title) +
      
      '</worksheet>';

    xlsx.xl.worksheets['sheet' + sheetId + '.xml'] = $.parseXML(newSheet);
    
  }
        $('#footer_callback').DataTable({
        dom: 'Bfrtip',
        buttons: [
            // { extend: 'copyHtml5' },//, footer: true },
            { extend: 'excelHtml5',
            customize: function( xlsx ) {
                setSheetName(xlsx, 'User');
                addSheet(xlsx, '#footer_callback_2', 'Transaction Logs', 'Transaction Logs', '2');
                addSheet(xlsx, '#footer_callback_3', 'System Logs', 'System Logs', '3');
        
                }
            },//, footer: true },
            // { extend: 'csvHtml5'},//, footer: true },
            // { extend: 'pdfHtml5'}//, footer: true }
        ],
    fixedHeader: {
        header: true,
        footer: false,
        headerOffset: $('.topbar').height()
    },
    "paging":false 

 });
 $('#footer_callback_2').DataTable();
 $('#footer_callback_3').DataTable({
        dom: 'Bfrtip',
        buttons: [
            // { extend: 'copyHtml5' },//, footer: true },
            { extend: 'excelHtml5',
            customize: function( xlsx ) {
                setSheetName(xlsx, 'System Logs');
               
        
                }
            },//, footer: true },
            // { extend: 'csvHtml5'},//, footer: true },
            // { extend: 'pdfHtml5'}//, footer: true }
        ],
    fixedHeader: {
        header: true,
        footer: false,
        headerOffset: $('.topbar').height()
    },
    "paging":false 

 });
    });

    $('#phone').keyup(function() {
    
    if (this.value.length == 11 && $.isNumeric( this.value )) {
        var number = this.value;
        document.title = number;
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('getuserrecord')); ?>",
            data: {phone:this.value},
            success: function (response) {
                //console.log(response.user[0]);
                //console.log(response.user[0].transaction_logs);
                //console.log(response.user[0].system_logs);
                if (response.user !== null) {
                    adduser(response.user[0]);
                    tLogs(response.user[0].transaction_logs);
                    sLogs(response.user[0].system_logs);
                    $('.preloader').fadeOut();
                }else{
                    toastr.options =
                     {
                        "closeButton" : true,
                        "progressBar" : true
                     }
  		               toastr.error("No data Found");
                }

            }
        });
    }
});
function adduser(user){
    var table = $('#footer_callback').DataTable();
    table.clear().draw();
    table.row.add( [
                        user.msisdn,
                        user.last_successful_charge,
                        user.plan_id,
                        user.dateCreated,
                        user.is_subscribed,
                        user.source_id,
                        user.unsub_date,
                        ] ).draw( false );
}
 function tLogs(logs){
    var table = $('#footer_callback_2').DataTable();
    table.clear().draw();
    logs.forEach(element => {
                    // landedcount+=element.total_landed;
                    // uniquecount+=element.total_unique;
                    // trialcount+=element.trial;
                    // convertedcount+=element.converted;
                    //$('#footer_callback').append("<tr><td>"+element.date+"</td><td>"+element.total_landed+"</td> <td>"+element.total_unique+"</td></td> <td>"+element.trial+"</td><td>"+element.converted+"</td></tr>");
                    table.row.add( [
                        element.msisdn,
                        element.transaction_id,
                        element.dateCreated,
                        element.amount,
                        element.status,
                        element.charging_mode,
                        element.remarks,
                        ] ).draw( false );

                     });
 }
 function sLogs(logs){
    var table = $('#footer_callback_3').DataTable();
    table.clear().draw();
    logs.forEach(element => {
                    // landedcount+=element.total_landed;
                    // uniquecount+=element.total_unique;
                    // trialcount+=element.trial;
                    // convertedcount+=element.converted;
                    //$('#footer_callback').append("<tr><td>"+element.date+"</td><td>"+element.total_landed+"</td> <td>"+element.total_unique+"</td></td> <td>"+element.trial+"</td><td>"+element.converted+"</td></tr>");
                    table.row.add( [
                        element.msisdn,
                        element.id,
                        element.dataCreated,
                        element.target,
                        element.status,
                        element.type,
                        ] ).draw( false );

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

<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/mini_app/deikhodashboard/resources/views/userrecord.blade.php ENDPATH**/ ?>