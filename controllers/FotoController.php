<?php


class FotoController
{
    public static function actionIndex()

    {


        if (isset($_POST['my_file_upload'])) {
            // if ($_SERVER['REQUEST_METHOD'] == 'POST'){


            $uploaddir = './uploads'; // . - текущая папка где находится submit.php

            // cоздадим папку если её нет
            if (!is_dir($uploaddir)) mkdir($uploaddir, 0777);


            $files = $_FILES; // полученные файлы

            $done_files = array();

            // переместим файлы из временной директории в указанную
            foreach ($files as $file) {
                $file_name = Foto::cyrillic_translit($file['name']);

                if (move_uploaded_file($file['tmp_name'], "$uploaddir/$file_name")) {
                    $done_files[] = realpath("$uploaddir/$file_name");
                }
            }

            $data = $done_files ? array('files' => $done_files) : array('error' => 'Ошибка загрузки файлов.');

            die(json_encode($data));
        }

        require_once(ROOT . '/views/foto.php');


        return true;
    }

}


