<?php
require_once '../config/config.php';

if (isset($_POST['user_login'])) : //check if the button is click
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post

        $username = $_POST['username'];
        $password = $_POST['password'];

        //sample $first = first('users', ['username'=>$username]);  return the first value find
        if ($user = first('admin', ['admin_username' => $username])) { //find the first value or row of the query where username=$username
            if (password_verify($password, $user['admin_password'])) { //password_verify built in php function to compare hashpasswords

                $session = [
                    'admin_ID'        => $user['admin_ID'],
                    'admin_name'      => $user['admin_name'],
                    'admin_username'  => $user['admin_username'],
                    'isLogin'   => true,
                ];

                $session = setSession($session); //set the $session array
                // var_dump($_SESSION); //use to test the session variables
                setFlash('success', 'Welcome' . ' ' . $user['admin_name']); //set message
                redirect('admin_index'); //shortcut for header('location:index.php'); //uncomment to use if you have page to redirect
            } else {
                retainValue();
                $errors['password'] = 'Incorrect password';
                redirect('login', $errors);
            }
        // } else if ($user = first('student', ['student_username' => $username])) {
        //     if (password_verify($password, $user['student_password'])) { //password_verify built in php function to compare hashpasswords
        //         $session = [
        //             'student_ID'        => $user['student_ID'],
        //             'student_name'      => $user['student_name'],
        //             'student_username'  => $user['student_username'],
        //             'isLogin'   => true,
        //         ];
        //         $session = setSession($session); //set the $session array
        //         // var_dump($_SESSION); //use to test the session variables
        //         setFlash('success', 'Welcome' . ' ' . $user['student_name']); //set message
        //         redirect('student_index'); //shortcut for header('location:index.php'); //uncomment to use if you have page to redirect
        //     } else {
        //         retainValue();
        //         $errors['password'] = 'Incorrect password';
        //         redirect('login', $errors);
        //     }
        } else if ($user = first('center_employee', ['center_employee_username' => $username])) {
            if (password_verify($password, $user['center_employee_password'])) { //password_verify built in php function to compare hashpasswords
                $session = [
                    'center_employee_ID'        => $user['center_employee_ID'],
                    'center_employee_name'      => $user['center_employee_name'],
                    'center_employee_username'  => $user['center_employee_username'],
                    'isLogin'   => true,
                ];
                $session = setSession($session); //set the $session array
                // var_dump($_SESSION); //use to test the session variables
                setFlash('success', 'Welcome' . ' ' . $user['center_employee_name']); //set message
                redirect('user_index'); //shortcut for header('location:index.php'); //uncomment to use if you have page to redirect
            } else {
                retainValue();
                $errors['password'] = 'Incorrect password';
                redirect('login', $errors);
            }
        } else if ($user = first('cluster_employee', ['cluster_employee_username' => $username])) {
            if (password_verify($password, $user['cluster_employee_password'])) { //password_verify built in php function to compare hashpasswords
                $session = [
                    'cluster_employee_ID'        => $user['cluster_employee_ID'],
                    'cluster_employee_name'      => $user['cluster_employee_name'],
                    'cluster_employee_username'  => $user['cluster_employee_username'],
                    'isLogin'   => true,
                ];
                $session = setSession($session); //set the $session array
                // var_dump($_SESSION); //use to test the session variables
                setFlash('success', 'Welcome' . ' ' . $user['cluster_employee_name']); //set message
                redirect('user_index'); //shortcut for header('location:index.php'); //uncomment to use if you have page to redirect
            } else {
                retainValue();
                $errors['password'] = 'Incorrect password';
                redirect('login', $errors);
            }
        } else {
            $errors['username'] = 'Username do not exist';
            redirect('login', $errors);
        }
    }

endif;
