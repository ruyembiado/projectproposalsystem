</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../public/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="../public/assets/js/datatables.js"></script>
<script src="../public/assets/js/datatables.min.js"></script>
<script src="../public/assets/js/sweetalert2.min.js"></script>
<script src="../public/assets/js/main.js"></script>

<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else
            sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
</script>


<?php if ($flash = getFlash('success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            // iconColor: 'green',
            title: "<?php echo $flash; ?>",
            confirmButtonColor: '#007bff',
            showConfirmButton: true,
        });
    </script>
<?php endif; ?>

<?php if ($flash = getFlash('failed')) : ?>
    <script>
        Swal.fire({
            icon: 'warning',
            iconColor: 'red',
            title: "<?php echo $flash; ?>",
            confirmButtonColor: '#007bff',
            showConfirmButton: true,
        });
    </script>
<?php endif; ?>

<script>
    $(document).ready(function() {
        var activeLink = localStorage.getItem("activeLink");
        if (activeLink) {
            $("#" + activeLink).addClass("active");
        }
    });
    $(document).ready(function() {
        $(".Links").on("click", function(e) {
            e.preventDefault();
            const href = $(this).attr("href");
            var activeLink = $(this).attr("id");
            localStorage.setItem("activeLink", activeLink);
            document.location.href = href;
        });
    });
    $(document).ready(function() {
        $("#example2").DataTable();
    });
    $(document).ready(function() {
        $("#example3").DataTable();
    });
</script>

<script src="../public/assets/js/position.js"></script>

<!-- <script>
    var counter = 1; // Counter to track row numbers dynamically

    function addRow() {
        var table = document.getElementById("myTable");
        var rowCount = table.rows.length;

        if (rowCount === 6) {
            // Maximum row count reached, disable "Add Row" button
            document.getElementById("addRowBtn").disabled = true;
            return; // exit function
        }

        var newRow = table.insertRow(rowCount);
        var rowId = "row" + counter;
        newRow.id = rowId;

        if (counter === 5) {

            var addRowBtn = document.getElementById("addRowBtn"); // Get the button element by its ID
            if (addRowBtn) {
                addRowBtn.remove(); // Remove the button element from the DOM
            }
            // Create "Total" row for the 5th row
            newRow.innerHTML = '<td colspan="6">Total</td><td><textarea type="text" cols="14" rows="0" class="total-cell"></textarea></td>';
            
            return; // exit function

        } else {
            // Create first cell with dynamic value
            var firstCell = newRow.insertCell(0);
            firstCell.innerHTML = 'Milestone ' + counter + '<br>' + '(' + getOrdinal(counter) + ' Quarter)';

            // Create input cells for each column
            for (var i = 1; i < table.rows[0].cells.length; i++) {
                var cell = newRow.insertCell(i);
                cell.innerHTML = '<textarea type="text" cols="14" rows="0" class="' + rowId + 'cell' + i + '">';
            }
        }
        counter++;
    }

    // Prevent form submission
    document.getElementById("myForm").addEventListener("submit", function(event) {
        event.preventDefault();
        // additional logic or validation can be added here
    });

    function getOrdinal(n) {
        var suffix = "";
        if (n === 1 || n === 21 || n === 31) {
            suffix = "st";
        } else if (n === 2 || n === 22) {
            suffix = "nd";
        } else if (n === 3 || n === 23) {
            suffix = "rd";
        } else {
            suffix = "th";
        }
        return n + suffix;
    }
</script> -->


</body>

</html>