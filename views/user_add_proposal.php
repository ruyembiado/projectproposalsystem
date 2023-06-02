<?php

@include('user_header.php');

?>

<div class="home-content pb-5">
    <div class="col-11 mx-auto bg-white rounded">
        <div class="recent-acc box">

            <div class="propose-cont p-5 pb-3">
                <div class="content-cont">
                    <h5>Concept Paper</h5>
                    <div class="textarea-cont d-grid align-items-center pt-1 p-3">
                        <form action="../actions/cluster_add.php" method="post" enctype="multipart/form-data">
                            <h6>1. Problem</h6>
                            <textarea class="form-control" name="research_prob_obj" id="" rows="6" class="p-1"><?php echo getValue('research_prob_obj'); ?></textarea>
                            <?php if (showError('research_prob_obj')) : ?>
                                <p class="error text-danger text-start"><?php echo showError('research_prob_obj'); ?></p>
                            <?php endif; ?>

                            <h6>2. Current solutions to the identified problem/prior art (at least three)</h6>
                            <textarea class="form-control" name="current_solution" id="" rows="6" class="p-1"><?php echo getValue('current_solution'); ?></textarea>
                            <?php if (showError('current_solution')) : ?>
                                <p class="error text-danger text-start"><?php echo showError('current_solution'); ?></p>
                            <?php endif; ?>

                            <h6>3. Propose solution (process or product)<br>(Please attach drawing or flowchart)</h6>
                            <input name="proposed_solution" type="file" accept=".pdf" class="p-1"><?php echo getValue('proposed_solution'); ?></input>
                            <?php if (showError('proposed_solution')) : ?>
                                <p class="error text-danger text-start"><?php echo showError('proposed_solution'); ?></p>
                            <?php endif; ?>

                            <h6>4. Methodology (if possible)</h6>
                            <textarea class="form-control" name="methodology" id="" rows="6" class="p-1"><?php echo getValue('methodology'); ?></textarea>
                            <?php if (showError('methodology')) : ?>
                                <p class="error text-danger text-start"><?php echo showError('methodology'); ?></p>
                            <?php endif; ?>

                            <h6>5. Title</h6>
                            <textarea class="form-control" name="title" id="" rows="6" class="p-1"><?php echo getValue('title'); ?></textarea>
                            <?php if (showError('title')) : ?>
                                <p class="error text-danger text-start"><?php echo showError('title'); ?></p>
                            <?php endif; ?>

                            <h6>6. Bibliography</h6>
                            <textarea class="form-control" name="bibliography" id="" rows="6" class="p-1" ><?php echo getValue('bibliography'); ?></textarea>
                            <?php if (showError('bibliography')) : ?>
                                <p class="error text-danger text-start"><?php echo showError('bibliography'); ?></p>
                            <?php endif; ?>

                            <div class="button-cont mt-2">
                                <input type="hidden" name="cluster_employee_ID" value="<?= $_SESSION['cluster_employee_ID'] ?>">
                                <button class="btn btn-primary float-end p-2" type="submit" name="propose">Propose</button>
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