<?php
namespace app\models;

use app\models\User;
use yii\base\Model;

class Register extends Model
{
    public $email;
    public $password;
    public $firstName;
    public $lastName;
    public $address;

    public function rules()
    {
        return [
            [['email', 'password', 'firstName', 'lastName', 'address'], 'required'],
            ['email', 'email'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'firstName' => 'First name',
            'lastName' => 'Last name',
            'address' => 'Address',
            'password' => 'Password',
            'email' => 'Email'

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
        $user->firstName = $this->firstName;
        $user->lastName = $this->lastName;
        $user->address = $this->address;
        return $user->save(); //вернет true или false

    }

}