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
                                <h2>New system user</h2>
                            </header>
                            <div class="main-content grid_2 alpha"></div>
                            <div class="main-content grid_4 alpha">
                                <section class="clearfix">
                                    <form class="form" method="POST" action="process.php?action=new_user" >
                                        <div class="clearfix">
                                            <label>Full Names <em>*</em></label>
                                            <input type="text" name="full_names" required="required" />
                                        </div>
                                        <div class="clearfix">
                                            <label>Sex <em>*</em></label>
                                            <select name="sex" required="required" class="ui-select">
                                                <option value=""></option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                        <div class="clearfix">
                                            <label>Phone <em>*</em></label>
                                            <input type="text" name="phone" required="required" />
                                        </div>

                                        <div class="clearfix">
                                            <label>Email<em>*</em></label>
                                            <input type="text" name="email" required="required" />
                                        </div>
                                        <div class="clearfix">
                                            <label>User Type <em>*</em></label>
                                            <select name="user_type" required="required" class="ui-select">
                                                <option value=""></option>
                                                <option value="Doctor">Doctor</option>
                                                <option value="Lab Technician">Lab Technician</option>
                                                <option value="Receptionist">Receptionist</option>
                                                <option value="Admin">Administrator</option>
                                            </select>
                                        </div>
                                        <div class="clearfix">
                                            <label>Username<em>*</em></label>
                                            <input type="text" name="username" required="required" />
                                        </div>
                                        <div class="clearfix">
                                            <label>Password<em>*</em></label>
                                            <input type="password" name="password" required="required" />
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
