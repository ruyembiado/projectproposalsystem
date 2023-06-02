<?php
require_once '../config/config.php';

if (isset($_POST['update_proposal'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Upload and save the file for proposed solution
        if ($_FILES['proposed_solution']['size'] > 0) {
            $file = $_FILES['proposed_solution'];
            $filename = basename($file['name']);
            $file_tmp = $file['tmp_name'];
            $proposeDOC = '../public/files/' . $filename;
            move_uploaded_file($file_tmp, $proposeDOC);
            $data['proposed_solution'] = $proposeDOC;
        } else {
            $proposeDOC = $_POST['proposed_solution1'];
        }

        // Upload and save the file for attachment
        if ($_FILES['attachment']['size'] > 0) {
            $file = $_FILES['attachment'];
            $filename = basename($file['name']);
            $file_tmp = $file['tmp_name'];
            $attachmentDOC = '../public/files/' . $filename;
            move_uploaded_file($file_tmp, $attachmentDOC);
            $data['attachment'] = $attachmentDOC;
        } else {
            $attachmentDOC = $_POST['attachment1'];
        }

        // Upload and save the file for item budget
        if ($_FILES['item_budget']['size'] > 0) {
            $file = $_FILES['item_budget'];
            $filename = basename($file['name']);
            $file_tmp = $file['tmp_name'];
            $item_budgetDOC = '../public/files/' . $filename;
            move_uploaded_file($file_tmp, $item_budgetDOC);
            $data['item_budget'] = $item_budgetDOC;
        } else {
            $item_budgetDOC = $_POST['item_budget1'];
        }

        // Upload and save the file for milestone
        if ($_FILES['milestone']['size'] > 0) {
            $file = $_FILES['milestone'];
            $filename = basename($file['name']);
            $file_tmp = $file['tmp_name'];
            $milestoneDOC = '../public/files/' . $filename;
            move_uploaded_file($file_tmp, $milestoneDOC);
            $data['milestone'] = $milestoneDOC;
        } else {
            $milestoneDOC = $_POST['milestone1'];
        }

        $proposal_ID = $_POST['proposal_ID'];
        $introduction = $_POST['introduction'];
        $current_solution = $_POST['current_solution'];
        $research_prob_obj = $_POST['research_prob_obj'];
        $significance = $_POST['significance'];
        $review_literature = $_POST['review_literature'];
        $methodology = $_POST['methodology'];
        $expected_output = $_POST['expected_output'];
        $target_beneficiaries = $_POST['target_beneficiaries'];
        $project_management = $_POST['project_management'];
        $monitoring_evaluation = $_POST['monitoring_evaluation'];
        $bibliography = $_POST['bibliography'];
        $abstract = $_POST['abstract'];
        $result_recommendation = $_POST['result_recommendation'];

        $data = [
            'abstract' => $abstract,
            'introduction' => $introduction,
            'current_solution' => $current_solution,
            'research_prob_obj' => $research_prob_obj,
            'significance' => $significance,
            'review_literature' => $review_literature,
            'methodology' => $methodology,
            'proposed_solution' => $proposeDOC,
            'expected_output' => $expected_output,
            'target_beneficiaries' => $target_beneficiaries,
            'project_management' => $project_management,
            'monitoring_evaluation' => $monitoring_evaluation,
            'bibliography' => $bibliography,
            'attachment' => $attachmentDOC,
            'item_budget' => $item_budgetDOC,
            'milestone' => $milestoneDOC,
            'result_recommendation' => $result_recommendation
        ];

        $update = update('proposal', ['proposal_ID' => $proposal_ID], $data);

        if ($update) {
            removeValue(); //remove the retain value in inputs
            setFlash('success', 'Updated Successfully'); //set message
            redirect('user_myproposal_list'); //shortcut for header('location:index.php ');
        } else {
            retainValue(); //retain value even if there is errors or refresh
            setFlash('failed', 'Update Failed'); //set message
            redirect('user_myproposal_list'); //shortcut for header('location:index.php ');
        }
    } else {
        retainValue(); //retain value even if there is errors or refresh
        $errors['update_proposal'] = $proposal_ID;
        redirect('user_update_proposal', $errors); //shortcut for header('location:register.php?errors=$errors');
    }
}