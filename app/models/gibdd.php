<?php

class gibdd extends model {

    

public function add(array $data=[], $edit )
{

    $number_auto = mb_strtolower($data['number']);
    

    if(!empty($data['passport']) && !empty($data['number'])){
        if(!preg_match ('#^-?[0-9]*$#',$data['passport']) ||
         mb_strlen((string) $data['passport']) !=9){

            throw new Exception("Запись не добавлена. Неверный формат данных паспорта", 1);      
        }
        
       
         if( !preg_match ('#^[а-я]{1}\d{3}[а-я]{2}\d{2,3}#u',$number_auto) ||
            mb_strlen((string) $data['number'])>9
         ){
            throw new Exception("Запись не добавлена. Неверный формат номера т.с.", 1);      
         }

         $checkExistRecord = self::$db->select('gibdd','*',['number'=> $number_auto]);
         

        if(isset($edit)){
            if(!empty($checkExistRecord) && $number_auto !== $edit ){
                throw new Exception("Запись не добавлена. У т.с. <b>${number_auto}</b> есть собственник", 1);
            }
            $result = self::$db->update('gibdd', ['passport'=>(int) $data['passport'], 'number' => $number_auto],['number' => $edit]);
        }else{
            if(!empty($checkExistRecord)){
                throw new Exception("Запись не добавлена. Такой номер т.с. есть в базе", 1);
             }    
            $result = self::$db->insert('gibdd', ['passport'=>(int) $data['passport'], 'number' => $number_auto]);
        }

       if($result === true){
            $dataAdd =isset($edit)?'Запись отредактрована': 'Запись добавлена';
            $path = isset($edit)?'&&number='.urlencode($number_auto):'';
        header("refresh: 2; url=?controller=gibdd&action=add".$path);
       }else {
            throw new Exception("Запись не добавлена. Ошибка записи.", 1); 
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


public function check($value){
    $result =self::$db->select('gibdd','*',['number'=> $value]);
    if(!empty($result)){
        $result[0]["changeSubmit"] =true;
        return $result[0];
    }    
}


public function delete($value){
    $result = self::$db->delete('gibdd',['number'=>$value]);
    return $result;
}


public function search($parametrs){
   
   $parametr_search = $parametrs['parametr_search'];
   $value = $parametrs['field_search'];
   $records =self::$db->select('gibdd','*', [$parametr_search => $value]);
 
   return $records;
}


}