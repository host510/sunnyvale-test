<?php
ob_start();
session_start(); 
?>
 <div class = "forwarn"></div>
<form method = "post">
    <br><br>
    <a href = "/authoregister"><button style = "float: right;" class ="tellit" type = "button">Регистрация автора</button></a>
    <label for="nick">E-mail</label><br>
        <input name = "login" class="form-control" type="text" placeholder="Введите Ваш E-mail"
               id = "nick" value = "<?php echo $_POST['login'];?>" maxlength = "50" required><br>

        <label for="story">Пароль</label><br>
        <input name = "pass" type = "password" class="form-control" placeholder = "Пароль"
                  id = "story" value = "<?php echo $_POST['pass'];?>" maxlength = "20" required>
    <br>
    <input type="submit" class="tellit" name = "authenter" value = "Войти">
</form>
 <?php 
    $model = new ModelAuthoraccess(); 
   
    $query = "SELECT * FROM `author` WHERE `email`='".$_POST['login']."'";
    $author = $model->select($query, $params);

    if($_POST['authenter']){
      if($author[0]['email'] === htmlspecialchars(strip_tags(trim($_POST['login']))) && 
        $author[0]['pass'] === md5(md5(trim($_POST['pass'])))){
        $_SESSION['author'] = $author[0]['name'];
        header("Location: /addnews");
      }
      else {echo "<div class='forwarn'>Логин или пароль неверный!<br>"
          . " Зарегистрируйтесь, если Вы еще не зарегистрированы!</div>";}
      }

    if($_SESSION['author']){
    header("Location: /addnews");
    }
    ob_end_flush();
?>   




