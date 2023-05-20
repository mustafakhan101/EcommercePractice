<style>
html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(pink,black);
}

.login-box {
  position: absolute;
  top: 100%;
  left: 50%;
  width: 500px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}


.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  
  text-align: center;
}
.login-box h2:hover{
    background: #ff3399;
  color: black;
  border-radius: 5px;
  box-shadow: 0 0 5px #ff3399,
              0 0 25px #ff3399,
              0 0 50px #ff3399,
              0 0 100px #ff3399;
}


.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 15px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}

.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.user-box input[type="radio"] {
  display: inline-block;
  margin-right: 10px;
  vertical-align: middle;

}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #ff3399;
  font-size: 12px;
}

.login-box form button {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #fff;
  background: #ff3399;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box button:hover {
  background: #ff3399;
  color: black;
  border-radius: 5px;
  box-shadow: 0 0 5px #ff3399,
              0 0 25px #ff3399,
              0 0 50px #ff3399,
              0 0 100px #ff3399;
}

.login-box button span {
  position: absolute;
  display: block;
}

.login-box button span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, black, #ff3399);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box button span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, black, #ff3399);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}


@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box button span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, black, #ff3399);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box button span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, black, #ff3399);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}

</style>



<?php include_once("../../Config.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
</head>
<body>
    <?php include_once("Header.php"); ?>

    <?php
        $Id = $_GET["IdGo"];
        $Fetch = mysqli_query($conn,"SELECT * FROM `tbl_employee` WHERE Emp_Id = $Id");
        $My_Array = mysqli_fetch_array($Fetch);
    ?>

    <div class="login-box">
        <h2>Update Employee </h2>
        <form action="" method="post" enctype="multipart/form-data">

            <div class="user-box">
                <input type="text" name="EmployeeName" required="" value="<?php echo $My_Array[1];?>">
                <label>Employee Name</label>
            </div>

            <div class="user-box">
            <input type="email" name="EmployeeEmail" required="" value="<?php echo $My_Array[2];?>">
                <label>Employee Email</label>
            </div>

            <div class="user-box">
            <input type="text" name="EmployeeAdress" required="" value="<?php echo $My_Array[3];?>">
                <label>Employee Adress</label>
            </div>

            <div class="user-box">
            <input type="text" name="EmployeePhone" required="" value="<?php echo $My_Array[4];?>">
                <label>Employee Phone</label>
            </div>

            
            <div class="user-box">
            <label>Employee Gender:</label>
            <input type="radio" name="EmployeeGender" value="Male" <?php if($My_Array[5]=="Male"){echo "checked";}?> checked >Male 
            <input type="radio" name="EmployeeGender" value="Female" <?php if($My_Array[5]=="Female"){echo "checked";}?> >Female 
            <input type="radio" name="EmployeeGender" value="Other" <?php if($My_Array[5]=="Other"){echo "checked";}?> >Other 
            </div>
            

                
                
                
            

            <div class="user-box">
            <input type="number" name="EmployeeSalary" required="" value="<?php echo $My_Array[6];?>">
                <label>Employee Salary</label>
            </div>

            <div class="user-box">
            <input type="text" name="EmployeeDepart" required="" value="<?php echo $My_Array[7];?>">
                <label>Employee Depart</label>
            </div>

            <div class="user-box">
                <label>Employee Image</label>
                <br><br>
                <input type="file" name="EmpImage" value="" required accept="image/*" >
                <img src="<?php echo $My_Array[8];?>" width="100" height="100">
                </div>

            <button name="UpdateEmployee" type="submit">Update Employee</button>
      </form>
  </div>

    <?php include_once("Footer.php"); ?>
    
    <?php  
    
    if(isset($_POST["UpdateEmployee"])){
        $Emp_Name = $_POST["EmployeeName"];
        $Emp_Email = $_POST["EmployeeEmail"];
        $Emp_Adress = $_POST["EmployeeAdress"];
        $Emp_Phone = $_POST["EmployeePhone"];
        $Emp_Gender = $_POST["EmployeeGender"];
        $Emp_Salary = $_POST["EmployeeSalary"];
        $Emp_Depart = $_POST["EmployeeDepart"];
        $img_name = $_FILES["EmpImage"]["name"];
        $img_size = $_FILES["EmpImage"]["size"];
        $img_temp = $_FILES["EmpImage"]["tmp_name"];
   
        $image_Location = "../../EmployeeImages/" . $img_name;
   
        if($img_size <= 1000000){
           move_uploaded_file($img_temp,$image_Location);
           $Update_Employee="UPDATE `tbl_employee` SET `Emp_Name`='$Emp_Name',
           `Emp_Email`='$Emp_Email',
           `Emp_Address`='$Emp_Adress',
           `Emp_Number`='$Emp_Phone',
           `Emp_Gender`='$Emp_Gender',
           `Emp_Salaray`='$Emp_Salary',
           `Emp_Depart`='$Emp_Depart',
           `Emp_Image`='$image_Location' WHERE Emp_Id = $Id";
   
            $Run_UpdateEmployee = mysqli_query($conn,$Update_Employee);
   
            if($Run_UpdateEmployee==true){
               echo "<script>
               alert('Employee Updated Successfully!')
               window.location.href='Dashboard.php'
               </script>";
            }
            else{
               echo "<script>
               alert('Something went Wrong');
               window.location.href='ManageProfile.php'
               </script>";
            }
   
        }
        else{
           echo "<script>
           alert('Image Must Be 1Mb')
           window.location.href='ManageProfile.php'
           </script>";
        }
   
   
   
   
   
   
       }
   
   
    
    ?>
</body>
</html>