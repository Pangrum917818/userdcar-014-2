<?php
    session_start();
    if(isset($_GET['category'])){
        $cat=$_GET['category'];
    }
    else{
        header("location:index.php");
    }
    include("connect.php");
    $sql ="SELECT * FROM product WHERE category=$cat ";
    $result = $conn->query($sql);
    if(!$result){
        echo "Error:".$conn->error;
    }
    else{
        if($result->num_rows>0){
            $prd = $result->fetch_object();
        }
        else{
            $prd=NULL;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เข้าสู่ระบบบ</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php
        include_once("connect.php");
        if(isset($_POST['submit'])){

            $username = $conn-> real_escape_string ($_POST['username']);
            $password = md5($conn->real_escape_string($_POST['password']));

            $sql = "SELECT * FROM customer WHERE username ='$username' AND password ='$password'";


            $result = $conn->query($sql);

            if($result->num_rows>0){
        
                $row=$result->fetch_array();   
                $_SESSION['id']=$row['id'];
                $_SESSION["name"]=$row['firstname'] . " " . $row['lastname'];
                $_SESSION['username']=$row['username'];

                header("location: index.php");


                
            }
        }
    ?>
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <div class="col-md-8 col-md-offset-2" style="margin-top:50px">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">กรุณาเข้าสู่ระบบ</div>
                        <div class="panel-body">
                            <div class="form-group row">
                                <label for="username" class="col-md-3">Username</label>
                                <div class="col-md-9">
                                    <input type="text" name="username" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type=submit class="btn btn-success btn-block" name="submit">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
        });
        $(".lnkdelete").click(function(){
            if(confirm("Confirm Delete?")){
                return true;
            }
            else{
            return false;
            }
        });
    </script>
</body>
</html>