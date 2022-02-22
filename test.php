<?php
require_once("db.php");
$sql = "SELECT * FROM users ORDER BY userId DESC";
$result = mysqli_query($conn,$sql);
?>
 <!-- DataTables -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.1.0/css/searchBuilder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.4/css/colReorder.dataTables.min.css">




    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Material Inward Records</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Name</th>
                    <th>Date of birth</th>
                    <th>Mobile Number</th>
                    <th>PAN Card</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Pincode</th>
                    <th>CRUD Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    if($i%2==0)
                    $classname="evenRow";
                    else
                    $classname="oddRow";
                    ?>
                  <tr class="<?php if(isset($classname)) echo $classname;?>">
                    <th><?php echo $row["first_name"]; ?></th>
                    <th><?php echo $row["age"]; ?></th>
                    <th><?php echo $row["mobile_number"]; ?></th>
                    <th><?php echo $row["pan"]; ?></th>
                    <th><?php echo $row["pincode"]; ?></th>
                    <th><?php echo $row["address"]; ?></th>
                    <th><?php echo $row["city"]; ?></th>
                    <th><?php echo $row["state"]; ?></th>
                    <th><?php echo $row["country"]; ?></th>
                    <th><a href="edit_user.php?userId=<?php echo $row["userId"]; ?>" class="link"><img alt='Edit' title='Edit' src='images/edit.png' width='15px' height='15px' hspace='10' /></a>  <a href="delete_user.php?userId=<?php echo $row["userId"]; ?>"  class="link"><img alt='Delete' title='Delete' src='images/delete.png' width='15px' height='15px'hspace='10' /></a></th>
                    </tr>
                    <?php
                    $i++;
}
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.1.0/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>


    <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'QBfrtip',
        colReorder: true,
        buttons: [
            'colvis',
            'copy',
            {
                extend: 'excel',
                messageTop: 'PDF created by PDFMake with Buttons for DataTables.',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                messageTop: 'Brush India',
                exportOptions: {
                    columns: ':visible'
                }
            },
              {
                    extend: 'print',
                    exportOptions:{
                    columns:':visible'
                    }
            }
        ]
    } );
} );
    </script>
     <script src="adminlte.js"></script>

