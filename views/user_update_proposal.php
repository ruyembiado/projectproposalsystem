<?php

@include('user_header.php');

?>
<?php
$proposal_ID = $_GET['update_proposal'];
$result = find_where('proposal', ['proposal_ID' => $proposal_ID]);
?>
<div class="home-content pb-5">
    <div class="col-11 mx-auto bg-white rounded">
        <div class="recent-acc box">
            <div class="propose-cont p-5 pb-3">
                <div class="content-cont">
                    <!-- <h5>Project Proposal</h5> -->
                    <div class="textarea-cont d-grid align-items-center pt-1 p-3">
                        <form action="../actions/cluster_update.php" enctype="multipart/form-data" method="post">
                            <div class="proposal-cont">
                                <?php foreach ($result as $proposal) : ?>
                                    <div class="title h5 pe-2">Title: <?= $proposal['title'] ?></div>
                                    <div class="title h6 pe-2">Research Control No.: <?= $proposal['research_cont_num'] ?></div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">
                                                <div class="h6">Abstract:</div>
                                                <textarea class="form-control" name="abstract" id="" rows="6" class="p-1"><?= $proposal['abstract'] ?></textarea>
                                                <?php if (showError('abstract')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('abstract'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">
                                                <div class="h6">Current Solution:</div>
                                                <textarea class="form-control" name="current_solution" id="" rows="6" class="p-1"><?= $proposal['current_solution'] ?></textarea>
                                                <?php if (showError('current_solution')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('current_solution'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">
                                                <div class="h6">Proposed Solution: (Please attach drawing or flowchart)</div>
                                                <div class="div">
                                                    <?php if (!empty($proposal['proposed_solution'])) : ?>
                                                        <p class="mb-0">Current file: <?php echo basename($proposal['proposed_solution']); ?></p>
                                                    <?php endif; ?>
                                                    <input name="proposed_solution" type="file" accept=".pdf" class="p-1">
                                                    <input type="hidden" name="proposed_solution1" value="<?php echo $proposal['proposed_solution']; ?>">
                                                    <?php if (showError('proposed_solution')) : ?>
                                                        <p class="error text-danger text-start"><?php echo showError('proposed_solution'); ?></p>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">
                                                <div class="h6">I. Introduction:</div>
                                                <textarea class="form-control" name="introduction" id="" rows="6" class="p-1"><?= $proposal['introduction'] ?></textarea>
                                                <?php if (showError('introduction')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('introduction'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">
                                                <div class="h6">II. Research Problems or Objectives:</div>
                                                <textarea class="form-control" name="research_prob_obj" id="" rows="6" class="p-1"><?= $proposal['research_prob_obj'] ?></textarea>
                                                <?php if (showError('research_prob_obj')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('research_prob_obj'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">

                                                <div class="h6">III. Significance:</div>
                                                <textarea class="form-control" name="significance" id="" rows="6" class="p-1" value=""><?= $proposal['significance'] ?></textarea>
                                                <?php if (showError('significance')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('significance'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">

                                                <div class="h6">IV. Review of Literature:</div>
                                                <textarea class="form-control" name="review_literature" id="" rows="6" class="p-1" value=""><?= $proposal['review_literature'] ?></textarea>
                                                <?php if (showError('review_literature')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('review_literature'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">

                                                <div class="h6">V. Methodology:</div>
                                                <textarea class="form-control" name="methodology" id="" rows="6" class="p-1" value=""><?= $proposal['methodology'] ?></textarea>
                                                <?php if (showError('methodology')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('methodology'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">
                                                <div class="h6">VI. Milestone/Activities to be undertaken:</div>
                                                <?php if (!empty($proposal['milestone'])) : ?>
                                                    <p class="mb-0">Current file: <?php echo basename($proposal['milestone']); ?></p>
                                                <?php endif; ?>
                                                <input type="file" name="milestone" accept=".pdf, .doc, .docx, .xls, .xls, .xlsx" class="p-1">
                                                <input type="hidden" name="milestone1" value="<?php echo $proposal['milestone']; ?>">
                                                <?php if (showError('milestone')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('milestone'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">
                                                <div class="h6">VII. Detailed Line Item Budget:</div>
                                                <?php if (!empty($proposal['item_budget'])) : ?>
                                                    <p class="mb-0">Current file: <?php echo basename($proposal['item_budget']); ?></p>
                                                <?php endif; ?>
                                                <input type="file" accept=".pdf, .doc, .docx, .xls, .xls, .xlsx" name="item_budget" class="p-1" value="<?= $proposal['item_budget'] ?>">
                                                <input type="hidden" name="item_budget1" value="<?php echo $proposal['item_budget']; ?>">
                                                <?php if (showError('item_budget')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('item_budget'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">

                                                <div class="h6">VIII. Expected Output/s:</div>
                                                <textarea class="form-control" name="expected_output" id="" rows="6" class="p-1" value=""><?= $proposal['expected_output'] ?></textarea>
                                                <?php if (showError('expected_output')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('expected_output'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">
                                                <div class="h6">IX. Target Beneficiaries:</div>
                                                <textarea class="form-control" name="target_beneficiaries" id="" rows="6" class="p-1"><?= $proposal['target_beneficiaries'] ?></textarea>
                                                <?php if (showError('target_beneficiaries')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('target_beneficiaries'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">
                                                <div class="h6">X. Project Management:</div>
                                                <textarea class="form-control" name="project_management" id="" rows="6" class="p-1" value=""><?= $proposal['project_management'] ?></textarea>
                                                <?php if (showError('project_management')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('project_management'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">

                                                <div class="h6">XI. Monitoring and Evaluation:</div>
                                                <textarea class="form-control" name="monitoring_evaluation" id="" rows="6" class="p-1" value=""><?= $proposal['monitoring_evaluation'] ?></textarea>
                                                <?php if (showError('monitoring_evaluation')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('monitoring_evaluation'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">
                                                <div class="h6">XII. Bibliography:</div>
                                                <textarea class="form-control" name="bibliography" id="" rows="6" class="p-1" value=""><?= $proposal['bibliography'] ?></textarea>
                                                <?php if (showError('bibliography')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('bibliography'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">
                                                <div class="h6">XIII. Results and Recommendations</div>
                                                <textarea class="form-control" name="result_recommendation" id="" rows="6" class="p-1"><?= $proposal['result_recommendation'] ?></textarea>
                                                <?php if (showError('result_recommendation')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('result_recommendation'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="d-flex mb-3">
                                            <div class="col-md-12">
                                                <div class="h6">Attachment:</div>
                                                <?php if (!empty($proposal['attachment'])) : ?>
                                                    <p class="mb-0">Current file: <?php echo basename($proposal['attachment']); ?></p>
                                                <?php endif; ?>
                                                <input name="attachment" type="file" accept=".pdf" class="p-1">
                                                <input type="hidden" name="attachment1" value="<?php echo $proposal['attachment']; ?>">
                                                <?php if (showError('attachment')) : ?>
                                                    <p class="error text-danger text-start"><?php echo showError('attachment'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="button-cont mt-2">
                                            <input type="hidden" name="proposal_ID" value="<?php echo $proposal_ID; ?>">
                                            <button class="btn btn-primary float-end p-2" type="submit" name="update_proposal">Update</button>
                                        </div>
                                    <?php endforeach; ?>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

@include('footer.php');

?>