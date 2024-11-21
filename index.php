<?php

//include function page
include_once('lib/function/userFunction.php');
if(isset($_POST['btnLogin'])){
    $result = Authentication($_POST['userName'],$_POST['userPass']);
    echo($result);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMS</title>
    <!-- Link bootstrap -->

    <link rel="stylesheet" href="CSS/bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body style="background-image: url('images/background1.jpg'); 
             background-size: cover; 
             background-position: center; 
             background-repeat: no-repeat; 
             height: 100vh; 
             margin: 0;">

 
<div class="container" style="margin-top:40px ;">
    <div class="row" >
        <div class="col-md-6">
            <div class="card" style="background-color: rgba(0,0,0,0.4);">
                <div class="card-header">
                    <h1 style="color:white">Login Section </h1>
                </div>
                <div class="card-body" >
                    <form action="" method="post">
                        <div class="form-group mt-3">
                            <label for="username" ; style="color:white">Enter your username</label>
                            <input type="text" name="userName" id="userName" class="form-control" require >
                        </div> 

                        <div class="form-group mt-3">
                            <label for="userpass" ; style="color:white">Enter your password</label>
                            <input type="password" name="userPass" id="userPass" class="form-control" require>
                        </div>

                        <div class="form-group mt-3">
                            <input type="submit" value="Login" name="btnLogin" class="btn btn-outline-warning btn-sm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
          
        <div class="col-md-6">
    <div class="card" style="background-color: rgba(0,0,0,0.4);">
        <div class="card-header">
           <h1 style="color:white"> Registration Section </h1>
        </div>

        <div class="card-body">
            <form action="lib/route/user/registration.php" method="post">
                <div class="form-group mt-3">
                    <label for="username" ; style="color:white">Enter your name</label>
                    <input type="text" name="userName" id="userName" class="form-control" require>
                </div> 

                <div class="form-group mt-3">
                    <label for="userEmail" ; style="color:white" >Enter your Email</label>
                    <input type="email" name="userEmail" id="userEmail" class="form-control" require>
                </div>

                <div class="form-group mt-3">
                    <label for="userpass" style="color:white" >Enter your password</label>
                    <input type="password" name="userPass" id="userPass" class="form-control" require>
                </div>

                <div class="form-group mt-3">
                    <label for="userphone" ; style="color:white">Enter your phone</label>
                    <input type="tel" name="userPhone" id="userPhone" class="form-control" require>
                </div>

                <div class="form-group mt-3">
                    <label for="userNic" ; style="color:white" >Enter your NIC</label>
                    <input type="text" name="userNic" id="userNic" class="form-control" require>
                </div>

                <div class="form-group mt-3">
                    <input type="submit" name="btnSave" id="btnSave" value="Register" class="btn btn-outline-success btn-sm">
                    <input type="reset" value="Clear" class="btn btn-outline-danger btn-sm">
                </div>
            </form>
        </div>
    </div>
</div>

        
                </form>
            </div>
           
        </div>
    </div>
</div>

</body>
</html>
