<?php
spl_autoload_register(function($class) {
    include "../system/{$class}.php";
});
$db = new Topimage();
if(isset($_GET['id']))  {
    $id=$_GET['id'];
    $delData=$db->deleteImage($id);

    if($delData)
    {
        echo "<script>alert('Data Deleted Successfully.');</script>";
        echo "<script>window.location = 'managetop_image.php?id=<?php echo $id  ?>';</script>";
    }else
    {
        echo "<script>alert('Data Not Deleted.');</script>";
        echo "<script>window.location = 'managetop_image.php';</script>";
    }
}
?>

