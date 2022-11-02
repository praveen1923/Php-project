<?php
class modl
{
    public $conn;
    function __construct()
    {
        $this->conn = mysqli_connect('localhost', 'root', 'Praveen@123', 'nuro');
        if (!$this->conn) {
            echo 'not connected';
        }
    }


    public function insertRecord($post)
    {
        $name = $post['name'];
        $password = $post['password'];
        $pass=password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO odd(name,password)VALUES('$name','$pass')";
        $result = $this->conn->query($sql);
        if ($result) {
            header('location:indx.php?msg=ins');
        } else {
            echo "Error" . $sql . "<br>" . $this->conn->error;
        }
    }

    public function deleteRecord($delid)
    {
        $sql = "DELETE FROM odd WHERE id='$delid'";
        $result = $this->conn->query($sql);
        if ($result) {
            header('location:indx.php?msg=del');
        } else {
            echo "Error" . $sql . "<br>" . $this->conn->error;

        }
    }


    public function displayRecord()
    {
        $sql = "SELECT * FROM odd";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function viewrecord()
    {
        $sql = "SELECT * FROM odd";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function updateRecord($post)
    {
        $name = $post['name'];
        $password = $post['password'];
        $editid = $post['hid'];
        $sql = "UPDATE odd SET name='$name',password='$password' WHERE id='$editid'";
        $result = $this->conn->query($sql);
        if ($result) {
            header('location:indx.php?msg=ups');
        } else {
            echo "Error" . $sql . "<br>" . $this->conn->error;
        }
    }

    public function displayRecordById($editid)
    {
        $sql = "SELECT * FROM odd WHERE id='$editid'";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }
}
$obj=new modl();
