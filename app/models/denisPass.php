<?php

class denisPass extends model {
    public function generatePass(array $passData){
        $pass_id = md5($passData['passport'] ."". mt_rand(0 ,PHP_INT_MAX));
        $result = self::$db->insert('pass',
        [
            'pass_id'=> $pass_id,
            'passport' => (int) $passData['passport'],
            'create_date' => strtotime($passData['create_date']),
            'expire_date' => "14.06.2020",
            'name' => $passData['name'],
            'second_name' => $passData['second_name'],
            'email' => $passData['email'],
            'phone' => $passData['phone'],
            'tax_id'=> 0,
            'inn' => (int) $passData['inn'],
            'organization_name' => $passData['organization'],
            'car_number' => $passData['number'] ?? '',
            'social_card' => (int) $passData['social_card'] ,
            'troika' => (int) $passData['troika'] 
        ]);
    }

    public function check($pass_id){
        $check = self::$db->select('pass', '*',['pass_id' => $pass_id]);
        if(empty($check)){
            throw new Exception('Пропуск не найден', 1);
        }
        return reset($check);
    }
}