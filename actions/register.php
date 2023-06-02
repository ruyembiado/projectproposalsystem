<?php
require_once '../config/config.php';

if (isset($_POST['register'])) :

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confpassword = $_POST['confpassword'];
        $email = $_POST['email'];

        //Input the fields
        $fields = [
            'name'          => $name, //or 'name =>$_POST['name'],'
            'username'      => $username,
            'password'      => $password,
            'confpassword'  => $confpassword,
            'email'         => $email,
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'name' => [
                'required' => true,
                'min_length' => 2,
                'max_length' => 100
            ],
            'username' => [
                'required' => true,
                'min_length' => 5,
                'max_length' => 50,
                'unique' => [
                    [
                    'fieldName' => 'username',
                    'tableName' => 'users'
                    ],
                    [
                        'fieldName' => 'username',
                        'tableName' => 'users'
                        ],

                ],
                // 'unique' => [
                //     'fieldName' => 'username',
                //     'tableName' => 'users'
                // ], //duplicate if you want to check multiple tables, mark and press ctrl + / to uncomment
            ],
            'email'    => [
                'required'  => true,
                'email'     => true,
                'unique'    => [
                    'fieldName' => 'email',
                    'tableName' => 'users'
                ],
            ],
            'password' => [
                'required' => true,
                'min_length' => 8,
                'max_length' => 100
            ],
            'confpassword' => [
                'required' => true,
                'match' => 'password'
            ]
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'name'  => $name, //or $_POST['name']
                'username'  => $username,
                'password'  => password_hash($password, PASSWORD_DEFAULT), //encrypt the password like md5
                'email'     => $email,
                'role'      => 'student',
            ]; //put it in array before saving

            $save = save('users', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Registered Successfully'); //set message
                redirect('register'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Register Failed'); //set message
                redirect('register'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('register', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }

endif;
