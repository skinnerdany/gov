<?php

    class okved extends model
    {
        public function add(array $data)
        {
            // okved=1223 always=on
            if(empty($data['okved'])){
                throw new Exception('Поле ОКВЭД должно быть заполнено');
            }


            $this->name = $data['okved'];
            $id = $this->getId($this->name);
            $id = reset($id);

            if($id){
                $this->id = $id['id'];
            }

            isset($data['always']) ? $this->always = 1 : $this->always = 0;

            // проверка типа оквед
            if(!is_int((int) $this->name)){
                throw new Exception('ОКВЕД должен состоять из цифр');
            }

            $res = $this->save();
            $resMessage = '';

            if($res[0] == 'false'){
                $resMessage = 'Что-то пошло не так';
            }elseif($res[0] == 'true'){
                $resMessage = 'ОКВЕД добавлен';
                core::app()->input->get = [];
            }
            if($id > 0){
                $resMessage = 'ОКВЕД изменён';
            }

            return $resMessage;
        }

        public function getOkvedCodes()
        {
            return self::$db->select($this->tableName);
        }

        protected function getId($okved){
            return self::$db->select('okved', 'id', ['name' => $okved]);
        }
    }