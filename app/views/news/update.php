<form method="post">
    <div class="card w-50">
        <div class="card-header">
            <input name="newsDate">
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <input type="text" name="newsTitle" class="w-50">
            </h5>
            <p class="card-text">
                <input type="text" name="newsContent" class="w-50">
            </p>
            <a href="index.php?controller=news&action=show" class="btn btn-primary">К новостям</a>
            <a href="index.php?controller=news&action=update" class="btn btn-warning" name="go">Обновить</a>
        </div>
    </div>
</form>