<?php 
ob_start();
session_start();
if(!$_SESSION['admin']) {
    header("Location: /adminaccess");
}

?>
<form method = "post">
  <input style ="float: right;" class = "tellit" type = "submit" name = "moderation-left" value = "Закрыть админ-панель">
<?php
if($_POST['moderation-left']){
    unset($_SESSION['admin']);
    header("Location: /");
}

              $model = new ModelModeration();
              $query = "SELECT * FROM `main` WHERE `proof` = 1";
                for($i=0; $i<$model->getAdminRows($query); $i++)
                { 
?>

              <div class = "showstory"> 
                <div class = "single-news">
                  <div class = "for-pic">
                      <img src="<?php echo $model->select($query, $params)[$i]['image']; ?>" alt="news">
                  </div>
                </div>
                    <div class = "news-text">
                        <p><b><?php echo $model->select($query, $params)[$i]['header']; ?></b></p>
                        <p>
                           <?php echo $model->select($query, $params)[$i]['body']; ?>
                        </p>
                    </div>
                    <div class = "bottomline"> <?php echo $model->select($query, $params)[$i]['author']; ?> </div>
                    <div class = "bottomline"> <?php echo $model->select($query, $params)[$i]['date']; ?> </div><br><br>
               
                <button itid = "<?php echo $model->select($query, $params)[$i]['id']; ?>" class = "apr">Одобрить</button> 
                <button itid = "<?php echo $model->select($query, $params)[$i]['id']; ?>" class = "adel">Удалить</button> 
              </div>
</form>
              <?php
                } 
                
                if($_POST['del_id']) {
                        $id = intval ($_POST['del_id']);
                        $query = "DELETE FROM `main` WHERE `id` = '$id'";
                         $model->query($query, $params = false);
                        echo "<br><div class = 'showstory'>Новость удалена!</div><br>";
                        
                }

				if($_POST['apr_id']) {
					$id = intval ($_POST['apr_id']);
					$query = "UPDATE `main` SET `proof` = '2' WHERE `id` = '$id'";
					 $model->query($query, $params = false);
                                         echo "<br><div class = 'showstory'>Всё хорошо! Новость одобрена!</div><br>";
                                        
				}
              ?> 

