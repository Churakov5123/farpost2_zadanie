<?php
class RegistController
{
    public function actionRegistr()
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
		// echo '<pre>';
		// print_r($_SERVER);
		// echo '</pre>';
		


        

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!Registr::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!Registr::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (Registr::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {
                $result = Registr::register($email, $password);
            }

        }

		require_once(ROOT . '/views/registracia.php');


        return true;

    }


}