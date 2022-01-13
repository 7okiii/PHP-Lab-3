<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question2</title>
    <style>
        form {
            margin-top: 10px
        }
        button {
            background-color: #ff9f43;
            border: none;
            padding: 8px 13px;
            color: white;
            font-weight: bold;
            margin: 5px 0 0 5px;
        }
        button:hover {
            background-color: #feca57;
        }
    </style>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?addr=question2'?>" enctype="multipart/form-data">
        <label for="imgUpload">Select the image file</label>
        <input type="file" name="imgUpload">
        <br>
        <button type="submit">Upload</button>
    </form>
<?php

    // Function for uploading image and echo the message according to the result.
    function imgUpload($sourceFile,$targetFile) {
        if (move_uploaded_file($sourceFile,$targetFile)) {
            echo "<p style='color:green;'>File has been uploaded</p>";
        } else {
            echo "<p style='color:red;'>There's an error uploading file</p>";
        }
    }
    

    // If there's a POST request then upload the file to "usrimg".
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $targetDir = "./usrimg/".basename($_FILES['imgUpload']['name']);
        $uploadFile = $_FILES['imgUpload'];
        $fileType = $_FILES['imgUpload']['type'];
        if ($uploadFile['size'] > 600000) {
            echo "<p style='color:red;'>File size is too big.</p><br>";
        } elseif ($fileType == 'image/jpeg' || $fileType == 'image/png') {
            imgUpload($_FILES['imgUpload']['tmp_name'],$targetDir);

            ///// Question3 /////
            $txtFile = "./usrimg/imgaddr.txt";
            // echo is_writable($txtDir);
            $nameList = fopen($txtFile,'a');
            fwrite($nameList,$_FILES['imgUpload']['name']."\n");
            fclose($txtFile);
    
        } else {
            // imgUpload($_FILES['imgUpload']['tmp_name'],$targetDir);
            echo "<p style='color:red;'>Not image file</p><br>";
        }
    }
?>
</body>
</html>