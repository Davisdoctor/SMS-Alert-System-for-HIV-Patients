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
            ?>

            <section>
                <div class="container_8 clearfix">                

                    <!-- Main Section -->

                    <section class="main-section grid_8">
                        <!-- Forms Section -->
                        <div class="main-content grid_8 alpha">
                            <header>
                                <ul class="action-buttons clearfix fr">
                                    <!--<li><a class="modalInput button button-blue" rel="#simpledialog">Simple Dialog</a></li>-->
                                    <li><a class="button button-blue" rel="#">SMS Alert System for HIV Patients</a></li>
                                </ul>
                                <h2>Initiation</h2>
                            </header>
                            <div class="main-content grid_2 alpha"></div>
                            <div class="main-content grid_4 alpha">
                                <section class="clearfix">
                                    <form class="form" method="POST" action="process.php?action=new_initiation" >
                                        <div class="clearfix">
                                            <label>Patient Name <em>*</em></label>
                                            &nbsp;&nbsp;
                                            <select name="patient_id" required="required" class="ui-select">
                                                <option value=""></option>
                                                <?php
                                                include 'init.php';
                                                $query = mysql_query("select * from patients order by First_Name");
                                                while ($row = mysql_fetch_assoc($query)) {
                                                    echo "<option value='" . $row['Patient_Id'] . "'>" . $row['First_Name'] . " " . $row['Last_Name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="clearfix">
                                            <label>Prior ART <em>*</em></label>
                                            &nbsp;&nbsp;
                                            <select name="prior_art" required="required" class="ui-select">
                                                <option value=""></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="clearfix">
                                            <label>HIV enrolled <em>*</em></label>
                                            <input type="date" name="hiv_enrolled" required="required" />
                                        </div>
                                        <div class="clearfix">
                                            <label>Eligible for art <em>*</em></label>
                                            <input type="date" name="eligible_for_art" required="required" />
                                        </div>
                                        <div class="clearfix">
                                            <label>Eligible and ready<em>*</em></label>
                                            <input type="date" name="eligible_and_ready" required="required" />
                                        </div>
                                        <div class="clearfix">
                                            <label>Clinical Stage <em>*</em></label>
                                            <select name="clinical_stage" required="required" class="ui-select">
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="clearfix">
                                            <label>CD4 <em>*</em></label>
                                            <input type="text" name="cd4" required="required" />
                                        </div>
                                        <div class="clearfix">
                                            <label>Cohort <em>*</em></label>
                                            <input type="date" name="cohort" required="required" />
                                        </div>
                                        <div class="clearfix">
                                            <label>Height <em>*</em></label>
                                            <input type="text" name="height" required="required" />
                                        </div>
                                        <div class="clearfix">
                                            <label>Weight <em>*</em></label>
                                            <input type="text" name="weight" required="required" />
                                        </div>
                                        <div class="clearfix">
                                            <label>StartArt <em>*</em></label>
                                            <input type="date" name="start_art" required="required" />
                                        </div>
                                        <div class="clearfix">
                                            <label>Regimen <em>*</em></label>
                                            <input type="text" name="regimen" required="required" />
                                        </div>

                                        <div class="action clearfix">
                                            <button class="button button-gray" type="submit"><span class="accept"></span>OK</button>
                                            <button class="button button-gray" type="reset">Reset</button>
                                        </div>
                                    </form>
                                </section>

                            </div>

                        </div>
                        <!-- End Forms Section -->

                        <div class="clear"></div>



                    </section>

                    <!-- Main Section End -->

                </div>
            </section>
        </div>

        <?php include("includes/footer.php"); ?>


        <!-- simple dialog -->
        <div class="widget modal" id="simpledialog">
            <header><h2>This is a simple modal dialog</h2></header>
            <section>
                <p>
                    Are you sure you want to do this?
                </p>

                <!-- yes/no buttons -->
                <p>
                    <button class="button button-blue close">Yes</button>
                    <button class="button button-gray close">No</button>
                </p>
            </section>
        </div>
        <!-- end simple dialog -->

        <script>
            $(function () {
                /**
                 * Modal Dialog Boxes Setup
                 */

                var triggers = $(".modalInput").overlay({
                    // some mask tweaks suitable for modal dialogs
                    mask: {
                        color: '#000',
                        loadSpeed: 200,
                        opacity: 0.5
                    },
                    closeOnClick: false
                });

                /* Simple Modal Box */
                var buttons1 = $("#simpledialog button").click(function (e) {

                    // get user input
                    var yes = buttons1.index(this) === 0;

                    if (yes) {
                        // do the processing here
                    }
                });

            });
        </script>

    </body>
</html>
