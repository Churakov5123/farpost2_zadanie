<?php

class IndexController
{

        public function actionIndex()
    {

        $db = Db::getConection();
        $sql = 'SELECT COUNT(*) FROM admins WHERE email = :email password= :password';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        $result = false;
        $email = '';
        $password = '';



        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;


            // Валидация полей
            if (!Registr::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!Registr::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = Registr::checkUserData($email, $password);

            if ($userId == false) {

                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {

                // Если данные правильные, запоминаем пользователя (сессия)
                Registr::auth($userId);

                // Перенаправляем пользователя в закрытую часть - кабинет
                header('Location: /admin');
            }

        }


        require_once ROOT . '/views/index/index.php';
        return true;
    }



}