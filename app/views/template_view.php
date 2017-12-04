<?php 
ob_start();
session_start();
        if($this->routes[1] !== 'detailnews'){
            unset($_SESSION['news']);
        }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>sunnyvale-test</title>
    <link rel="stylesheet" href="/public/css/style.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>
<header>
    <h1>Новости</h1>
    <h2>
    <?php  
        if($_SESSION['news']){echo $_SESSION['news'];} 
    ?>
    </h2>
</header>
<div class = "content">
<?php 
  include $content_view;
?>
</div>
    
<footer>
    <h1>Новости</h1>
    <h2> 
    <?php 
        if($_SESSION['news']){echo $_SESSION['news'];}       
    ?>
    </h2>
</footer>
    <script src = "/public/js/main.js"></script>
</body>
</html>
<?php 
   ob_end_flush();

