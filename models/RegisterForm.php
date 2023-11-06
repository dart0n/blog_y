<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $created_at;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => User::class, 'targetAttribute' => 'email'],
        ];
    }

    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $hashed_password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            $user->attributes = $this->attributes;
            $user->hashed_password = $hashed_password;
            return $user->create();
        }
    }
}
