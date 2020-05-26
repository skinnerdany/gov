<?php

class pass extends model {
    
    public function createPass(array $data) {
        
        $this->name = $data['name'];
        $this->second_name = $data['second_name'];
        $this->passport = (int) $data['passport'];
        $this->email = $data['email'];
        $this->phone = (int) $data['phone'];
        $this->organization_name = $data['organization_name'];
        $this->inn = (int) $data['inn'];
        $this->tax_id = (int) $data['tax_id'];
        $this->car_number = isset($data['car_number']) ? $data['car_number'] : '0';
        $this->social_card = (int) isset($data['social_card']) ? $data['social_card'] : '0';
        $this->troika = (int) isset($data['troika']) ? $data['troika'] : '0';
        $this->pass_id = $this->generatePass();
        $this->create_date = $this->createDate();
        $this->expire_date = $this->createDate() + 7 * 24 * 60 * 60; //пропуск дается на 7 дней
        

        $this->validateInputData($data);
        
        $this->save();
        return $res = [
            'pass'=>$this->pass_id, 
            'createDate'=> $this->create_date, 
            'expireDate' => $this->expire_date,   
            ];
    }

    
    protected function generatePass ($length = 20){
        $passnum = "";
        for($i=0;$i<$length;$i++)
        {
            $passnum .= chr( (mt_rand(1, 36) <= 26) ? mt_rand(97, 122) : mt_rand(48, 57 ));
        }
        return $passnum;
    }
    
    protected function createDate (){
               return time();
    }
    
    public function validateInputData(array $data ) {
        
        $name = $data['name'];
        $second_name = $data['second_name'];
        $passport = (int) $data['passport'];
        $email = $data['email'];
        $phone = (int) $data['phone'];
        $organization_name = $data['organization_name'];
        $inn = (int) $data['inn'];
        $tax_id = (int) $data['tax_id'];
        $car_number = isset($data['car_number']) ? $data['car_number'] : [];
        $social_card = (int) isset($data['social_card']) ? $data['social_card'] : [];
        $troika = (int) isset($data['troika']) ? $data['troika'] : [];
        
        if(!empty($name)){
                $name_mask = '/^[A-Z]{1}[a-z]{1,14}$|[А-Я]{1}[а-я]{1,14}$/u';
                if(!preg_match($name_mask, $name)){
                    throw new Exception('Вы неправильно ввели имя!');
                }
            }  
            
        if(!empty($second_name)){
                $second_name_mask = '/^[A-Z]{1}[a-z]{1,14}$|[А-Я]{1}[а-я]{1,14}$/u';
                if(!preg_match($second_name_mask, $second_name)){
                    throw new Exception('Вы неправильно ввели фамилию!');
                }
            }

        if(!empty(is_numeric($passport))){
                $passport_mask = '/^[0-9]{9}$/';
//                $check_passport_num_exist = self::$db->select('pass', ['passport']);
//                foreach ($check_passport_num_exist as $key => $value) {
//                if(array_uintersect($data, $value, 'strcmp')){
//                    $passvalue = $value;
//                
//                throw new Exception('На этот номер паспорта уже выписан пропуск');
//            }            
//        }

                if(!preg_match($passport_mask, $passport)){
                    throw new Exception('Вы неправильно ввели номер паспорта! Введите 9 цифр вашего паспорта!');
                }
            }

        if(!empty($email)){
                $email_mask = '/^(([a-zа-я0-9_-]+\.)*[a-zа-я0-9_-]+@[a-zа-я0-9-]+(\.[a-zа-я0-9-]+)*\.[a-zа-я]{2,6})?$/u';
                if(!preg_match($email_mask, $email)){
                    throw new Exception('Вы неправильно ввели email!');
                }
            }    
            
        if(!empty(is_numeric($phone))){
                $phone_mask = '/^[0-9]{10}$/';
                if(!preg_match($phone_mask, $phone)){
                    throw new Exception('Вы неправильно ввели номер телефона! Введите 10 цифр без 8 или +7');
                }
            }
        
        if(!empty($organization_name)){
                $organization_name_mask = '/^[.+A-Z]{1}[a-z.+]{1,14}[^\s"\\\']+|"([^"]*)"|\'([^\']*)\'$\| [.+А-Я]{1}[а-я]{1,14}$/u';
                if(!preg_match($organization_name_mask, $organization_name)){
                    throw new Exception('Вы неправильно ввели название организации!');
                }
            }
            
        if(!empty(is_numeric($inn))){
                $inn_mask = '/^([0-9]{9})|([0-9]{12})?$/';
                if(!preg_match($inn_mask, $inn)){
                    throw new Exception('Вы неправильно ввели номер ИНН! ИНН может состоять из 9-ти цифр!');
                }
            }
            
        if(!empty(is_numeric($tax_id))){
                $tax_id_mask = '/^([0-9]{9})?$/';
                if(!preg_match($tax_id_mask, $tax_id)){
                    throw new Exception('Вы неправильно ввели номер СНИЛС! Введите 9 цифр вашего СНИЛС без знака (-) и пробелов.');
                }
            }
        
        if(!empty($car_number)){
                $car_number_mask = '/^[АВЕКМНОРСТУХ]\d{3}(?<!000)[АВЕКМНОРСТУХ]{2}\d{2,3}$/u';
                if(!preg_match($car_number_mask, $car_number)){
                    throw new Exception('Вы ввели неправильный номер автомобиля!');
                }
            }

        if(!empty(is_numeric($social_card))){
                $social_card_mask = '/^([0-9]{9})?$/';
                if(!preg_match($social_card_mask, $social_card)){
                    throw new Exception('Вы ввели неправильный номер социальной карты! Введите 9 цифр номера без пробелов!');
                }
            }
            
        if(!empty(is_numeric($troika))){
                $troika_mask = '/^([0-9]{6})?$/';
                if(!preg_match($troika_mask, $troika)){
                    throw new Exception('Вы ввели неправильный номер карты "Тройка"! Номер карты это 6 цифр на обратной стороне карты, воодите без пробелов!');
                }
            }
            
    }
    
    public function getPassInfo($data) 
    {
        $passdata = self::$db -> select ('pass',['pass_id', 'name', 'second_name', 'organization_name', 'create_date', 'expire_date']);
        foreach ($passdata as $key => $value) {
            if(array_uintersect($data, $value, 'strcmp')){
                $passvalue = $value;
                
                return $passvalue;
            }            
        }       
    }
      
} 



//                core::app() -> print_d();