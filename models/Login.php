<?php
/**
 * Created by PhpStorm.
 * User: lasko
 * Date: 11.05.2016
 * Time: 17:16
 */

namespace app\models;


use yii\base\Model;

class Login extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) { // если нет ошибок валидации
            $user = $this->getUser(); // получаем пользователя для дальнейшего сравнения пароля

            if (!$user || !$user->validatePassword($this->password)) {
                // если мы не нашли в базе пользователя
                //или веденный пароль и пароль пользователя не равны
                $this->addError($attribute, 'Пароль или емейл введены неверно');
                // добавим ошибку для атрибута password
            }
        }
    }

    public function getUser()
    {
        return User::findOne(['email' => $this->email]); // получаем пользователя по введенному емейлу
    }
}