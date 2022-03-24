<?php
// Start the session
session_start();
require_once("../models/database.php");
$_SESSION["lastName_error"]="";
$_SESSION["email_error"]="";
$_SESSION["password_error"]="";
$_SESSION["first_name_error"]="";
$form_valid = false;
$email_valid=false;
$first_valid=false;
$last_valid=false;
$password_valid=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['gender'])){
        $gender=$_POST['gender'];
    }

    if(isset($_POST['birth'])){
        $birth=date('Y-m-d',strtotime($_POST['birth']));
    }

    if (isset($_POST['firstName'])){
        $first_name=$_POST['firstName'];
        if ($first_name==null){
            $_SESSION["first_name_error"]='Please input a username';
        }
        else{
            $first_valid=true;
        }
    }

    if (isset($_POST['lastName'])){
        $last_name=$_POST['lastName'];
        if ($last_name==null){
            $_SESSION["lastName_error"]='Please input last name';
        }
        else{
            $last_valid=true;
        }
    if (isset($_POST['email'])){
        $email=$_POST['email'];
        if ($email != null){
            if (!validate_email($email)){
                $_SESSION["email_error"]='email must containn @';
            }else{
                $email_valid=true; 
            }
        }else{
            $_SESSION["email_error"]='Please enter an email';
        }
    }
    if (isset($_POST['pwd'])){
        $password=$_POST['pwd'];
        if ($password==null){
            $_SESSION["password_error"]='Please input password!';
        
        }else{
            $password_valid=true;
        }
        
    }
        if (($last_valid && $first_valid && $email_valid && $password_valid)==true){
            createNewItem($first_name,$last_name,$email,$password,$birth,$gender);
            header("location:post_view.php");

        }
        
    }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
</head>

<body>
    <!-- Form Create new account -->
    <form action="#" method="post" >
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                                <form>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" name="firstName" id="firstName" class="form-control form-control-lg" placeholder="First Name"   />  
                                                <small class="form-text"><?php echo $_SESSION["first_name_error"] ?></small class="form-text">                                                                     
                                                <?php                  
                                                    ?>                                             
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" name="lastName" id="lastName" class="form-control form-control-lg" placeholder="Last Name" />
                                                <span> <?php echo $_SESSION["lastName_error"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="email" name="email" id="emailAddress" class="form-control form-control-lg" placeholder="Email" />
                                                <span><?php echo $_SESSION["email_error"] ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="password" name="pwd" id="password" class="form-control form-control-lg" placeholder="password" />  
                                                <span><?php echo $_SESSION["password_error"] ?></span>                                           
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 d-flex align-items-center">
                                            <div class="form-outline datepicker w-100">
                                                <input type="date" name="birth" class="form-control form-control-lg" id="birthdayDate" placeholder="Birthday" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <h6 class="mb-2 pb-1" >Gender: </h6>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Female" />
                                                <label class="form-check-label" for="femaleGender">Female</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male" />
                                                <label class="form-check-label" for="maleGender">Male </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-2">
                                    
                                      <button class="btn btn-primary btn-lg" type="submit" value="Submit" name="submit"   > Submit</button>
                                      
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>

</html>

</body>

</html>