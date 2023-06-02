<?php
require_once '../config/config.php';

if (isset($_GET['delete_department'])) :
    $department_ID = $_GET['delete_department'];
    $delete = delete('department', ['department_ID' => $department_ID]);
    if ($delete) {
        setFlash('success', 'Deleted Sucessfully'); //set message
        redirect('admin_manage_department');
    } else {
        setFlash('failed', 'Deletion failed'); //set message
        redirect('admin_manage_department');
    }
endif;

if (isset($_GET['delete_clusteremployee'])) :
    $cluster_employee_ID = $_GET['delete_clusteremployee'];
    $delete = delete('cluster_employee', ['cluster_employee_ID' => $cluster_employee_ID]);
    if ($delete) {
        setFlash('success', 'Deleted Sucessfully'); //set message
        redirect('admin_manage_employee');
    } else {
        setFlash('failed', 'Deletion failed'); //set message
        redirect('admin_manage_employee');
    }
endif;

if (isset($_GET['delete_centeremployee'])) :
    $center_employee_ID = $_GET['delete_centeremployee'];
    $delete = delete('center_employee', ['center_employee_ID' => $center_employee_ID]);
    if ($delete) {
        setFlash('success', 'Deleted Sucessfully'); //set message
        redirect('admin_manage_employee');
    } else {
        setFlash('failed', 'Deletion failed'); //set message
        redirect('admin_manage_employee');
    }
endif;

if (isset($_GET['delete_student'])) :
    $student_ID = $_GET['delete_student'];
    $delete = delete('student', ['student_ID' => $student_ID]);
    if ($delete) {
        setFlash('success', 'Deleted Sucessfully'); //set message
        redirect('admin_manage_student');
    } else {
        setFlash('failed', 'Deletion failed'); //set message
        redirect('admin_manage_student');
    }
endif;

if (isset($_GET['delete_course'])) :
    $course_ID = $_GET['delete_course'];
    $delete = delete('course', ['course_ID' => $course_ID]);
    if ($delete) {
        setFlash('success', 'Deleted Sucessfully'); //set message
        redirect('admin_manage_course');
    } else {
        setFlash('failed', 'Deletion failed'); //set message
        redirect('admin_manage_course');
    }
endif;

if (isset($_GET['delete_campus'])) :
    $campus_ID = $_GET['delete_campus'];
    $delete = delete('campus', ['campus_ID' => $campus_ID]);
    if ($delete) {
        setFlash('success', 'Deleted Sucessfully'); //set message
        redirect('admin_manage_campus');
    } else {
        setFlash('failed', 'Deletion failed'); //set message
        redirect('admin_manage_campus');
    }
endif;

if (isset($_GET['delete_center'])) :
    $center_ID = $_GET['delete_center'];
    $delete = delete('center', ['center_ID' => $center_ID]);
    if ($delete) {
        setFlash('success', 'Deleted Sucessfully'); //set message
        redirect('admin_manage_position');
    } else {
        setFlash('failed', 'Deletion failed'); //set message
        redirect('admin_manage_position');
    }
endif;

if (isset($_GET['delete_cluster'])) :
    $cluster_ID = $_GET['delete_cluster'];
    $delete = delete('cluster', ['cluster_ID' => $cluster_ID]);
    if ($delete) {
        setFlash('success', 'Deleted Sucessfully'); //set message
        redirect('admin_manage_position');
    } else {
        setFlash('failed', 'Deletion failed'); //set message
        redirect('admin_manage_position');
    }
endif;
