<?php
ob_start();
session_start(); 
?>
<div class = "forwarn"></div>
<form method = "post">
    <br><br>
    <label for="nick">Имя</label><br>
        <input name = "name" class="form-control" type="text" placeholder="Имя автора"
               id = "nick" value = "<?php echo $_POST['name'];?>" maxlength = "50" required><br>
        
        <label for="mail">E-mail</label><br>
        <input name = "email" class="form-control" type="email" placeholder="E-mail автора"
               id = "mail" value = "<?php echo $_POST['email'];?>" maxlength = "50" required><br>

        <label for="pass">Пароль</label><br>
        <input name = "password" type = "password" class="form-control" placeholder = "Пароль"
               id = "pass" value = "<?php echo $_POST['password'];?>" maxlength = "20" required><br>
        <label for="pass2">Повторите пароль</label><br>
        <input name = "passagain" type = "password" class="form-control" placeholder = "Пароль"
                  id = "pass2" value = "<?php echo $_POST['passagain'];?>" maxlength = "20" required>
    <br>
    <input type="submit" class="tellit" name = "authoregister" value = "Зарегистрироваться">
</form>
 <?php 
 $model = new ModelAuthoregister();
 if($_POST['authoregister'] && md5(md5(trim($_POST['password']))) === md5(md5(trim($_POST['passagain'])))){
     $name = htmlspecialchars(trim($_POST['name']));
     $email = htmlspecialchars(trim($_POST['email']));
     $password = md5(md5(trim($_POST['password'])));
     $date = date("d.m.Y");
     
     $query = "INSERT INTO `author`(name, email, pass, date) VALUES({?}, {?}, {?}, {?})";
     $params = array($name, $email, $password, $date);
        if ($model->query($query, $params)) {
           echo "Всё хорошо! Вы зарегистрированы!";
           header("Refresh: 2; url =/authoraccess");
        }else {
            echo "<br>Что-то пошло не так!<br>";
         }
 }

    ob_end_flush();
  






