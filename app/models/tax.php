<?php

    class tax extends model
    {
        public function addOrganization(array $data)
        {

            $id = $this->getIdByInn($data['inn']);

            if($id){
                //если фирма уже существует сообщаем
                throw new Exception("Фирма с таким ИНН уже существует");
            }

            // organization=1 inn=1 org_okved=1
            $this->organization_name = $data['organization'];
            $this->inn = $data['inn'];
            $this->okved_id = $data['org_okved'];

            if(!is_int((int) $this->inn)){
                throw new Exception('ИНН должен состоять из цифр');
            }
            if(!is_int((int) $this->okved_id)){
                throw new Exception('ОКВЕД должен состоять из цифр');
            }
            $this->save();
            
            return 'Фирма добавлена';
        }

        protected function getOkvedId(string $okved)
        {
            return self::$db->select('okved', 'id', ['name' => $okved]);
        }

        protected function getIdByInn($inn)
        {
            return self::$db->select('tax', 'id', ['inn' => $inn]);
        }

        protected function getIdByName($name)
        {
            return self::$db->select('tax', 'name', ['name' => $name]);
        }
    }