<?php

class News extends model {
    
    public function show(){
        $data = self::$db->select('news');
        return $data;
    }
}