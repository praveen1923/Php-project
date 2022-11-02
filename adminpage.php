
<?php
include'modl.php';


$obj=new modl();
if(isset($_POST['submit'])){
    $obj->insertRecord($_POST);
}
if(isset($_POST['update'])) {
    $obj->updateRecord($_POST);
}


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

<h2 class="text-center text-info">ADMIN PAGE</h2><br>
<div class="container">
    <?php
    if(isset($_GET['msg']) AND $_GET['msg']=='ins') {
        echo '<div class="alert alert-primary" role="alert">
   
   
</div>';
    }
    if (isset($_GET['msg']) AND $_GET['msg'] == 'ups') {
        echo '<div class="alert alert-primary" role="alert">
   
   
</div>';
    }

    ?>
    <?php
    if(isset($_GET['editid']))
    {
        $editid=$_GET['editid'];
        $myrecord=$obj->displayRecordById($editid);
        ?>

        <form action="logg1.php" method="post">

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
        <form action="logg1.php" method="post">

            <div class="form-group">

                <label>Name</label>

                <input type="text" name="name" placeholder="Enter Your Name" class="form-control">

            </div>


            <div class="form-group">

                <label>Password</label>

                <input type="text" name="password" placeholder="Enter Your password" class="form-control">

            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn btn-info">
            </div>
        </form><br>
        <?php
    }
    ?>

    <h4 class ="text-center text-danger ">Display records</h4>
    <table class="table table-bordered">
        <tr class="bg-primary text-center">
            <th>S.No</th>
            <th>Name</th>
            <th>password</th>
            <th>Action</th>
        </tr>
        <?php
        $data=$obj->displayRecord();
        foreach($data as $value){
        ?><tr class="text-center">
            <td><?php echo $value['id'];?></td>
            <td><?php echo $value['name'];?></td>
            <td><?php echo $value['password'];?></td>
</div></td>
<td>
    <a href="logg1.php?editid=<?php echo $value['id'];?>" class="btn btn-info">Edit</a>

</td>
<?php
}
?>
</body>
</html>