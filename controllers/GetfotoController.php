<?php


class GetfotoController
{
    public function actionIndex()

    {




        Foto::getfoto();

        return true;
    }


}