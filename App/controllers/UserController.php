<?php

namespace App\controllers;

use Framework\Session;
use Framework\Database;

class UserController
{
    protected $db;

    public function __construct()
    {
        $config = require basepath('config/db.php');
        $this->db = new Database($config);
    }

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
        $details = Session::get('details');
        $details['email'] = $_POST['email'];
        $details['mobilenumber'] = $_POST['mobilenumber'];
        $details['password'] = $_POST['password'];
        $details['confirm_password'] = $_POST['confirmpassword'];



        $params = [
            'email' => $details['email'],
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();

        if ($user) {
            echo 'email already exist';
            loadView('create');
            exit;
        }

        $params = [
            'firstname' => $details['firstname'],
            'lastname' => $details['lastname'],
            ''
        ]

        // inspect($details);
        loadView('users/create');
    }
    public function handleSignup()

    {
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        Session::set('details', [
            'firstname' => $first_name,
            'lastname' => $last_name,
        ]);
        redirect('/createaccount');
    }

    public function store() {}
}
