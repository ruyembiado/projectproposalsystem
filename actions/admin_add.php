<?php
require_once '../config/config.php';

if (isset($_POST['add_campus'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $campus_name = $_POST['campus_name'];

        //Input the fields
        $fields = [
            'campus_name'          => $campus_name, //or 'name =>$_POST['name'],'
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'campus_name' => [
                'required' => true,
                'unique' => [
                    'fieldName' => 'campus_name',
                    'tableName' => 'campus'
                ],
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'campus_name'       => $campus_name, //or $_POST['name']
            ]; //put it in array before saving

            $save = save('campus', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Added Successfully'); //set message
                redirect('admin_manage_campus'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('admin_add_campus'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_add_campus', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

if (isset($_POST['add_department'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $department_name = $_POST['department_name'];
        $college_ID = $_POST['college_ID'];
        //Input the fields
        $fields = [
            'department_name'          => $department_name, //or 'name =>$_POST['name'],'
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'department_name' => [
                'required' => true,
                'unique' => [[
                    'fieldName' => 'department_name',
                    'tableName' => 'department'
                ]]
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'department_name'       => $department_name, //or $_POST['name']
                'college_ID'       => $college_ID, //or $_POST['name']
            ]; //put it in array before saving

            $save = save('department', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Added Successfully'); //set message
                redirect('admin_manage_department'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('admin_add_department'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_add_department', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

// add cluster coordinator
if (isset($_POST['add_clusteremployee'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $cluster_employee_name = $_POST['cluster_employee_name'];
        $cluster_employee_username = $_POST['cluster_employee_username'];
        $cluster_employee_password = $_POST['cluster_employee_password'];
        $cluster_employee_contact = $_POST['cluster_employee_contact'];
        // $center_ID = $_POST['center_ID'];
        $cluster_ID = $_POST['cluster_ID'];
        $conf_password = $_POST['conf_password'];
        $department_ID = $_POST['department_ID'];

        //Input the fields
        $fields = [
            'cluster_employee_name'          => $cluster_employee_name, //or 'name =>$_POST['name'],'
            'cluster_employee_username'      => $cluster_employee_username,
            'cluster_employee_password'      => $cluster_employee_password,
            'cluster_employee_contact'      => $cluster_employee_contact,
            'conf_password'          => $conf_password,
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'cluster_employee_name' => [
                'required' => true,
                'unique' => [
                    'fieldName' => 'cluster_employee_name',
                    'tableName' => 'cluster_employee'
                ]
            ],
            'cluster_employee_username' => [
                'required' => true,
                'unique' => [
                    'fieldName' => 'cluster_employee_username',
                    'tableName' => 'cluster_employee'
                ]
            ],
            'cluster_employee_password' => [
                'required' => true,
                'min_length' => 8,
                'max_length' => 100
            ],
            'cluster_employee_contact' => [
                'required' => true,
            ],
            'conf_password' => [
                'required' => true,
                'match' => 'cluster_employee_password'
            ]
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'cluster_employee_name'       => $cluster_employee_name, //or $_POST['name']
                'cluster_employee_username'   => $cluster_employee_username,
                'cluster_employee_contact'   => $cluster_employee_contact,
                'cluster_employee_password'   => password_hash($cluster_employee_password, PASSWORD_DEFAULT),
                'department_ID'       => $department_ID,
                // 'center_ID'       => $center_ID,
                'cluster_ID'       => $cluster_ID,
            ]; //put it in array before saving

            $save = save('cluster_employee', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Added Successfully'); //set message
                redirect('admin_manage_employee'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('admin_add_clustercoordinator'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_add_clustercoordinator', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

// add center chair
if (isset($_POST['add_centeremployee'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $center_employee_name = $_POST['center_employee_name'];
        $center_employee_username = $_POST['center_employee_username'];
        $center_employee_password = $_POST['center_employee_password'];
        $center_employee_contact = $_POST['center_employee_contact'];
        $conf_password = $_POST['conf_password'];
        $department_ID = $_POST['department_ID'];
        $center_ID  = $_POST['center_ID'];

        //Input the fields
        $fields = [
            'center_employee_name'          => $center_employee_name, //or 'name =>$_POST['name'],'
            'center_employee_username'      => $center_employee_username,
            'center_employee_password'      => $center_employee_password,
            'center_employee_contact'      => $center_employee_contact,
            'conf_password'          => $conf_password,
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'center_employee_name' => [
                'required' => true,
                'unique' => [[
                    'fieldName' => 'center_employee_name',
                    'tableName' => 'center_employee'
                ]]
            ],
            'center_employee_username' => [
                'required' => true,
                'unique' => [[
                    'fieldName' => 'center_employee_username',
                    'tableName' => 'center_employee'
                ]],
                [[
                    'fieldName' => 'cluster_employee_username',
                    'tableName' => 'cluster_employee'
                ]],
                [[
                    'fieldName' => 'admin_username',
                    'tableName' => 'admin'
                ]],
            ],
            'center_employee_contact' => [
                'required' => true,
            ],
            'center_employee_password' => [
                'required' => true,
                'min_length' => 8,
                'max_length' => 100
            ],
            'conf_password' => [
                'required' => true,
                'match' => 'center_employee_password'
            ]
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'center_employee_name'       => $center_employee_name, //or $_POST['name']
                'center_employee_username'   => $center_employee_username,
                'center_employee_contact'   => $center_employee_contact,
                'center_employee_password'   => password_hash($center_employee_password, PASSWORD_DEFAULT),
                'department_ID'       => $department_ID,
                'center_ID' => $center_ID,
            ]; //put it in array before saving

            $save = save('center_employee', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Added Successfully'); //set message
                redirect('admin_manage_employee'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('admin_add_centerchair'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_add_centerchair', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

if (isset($_POST['add_student'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $student_name = $_POST['student_name'];
        $student_username = $_POST['student_username'];
        $student_password = $_POST['student_password'];
        $conf_password = $_POST['conf_password'];
        $course_ID = $_POST['course_ID'];

        //Input the fields
        $fields = [
            'student_name'          => $student_name, //or 'name =>$_POST['name'],'
            'student_username'      => $student_username,
            'student_password'      => $student_password,
            'conf_password'         => $conf_password,
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'student_name' => [
                'required' => true,
                'unique' => [
                    'fieldName' => 'student_name',
                    'tableName' => 'student'
                ]
            ],
            'student_username' => [
                'required' => true,
                'unique' => [[
                    'fieldName' => 'student_username',
                    'tableName' => 'student'
                ]],
                [[
                    'fieldName' => 'center_employee_username',
                    'tableName' => 'center_employee'
                ]],
                [[
                    'fieldName' => 'cluster_employee_username',
                    'tableName' => 'cluster_employee'
                ]],
                [[
                    'fieldName' => 'admin_username',
                    'tableName' => 'admin'
                ]],
            ],
            'student_password' => [
                'required' => true,
                'min_length' => 8,
                'max_length' => 100
            ],
            'conf_password' => [
                'required' => true,
                'match' => 'student_password'
            ]
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'student_name'       => $student_name, //or $_POST['name']
                'student_username'   => $student_username,
                'student_password'   => password_hash($student_password, PASSWORD_DEFAULT),
                'course_ID'          => $course_ID,
            ]; //put it in array before saving

            $save = save('student', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Added Successfully'); //set message
                redirect('admin_manage_student'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('admin_add_student'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_add_student', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

if (isset($_POST['add_course'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $course_name = $_POST['course_name'];
        $department_ID = $_POST['department_ID'];

        //Input the fields
        $fields = [
            'course_name'          => $course_name, //or 'name =>$_POST['name'],'
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'course_name' => [
                'required' => true,
                'unique' => [[
                    'fieldName' => 'course_name',
                    'tableName' => 'course'
                ]]
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'course_name'       => $course_name, //or $_POST['name']
                'department_ID'       => $department_ID,
            ]; //put it in array before saving

            $save = save('course', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Added Successfully'); //set message
                redirect('admin_manage_course'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('admin_add_course'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_add_course', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

if (isset($_POST['add_center'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $center_title = $_POST['center_title'];

        //Input the fields
        $fields = [
            'center_title'  => $center_title,
            //or 'name =>$_POST['name'],'
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'center_title' => [
                'required' => true,
                'unique' => [[
                    'fieldName' => 'center_title',
                    'tableName' => 'center'
                ]]
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'center_position' => "Center Chair",
                'center_title'  => $center_title,
            ]; //put it in array before saving

            $save = save('center', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Added Successfully'); //set message
                redirect('admin_manage_position'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('admin_add_center'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_add_center', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

if (isset($_POST['add_cluster'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $cluster_title = $_POST['cluster_title'];
        $center_ID = $_POST['center_ID'];

        //Input the fields
        $fields = [
            'cluster_title'  => $cluster_title,
            //or 'name =>$_POST['name'],'
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'cluster_title' => [
                'required' => true,
                'unique' => [[
                    'fieldName' => 'cluster_title',
                    'tableName' => 'cluster'
                ]]
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'cluster_position' => "Cluster Coordinator",
                'cluster_title'  => $cluster_title,
                'center_ID' => $center_ID,
            ]; //put it in array before saving

            $save = save('cluster', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Added Successfully'); //set message
                redirect('admin_manage_position'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('admin_add_cluster'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_add_cluster', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

if (isset($_POST['add_college'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $college_name = $_POST['college_name'];

        //Input the fields
        $fields = [
            'college_name'  => $college_name,
            //or 'name =>$_POST['name'],'
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'college_name' => [
                'required' => true,
                'unique' => [[
                    'fieldName' => 'college_name',
                    'tableName' => 'college'
                ]]
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'college_name' => $college_name
            ]; //put it in array before saving

            $save = save('college', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Added Successfully'); //set message
                redirect('admin_manage_college'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('admin_add_college'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('admin_add_college', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;
