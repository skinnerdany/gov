<?php

class News extends model {
    
    public function show(){
        $data = self::$db->select('news');
        return $data;
    }

    public function add($data=[]){
        $_SESSION["message"] = "Новость добавлена";
        $_SESSION["msg_type"] = "success";
        $newsContent = $data['newsContent'];
        if(!empty($data['newsTitle']) && !empty($data['newsContent'])){
            $checkNews = self::$db->select('news', '*', ['newsContent' => $newsContent]);
            if(!empty($checkNews)){
                throw new Exception("Такая новость уже есть", 1);
            }
            $newsAdd = self::$db->insert('news', ['newsTitle' => $data['newsTitle'], 'newsContent' => $newsContent]);
        } else{
            throw new Exception("Нужно заполнить все поля", 1);
        }
        return $newsAdd;
        header("location: index.php?controller=news&action=show");
    }

    public function update(){
        $_SESSION["message"] = "Новость обновлена";
        $_SESSION["msg_type"] = "warning";
        $data = self::$db->update('news', []);
        return $data;
        header("location: index.php?controller=news&action=show");
    }

    public function delete($newsTitle){
        $_SESSION["message"] = "Новость удалена";
        $_SESSION["msg_type"] = "danger";
        return self::$db->delete('news', ['newsTitle' => $newsTitle]);
        header("location: index.php?controller=news&action=show");
    }
}