<?php

class Index_Model {

    public function recordPledge($data) {
        if (empty($data['email']) || empty($data['nme']) || empty($data['gas']) || empty($data['gas'])) {
            return '{"success":0,"msg":"All fields are mandatory."}';
        } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            //Inavlid email
            return '{"success":0,"msg":"Please enter a valid email"}';
        }
        $db = $this->getDB('r', '');
        $time = time();
        $id = md5($time . rand(12, 2132) . '@#$DFS');
        $temp = $db->query("INSERT INTO _table_pledge_record VALUES (" . $db->quote($id) . "," .
                $db->quote($data['nme']) . "," . $db->quote($data['email']) . "," . $db->quote($data['state']) . "," . $db->quote($data['gas']) . "," .
                $db->quote($data['dsc']) . ", '$time')");
        if ($temp) {
            return '{"success":1,"msg":"Your pledge successfully recorded"}';
        } else {
            return '{"success":0"msg":"Something went wrong while recording pledge. Please try again."}';
        }
    }
    
    public function requestSubsidy($data){
        if (empty($data['state']) || empty($data['cndidt']) || empty($data['cntncy'])) {
            return '{"success":0,"msg":"All fields are mandatory."}';
        }
        $db = $this->getDB('r', '');
        $time = time();
        $id = md5($time . rand(12, 2132) . '@#$DFS');
        $insert = $db->query("INSERT INTO _table_request_record VALUES (" . $db->quote($id) . "," .
                $db->quote($data['state']) . "," . $db->quote($data['cndidt']) . "," . $db->quote($data['cntncy']) . "," . $db->quote($data['dtls']) . ", '$time')");
        if ($insert) {
            return '{"success":1,"msg":"Your successfully sent"}';
        } else {
            return '{"success":0"msg":"Something went wrong while sending request. Please try again."}';
        }
    }

    private function getDB($type, $db) {
        return (new Model())->getDBConnection($type, $db);
    }

}