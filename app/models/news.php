<?php

class News extends model{

    public function show(){
        $data = self::$db->select('news');
        return $data;
    }

    public function add(array $news = []){
        if (!empty($news)) {
            $newsCheck = self::$db->select('news', '*', ['newsTitle' => $news['newsTitle']]);
            if (($newsCheck['newsTitle'] !== $news['newsTitle'])) {
                $_SESSION["message"] = "Новость уже есть";
                $_SESSION["msg_type"] = "warning";
            }
            $newsAdd = self::$db->insert(
                'news',
                [
                    'newsTitle' => $news['newsTitle'],
                    'newsContent' => $news['newsContent'],
                    'newsDate' => $news['newsDate']
                ]
            );
            if ($newsAdd === true) {
                $_SESSION["message"] = "Новость добавлена";
                $_SESSION["msg_type"] = "success";
                header("location: index.php?controller=news&action=show");
            } else {
                $_SESSION["message"] = "Новость не добавлена";
                $_SESSION["msg_type"] = "danger";
            }
        } else {
            $_SESSION["message"] = "Заполните все поля";
            $_SESSION["msg_type"] = "danger";
        }
    }

    public function update($newsTitle){
        $newsCheck = self::$db->select('news','*',['newsTitle' => $newsTitle]);
        if(!empty($newsCheck)){
            $newsCheck = self::$db->update(
                'news',
                [
                    'newsTitle' => $newsCheck['newsTitle'],
                    'newsContent' => $newsCheck['newsContent'],
                    'newsDate' => $newsCheck['newsDate']
                ]
            );
            return $newsCheck;
            $_SESSION["message"] = "Новость обновлена";
            $_SESSION["msg_type"] = "warning";
            header("location: index.php?controller=news&action=show");
        } 
        $_SESSION["message"] = "Новость не обновлена";
        $_SESSION["msg_type"] = "danger";
    }

    public function delete($newsTitle){
        $_SESSION["message"] = "Новость удалена";
        $_SESSION["msg_type"] = "danger";
        return self::$db->delete('news', ['newsTitle' => $newsTitle]);
        header("location: index.php?controller=news&action=show");
    }
}
