<div class="card w-50">
        <?php
        if (!empty($notes)) {
            foreach ($notes as $value => $note) {
                echo '<div class="card-header">';
                echo $note['newsDate'];
                echo '</div>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' .$note['newsTitle']. '</h5>';
                echo '<p class="card-text">' .$note['newsContent']. '</p>';
                echo '<a href="index.php?controller=news&action=add" class="btn btn-success">Добавить</a>';
                echo'&nbsp;';
                echo '<a href="index.php?controller=news&action=update&newsTitle=' .$note['newsTitle']. '" class="btn btn-warning">Обновить</a>';
                echo'&nbsp;';
                echo '<a href="index.php?controller=news&action=delete&newsTitle=' .$note['newsTitle']. '" class="btn btn-danger">Удалить</a>';
                echo '</div>';
            }
        } else {
            echo '<div class="card-header">';
            echo date("Y-m-d H:i:s");
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Увы, новостей нет...</h5>';
            echo '<a href="index.php?controller=news&action=add" class="btn btn-success">Добавить</a>';
            echo '</div>';
        }
        ?>
</div>