<?php
require_once '../config/config.php';

if (isset($_POST['update_campus'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $campus_name = $_POST['campus_name'];
        $campus_ID = $_POST['campus_ID'];

        //Input the fields
        $fields = [
            'campus_name'          => $campus_name, //or 'name =>$_POST['name'],'
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'campus_name' => [
                'required' => true,
                'unique' => [[
                    'fieldName' => 'campus_name',
                    'tableName' => 'campus'
                ]]
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'campus_name'       => $campus_name, //or $_POST['name']
            ]; //put it in array before saving

            $update = update('campus',  ['campus_ID' => $campus_ID], $data);

            if ($update) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Updated Successfully'); //set message
                redirect('admin_manage_campus'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('admin_update_campus'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            $errors['edit_campus'] = $campus_ID;
            redirect('admin_update_campus', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

if (isset($_POST['update_department'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $department_name = $_POST['department_name'];
        $department_ID = $_POST['department_ID'];

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
            ]; //put it in array before saving

            $update = update('department',  ['department_ID' => $department_ID], $data);

            if ($update) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Updated Successfully'); //set message
                redirect('admin_manage_department'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('admin_update_department'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            $errors['edit_department'] = $department_ID;
            redirect('admin_update_department', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

if (isset($_POST['update_centeremployee'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $center_employee_name = $_POST['center_employee_name'];
        $department_ID = $_POST['department_ID'];
        $center_ID = $_POST['center_ID'];
        $center_employee_ID = $_POST['center_employee_ID'];

        //Input the fields
        $fields = [
            'center_employee_name'          => $center_employee_name, //or 'name =>$_POST['name'],'
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
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'center_employee_name'       => $center_employee_name, //or $_POST['name']
                'department_ID'       => $department_ID,
                'center_ID' => $center_ID,
            ]; //put it in array before saving

            $update = update('center_employee',  ['center_employee_ID' => $center_employee_ID], $data);

            if ($update) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Updated Successfully'); //set message
                redirect('admin_manage_employee'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('admin_update_centeremployee'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            $errors['edit_centeremployee'] = $center_employee_ID;
            redirect('admin_update_centeremployee', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

if (isset($_POST['update_student'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $student_name = $_POST['student_name'];
        $student_ID = $_POST['student_ID'];
        $course_ID = $_POST['course_ID'];

        //Input the fields
        $fields = [
            'student_name'          => $student_name, //or 'name =>$_POST['name'],'
        ];
        //Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'student_name' => [
                'required' => true,
                'unique' => [[
                    'fieldName' => 'student_name',
                    'tableName' => 'student'
                ]]
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'student_name'       => $student_name, //or $_POST['name']
                'course_ID'          => $course_ID,
            ]; //put it in array before saving

            $update = update('student',  ['student_ID' => $student_ID], $data);

            if ($update) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Updated Successfully'); //set message
                redirect('admin_manage_student'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('admin_update_student'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            $errors['edit_student'] = $student_ID;
            redirect('admin_update_student', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;


if (isset($_POST['update_course'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $course_name = $_POST['course_name'];
        $department_ID = $_POST['department_ID'];
        $course_ID = $_POST['course_ID'];

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

            $update = update('course',  ['course_ID' => $course_ID], $data);

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'updated Successfully'); //set message
                redirect('admin_manage_course'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'update Failed'); //set message
                redirect('admin_update_course'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            $errors['edit_course'] = $course_ID;
            redirect('admin_update_course', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

// update center title
if (isset($_POST['update_center'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $center_title = $_POST['center_title'];
        $center_ID = $_POST['center_ID'];

        //Input the fields
        $fields = [
            'center_title'          => $center_title, //or 'name =>$_POST['name'],'
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
                'center_title'       => $center_title, //or $_POST['name']
            ]; //put it in array before saving

            $update = update('center',  ['center_ID' => $center_ID], $data);

            if ($update) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Updated Successfully'); //set message
                redirect('admin_manage_position'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('admin_update_center'); //shortcut for header('location:index.php ');
            }
        } else {
            $errors['edit_center'] = $center_ID;
            retainValue(); //retain value even if there is errors or refresh

            redirect('admin_update_center', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

// update college name

if (isset($_POST['update_college'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $college_name = $_POST['college_name'];
        $college_ID = $_POST['college_ID'];

        //Input the fields
        $fields = [
            'college_name'          => $college_name, //or 'name =>$_POST['name'],'
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
                'college_name'       => $college_name, //or $_POST['name']
            ]; //put it in array before saving

            $update = update('college',  ['college_ID' => $college_ID], $data);

            if ($update) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Updated Successfully'); //set message
                redirect('admin_manage_college'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('admin_update_college'); //shortcut for header('location:index.php ');
            }
        } else {
            $errors['edit_college'] = $college_ID;
            retainValue(); //retain value even if there is errors or refresh

            redirect('admin_update_college', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;

if (isset($_POST['update_cluster'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $cluster_title = $_POST['cluster_title'];
        $cluster_ID = $_POST['cluster_ID'];

        //Input the fields
        $fields = [
            'cluster_title'          => $cluster_title, //or 'name =>$_POST['name'],'
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
                'cluster_title'       => $cluster_title, //or $_POST['name']
            ]; //put it in array before saving

            $update = update('cluster',  ['cluster_ID' => $cluster_ID], $data);

            if ($update) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Updated Successfully'); //set message
                redirect('admin_manage_position'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Update Failed'); //set message
                redirect('admin_update_cluster'); //shortcut for header('location:index.php ');
            }
        } else {
            $errors['edit_cluster'] = $cluster_ID;
            retainValue(); //retain value even if there is errors or refresh

            redirect('admin_update_cluster', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;