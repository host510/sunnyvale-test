<?php
ob_start();
session_start();
if(!$_SESSION['author']) {
    header("Location: /authoraccess");
}

require '/vendor/Images.php';
Images::getImages('images', 'picupload');
?>
<br><br>
<div class = 'forwarn'></div>
<form method = "post" enctype = "multipart/form-data">
     <input style ="float: right;" class = "tellit" type = "submit" name = "addnews_left" value = "Закрыть админ-панель">
<div class = "preview">
   <?php echo "<img src = '".$_SESSION['image']."' alt = 'Изображение для новости'>";?>
</div>
    <fieldset>
         <legend>Загрузить изображение новости</legend>
    <input type="file" name="picupload"><br><br>
    <input class = "tellit" type="submit" value="Загрузить изображение!"><br>
    </fieldset><br>
        <label for="nick">Имя автора(<i>обязательно</i>)</label><br>
        <input name = "authorname" class="form-control" type="text" placeholder="Имя автора"
               id = "nick" value = "<?php echo $_SESSION['author'];?>" maxlength = "50"><br>
        
        <label for="cat">Категория новости</label><br>
        <input name = "news_cat" class="form-control" type="text" placeholder="Категория новости"
               id = "cat" value = "<?php echo $_POST['news_cat'];?>" maxlength = "20"><br>
        
        <label for="header">Заголовок новости (<i>обязательно</i>)</label><br>
        <input name = "news_header" class="form-control" type="text" placeholder="Заголовок новости"
               id = "header" value = "<?php echo $_POST['news_header'];?>" maxlength = "50"><br>
        <label>Текст новости (<i>обязательно</i>)</label><br>
        <textarea name = "news_body" cols = "80" rows = "10"></textarea><br>
        
    <br>
    <input type="submit" class="tellit" name = "deploynews" value = "Разместить новость"><br><br><br>
</form>

<?php
if($_POST['addnews_left']){
    unset($_SESSION['author']);
     unset($_SESSION['image']);
    header("Location: /");
}
 $model = new ModelAddnews();

 if($_POST['deploynews']){
     
     $authorname = htmlspecialchars(trim($_POST['authorname']));
     $news_cat = htmlspecialchars(trim($_POST['news_cat']));
     $news_header = htmlspecialchars(trim($_POST['news_header']));
     $news_body = htmlspecialchars(trim($_POST['news_body']));
     $news_date = date("d.m.Y");
     
    if(empty($authorname) || empty($news_cat) || empty($news_header) || empty($news_body)) {
        echo "<br><div class = 'forwarn'>Какое-то из полей не заполнено!</div><br>";
    }
     $query = "INSERT INTO `main`(author, category, header, body, image, date) "
             . "VALUES({?}, {?}, {?}, {?}, {?}, {?})";
     $params = array($authorname, $news_cat, $news_header, $news_body, $_SESSION['image'], $news_date);
  
        if ($model->query($query, $params)) {
           echo "<br><div class = 'forwarn'>Всё хорошо! Новость ожидает модерации!</div><br>";
           header("Refresh: 2; url =/addnews");
        }else {
            echo "<br><div class = 'forwarn'>Что-то пошло не так!</div><br>";
         }
 }

    ob_end_flush();