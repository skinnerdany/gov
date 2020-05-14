<?php

class pass extends model {
    
    public function createPass(array $data) {
        
//        core::app()-> print_d($data);
        
        $this->name = $data['name'];
        $this->second_name = $data['second_name'];
        $this->passport = $data['passport'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->organization_name = $data['organization_name'];
        $this->inn = $data['inn'];
        $this->tax_id = $data['tax_id'];
        $this->car_number = $data['car_number'];
        $this->social_card = $data['social_card'];
        $this->troika = $data['troika'];
        $this->pass_id = $this->generatePass();
        $this->create_date = $this->generateDate();
        $this->expire_date = $this->generateDate() + 1;
        
        
        $this->save();
        
    }
    
//    protected function getPassData() {
//        return self::$db -> insert();
//    }
    
    public function printPass() {
        echo 'List of DATA to print your pass';
//        core::app()-> print_d($_POST);
    }
    
    protected function generatePass ($length = 20){
        $passnum = "";
        for($i=0;$i<$length;$i++)
        {
            $passnum .= chr( (mt_rand(1, 36) <= 26) ? mt_rand(97, 122) : mt_rand(48, 57 ));
        }
        return $passnum;
    }
    
    protected function generateDate (){
        $today = date("Ymd");
        
        return $today;
    }
}
