<?php

namespace app\controllers;

use app\models\Login;
use app\models\Register;
use Yii;
use yii\web\Controller;


class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogout()
    {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
            return $this->redirect(['login']);
        }
    }

    /**
     * @return string
     */
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Register();

        if (isset($_POST['Register'])) {

            $model->attributes = Yii::$app->request->post('Register');

            if ($model->validate() && $model->register()) {

                return $this->goHome();

            }
        }
        return $this->render('register', ['model' => $model]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $login_model = new Login();
        if (Yii::$app->request->post('Login')) {
            $login_model->attributes = Yii::$app->request->post('Login');

            if ($login_model->validate()) {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }

        }

        return $this->render('login', ['login_model' => $login_model]);
    }
}
