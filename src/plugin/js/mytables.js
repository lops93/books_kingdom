$(document).ready(function() {
  $('div.dataTables_filter input').addClass('form-control');
  jQuery('#tbl_livro').DataTable( {
    "paging": true,
    "processing": true,
    'serverMethod': 'post', 
    "ajax": "../../../src/controller/tabledata.php",
    dom: 'lBfrtip',
    buttons: [
         'excel',  'csv', 'pdf',
    ],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "columnDefs": [
      { "width": "30%", "targets": 1 },
      { "width": '20%', "targets": 3 }
    ],
    
  });
  $('#tbl_reg').DataTable();
});
