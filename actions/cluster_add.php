<?php
require_once '../config/config.php';

if (isset($_POST['propose'])) :
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        //get the value POST
        $cluster_employee_ID = $_POST['cluster_employee_ID'];
        $research_prob_obj = $_POST['research_prob_obj'];
        $current_solution = $_POST['current_solution'];
        // $proposed_solution = $_POST['proposed_solution'];
        $methodology = $_POST['methodology'];
        $title = $_POST['title'];
        $bibliography = $_POST['bibliography'];

        //Input the fields
        $fields = [
            'research_prob_obj' => $research_prob_obj,
            'current_solution' => $current_solution,
            // 'proposed_solution' => $proposed_solution,
            'methodology' => $methodology,
            'title' => $title,
            'bibliography' => $bibliography,
        ];
        // Create Validation if you want to see the choices ..go to database.php
        $validations = [
            'research_prob_obj' =>
            [
                'required' => true,
            ],
            'current_solution' =>
            [
                'required' => true,
            ],
            'methodology' =>
            [
                'required' => true,
            ],
            'title' =>
            [
                'required' => true,
            ],
            'bibliography' =>
            [
                'required' => true,
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty

            $data = [
                'research_prob_obj' => $research_prob_obj,
                'current_solution' => $current_solution,
                'methodology' => $methodology,
                'title' => $title,
                'bibliography' => $bibliography,
                'cluster_employee_ID' => $cluster_employee_ID,
            ]; //put it in array before saving

            // Upload and save the file
            $file = $_FILES['proposed_solution'];
            $filename = basename($file['name']);
            $file_tmp = $file['tmp_name'];
            $destination = $filename;
            move_uploaded_file($file_tmp, $destination);
            $data['proposed_solution'] = $destination;

            $save = save('proposal', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Proposed Successfully'); //set message
                redirect('user_myproposal_list'); //shortcut for header('location:index.php ');
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Proposal Failed'); //set message
                redirect('user_myproposal_list'); //shortcut for header('location:index.php ');
            }
        } else {
            retainValue(); //retain value even if there is errors or refresh
            redirect('user_add_proposal', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
endif;
