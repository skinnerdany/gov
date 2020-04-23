<?php

    class tax extends model
    {
        public function addOrganization(array $data)
        {
            // organization=1 inn=1 org_okved=1
            $this->organization_name = $data['organization'];
            $this->inn = $data['inn'];
            $this->okved_id = $data['org_okved'];

            if(!is_int($this->inn)){
                throw new Exception('ИНН должен состоять из цифр');
            }

            $res = $this->save();
            //header('Location: /tax/add');
        }

        protected function getOkvedId(string $okved)
        {
            return $this->db->select('okved', 'id', ['name' => $okved]);
        }
    }