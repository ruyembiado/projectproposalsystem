<?php
require_once '../config/config.php';

if (isset($_POST['remark_proposal'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check if the method is post
        $remark = $_POST['remark'];
        $user_ID = $_POST['user_ID'];
        $proposal_ID = $_POST['proposal_ID'];
        $user_type = $_POST['user_type'];

        $fields = [
            'remarks' => $remark,
        ];
        $validations = [
            'remarks' => [
                'required' => true,
            ],
        ];

        $errors = validate($fields, $validations); //activate the validation

        if (empty($errors)) { //check if the errors is empty
            $data = [
                'remark'       => $remark, //or $_POST['name']
                'user_ID'      => $user_ID,
                'proposal_ID'  => $proposal_ID,
                'user_type'    => $user_type,
            ]; //put it in array before saving

            $save = save('remarks', $data); // $save = save('table_name', ['colum_name'=>$username]); if there is one data to save use this

            if ($save) {
                removeValue(); //remove the retain value in inputs
                setFlash('success', 'Remarked Successfully'); //set message
                redirect('user_remark.php?remark=' . $proposal_ID);
            } else {
                retainValue(); //retain value even if there is errors or refresh
                setFlash('failed', 'Add Failed'); //set message
                redirect('user_remark'); //shortcut for header('location:index.php ');
            }
        } else {
            $errors['remark'] = $proposal_ID;
            retainValue(); //retain value even if there is errors or refresh
            redirect('user_remark', $errors); //shortcut for header('location:register.php?errors=$errors');
        }
    }
}
