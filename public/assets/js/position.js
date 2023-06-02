$(document).ready(function () {
    $('#center_ID').on('change', function () {

        var center_ID = $(this).val()
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cluster_ID").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "http://localhost/sirfritz/actions/fetch_data.php?process=cluster&center_ID=" + center_ID, true);
            xhttp.send();
    });
});