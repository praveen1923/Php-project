
<?php
include'modl.php';

$obj=new modl();
if(isset($_POST['submit'])){

    $obj->insertRecord($_POST);
}


if(isset($_GET['deleteid'])) {
    $delid=$_GET['deleteid'];
    $obj->deleteRecord($delid);
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
  Inserted sucessfully
</div>';
    }

    if (isset($_GET['msg']) AND $_GET['msg'] == 'del') {
        echo '<div class="alert alert-primary" role="alert">
  Deleted sucessfully
</div>';
    }
    ?>
    <?php
    if(isset($_GET['editid']))
    {
        $editid=$_GET['editid'];
        $myrecord=$obj->displayRecordById($editid);
        ?>

        <form action="indx.php" method="post">

            <div class="form-group">
                <label>name</label>

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

            <div class="form-group">

                <label>name</label>

                <input type="text" name="name" placeholder="Enter Your Name" class="form-control">

            </div>

            <div class="form-group">

                <label>password</label>

                <input type="password" name="password" placeholder="Enter Your password" class="form-control">

            </div>
            ;
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
            <th>name</th>
            <th>password</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php
        $data=$obj->displayRecord();
        foreach($data as $value){
        ?><tr class="text-center">
            <td><?php echo $value['id'];?></td>
            <td><?php echo $value['name'];?></td>
            <td><?php echo $value['password'];?></td>
            <td><?php echo $value['Role'];?>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="indexx.php">Admin</a></li>
                        <li><a href="login2.php">Client</a></li>
                    </ul>
                </div>
</div></td>
<td>
    <a href="indx.php?deleteid=<?php echo $value['id'];?>" class="btn btn-danger">Delete</a>
</td>
<?php
}
?>
</table>
<a href="oop1.php" class="btn btn-success exitbtn ">Back</a>
</div>
</body>
</html>