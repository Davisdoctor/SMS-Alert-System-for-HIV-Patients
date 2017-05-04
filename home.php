<!DOCTYPE html>
<html lang="en">
    <head>

        <title>SMS Alert System for HIV Patients</title>

        <link rel="stylesheet" media="screen" href="css/reset.css" />
        <link rel="stylesheet" media="screen" href="css/grid.css" />
        <link rel="stylesheet" media="screen" href="css/style.css" />
        <link rel="stylesheet" media="screen" href="css/messages.css" />
        <link rel="stylesheet" media="screen" href="css/forms.css" />
        <link rel="stylesheet" media="screen" href="css/tables.css" />

        <!--[if lt IE 8]>
        <link rel="stylesheet" media="screen" href="css/ie.css" />
        <![endif]-->

        <!--[if lt IE 9]>
        <script type="text/javascript" src="js/html5.js"></script>
        <script type="text/javascript" src="js/PIE.js"></script>
        <script type="text/javascript" src="js/IE9.js"></script>
        <script type="text/javascript" src="js/excanvas.js"></script>
        <![endif]-->

        <!-- jquerytools -->
        <script type="text/javascript" src="js/jquery.tools.min.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/jquery.ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.tables.js"></script>
        <script type="text/javascript" src="js/jquery.flot.js"></script>

        <script type="text/javascript" src="js/global.js"></script>

        <!-- THIS SHOULD COME LAST -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="js/ie.js"></script>
        <![endif]-->

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
        <div id="wrapper">
            <?php
            include("includes/header_menu.php");
            require_once 'init.php';

            function countTableData($table_name) {
                $query = mysql_query("select * from $table_name");
                return mysql_num_rows($query);
            }
            ?>

            <section>
                <div class="container_8 clearfix">                

                    <!-- Main Section -->

                    <section class="main-section grid_8">

                        <!-- Statistics Section -->
                        <div class="main-content">
                            <header>
                                <ul class="action-buttons clearfix fr">
                                    <li><a href="#" class="button button-gray no-text"><span class="wrench"></span></a></li>
                                    <li><a href="documentation/index.html" class="button button-gray no-text help" rel="#overlay"><span class="help"></span></a></li>
                                </ul>
                                <h2>
                                    SMS Alert System for HIV Patients
                                </h2>
                            </header>
                            <section class="container_6 clearfix">
                                <div class="grid_6 clearfix">
                                    <header class="clearfix">
                                        <ul class="fr action-buttons">
                                            <li><a href="#" class="current button button-gray no-text" title="Data dictionary information"><span class="calendar-view-day"></span></a></li>
<!--                                            <li><a href="#" class="button button-gray no-text" title="This Week's Stats"><span class="calendar-view-week"></span></a></li>
                                            <li><a href="#" class="button button-gray no-text" title="This Month's Stats"><span class="calendar-view-month"></span></a></li>-->
                                        </ul>
                                        <h3>Information</h3>
                                    </header>
                                    <section>
                                        <div class="grid_1 alpha">
                                            <div class="widget black ac">
                                                <header><h2>Patients</h2></header>
                                                <section><h1>
                                                        <?php echo countTableData("patients"); ?>
                                                    </h1></section>
                                            </div>
                                        </div>
                                        <div class="grid_1">
                                            <div class="widget black ac">
                                                <header><h2>Reviews</h2></header>
                                                <section><h1> <?php echo countTableData("review"); ?></h1></section>
                                            </div>
                                        </div>
                                        <div class="grid_1">
                                            <div class="widget black ac">
                                                <header><h2>Laboratory</h2></header>
                                                <section><h1><?php echo countTableData("laboratory"); ?></h1></section>
                                            </div>
                                        </div>
                                        <div class="grid_1 omega">
                                            <div class="widget black ac">
                                                <header><h2>Initiation</h2></header>
                                                <section><h1><?php echo countTableData("initiation"); ?></h1></section>
                                            </div>
                                        </div>
                                        <!--                                        <div class="grid_1 alpha">
                                                                                    <div class="widget black ac">
                                                                                        <header><h2>Tickets</h2></header>
                                                                                        <section><h1>20</h1></section>
                                                                                    </div>
                                                                                </div>-->
                                        <div class="grid_1">
                                            <div class="widget black ac">
                                                <header><h2>Viral load</h2></header>
                                                <section><h1><?php echo countTableData("viral_load"); ?></h1></section>
                                            </div>
                                        </div>
                                        <div class="grid_1">
                                            <div class="widget black ac">
                                                <header><h2>Users</h2></header>
                                                <section><h1><?php echo countTableData("users"); ?></h1></section>
                                            </div>
                                        </div>
                                        <!--                                        <div class="grid_1 omega">
                                                                                    <div class="widget black ac">
                                                                                        <header><h2>Errors</h2></header>
                                                                                        <section><h1>20</h1></section>
                                                                                    </div>
                                                                                </div>-->
                                    </section>
                                </div>

                            </section>
                        </div>
                        <!-- End Statistics Section -->

                        <!-- Analytics Section -->
                        <div class="main-content">
                            <header>
                                <ul class="action-buttons clearfix fr">
                                    <li><a href="#" class="button button-gray no-text chevron fr"><span class="wrench"></span></a></li>
                                </ul>
                                <h2>
                                    Quick shortcuts
                                </h2>
                            </header>
                            <section class="container_6 clearfix">
                                <div class="grid_4">
                                    <div class="shortcuts">
                                        <ul class="clearfix">
                                            <li><a href="view_patients.php" title="View patients"><img src="images/woofunction-icons/address_book_32.png" /><span>Patients</span><em><?php echo countTableData("patients"); ?></em></a></li>
                                            <li><a href="view_review.php" title="Reviews"><img src="images/woofunction-icons/newspaper_32.png" /><span>Reviews</span><em><?php echo countTableData("review"); ?></em></a></li>
                                            <li><a href="view_lab.php" title="Laboratory"><img src="images/woofunction-icons/activity_monitor.png" /><span>Laboratory</span></a><em><?php echo countTableData("laboratory"); ?></em></li>
                                            <li><a href="view_users.php" title="Add/Edit Users"><img src="images/woofunction-icons/user_32.png" /><span>Users</span><em><?php echo countTableData("users"); ?></em></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </section>
                        </div>
                        <!-- End Analytics Section -->

                    </section>

                    <!-- Main Section End -->

                </div>
            </section>
        </div>

        <?php
        include("includes/footer.php");
        ?>

    </body>
</html>
