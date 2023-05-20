<?php
session_start();
$id = $_GET["Pro_Id"];
if (in_array($id,$_SESSION["MyCart"])) {
     $_SESSION["message"] = "Product Already Exist";
} else {
    (array_push($_SESSION["MyCart"],$id));
        $_SESSION["message"] = "Product Added";

}
header("location: Product.php");

?>