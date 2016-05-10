<?php
namespace app\models;

use app\models\User;
use yii\base\Model;

class Register extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User'],
            ['password', 'string', 'min' => 2, 'max' => 12]
        ];
    }

    /**
     * @return mixed
     */
    public function register()
    {
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        return $user->save(); //вернет true или false
    }

}