<?php

namespace app\controllers;

use app\models\Register;
use Yii;
use yii\web\Controller;


class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionRegister()
    {

        $model = new Register();

        if (isset($_POST['Register'])) {

            $model->attributes = Yii::$app->request->post('Register');

            if ($model->validate() && $model->register()) {

                return $this->goHome();

            }
        }
        return $this->render('register', ['model' => $model]);
    }
}
