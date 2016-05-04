
<?php
include_once("includes/header.php");
include_once("includes/sql.php");
?>

<!--=========== END HEADER SECTION ================-->        
<section id="blogArchive">      
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="blog-breadcrumbs-area">
                <div class="container">
                    <div class="blog-breadcrumbs-left">
                        <h2>Doctors</h2>
                    </div>
                    <div class="blog-breadcrumbs-right">
                        <ol class="breadcrumb">
                            <li>You are here</li>
                            <li><a href="#">Home</a></li>                  
                            <li class="active">Messages</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>        
    </div>      
</section>
<!--=========== BEGIN find doctors SECTION ================-->
<section id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="service-area">
                    <form class="form-horizontal" id="send_message" name="send_message" method="post" action="">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Messages</legend>

                            <?php
                            if (isset($_POST['send'])) {

                                if ($_POST['to'] == -1) {
                                    echo "<div class='alert alert-danger'>Please select a Message Reciever</div>";
                                } else {

                                    $conexion = db_connect();

                                    $sql = "INSERT INTO messages(`sender_id`, `reciever_id`, `title`, `message`, `sent_at`) VALUES(" . $_SESSION['user_id'] . "," . $_POST['searchlist'] . ",'" . $_POST['title'] . "','" . $_POST['message'] . "','" . date("Y-m-d H:i:s") . "')";
                                    if ($result = $conexion->query($sql)) {
                                        echo "<div class='alert alert-success'>Message Sent Successfully!</div>";
                                    };
                                }
                            }
                            ?>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="to">To</label>
                                <div class="col-md-5">
                                    <input id="to" name="to" placeholder="To" class="form-control input-md" type="text"><button id="search" name="search" class="btn btn-primary">Search</button>
                                    <?PHP
                                    if (!isset($_POST['to'])) {
                                        $_POST['to'] = '';
                                    }
                                    $sql = "SELECT CONCAT(user.first_name, ' ', user.last_name) AS name, user_id, user_type FROM user WHERE (user_type='G' OR user_type='P') AND is_active=1 AND concat(user.first_name ,' ',user.last_name) LIKE '%" . $_POST['to'] . "%'";
                                    $rs = $conexion->query($sql);
                                    $rows = $rs->fetch_all();
                                    ?>
                                    <div class="clearfix"></div>
                                    <SELECT NAME="searchlist" MULTIPLE SIZE=5>
                                        <?PHP
                                        foreach ($rows as $row) {
                                            ?>
                                            <option value="<?PHP echo $row[1]; ?> "<?PHP if(isset($_POST['reply']) && $_POST['reply']==$row[1]) echo "selected='selected'";?>> <?PHP
                                                echo $row[0];
                                                if ($row[2] == 'P')
                                                    echo "(Patient)";
                                                else
                                                    echo "(Medical Consultant)";
                                                ?>
                                                <?PHP
                                            }
                                            ?>
                                    </SELECT>

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="title">Message Title</label>
                                <div class="col-md-5">
                                    <input id="title" name="title" placeholder="title" class="form-control input-md" type="text">

                                </div>
                            </div>

                            <!-- Text area-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="message">Message Content</label>
                                <div class="col-md-5">
                                    <textarea id="message" name="message" rows="7" placeholder="Message" class="form-control input-md" type="text"></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="send"></label>
                                <div class="col-md-4">
                                    <button id="send" name="send" class="btn btn-primary">Send Message</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="col-md-8 col-md-offset-2" style="margin-top: 10px;">
                    <div class="bhoechie-tab-menu" style="margin: 10px">
                        <ul class="nav nav-tabs profile-nav">
                            <li role="presentation" class="active" ><a href="">Inbox</a></li>
                            <li role="presentation"><a href="">Outbox</a></li>

                        </ul>
                    </div>
                    <div class="col-md-12 bhoechie-tab-content" style="padding: 10px; background-color: #f9f9f9;">
                        <form method="post" action="" >
                            <?PHP
                            $sql = "SELECT messages.*,CONCAT(user.first_name, ' ', user.last_name) AS name FROM messages,user WHERE reciever_id=" . $_SESSION['user_id'] . " AND user.user_id=sender_id ORDER BY sent_at DESC";
                            $rs = $conexion->query($sql);
                            $rows = $rs->fetch_all();

                            foreach ($rows as $row) {
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo "From : " . $row[6] . " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  Title : " . $row[3] ?> <p class="pull-right"><?php echo $row[5] ?></p></h3></h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php echo $row[4] ?> <p class="pull-right"><button id="reply" name="reply" value="<?PHP echo $row[1]; ?>" class="btn btn-primary">Reply</button></p>
                                    </div>
                                </div>
                            <?PHP } ?>
                        </form>
                    </div>
                    <div class="col-md-12 bhoechie-tab-content hide" style="padding: 10px; background-color: #f9f9f9;">
                        <form method="post" action="" >
                            <?PHP
                            $sql = "SELECT messages.*,CONCAT(user.first_name, ' ', user.last_name) AS name FROM messages,user WHERE sender_id=" . $_SESSION['user_id'] . " AND user.user_id=reciever_id ORDER BY sent_at DESC";
                            $rs = $conexion->query($sql);
                            $rows = $rs->fetch_all();

                            foreach ($rows as $row) {
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo "To : " . $row[6] . " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  Title : " . $row[3] ?><p class="pull-right"><?php echo $row[5] ?></p></h3>

                                    </div>
                                    <div class="panel-body">
                                        <?php echo $row[4]; ?> <p class="pull-right"><button id="reply" value="<?PHP echo $row[1]; ?>" name="reply" class="btn btn-primary">Reply</button></p>
                                    </div>
                                </div>
                            <?PHP } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php include 'includes/footer.php'; ?>
<script>
    $(document).ready(function () {
        $("div.bhoechie-tab-menu>ul>li").click(function (e) {
            e.preventDefault();
            $(this).siblings('li.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab-content").addClass("hide");
            $("div.bhoechie-tab-content").eq(index).removeClass("hide");
        });
    });
</script>
