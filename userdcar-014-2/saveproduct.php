<?php
    include("connect.php");
    //echo ini_get("upload_max_filesize")."<br>";
    $allowedType=["jpg","jpeg","gif","png","tif","tiff"];
    $fileType=explode("/",$_FILES["filePic"]["type"]);
    $size=$_FILES["filePic"]["size"]/1024/1024;
    if(!in_array($fileType[1],$allowedType)){
        echo "Non-image file is not allowed.";
    }
    else if($size>1.00){
        echo "file size exceeds the maximun treshold.";

    }

    else{
        $brand = $_POST['txtbrand'];
        $model = $_POST['txtmodel'];
        $price = $_POST['txtPrice'];
        $filename = $_FILES['filePic']["name"];
        


    move_uploaded_file($_FILES["filePic"]["tmp_name"],"image/". $_FILES["filePic"]["name"]);
    $sqlInsert = "INSERT INTO product (brand,model,price,,picture)VALUES ('$brand','$model','$price','$filename')";
    }
    $result = $conn->query($sqlInsert);
    if($result){
        echo "<script> alert('Inser Product Complete'); </script>"; 
        header("Location: index.php");
    }
    else{
        echo "Error during insert product: ".$conn->error;
    }
?>
