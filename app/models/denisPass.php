<?php

class denisPass extends model
{
    public function generatePass(array $post)
    {
        $postMfc = $this->checkMfc($post);
        $this->checkTransport($post);
        if ($post['type_pass'] === 'const') {
            $tax_id = $this->CheckWork($post);
        }
        $pass_id = md5($post['passport'] . "" . mt_rand(0, PHP_INT_MAX));
        $result = self::$db->insert(
            'pass',
            [
                'pass_id' => $pass_id,
                'passport' => (int) $post['passport'],
                'create_date' => $post['create_date'],
                'expire_date' => $post['expire_date'],
                'name' => $post['name'],
                'second_name' => $post['second_name'],
                'email' => $post['email'],
                'phone' => $post['phone'],
                'tax_id' => $tax_id ?? 0,
                'inn' => (int) $post['inn'],
                'organization_name' => $post['organization'],
                'car_number' => $post['number'] ?? '',
                'social_card' => (int) $post['social_card'],
                'troika' => (int) $post['troika']
            ]
        );
        if ($result) {
            $this->activateCard($post);
            return $pass_id;
        } else {
            $_SESSION["message"] = "Что-то пошло не так";
            $_SESSION["msg_type"] = "warning";
        }
    }

    private function checkMfc(array $post)
    {
        if (!preg_match('#^-?[0-9]*$#', $post['passport']) || strlen((string) $post['passport']) > 9) {
            $_SESSION["message"] = "Проверьте номер паспорта";
            $_SESSION["msg_type"] = "warning";
        }
        if (!preg_match("/^[а-яА-Я]+$/iu", $post['name'])) {
            $_SESSION["message"] = "Проверьте имя";
            $_SESSION["msg_type"] = "warning";
        }
        if (!preg_match("/^[а-яА-Я]+$/iu", $post['second_name'])) {
            $_SESSION["message"] = "Проверьте фамилию";
            $_SESSION["msg_type"] = "warning";
        }
        if (!preg_match('#^-?[0-9]*$#', $post['phone'])) {
            $_SESSION["message"] = "Проверьте номер телефона";
            $_SESSION["msg_type"] = "warning";
        }
        $postMfc = self::$db->select('mfc', '*', ['passport' =>  $post['passport']]);
        if (empty($postMfc)) {
            $_SESSION["message"] = "Проверьте данные";
            $_SESSION["msg_type"] = "warning";
        }
        return $postMfc;
    }

    private function checkTransport(array $post)
    {
        if(isset($post['workerCheck']) && $post['workerCheck'] === 'on'){
            if(!preg_match('#^[а-я]{1}\d{3}[а-я]{2}\d{2,3}#u', $post['number']) || strlen($post['number'])>9){
                $_SESSION["message"] = "Проверьте номер автомобиля";
                $_SESSION["msg_type"] = "warning";
            }
            $checkNumber = self::$db->select('gibdd', '*', ['number' => $post['number']]);
            if(empty($checkNumber)){
                $_SESSION["message"] = "Автомобиля с таким номером нет";
                $_SESSION["msg_type"] = "warning";
            }
        }
        if(isset($post['notworkerCheck']) && $post['notworkerCheck'] === 'on'){
            if(!preg_match('#^-?[0-9]*$#',$post['social_card']) || strlen($post['social_card']) >9){
                $_SESSION["message"] = "Проверьте номер социальной карты";
                $_SESSION["msg_type"] = "warning";
            }
            if(!preg_match('#^-?[0-9]*$#', $post['troika']) || strlen($post['troika']) >9){
                $_SESSION["message"] = "Проверьте номер карты 'Тройка'";
                $_SESSION["msg_type"] = "warning";
            }
        }
    }

    private function CheckWork(array $post)
    {
        if(!preg_match ('#^-?[0-9]*$#', $post['inn'])||strlen((string) $post['inn']) >9){
            $_SESSION["message"] = "Проверьте ИНН";
            $_SESSION["msg_type"] = "warning";
        }
        $work = self::$db->select('tax', '*', ['organization_name' => $post['organization']]);
        if(empty($work)){
            $_SESSION["message"] = "Такой органиизации нет";
            $_SESSION["msg_type"] = "warning";
        }else{
            if($work[0]['inn'] != $post['inn']){
                $_SESSION["message"] = "Oрганиизации с таким ИНН нет";
                $_SESSION["msg_type"] = "warning";
            }
            $okved = $work[0]['okved_id'];
            $checkOkved = self::$db->select('okved', '*', ['id' => $okved]);
            if($checkOkved[0]['always'] === 0){
                $_SESSION["message"] = "Oрганизация не работает";
                $_SESSION["msg_type"] = "warning";  
            }
            $checkWorker = self::$db->select('people_tax', '*', ['passport' => $post['passport']]);
            if($checkWorker[0]['tax_id'] !== $work[0]['id']){
                $_SESSION["message"] = "Такого сотрудника нет";
                $_SESSION["msg_type"] = "warning";  
            }
        }
        return $work[0]['id'];
    }

    private function activateCard(array $post)
    {
        if(!empty($post['social_card'])){
            $lock = self::$db->select('social_transport','lock',['social_card'=> $post['social_card']]);
            if($post['type_pass'] === 'const'){
                if($lock[0]['lock'] == 1){
                        self::$db->update('social_transport', ['lock' => 0],['social_card' => $post['social_card']]);  
                }
            }     
        }

        if(!empty($post['troika'])){
            $lock = self::$db->select('social_transport','lock',['troika'=> $post['troika']]);
            if($lock[0]['lock'] == 1){
                self::$db->update('social_transport', ['lock' => 0],['troika' => $post['troika']]);  
            }
        }
    }

    public function check($pass_id)
    {
        $checkPassid = self::$db->select('pass', '*', ['pass_id' => $pass_id]);
        if (empty($checkPassid)) {
            throw new Exception('Пропуск не найден', 1);
        }
        return reset($checkPassid);
    }
}
