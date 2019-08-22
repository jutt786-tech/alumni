<?php
session_start();

if(!isset($_SESSION['adminName'])) {
   header('location:../admin_login.php');
   exit();
}
spl_autoload_register(function($class){
    include "../system/{$class}.php";
});


$obj =new Topimage();
if(!isset($_POST['save'])) {
    $row = $obj->getImagesById($_GET['id']);
}else
    $row = $obj->getImagesById($_POST['id']);
if(isset($_POST['save']) && $_POST['save']=='Update') {

     $name=$_POST['name'];
      $image=$obj->startUpload(); 

     //$obj->Topimage=$_GET['topimage'];
           $obj->updateTopImage($name,$_GET['id'],$image);


           header('location:managetop_image.php');
           exit();
}
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
                    <h1 class="page-header">Manage image</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Top image
                        </div>

                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                 <form role="form" action="" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label style="font-size: 13px">Name</label>
                                                <input required value="<?php echo $row[0]['name'] ; ?>" class="form-control" name="name" id="exampleInputTitle" placeholder="Enter News title" type="text">
                                            </div><br>
                                            <div class="form-group">
                                            
                                                <div class="input1">
                                                    <label>Upload Photo:<small>*</small></label>
                                                    <input type="file" name="topimage" id="logo" onchange="readURL(this);">
                                                </div>
                                              
                                                <input type="hidden" name="id" value="<?php echo $row[0]['id'] ;  ?>">
                                                <input type="submit" name="save" value="Update" class="btn btn-success pull-right" >
                                                <br>
                                            </div>
                                        </div>
                                    </form>
                            </table>
                            <!-- table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- panel -->
                </div>
                <div class="col-md-2"></div>
            </div>
            <!-- row -->
    <?php    include 'include/footer.php';  ?>      
        </div> <!-- /#page-wrapper-TABLE -->
    </div> <!-- /#wrapper-MAIN -->
    <!-- jQuery -->
  <?php  include 'include/link_2.php'; ?>
