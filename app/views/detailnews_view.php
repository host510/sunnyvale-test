<?php
ob_start();
session_start();

$model = new ModelDetailnews();
 $query = "SELECT * FROM `main` WHERE `id` = '".$_POST['newsid']."'";
 $_SESSION['news'] = $model->select($query, $params)[0]['header'];
?>

    <div class = "for-moderation"><img src="<?php echo $model->select($query, $params)[0]['image']; ?>" alt="news"></div>
    <br><br><br>
    <div class = "news-text">
        <p><b><?php echo $model->select($query, $params)[0]['header']; ?></b></p>
        <p>
           <?php echo $model->select($query, $params)[0]['body']; ?>
        </p>
    </div>

<?php
ob_end_flush();