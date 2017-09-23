<!doctype html>
<!--[if IE 7]>
<html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js ie8" lang="en"> <![endif]-->
<!--[if IE 9]>
<html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html ng-app="app" lang="en"> <!--<![endif]-->
<head>
    <base href="{system.domain}{system.project}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta http-equiv="content-language" content="vi"/>
    <meta name="author" content=""/>
    <!--[if lte IE 8]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <![endif]-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Cornerstone - Management System</title>

    <link href="favicon.png" rel="icon" type="image/gif"/>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/ui-grid.min.css">
    <link rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Cornerstone's Management System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <!--<ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>-->
            <form action="{system.module}/" method="get" class="navbar-form navbar-right">
                <input name="keyword" type="text" class="form-control" placeholder="Search...">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-2 col-md-1 sidebar">
            <h4>Student</h4>
            <ul class="nav nav-sidebar">
                <li class="{actionActive.student-view} {actionActive.student-detail}"><a href="{module.student}">List</a></li>
                <li class="{actionActive.student-create}"><a href="{module.student}/{student_action.create}">New student</a></li>
                <li class="{actionActive.student-no-school}"><a href="{module.student}/{student_action.no-school}">No school</a></li>
            </ul>
            <h4>School</h4>
            <ul class="nav nav-sidebar">
                <li class="{actionActive.school-view} {actionActive.school-detail}"><a href="{module.school}">List</a></li>
            </ul>
            <!--<h4>Price Mapping</h4>
            <ul class="nav nav-sidebar">
                <li class="{sub_menu_active.mapping} {sub_menu_active.mapping_edit}"><a href="/mapping">Import</a></li>
            </ul>-->
        </div>

        <div class="col-sm-10 col-sm-offset-2 col-md-11 col-md-offset-1 main">
            <div class="alert alert-danger hidden">
                <h4>Oops!</h4>
                <p class="pop-msg"></p>
            </div>

            <div class="alert alert-info hidden">
                <h4>Information!</h4>
                <p class="pop-msg"></p>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                        </div>
                        <div class="modal-body">Are you sure?</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger btn-confirmed">Yes</button>
                        </div>
                    </div>
                </div>
            </div>

            {include:tpl=body}

        </div>

    </div>
</div>

<div id="loading">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
</div>

<noscript>
    For full functionality of this site it is necessary to enable JavaScript.
    Here are the <a href="http://www.enable-javascript.com/" target="_blank">instructions how to enable JavaScript in your web browser</a>.
</noscript>

<script type="text/javascript" src="js/jquery.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-touch.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-animate.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/fileinput.js"></script>
<script type="text/javascript" src="js/themes/fa/theme.js"></script>
<script type="text/javascript" src="js/ui-grid.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/functions.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#loading').fadeOut(100);
    });
</script>

</body>
</html>