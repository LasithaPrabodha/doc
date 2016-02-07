<!DOCTYPE html>
<html lang="en">
    <head>
        <!--
            ===
            This comment should NOT be removed.
    
            Charisma v2.0.0
    
            Copyright 2012-2014 Muhammad Usman
            Licensed under the Apache License v2.0
            http://www.apache.org/licenses/LICENSE-2.0
    
            http://usman.it
            http://twitter.com/halalit_usman
            ===
        -->
        <meta charset="utf-8">
        <title>Free HTML5 Bootstrap Admin Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
        <meta name="author" content="Muhammad Usman">

        <!-- The styles -->
        <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

        <link href="css/charisma-app.css" rel="stylesheet">
        <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
        <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
        <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
        <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
        <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
        <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
        <link href='css/jquery.noty.css' rel='stylesheet'>
        <link href='css/noty_theme_default.css' rel='stylesheet'>
        <link href='css/elfinder.min.css' rel='stylesheet'>
        <link href='css/elfinder.theme.css' rel='stylesheet'>
        <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
        <link href='css/uploadify.css' rel='stylesheet'>
        <link href='css/animate.min.css' rel='stylesheet'>

        <!-- jQuery -->
        <script src="bower_components/jquery/jquery.min.js"></script>

        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- The fav icon -->
        <link rel="shortcut icon" href="img/favicon.ico">

    </head>

    <body>


        <?php include 'topBar.php'; ?>
        <div class="ch-container">
            <div class="row">

                <?php include 'leftMenu.php'; ?>

                <noscript>
                <div class="alert alert-block col-md-12">
                    <h4 class="alert-heading">Warning!</h4>

                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                        enabled to use this site.</p>
                </div>
                </noscript>

                <div id="content" class="col-lg-10 col-sm-10">
                    <!-- content starts -->
                    <div>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                    <div class=" row">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
                                <i class="glyphicon glyphicon-user blue"></i>

                                <div>Total Users</div>
                                <div>507</div>
                                <span class="notification">6</span>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <a data-toggle="tooltip" title="4 new pro members." class="well top-block" href="#">
                                <i class="glyphicon glyphicon-user red"></i>

                                <div>Doctors</div>
                                <div>28</div>
                                <span class="notification green">4</span>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <a data-toggle="tooltip" title="$34 new sales." class="well top-block" href="#">
                                <i class="glyphicon glyphicon-user yellow"></i>

                                <div>General Physicians</div>
                                <div>20</div>
                                <span class="notification yellow">34</span>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <a data-toggle="tooltip" title="12 new messages." class="well top-block" href="#">
                                <i class="glyphicon glyphicon-user green"></i>

                                <div>Users/Patients</div>
                                <div>25</div>
                                <span class="notification red">12</span>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="box col-md-12">

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                 aria-hidden="true">

                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h3>Settings</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Here settings can be configured...</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                 aria-hidden="true">

                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h3>Settings</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Here settings can be configured...</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <!-- topbar starts -->

                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-user"></i> Total Users</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">

                                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Date registered</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>David R</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Chris Jack</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jack Chris</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#" >
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Muhammad Usman</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sheikh Heera</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Helen Garner</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Saruar Ahmed</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ahemd Saruar</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Habib Rizwan</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Rizwan Habib</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Amrin Sana</td>
                                                <td class="center">2012/08/23</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sana Amrin</td>
                                                <td class="center">2012/08/23</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ifrah Jannat</td>
                                                <td class="center">2012/06/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jannat Ifrah</td>
                                                <td class="center">2012/06/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Robert</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Dave Robert</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Brown Robert</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Usman Muhammad</td>
                                                <td class="center">2012/01/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Abdullah</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Dow John</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>John R</td>
                                                <td class="center">2012/02/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Paul Wilson</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Wilson Paul</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Heera Sheikh</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sheikh Heera</td>
                                                <td class="center">2012/01/21</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-success label label-default">Active</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Christopher</td>
                                                <td class="center">2012/08/23</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Andro Christopher</td>
                                                <td class="center">2012/08/23</td>
                                                <td class="center">Staff</td>
                                                <td class="center">
                                                    <span class="label-default label label-danger">Banned</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jhon Doe</td>
                                                <td class="center">2012/06/01</td>
                                                <td class="center">Admin</td>
                                                <td class="center">
                                                    <span class="label-default label">Inactive</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lorem Ipsum</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Abraham</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Brown Blue</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Worth Name</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Member</td>
                                                <td class="center">
                                                    <span class="label-warning label label-default">Pending</span>
                                                </td>
                                                <td class="center">
                                                    <a class="btn btn-success" href="#">
                                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                    </div><!--/row--><!--/.fluid-container-->


                    <!-- external javascript -->

                    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

                    <!-- library for cookie management -->
                    <script src="js/jquery.cookie.js"></script>
                    <!-- calender plugin -->
                    <script src='bower_components/moment/min/moment.min.js'></script>
                    <script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
                    <!-- data table plugin -->
                    <script src='js/jquery.dataTables.min.js'></script>

                    <!-- select or dropdown enhancer -->
                    <script src="bower_components/chosen/chosen.jquery.min.js"></script>
                    <!-- plugin for gallery image view -->
                    <script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
                    <!-- notification plugin -->
                    <script src="js/jquery.noty.js"></script>
                    <!-- library for making tables responsive -->
                    <script src="bower_components/responsive-tables/responsive-tables.js"></script>
                    <!-- tour plugin -->
                    <script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
                    <!-- star rating plugin -->
                    <script src="js/jquery.raty.min.js"></script>
                    <!-- for iOS style toggle switch -->
                    <script src="js/jquery.iphone.toggle.js"></script>
                    <!-- autogrowing textarea plugin -->
                    <script src="js/jquery.autogrow-textarea.js"></script>
                    <!-- multiple file upload plugin -->
                    <script src="js/jquery.uploadify-3.1.min.js"></script>
                    <!-- history.js for cross-browser state change on ajax -->
                    <script src="js/jquery.history.js"></script>
                    <!-- application script for Charisma demo -->
                    <script src="js/charisma.js"></script>


                    </body>
                    </html>
