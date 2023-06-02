<?php
require_once '../config/config.php';

// delete proposal
if (isset($_GET['delete_proposal'])) :
    $proposal_ID = $_GET['delete_proposal'];
    $delete = delete('proposal', ['proposal_ID' => $proposal_ID]);
    if ($delete) {
        setFlash('success', 'Deleted Sucessfully'); //set message
        redirect('user_myproposal_list');
    } else {
        setFlash('failed', 'Deletion failed'); //set message
        redirect('user_myproposal_list');
    }
endif;