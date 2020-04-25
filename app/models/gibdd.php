<?php

class gibdd extends model {

    

public function add($data=[]){
    if(!empty($data['passport']) && !empty($data['number_auto']) ){
        if(preg_match ('#^-?[0-9]*$#',$data['passport'])){
            $passport = $data['passport'];
        }else{
            $passport = 'fail';
        }

   

        $result = self::$db->insert('gibdd', ['passport'=>$passport, 'number' => $data['number_auto']]);
        var_dump($result);
     if($result){
            echo "ok";
        } else{
            echo "не добавилось";
        }
    }
    //print_r($data);
}

}