<?php

spl_autoload_register(function($class) {
    include "../system/{$class}.php";
});
$db = new Bottomimage();
if(isset($_GET['id']))  {
    $id=$_GET['id'];
    $delData=$db->deleteBottomImage($id);

    if($delData)
    {
        echo "<script>alert('Data Deleted Successfully.');</script>";
        echo "<script>window.location = 'managebottom_image.php?id=<?php echo $id  ?>';</script>";
    }else
    {
        echo "<script>alert('Data Not Deleted.');</script>";
        echo "<script>window.location = 'managebottom_image.php';</script>";
    }
}
?>

