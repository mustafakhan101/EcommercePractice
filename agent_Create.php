<?php
ob_start();
require_once "sidebar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agent create</title>
</head>

<body>
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!--  Traffic  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="text-center mb-4">
                            <h3>Add New Agent</h3>
                            <p class="text-muted">Complete the form below to add a new agent</p>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <!-- <canvas id="TrafficChart"></canvas>   -->

                                <div class="container d-flex justify-content-center">
                                    <form action="" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="aname"
                                                    placeholder="Enter name">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" name="aemail"
                                                    placeholder="Enter email">
                                            </div>
                                        </div>
                                        <!-- <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" name="aaddress"
                                                    placeholder="Enter address">
                                            </div>
                                        </div> -->
                                        <div class="row mb-3">
                                            <!-- <div class="col">
                                                <label class="form-label">City</label>
                                                <input type="text" class="form-control" name="acity"
                                                    placeholder="Enter city">
                                            </div> -->
                                            <div class="col-6">
                                                <label class="form-label">Phone no</label>
                                                <input type="text" class="form-control" name="aphone"
                                                    placeholder="Enter phone no">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Branch</label>
                                                <select name="abranch" id="" required class="form-control">
                                                    <option value="" selected disabled>Select branch</option>
                                                    <?php
                                                    $fetch_branch = "SELECT * FROM `tbl_branch`";
                                                    $run_query = mysqli_query($connect, $fetch_branch);
                                                    if (mysqli_num_rows($run_query) > 0) {
                                                        while ($data = mysqli_fetch_array($run_query)) {
                                                            ?>

                                                            <option value="<?php echo $data[0] ?>">
                                                                <?php echo $data[1] ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        # code...
                                                    } else { ?>
                                                        <option value="">No Branch Found</option>
                                                        <?php
                                                    }



                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class="form-label">User name</label>
                                                <input type="text" class="form-control" name="ausername"
                                                    placeholder="Enter username">
                                            </div>

                                            <div class="col">
                                                <label class="form-label">Password</label>
                                                <input type="text" class="form-control" name="apassword"
                                                    placeholder="Enter password">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label class="form-label">Image</label>
                                                <input type="file" class="form-control" name="aimage"
                                                    placeholder="Upload image" id="aimage">
                                            </div>

                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-success" name="submit">Save</button>
                                            <a href="agent_Read.php" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div> <!-- /.row -->
                    <div class="card-body"></div>
                </div>
            </div><!-- /# column -->
        </div>
        <!--  /Traffic -->
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->
    <?php
    require_once "footer.php";
    ?>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $aname = $_POST['aname'];
    $aemail = $_POST['aemail'];
    $aphone = $_POST['aphone'];
    // $aaddress = $_POST['aaddress'];
    // $acity = $_POST['acity'];
    $abranch = $_POST['abranch'];
    $ausername = $_POST['ausername'];
    $apassword = $_POST['apassword'];
    $aimage = $_FILES['aimage']["name"];
    $dbaddress = "uploads/". $aimage;


    $insert_query = "INSERT INTO `tbl_agent`(`name`, `email`, `phone_no`, `branch`, `user_name`, `password`, `image`) VALUES ('$aname','$aemail','$aphone','$abranch','$ausername','$apassword','$aimage')";

    $execute_query = mysqli_query($connect, $insert_query);

    if ($execute_query) {
        $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["aimage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["aimage"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["aimage"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["aimage"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["aimage"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
        $_SESSION["msg"] = "Agent added successfully";
        header("Location: agent_Read.php");
    } else {
        echo "Failed: " . mysqli_error($connect);
    }
}
ob_end_flush();
<td>
                             <img src="uploads/<?php echo $row["image"] ?>" alt="">  
                            </td>
?>
