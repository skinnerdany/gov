<?php

class News extends model{

    public function show(){
        $data = self::$db->select('news');
        return $data;
    }

    public function add(array $news = []){
        if (!empty($news['newsTitle'] && !empty($news['newsContent']))) {
            $newsCheck = self::$db->select('news', '*', ['newsContent' => $news['newsContent']]);
            if (!empty($newsCheck)) {
                $_SESSION["message"] = "Новость уже есть";
                $_SESSION["msg_type"] = "warning";
            } else {
                if(!ctype_alnum($news['newsTitle']) || !ctype_alnum($news['newsTitle'])){
                    $_SESSION["message"] = "Неверный заголовок или описание";
                    $_SESSION["msg_type"] = "danger";
                } else {                
                    $newsAdd = self::$db->insert(
                    'news',
                    [
                        'newsTitle' => ucfirst($news['newsTitle']),
                        'newsContent' => $news['newsContent'],
                        'newsDate' => $news['newsDate']
                    ]
                );
            }
            }
            if (!empty($newsAdd)) {
                $_SESSION["message"] = "Новость добавлена";
                $_SESSION["msg_type"] = "success";
            }
        } else {
            $_SESSION["message"] = "Заполните все поля";
            $_SESSION["msg_type"] = "danger";
        }
    }

    public function check($newsTitle){
        $newsCheck = self::$db->select('news', '*', ['newsTitle' => $newsTitle]);
        if(!empty($newsCheck)){
            return $newsCheck;
        }
    }

    public function update($newsUpdate){
        if (!empty($newsUpdate)){
            $newsUpdate = self::$db->update(
                'news',
                [
                    'newsTitle' => $newsUpdate['newsTitle'],
                    'newsContent' => $newsUpdate['newsContent'],
                    'newsDate' => $newsUpdate['newsDate']
                ]
            );
            if($newsUpdate){
                $_SESSION["message"] = "Новость обновлена";
                $_SESSION["msg_type"] = "success";
            } 
        } else {
            $_SESSION["message"] = "Новость не обновлена";
            $_SESSION["msg_type"] = "danger";
        }
    }

    public function delete($newsTitle){
        $_SESSION["message"] = "Новость удалена";
        $_SESSION["msg_type"] = "danger";
        return self::$db->delete('news', ['newsTitle' => $newsTitle]);
        header("location: index.php?controller=news&action=show");
    }
}
