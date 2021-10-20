<?php
    class UserManager {

        private function connectToDB() {
            try {
                $dataBase = new PDO('mysql:host=localhost;dbname=netflix;charset=utf8', 'root', '');
                $dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(Exception $e) {
                throw new Exception('Error : '.$e->getMessage());
            }

            return $dataBase;
        }

        public function isExisting($email) {
            $dataBase = $this->connectToDB();
            $request  = $dataBase->prepare('SELECT email FROM user WHERE email = :email');
            $request->execute(array('email'  => $email));
            $result = $request->fetch();
            if($result['email'] != $email) {
                return false;
            }
            
            return true;
        }

        public function getUser($email) {
            $dataBase = $this->connectToDB();
            $request  = $dataBase->prepare('SELECT * FROM user WHERE email = :email');
            $request->execute(array('email' => $email));
            $result = $request->fetch();
            
            return $result;
        }

        public function insertUser($email, $password, $secret) {
            $dataBase = $this->connectToDB();
            $request  = $dataBase->prepare('INSERT INTO user(email, passwd, secret) VALUES(:email, :passwd, :secret)');
            $result   = $request->execute(array(
                'email'  => $email,
                'passwd' => md5('azerty'.$password.'qsdf'),
                'secret' => $secret
            ));

            return $result;
        }
    }