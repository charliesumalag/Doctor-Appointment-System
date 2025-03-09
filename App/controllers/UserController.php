<?php

namespace App\controllers;

use Framework\Validate;
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
        $errors = [];

        // Get session details or initialize an empty array
        $details = Session::get('details') ?? [];

        // Collect user inputs
        $details['email'] = $_POST['email'] ?? null;
        $details['mobilenumber'] = $_POST['mobilenumber'] ?? null;
        $details['password'] = $_POST['password'] ?? null;
        $details['confirm_password'] = $_POST['confirmpassword'] ?? null;

        // Validate required fields
        if (empty($details['email']) || empty($details['mobilenumber']) || empty($details['password'])) {
            $errors['fields'] = 'All fields are required.';
        }

        // Validate password confirmation
        if (!Validate::match($details['password'], $details['confirm_password'])) {
            $errors['password_confirmation'] = 'Passwords do not match.';
        }

        // Stop execution if there are validation errors
        if (!empty($errors)) {
            return loadView('users/create', ['errors' => $errors]);
        }

        // Check if email already exists
        $params = ['email' => $details['email']];
        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();

        if ($user) {
            $errors['email'] = 'Email already exists.';
            return loadView('users/create', ['errors' => $errors]);
        }

        // Prepare data for insertion
        $params = [
            'firstname' => $details['firstname'] ?? null,
            'lastname' => $details['lastname'] ?? null,
            'address' => $details['address'] ?? null,
            'nicnumber' => $details['nicnumber'] ?? null,
            'dateofbirth' => $details['dateofbirth'] ?? null,
            'email' => $details['email'],
            'mobilenumber' => $details['mobilenumber'],
            'password' => password_hash($details['password'], PASSWORD_DEFAULT),
        ];

        // Insert user into database
        $this->db->query(
            'INSERT INTO users (first_name, last_name, address, nic_number, date_of_birth, email, mobile_number, password)
         VALUES(:firstname, :lastname, :address, :nicnumber, :dateofbirth, :email, :mobilenumber, :password)',
            $params
        );

        // Redirect to login page after successful registration
        redirect('/login');
    }

    public function handleSignup()

    {
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $address = $_POST['address'];
        $nicnumber = $_POST['nicnumber'];
        $dateofbirth = $_POST['dateofbirth'];
        Session::set('details', [
            'firstname' => $first_name,
            'lastname' => $last_name,
            'address' => $address,
            'nicnumber' => $nicnumber,
            'dateofbirth' => $dateofbirth,
        ]);
        redirect('/createaccount');
    }

    public function store() {}
}
