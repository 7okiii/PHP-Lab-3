<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>question4.php</title>
</head>
<body>
    <!-- add "?addr=question4" => you will be able to stay this page after the POST method happened -->
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>?addr=question4">
        <button type="submit">Show</button>
    </form>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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

        img {
            width: 250px;
            height: 180px;
            padding: 2px;
            border-right: 1px solid black;
        }
        div[id='img'] {
            display: flex;
            align-items: center;
            border: 1px solid black;
            margin: 5px 0;
        } 
        p {
            margin-left: 10px;
        }
    </style>
<?php
    ///// Question4 ///// show images with <img>
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $txt_file = fopen('./usrimg/imgaddr.txt','r'); // open the file with 'reading mode'
        while ($line = fgets($txt_file)) { // fgets => read line by line
            echo "<div id='img'><img src='./usrimg/$line'><p>$line<br></p></div>"; // make link to the image 
        }
        fclose($txt_file); // don't forget to close it after you open the file!!
        }
        // echo "<img src='./usrimg/$line'>"
?>

</body>
</html>