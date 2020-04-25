<?php

    class tax extends model
    {
        public function addOrganization(array $data)
        {            
            // organization=1 inn=1 org_okved=1

            $this->validateData($data);
            
            $id = $this->getIdByInn($data['inn']);
            //если фирма уже существует сообщаем
            if($id){
                throw new Exception("Фирма с таким ИНН уже существует");
            }


            $okved_id = $this->getOkvedId($data['org_okved']);
            $okved_id = reset($okved_id);

            $this->okved_id =(int) $okved_id['id'];
            $this->organization_name = $data['organization'];
            $this->inn =(int) $data['inn'];

            $res = $this->save();
            if($res[0] == 'false'){
                return 'Что-то пошло не так';
            }elseif($res[0] == 'true'){
                core::app()->input->get = [];
            }
            return 'Фирма добавлена';
        }

        public function getOrgList()
        {
            return self::$db->query(
                'SELECT t.id, organization_name, inn, name AS okved, always 
                FROM tax AS t
                JOIN okved AS o ON t.okved_id = o.id'
            );
        }

        public function update($data)
        {
            $this->validateData($data);

            $this->id = $data['id'];
            $this->organization_name = $data['organization'];

            $okved_id = $this->getOkvedId($data['org_okved']);
            $okved_id = reset($okved_id);
            $this->okved_id =(int) $okved_id['id'];

            $result = $this->save();

            if($result[0] == 'false'){
                return 'Изменение отменено';
            }

            return 'Изменение успешно';
        }

        public function delete(string $id){
            return self::$db->delete('tax', ['id' => $id]);
        }

        protected function getOkvedId(string $okved)
        {
            return self::$db->select('okved', 'id', ['name' => $okved]);
        }

        protected function getIdByInn($inn)
        {
            return self::$db->select($this->tableName, 'id', ['inn' => $inn]);
        }

        protected function getIdByName($name)
        {
            return self::$db->select($this->tableName, 'name', ['name' => $name]);
        }

        protected function validateData($data)
        {
            if(empty($data['organization']) || empty($data['inn']) || empty($data['org_okved']))
            {
                throw new Exception('Все поля обязательны к заполнению');
            }

            // по идее тут валидация ИНН
            if(!is_int((int) $data['inn'])){
                throw new Exception('ИНН должен состоять из цифр');
            }
            
            // проверка типа оквед
            if(!is_int((int) $data['org_okved'])){
                throw new Exception('ОКВЕД должен состоять из цифр');
            }

            $okved_id = $this->getOkvedId($data['org_okved']);
            $okved_id = reset($okved_id);
            if(!$okved_id){
                throw new Exception('Не существует код ОКВЕД -> '. $data['org_okved']);
            }

            
            return true;
        }
    }