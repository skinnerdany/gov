<?php

class ivanPass extends model {

    public function generatePass(array $data){
        
        $dataMfc = $this->checkPersonalData($data);
        
        $this->checkSelectTransport($data);
        
        $this->checkPersonalTransport($data);
        
        $this->checkSocialTransport($data,$dataMfc);

        if($data['type_pass'] === 'permanent'){
            $tax_id = $this->checkJob($data);
        }

            $numerPass = md5($data['passport'] ."". mt_rand(0 ,PHP_INT_MAX));
            $result = self::$db->insert(
                'pass',
                 ['pass_id'=> $numerPass,
                 'passport' => (int) $data['passport'],
                 'create_date' => strtotime($data['create_date']),
                 'expire_date' => strtotime($data['expire_date']),
                 'name' => $data['name'],
                 'second_name' => $data['second_name'],
                 'email' => $data['email'],
                 'phone' => $data['phone'],
                 'tax_id'=> $tax_id ?? 0,
                 'inn' => (int) $data['inn'],
                 'organization_name' => $data['organization_name'],
                 'car_number' => $data['number_auto'] ?? '',
                 'social_card' => (int) $data['social'] ,
                 'troika' => (int) $data['troika'] 
                 ]
            ); 
            if ($result === true){
              $this->activateCard($data);
              return $numerPass;
            }else{
                throw new Exception("Ошибка запроса в БД", 1);    
            }
        
    }

    //Проверка пропуска
    public function check($numer_pass){
        $checkResult = self::$db->select('pass','*',['pass_id'=>  $numer_pass]);
        if(empty($checkResult)){
            throw new Exception("Пропуск не найден", 1);  
        }
        return reset($checkResult );

    }


    //ФУНКЦИЯ ПРОВЕРКИ ПЕРСОНАЛЬНЫХ ДАННЫХ
    private function checkPersonalData(array $data){
        if(empty($data['name'])){
            throw new nameException("Пустое поле в графе \"Имя\"", 1);
        }

        if(!preg_match("/^[а-яА-Я]+$/iu", $data['name'])){
            throw new nameException("Неверный формат имени", 1);
        }
        if(empty($data['second_name'])){
            throw new nameException("Пустое поле в графе \"Фамилия\"", 1);
        }
        if(!preg_match("/^[а-яА-Я]+$/iu", $data['second_name'])){
            throw new secondNameException("Неверный формат фамилии", 1);
        }

        if(empty($data['passport'])){
            throw new passportException("Пустое поле в графе \"Паспорт\"", 1);
        }
       
        if(!preg_match ('#^-?[0-9]*$#',$data['passport'])||
         mb_strlen((string) $data['passport']) >9){
            throw new passportException("Неверный формат паспорта", 1);
        }
        $dataMfc = self::$db->select('mfc','*',['passport'=>  $data['passport']]);
        
        if(
            empty($dataMfc) ||
            mb_strtolower($dataMfc[0]['name']) !== mb_strtolower($data['name']) ||
            mb_strtolower($dataMfc[0]['second_name']) !== mb_strtolower($data['second_name'])
        ){
            throw new passportException("Не найдены введенные паспортные данные", 1);  
        }

        if(empty($data['phone'])){
            throw new phoneException("Пустое поле в графе \"Телефон\"", 1);
        }
        
        if(!preg_match ('#^-?[0-9]*$#',$data['phone'])||
         mb_strlen($data['phone']) >10){
            throw new phoneException("Неверный формат телефона", 1);
        }

        if(empty($data['email'])){
            throw new emailException("Пустое поле в графе \"Email\"", 1);
        }
    
       /* if(!preg_match ('#^-?[0-9]*$#',$data['email'])){
           throw new passportException("Неверный формат e, 1);
       } */

      return $dataMfc;

    }
    //ФУНКЦИЯ ПРОВЕРКИ ВЫБОРА ВИДА ТРАНСПОРТ
    private function checkSelectTransport(array $data){
            if(!isset($data['personal_transport'])  && !isset($data['public_transport']) ){
                throw new transportException("Не выбран вид транспорта для передвижения", 1);
            }
    }
    //ФУНКЦИЯ ПРОВЕРКИ ДАННЫХ АВТО
    private function checkPersonalTransport(array $data){
            if(isset($data['personal_transport']) && $data['personal_transport'] === 'on'){

                if(empty($data['number_auto'])){
                    throw new numberAutoException("Пустое поле в графе \"Номер транспортного средства\"", 1);
                }
                if( !preg_match ('#^[а-я]{1}\d{3}[а-я]{2}\d{2,3}#u',$data['number_auto']) ||
                mb_strlen($data['number_auto'])>9 ){
                    throw new numberAutoException("неверный формат номера тс", 1);
                }
            
                $number_auto = mb_strtolower($data['number_auto']);
                $dataGibdd = self::$db->select('gibdd','*',['number'=>  $number_auto]);
                if(empty($dataGibdd) ){
                    throw new numberAutoException("Не найден номер транспортного средства", 1);
                }
            }
            
    }

    //ФУНКЦИЯ ПРОВЕРКИ РАБОТОДАТЕЛЯ 
    private function checkJob(array $data){
            //----------------Проверка работодателя-----------------------    
            if(empty($data['organization_name'])){
                throw new jobException("Отсутствует название организации", 1);
            }
            if(empty($data['inn'])){
                throw new jobException("Пустое поле в графе \"ИНН\"", 1);
            }
            if(!preg_match ('#^-?[0-9]*$#',$data['inn'])||
                mb_strlen((string) $data['inn']) >9){
                throw new jobException("Неверный формат ИНН", 1);
            }

            $dataOrganization = self::$db->select('tax','*',['organization_name'=> $data['organization_name']]);
            if(empty($dataOrganization)){
                throw new jobException("Данная организация не зарегистрирована", 1);
            }
            else{
                if($dataOrganization[0]['inn'] != $data['inn']){
                    throw new jobException("Введенный ИНН не соответсвует ИНН ". $data['organization_name'], 1);
                }
                $okved = $dataOrganization[0]['okved_id'];
                $dataOkved = self::$db->select('okved','*',['id'=> $okved]);
                if($dataOkved[0]['always'] === 0){
                    throw new jobException("Данная организация не имеет статус предприятия неппрерывного цикла", 1);
                } 
                //-----------Проверка работника у работодателя----------------
                $dataPeopleTax = self::$db->select('people_tax','*',['passport'=> $data['passport']]);
                if($dataPeopleTax[0]['tax_id'] !== $dataOrganization[0]['id']){
                    throw new jobException( $data['name'].' '. $data['second_name']. ' не числиться в организации '.$data['organization_name'] , 1);
                }
                
            }
           return $dataOrganization[0]['id'];

    }

    //ФУНКЦИЯ АКТИВАЦИИ ТРАНСПОРТНОЙ КАРТЫ
    private function activateCard($data){
        
        if(!empty($data['social'])){
            $dataLock = self::$db->select('social_transport','`lock`',['social_card'=>(int) $data['social']]);
            if($data['type_pass'] === 'permanent'){
                if($dataLock[0]['lock'] == 1){
                        self::$db->update('social_transport', ['`lock`' => 0],['social_card' =>  (int) $data['social']]);  
                }
            }     
        }

        if(!empty($data['troika'])){
            $dataLock = self::$db->select('social_transport','`lock`',['troika'=>(int) $data['troika']]);
            if($dataLock[0]['lock'] == 1){
                self::$db->update('social_transport', ['`lock`' => 0],['troika' =>  (int) $data['troika']]);  
            }
           
        }
        
    }

    //ФУНКЦИЯ ПРОВЕРКА ОБЩЕСТВЕННОГО ТРАНСПОРТА
    private function checkSocialTransport($data,$dataMfc){

        if(isset($data['public_transport']) && $data['public_transport'] === 'on'){
            if(empty($data['social']) && empty($data['troika'])){
                throw new socialException("Заполните одно из полей: Тройка или социальная карта", 1);
            }

            if(!preg_match ('#^-?[0-9]*$#',$data['social'])||
                mb_strlen((string) $data['social']) >9
                ){
                throw new socialException("Неверный формат социальной карты", 1);
            }

            if(!preg_match ('#^-?[0-9]*$#',$data['troika'])||
                mb_strlen((string) $data['troika']) >9
                ){
                throw new socialException("Неверный формат  карты  тройка", 1);
            }


            //------проверка при заполненом поле Тройка--------
            if(!empty($data['troika'])){

                $dataTroika= self::$db->select('social_transport','*',['troika'=> $data['troika']]);

                if(empty($dataTroika)){
                    throw new socialException("Карты тройка с данным номером не существует", 1);
                }

                if($dataTroika[0]['unlock_expire'] < time()){
                    throw new socialException("Карта тройка заблокирована по сроку действия", 1);
                }
                if($dataTroika[0]['passport'] === 0){
                    self::$db->update(
                        'social_transport', 
                        ['passport' => (int) $data['passport']],
                        ['troika'=> $data['troika']]
                    );
                }



            }

             //------проверка при заполненом поле Социальная карта--------
            if(!empty($data['social'])){
                if($data['type_pass'] === 'temporary'){
                    throw new socialException("Для разовых пропусков нельзя использовать социальную карту", 1);
                }
                if($dataMfc[0]['social_card'] != $data['social']){
                    throw new socialException("У вас нет социальной карты с таким номером", 1);
                }
                $dataSocialCard= self::$db->select('social_transport','*',['social_card'=> $data['social']]);
                if(empty($dataSocialCard)){
                    throw new socialException("Данная социальная карта не обнаружена в базе МинТранса", 1);
                }
                if($dataSocialCard[0]['passport'] == 0){
                    self::$db->update(
                        'social_transport', 
                        ['passport' => (int) $data['passport']],
                        ['social_card'=> $data['social']]
                    );

                }
                if($dataSocialCard[0]['unlock_expire'] < time()){
                    throw new socialException("Социальная карта заблокирована по сроку действия", 1);
                }

            }

        }

    } 

    

}




//КЛАССЫ ИСКЛЮЧЕНИЙ

class nameException extends Exception{

}

class secondNameException extends Exception{

}

class phoneException extends Exception{

}
class passportException extends Exception{

}
class emailException extends Exception{

}

class numberAutoException extends Exception{

}
class socialException extends Exception{

}
class jobException extends Exception{

}
class transportException extends Exception{

}

