<div class="card w-50">
    <div class="card-header">
        <?php echo date("Y-m-d H:i:s"); ?>
    </div>
    <div class="card-body">
        <h5 class="card-title">
            <input type="text" class="w-50">
        </h5>
        <p class="card-text">
            <textarea type="text" class="w-50"></textarea>
        </p>
        <a href="index.php?controller=news&action=show" class="btn btn-primary">К новостям</a>
        <a href="index.php?controller=news&action=add" class="btn btn-success">Добавить</a>
        <a href="index.php?controller=news&action=update" class="btn btn-warning">Обновить</a>
        <a href="index.php?controller=news&action=delete" class="btn btn-danger">Удалить</a>
    </div>
</div>