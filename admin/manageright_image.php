<?php
session_start();

if(!isset($_SESSION['adminName'])) {
   header('location:../admin_login.php');
   exit();
}
spl_autoload_register(function($class){
    include "../system/{$class}.php";

});
$obj =new Rightimage();
$row=$obj->getRightImageById("id");
// echo "<pr>";
// print_r($row);
// exit();
// echo "</pre>";

?>

<?php 
include 'include/link_1.php';
  ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include 'include/head_sidebar.php'; ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Rightside image</h1>
                     <a class="btn btn-primary" href="addright_image.php" >Add New image</a>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Image Data Table
                        </div>
                       
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                               
                                <thead>
                                    <tr>
                                        <th>ID:</th>
                                         <th>Name</th>
                                        <th>Image</th>
                                        <th>Updates</th>
                                        <th> Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php
                                               if(count($row) > 0) {
                                                    for($i=0; $i<count($row);$i++){
//                                                    echo $row[$i]['images'];
                                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row[$i]['id'];  ?></td>
                                        <td><?php echo $row[$i]['name'] ?></td>
                                        <td>   <img src="<?php echo $row[$i]['rightimage']; ?>" height="100px;" width="50%">
                                        </td>
                                                                         
                                         <td><a href="updateright_image.php?id=<?php echo $row[$i]['id']  ?>" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span>Update</a></td>
                                         <td><a href="deleteright_image.php?id=<?php echo $row[$i]['id'] ?>" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span>Delete</a></td>
                                       
                                    </tr>                                 
                                    <?php
                                    }
                                }
                                    ?>
                                </tbody>
                            </table>
                             <!-- table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- panel -->
                </div>
                <!-- col-lg-12 -->
            </div>
            <!-- row -->
        <?php    include 'include/footer.php';  ?>

        </div> <!-- /#page-wrapper-TABLE -->

    </div> <!-- /#wrapper-MAIN -->

    <!-- jQuery -->
  <?php  include 'include/link_2.php'; ?>
