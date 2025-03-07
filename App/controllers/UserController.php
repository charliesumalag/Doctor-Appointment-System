<?php

namespace App\controllers;

class UserController
{
    public function __construct() {}

    // show the login page
    public function login()
    {
        loadView('users/login');
    }
    // show the register
    public function register()
    {
        loadView('users/register');
    }
    public function createAccount()
    {
        loadView('users/create');
    }
    public function handleSignup()
    {
        redirect('/createaccount');
    }
}
