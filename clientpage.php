
<?php
include'modl.php';

$obj=new modl();
?>
<!DOCTYPE html>
<html>
<head>

    <title>CRUD Operation in PHP OOPS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body><br>

<h2 class="text-center text-info">CLIENT PAGE</h2><br>
<div class="container">

    <?php
    if(isset($_GET['editid']))
    {
        $editid=$_GET['editid'];
        $myrecord=$obj->displayRecordById($editid);
        ?>

        <form action="indx.php" method="post">

            <div class="form-group">
                <label>Name</label>

                <input type="text" name="name"  value="<?php echo $myrecord['name'];?>"
                       placeholder="Enter Your Name" class="form-control">

            </div>


            <div class="form-group">

                <label>password</label>

                <input type="text" name="password" value="<?php echo $myrecord['password'];?>"
                       placeholder="Enter Your password" class="form-control">

            </div>
            <div class="form-group">
                <input type="hidden" name="hid" value="<?php echo $myrecord['id'];?>">
                <input type="submit" name="update" value="update" class="btn btn-info">
            </div>
        </form>
        <?php
    }else{
    ?>
    <form action="indx.php" method="post">
        <?php
        }
        ?>

        <h4 class ="text-center text-danger ">Display records</h4>
        <table class="table table-bordered">
            <tr class="bg-primary text-center">
                <th>S.No</th>
                <th>Name</th>
                <th>password</th>
            </tr>
            <?php
            $data=$obj->displayRecord();
            foreach($data as $value){
            ?><tr class="text-center">
                <td><?php echo $value['id'];?></td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['password'];?></td>


</div></td>

<?php
}
?>
</table>
<a href="oop1.php" class="btn btn-success exitbtn ">Back</a>
</div>
</body>
</html>