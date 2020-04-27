<?php

class gibdd extends model {

    

public function add(array $data=[])
{
    
    $number_auto = mb_strtolower($data['number_auto']);
    
  /*   if(isset(core::app()->input->get['number_auto'])){
       $str =  self::$db->select('gibdd','*',['number'=> $number_auto]);
       var_dump($str);
    } 
    */
    if(!empty($data['passport']) && !empty($data['number_auto']) ){
        if(!preg_match ('#^-?[0-9]*$#',$data['passport'])){
            throw new Exception("Запись не добавлена. Неверный формат паспорта", 1);      
        }
        if( $data['passport'] > 999999999){
            throw new Exception("Запись не добавлена. Кол-во символов превышенно", 1);      
         }
  
       
         if( !preg_match ('#^[а-я]{1}\d{3}[а-я]{2}\d{2,3}#u',$number_auto)){
            throw new Exception("Запись не добавлена. Неверный формат номера т.с.", 1);      
         }

         $checkExistRecord =self::$db->select('gibdd','*',['number'=> $number_auto]);
         if(!empty($checkExistRecord)){
            throw new Exception("Запись не добавлена.Такой номер т.с. есть в базе", 1);
         }

   
        $result = self::$db->insert('gibdd', ['passport'=>(int) $data['passport'], 'number' => $number_auto]);
      
       if($result === true){
        $dataAdd = 'Запись добавлена';
        header("refresh: 5; url=?controller=gibdd&action=add");
       }else {
        throw new Exception("Запись не добавлена. Другой тип ошибки", 1); 
       }

    }else{
        throw new Exception("Заполните все поля формы", 1);
    }

    return $dataAdd;
   
}


public function show(){

    $data = self::$db->select('gibdd');
    return $data;
}



}