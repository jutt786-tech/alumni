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
$row=$obj->CountTopId("id");

$obj =new Bottomimage();
$Brow=$obj->CountBottomId("id");

$obj =new Rightimage();
$Rrow=$obj->CountRightId("id");

$obj =new Leftimage();
$Lrow=$obj->CountLeftId("id");

// echo "<pr>";
// print_r($row);
// exit();
// echo "</pre>";



include 'include/link_1.php';

?>
    <div id="wrapper">

        <!-- Navigation and header include this file -->
        <?php    include 'include/head_sidebar.php';  ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                  <?php if(isset($_SESSION['adminName'])){?><div class="alert alert-success">
                            <?php $us=$_SESSION['adminName'];
                            echo "Welcom:".$us;
                           }?></div> 

        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?Php
                                        // (for $i=0;  $i<1; $i++){                     
                                       ?>
                                     <div class="huge">
                                       <tr style="text-align: center; font-size: 30px; font-weight: bold"></tr>
                                        
                                    </div>
                                   <div class="huge"><?php echo $row[0]['count(id)'];   ?></div>  
                                    <div>Total Top images!</div>
                                </div>
                        </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-male fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   <?Php                     
                                        // include 'database/db.php';
                                        // $result=mysqli_query($con,"select count(teacher_id) from teacher ");
                                       ?>
                                       
                                     <div class="huge">
                                        <?php
                                        //  while($row= mysqli_fetch_array($result)){ ?>
                                         <tr style="text-align: center; font-size: 30px; font-weight: bold"></tr>
                                         <?php
                                        // }
                                        ?>
                                    </div>
                                    <div class="huge"><?php echo $Rrow[0]['count(id)'];   ?></div>
                                    <div>Total Right Images!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-child fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $Brow[0]['count(id)'];   ?></div>

                                    <div>Total Bottom images!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $Lrow[0]['count(id)'];   ?></div>
                                    <div>Total Leftside Images !</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <!-- /.row -->
            
                        <!-- /.panel-hea ding -->
                   
                             
                    
                       
                              
           
<!-- BODY AND LINK  FILE Include -->

<?php
// include '../include/footer.php';
include 'include/link_2.php';

?>
