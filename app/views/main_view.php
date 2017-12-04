<?php 
ob_start();
session_start();

$model = new ModelMain();
 $query = "SELECT * FROM `".$model->table."` WHERE `proof` = 2 ORDER BY id DESC ";
    for($i=0; $i<$model->getNumRows(); $i++){ 
      if(empty($model->select($query, $params)[$i]['author'])) break;
?>
<form method="post" action="/detailnews" class = "inline">
    <input type="hidden" name="newsid" value = "<?php echo $model->select($query, $params)[$i]['id']; ?>">
<button name = "subdetail" class = "single-news nobutton">
    <div class = "for-pic"><img src="<?php echo $model->select($query, $params)[$i]['image']; ?>" alt="news"></div>
    <div class = "news-text">
        <p><b><?php echo $model->select($query, $params)[$i]['header']; ?></b></p>
        <p>
           <?php echo mb_substr($model->select($query, $params)[$i]['body'], 0, 80, 'UTF-8')."..."; ?>
        </p>
    </div>
</button>
</form>   
<?php 
    }
   ob_end_flush();


 
   