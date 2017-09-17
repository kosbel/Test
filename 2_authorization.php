<?php

    class User
    {
        private $login;
        private $email;
        private $password;  // password -> "admin"!!!!
        private $mini_db = ['login' => 'admin', 'email' => 'a@a.a', 'password' => '21232f297a57a5a743894a0e4a801fc3'];

        //время хранения cookie
        const _TIME_ = 200;

        public function __construct($arr_val){
            $this->login = $arr_val['login'];
            $this->email = $arr_val['email'];
            $this->password = self::generatePasswordHash($arr_val['password']);
        }

        //проверка данных
        public function validation(){
            if(isset($_COOKIE['hash_key'])){
                if( $this->login == $this->mini_db['login'] &&
                    $this->email == $this->mini_db['email'] &&
                    $this->password == $_COOKIE['hash_key']){
                        return true;
                }
            }
            else if($this->login == $this->mini_db['login'] &&
                    $this->email == $this->mini_db['email'] &&
                    $this->password == $this->mini_db['password']){
                    return true;
            }
            return false;
        }

        //установка cookie
        public function setCookieHashUser(){
            setcookie("hash_key", $this->password, time() + self::_TIME_);
        }

        //удаление cookie
        public function deleteCookie(){
            setcookie("hash_key");
        }

        //генерация хеш ключа
        private function generatePasswordHash($password){
            $hash = md5($password);
            return $hash;
        }
    }

    //если форма отправлена
    if(isset($_POST)) {
//        print_r($_POST);
        $user = new User($_POST);

        if ($user->validation()) {
            $user->setCookieHashUser();

            echo html_entity_decode(
                "<form action='2_authorization.php' method='get'>
                    <input type='submit' name='exit' value='Выйти'>
                </form>"
            );
        }else{
            header("Location: /test_Oregano/2_form.html");
        }
    }

    //если нажата кнопка "Выйти"
    if(isset($_GET['exit'])){
        $user->deleteCookie();
        header("Location: /test_Oregano/2_form.html");
    }