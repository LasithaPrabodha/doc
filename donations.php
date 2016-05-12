
<?php
include_once("includes/header.php");
include_once("includes/sql.php");

$conexion = db_connect();
?>
<script>
    function showDiv(elem) {
        if (elem.value == 'o') {
            //alert('ok');
            document.getElementById('toggle').style.display = "block";
        }

    }

   
</script>
<!--=========== END HEADER SECTION ================-->        
<section id="blogArchive">      
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="blog-breadcrumbs-area">
                <div class="container">
                    <div class="blog-breadcrumbs-left">
                        <h2>Donations</h2>
                    </div>
                    <div class="blog-breadcrumbs-right">
                        <ol class="breadcrumb">
                            <li>You are here</li>
                            <li><a href="#">Home</a></li>                  
                            <li class="active">Donations
                        </ol>
                    </div>
                </div>
            </div>
        </div>        
    </div>      
</section>

<!--=========== BEGAIN Why Choose Us SECTION ================-->

<section id="whychooseSection">
    <div class="container">
        <div class="row">

            <div class="box-content">

                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                        <tr>
                            <th>User name</th>
                            <th>Blood Group</th>
                            <th>Organ</th>
                            <th>Details</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM donations";
                        $result = $conexion->query($sql);

                        while ($row = $result->fetch_array()) {
                            ?>
                            <tr>
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['blood_group']; ?></td>
                                <td><?php echo $row['organ']; ?></td>
                                <td><?php echo $row['details']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><a class="btn btn-info" href="/doc/profile.php?id=<?php echo $row['user_id']; ?>" target="_blank">
                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                        View Donor
                                    </a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--=========== END Why Choose Us SECTION ================-->

<?php include_once 'includes/footer.php'; ?>
