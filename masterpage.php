<?php
    function url_gen($addr) {
        return $_SERVER['PHP_SELF'].'?addr='.$addr;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master page</title>
    <style>
        <?php include './stylesheet/style.css'; ?>
    </style>
</head>
<body>
    <div class="nav">
        <a href="<?php echo url_gen('question2')?>">Question 2 & 3</a>
        <a href="<?php echo url_gen('question4')?>">Question 4</a>
    </div>
<?php
    include('./pages/'.$_GET['addr'].'.php');
?>
</body>
</html>