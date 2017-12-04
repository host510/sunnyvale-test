<?php 
ob_start();
session_start(); 
?>

<form method = "post">
    <br><br>
    <label for="nick">Логин</label><br>
        <input name = "logit" class="form-control" type="text" placeholder="Логин"
               id = "nick" value = "<?php echo $_POST['logit'];?>" maxlength = "20" required><br>

        <label for="story">Пароль</label><br>
        <input name = "passy" type = "password" class="form-control" placeholder = "Пароль"
                  id = "story" value = "<?php echo $_POST['passy'];?>" maxlength = "20" required>
    <br>
    <input type="submit" class="tellit" name = "enterit" value = "Войти">
</form>
 <?php 

    $admin = 'admin';
    $password = 'c3284d0f94606de1fd2af172aba15bf3';
    if($_POST['enterit']){
      if($admin === htmlspecialchars(strip_tags(trim($_POST['logit']))) && 
        $password === md5(md5($_POST['passy']))){
        $_SESSION['admin'] = $admin;
        header("Location: /moderation");
      }
      else {echo "Логин или пароль неверный!";}
    }

    if($_SESSION['admin']){
    header("Location: /moderation");
    }
    ob_end_flush();
?>   


