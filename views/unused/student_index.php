<?php

@include('student_header.php');

?>

<div class="home-content">
    <div class="overview-boxes">
        <div class="box">

            <?php
            if (isset($_SESSION['isLogin'])) :
            ?>


                <!--   BOX 1 sa total student    --->
                <div class="right-side">
                    <div class="box-topic">Total Students</div>
                    <div class="number">40,876</div>

                    <div class="indicator">
                        <div class="button">
                            <a href="student.html">See All</a>
                        </div>
                    </div>

                </div>
                <img src="image/n3.png" width="25px" alt="">
        </div>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <!--   BOX 2 sa total employees    --->

        <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Employees</div>
                <div class="number">38,876</div>

                <div class="indicator">
                    <div class="button">
                        <a href="employee.html">See All</a>
                    </div>
                </div>

            </div>
            <img src="image/n3.png" width="25px" alt="">
        </div>

    </div>

    <div class="acc-boxes">
        <div class="recent-acc box">
            <div class="title">Recent account</div>
            <div class="acc-details">
                <ul class="details">
                    <li class="topic">Date</li>
                    <li><a href="#">13 / 03 / 2022</a></li>

                </ul>
                <ul class="details">
                    <li class="topic">Name</li>
                    <li><a href="#">SIR FRITZ</a></li>

                </ul>
                <ul class="details">
                    <li class="topic">Department</li>
                    <li><a href="#">ARTS AND SCIENCES</a></li>

                </ul>
                <ul class="details">
                    <li class="topic">Course</li>
                    <li><a href="#">BSIT</a></li>

                </ul>
            </div>
            <div class="button">
                <a href="recent.html">See All</a>
            </div>

        </div>
    </div>
</div>

<?php endif; ?>

<?php

@include('footer.php');

?>