<?php

class News extends model
{

    public function show()
    {
        $data = self::$db->select('news');
        return $data;
    }

    public function add(array $news = [])
    {
        if (!empty($news)) {
            $checkNews = self::$db->select('news', '*', ['newsContent' => $news['newsContent']]);
            if (($checkNews['newsContent'] !== $news['newsContent'])) {
                $_SESSION["message"] = "Новость уже есть";
                $_SESSION["msg_type"] = "warning";
                header("location: index.php?controller=news&action=show");
            }
            $newsAdd = self::$db->insert(
                'news',
                [
                    'newsTitle' => $news['newsTitle'],
                    'newsContent' => $news['newsContent'],
                    'newsDate' => $news['newsDate']
                ]
            );
        }
        if ($newsAdd === true) {
            $_SESSION["message"] = "Новость добавлена";
            $_SESSION["msg_type"] = "success";
            header("location: index.php?controller=news&action=show");
        } else {
            $_SESSION["message"] = "Новость не добавлена";
            $_SESSION["msg_type"] = "danger";
            header("location: index.php?controller=news&action=show");
        }
        return $newsAdd;
    }

    public function update($news)
    {
        $data = self::$db->update(
            'news',
            [
                'newsTitle' => $news['newsTitle'],
                'newsContent' => $news['newsContent'], 
                'newsDate' => $news['newsDate']
            ]
        );
        return $data;
        $_SESSION["message"] = "Новость обновлена";
        $_SESSION["msg_type"] = "warning";
        header("location: index.php?controller=news&action=show");
    }

    public function delete($newsTitle)
    {
        $_SESSION["message"] = "Новость удалена";
        $_SESSION["msg_type"] = "danger";
        return self::$db->delete('news', ['newsTitle' => $newsTitle]);
        header("location: index.php?controller=news&action=show");
    }
}
