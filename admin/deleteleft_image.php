<?php
spl_autoload_register(function($class) {
    include "../system/{$class}.php";
});
$db = new Leftimage();
if(isset($_GET['id']))  {
    $id=$_GET['id'];
    $delData=$db->deleteLeftImage($id);

    if($delData)
    {
        echo "<script>alert('Data Deleted Successfully.');</script>";
        echo "<script>window.location = 'manageleft_image.php?id=<?php echo $id  ?>';</script>";
    }else
    {
        echo "<script>alert('Data Not Deleted.');</script>";
        echo "<script>window.location = 'manageleft_image.php';</script>";
    }
}
?>

