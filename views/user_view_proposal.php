<?php

@include('user_header.php');

?>

<div class="home-content pb-5">
    <div class="col-11 mx-auto bg-white p-5 rounded">
        <div class="recent-acc box">
            <?php $result = find_where('proposal', ['proposal_ID' => $_GET['view_proposal']]); ?>
            <?php foreach ($result as $row) : ?>
                <div class="proposal-cont">
                    <div class="title h5 pe-2">Title: <?= $row['title'] ?></div>
                    <div class="title h6 pe-2">Research Control No.: <?= $row['research_cont_num'] ?></div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">Abstract:</div>
                                <?php if ($row['abstract'] == '') : ?>
                                    <div class="text-danger">No abstract yet.</div>
                                <?php endif; ?>
                                <div class="div" style="text-indent: 2em;">
                                    <div class="div">
                                        <?php
                                        $abstract = str_replace("\r\n", "\n", $row['abstract']); // replace windows line breaks with unix line breaks
                                        $paragraphs = explode("\n", $abstract); // split the text into paragraphs
                                        foreach ($paragraphs as $paragraph) {
                                            if (!empty(trim($paragraph))) { // check if the paragraph is not empty
                                                echo '<p style="text-indent: 2em;">' . $paragraph . '</p>'; // add the p tag and apply the indent
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">Current Solution:</div>
                                <?php if ($row['current_solution'] == '') : ?>
                                    <div class="text-danger">No current solution yet.</div>
                                <?php endif; ?>
                                <div class="div" style="text-indent: 2em;">
                                    <div class="div">
                                        <?php
                                        $current_solution = str_replace("\r\n", "\n", $row['current_solution']); // replace windows line breaks with unix line breaks
                                        $paragraphs = explode("\n", $current_solution); // split the text into paragraphs
                                        foreach ($paragraphs as $paragraph) {
                                            if (!empty(trim($paragraph))) { // check if the paragraph is not empty
                                                echo '<p style="text-indent: 2em;">' . $paragraph . '</p>'; // add the p tag and apply the indent
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">Proposed Solution:</div>
                                <?php if ($row['proposed_solution'] == '') { ?>
                                    <div class="text-danger">No proposed solution yet.</div>
                                <?php } else { ?>
                                    <embed src="<?= $row['proposed_solution'] ?>" class="border border-secondary p-1" type="application/pdf" width="1050px" height="600px"></embed>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">I. Introduction:</div>
                                <?php if ($row['introduction'] == '') : ?>
                                    <div class="text-danger">No introduction yet.</div>
                                <?php endif; ?>
                                <div class="div" style="text-indent: 2em;">
                                    <?php
                                    $introduction = str_replace("\r\n", "\n", $row['introduction']); // replace windows line breaks with unix line breaks
                                    $paragraphs = explode("\n", $introduction); // split the text into paragraphs
                                    foreach ($paragraphs as $paragraph) {
                                        if (!empty(trim($paragraph))) { // check if the paragraph is not empty
                                            echo '<p style="text-indent: 2em;">' . $paragraph . '</p>'; // add the p tag and apply the indent
                                        }
                                    }
                                    ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">II. Research Problems or Objectives:</div>
                                <?php if ($row['research_prob_obj'] == '') : ?>
                                    <div class="text-danger">No research problems or objectives yet.</div>
                                <?php endif; ?>
                                <div class="div" style="text-indent: 2em;"><?= $row['research_prob_obj'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">III. Significance:</div>
                                <?php if ($row['significance'] == '') : ?>
                                    <div class="text-danger">No significance yet.</div>
                                <?php endif; ?>
                                <div class="div" style="text-indent: 2em;"><?= $row['significance'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">IV. Review of Literature:</div>
                                <?php if ($row['review_literature'] == '') : ?>
                                    <div class="text-danger">No review of literature yet.</div>
                                <?php endif; ?>
                                <div class="div" style="text-indent: 2em;"><?= $row['review_literature'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">V. Methodology:</div>
                                <?php if ($row['methodology'] == '') : ?>
                                    <div class="text-danger">No methodology yet.</div>
                                <?php endif; ?>
                                <div class="div" style="text-indent: 2em;">
                                    <div class="div">
                                        <?php
                                        $methodology = str_replace("\r\n", "\n", $row['methodology']); // replace windows line breaks with unix line breaks
                                        $paragraphs = explode("\n", $methodology); // split the text into paragraphs
                                        foreach ($paragraphs as $paragraph) {
                                            if (!empty(trim($paragraph))) { // check if the paragraph is not empty
                                                echo '<p style="text-indent: 2em;">' . $paragraph . '</p>'; // add the p tag and apply the indent
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">VI. Milestone/Activities to be undertaken:</div>
                                <?php if ($row['milestone'] == '') { ?>
                                    <div class="text-danger">No milestone yet.</div>
                                <?php } else { ?>
                                    <embed src="<?= $row['milestone'] ?>" class="border border-secondary p-1" type="application/pdf" width="1050px" height="600px"></embed>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">VII. Detailed Line Item Budget:</div>
                                <?php if ($row['item_budget'] == '') { ?>
                                    <div class="text-danger">No milestone yet.</div>
                                <?php } else { ?>
                                    <embed src="<?= $row['item_budget'] ?>" class="border border-secondary p-1" type="application/pdf" width="1050px" height="600px"></embed>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">VIII. Expected Output/s:</div>
                                <?php if ($row['expected_output'] == '') : ?>
                                    <div class="text-danger">No expected output/s yet.</div>
                                <?php endif; ?>
                                <div class="div" style="text-indent: 2em;"><?= $row['expected_output'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">IX. Target Beneficiaries:</div>
                                <?php if ($row['target_beneficiaries'] == '') : ?>
                                    <div class="text-danger">No target beneficiaries yet.</div>
                                <?php endif; ?>
                                <div class="div" style="text-indent: 2em;"><?= $row['target_beneficiaries'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">X. Project Management:</div>
                                <?php if ($row['project_management'] == '') : ?>
                                    <div class="text-danger">No project management yet.</div>
                                <?php endif; ?>
                                <div class="div" style="text-indent: 2em;"><?= $row['project_management'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">XI. Monitoring and Evaluation:</div>
                                <?php if ($row['monitoring_evaluation'] == '') : ?>
                                    <div class="text-danger">No monitoring and evaluation yet.</div>
                                <?php endif; ?>
                                <div class="div" style="text-indent: 2em;"><?= $row['monitoring_evaluation'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">XII. Bibliography:</div>
                                <?php if ($row['bibliography'] == '') : ?>
                                    <div class="text-danger">No bibliography yet.</div>
                                <?php endif; ?>
                                <div class="div">
                                    <?php
                                    $paragraphs = explode("\n\r", $row['bibliography']);
                                    foreach ($paragraphs as $key => $paragraph) {
                                        $lines = explode("\r\n", $paragraph);
                                        foreach ($lines as $lineKey => $line) {
                                            if ($lineKey == 0) {
                                                echo $line;
                                            } else {
                                                echo '<br><span style="display: inline-block; text-indent: 2em;">' . $line . '</span>';
                                            }
                                        }
                                        if ($key < count($paragraphs) - 1) {
                                            echo '<br><br>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">XIII. Results and Recommendations:</div>
                                <?php if ($row['result_recommendation'] == '') : ?>
                                    <div class="text-danger">No results and recommendations yet.</div>
                                <?php endif; ?>
                                <div class="div">
                                    <?php
                                    $paragraphs = explode("\n\r", $row['result_recommendation']);
                                    foreach ($paragraphs as $key => $paragraph) {
                                        $lines = explode("\r\n", $paragraph);
                                        foreach ($lines as $lineKey => $line) {
                                            if ($lineKey == 0) {
                                                echo $line;
                                            } else {
                                                echo '<br><span style="display: inline-block; text-indent: 2em;">' . $line . '</span>';
                                            }
                                        }
                                        if ($key < count($paragraphs) - 1) {
                                            echo '<br><br>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <div class="h6">Attachment:</div>
                                <?php if ($row['attachment'] == '') { ?>
                                    <div class="text-danger">No uploaded attachment yet.</div>
                                <?php } else { ?>
                                    <embed src="<?= $row['attachment'] ?>" class="border border-secondary p-1" type="application/pdf" width="1050px" height="600px"></embed>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <?php $proponent = first('cluster_employee', ['cluster_employee_ID' => $row['cluster_employee_ID']]); ?>
                                <div class="h6">Prepared by:</div>
                                <?= $proponent['cluster_employee_name'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex mb-3">
                            <div>
                                <?php if (empty($row['center_employee_ID'])) { ?>
                                    <div class="h6">Concurred by:</div>
                                    <div class="text-danger">No concurrence yet.</div>
                                <?php } else { ?>
                                    <?php $proponent = first('center_employee', ['center_employee_ID' => $row['center_employee_ID']]); ?>
                                    <?= $proponent['center_employee_name'] ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php

    @include('footer.php');

    ?>