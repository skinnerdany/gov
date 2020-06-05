<?php

class denisPass extends model
{
    public function generatePass(array $post)
    {
        $postMfc = $this->checkMfc($post);
        $this->checkTransport($post, $postMfc);
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
        if ($result === true) {
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

    private function checkTransport(array $post, $postMfc)
    {
    }

    private function CheckWork(array $post)
    {
        
    }

    private function activateCard(array $post)
    {
    }

    public function check($pass_id)
    {
        $check = self::$db->select('pass', '*', ['pass_id' => $pass_id]);
        if (empty($check)) {
            throw new Exception('Пропуск не найден', 1);
        }
        return reset($check);
    }
}
