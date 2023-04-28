<?php

namespace App\Models;

use App\Core\Model;

class RegisterModel extends Model
{
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
    public string $confirmPassword;

    public function register()
    {
        echo "user created";
    }

    public function rules()
    {
        return [

        ];
    }

}