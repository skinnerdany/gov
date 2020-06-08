<?php
    foreach(core::app()->input->get as $value => $news){
        $$value = $news;
    }
?>

<form method="post">
    <div class="card w-50">
        <div class="card-header">
            <input name="newsDate" value=<?php echo $newsDate ?? null; ?>>
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <input type="text" name="newsTitle" class="w-50" value=<?php echo $newsTitle ?? null; ?>>
            </h5>
            <p class="card-text">
                <input type="text" name="newsContent" class="w-50" value=<?php echo $newsContent ?? null; ?>>
            </p>
            <a href="index.php?controller=news&action=show" class="btn btn-primary">К новостям</a>
            <button type="submit" class="btn btn-warning" name="go">Обновить</button>
        </div>
    </div>
</form>