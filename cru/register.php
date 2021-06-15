<?php
require ('dbcon.php');
if(isset($_POST['register_btn'])){
    $emp_no= $_POST['emp_number'];
    $username= $_POST['username'];
    $password= $_POST['password'];
    $password1=$_POST['password1'];

    // now validating
    if($emp_no==""){
        echo " enter employee number";
    }
    


    else if ($username==""){
        echo "enter username";
    }
    else if ($password=="" || $password1 ==""){
        echo "enter password";
    }
    else if($password!=$password1){
        echo "enter the same password";
    }

    else{
        // checking if employee number exists
        $selectdb ="select * from employees";
        $result = mysqli_query($connection,$selectdb);
        $takeresult=mysqli_fetch_assoc($result);

        if($takeresult['emp_no']===$emp_no){
            echo "employee number already exists";
        }
        else{
            $password = md5($password);
            $insert= "insert into employees(emp_no,username,password) VALUES ('$emp_no','$username','$password')";
            $insert_result=mysqli_query($connection,$insert);
        }
    }
}
?>

<!DOCTYPE html>
<html>
        <head>
            <title> Crud</title>
         </head>
     <body>
        <form action="register.php" method="POST">
            <input type="number" name="emp_number" placeholder="employee number">
            <br><br>
            <input type="text" name="username" placeholder=" enter username">
            <br><br>
            <input type="password" name="password" placeholder=" enter password">
            <br><br>
            <input type="password" name="password1" placeholder=" confirm password">
            <br><br>

            <button type="submit" name="register_btn">Register</button>
            <button type="reset"  > Clear</button>
        </form>
    </body>
</html>