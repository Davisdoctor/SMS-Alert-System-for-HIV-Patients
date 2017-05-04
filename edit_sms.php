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
                                <h2>Manage SMS Alerts</h2>
                            </header>
                            <div class="main-content grid_2 alpha"></div>
                            <div class="main-content grid_4 alpha">
                                <section class="clearfix">
                                    <form class="form" method="POST" id="sms_form" action="process.php?action=send_sms" >
                                        <div class="message info closeable">
                                            <h3>Information</h3>
                                            <p>
                                                Messages will be sent to all the patients who have been registered at the initiation.
                                            </p>
                                        </div>
                                        <?php
                                        require_once 'init.php';
                                        $q = mysql_query("select * from sms where Message_Id = 1");
                                        $r = mysql_fetch_array($q);
                                        ?>
                                        <div class="clearfix">
                                            <label>SMS Message<em>*</em></label>
                                            <textarea rows="6" style="white-space: normal" name="message"><?php echo $r['Message']; 
                                            ?></textarea>
                                        </div>

                                        <div class="clearfix">
                                            <label>How often <em>*</em></label>
                                            <select name="how_often" id="how_often" required="required" class="ui-select">
                                                <?php
                                                echo ($r['Send_Every'] == 60000) ? '<option value="60000">Every 10 minutes</option>' : "";
                                                echo ($r['Send_Every'] == 21600000) ? '<option value="21600000">Every 6 hours</option>' : "";
                                                echo ($r['Send_Every'] == 43200000) ? '<option value="60000">Every 12 hours</option>' : "";
                                                echo ($r['Send_Every'] == 86400000) ? '<option value="86400000">Every 24 hours</option>' : "";
                                                ?>
                                                <option value="test">Test</option>
                                                <option value="60000">Every 10 minutes</option>
                                                <option value="21600000">Every 6 hours</option>
                                                <option value="43200000">Every 12 hours</option>
                                                <option value="86400000">Every 24 hours</option>
                                            </select>
                                        </div>

                                        <div class="action clearfix">
                                            <button  id="send_button" name="send_button" class="button button-gray" type="submit"><span class="accept"></span>Save SMS Settings</button>
                                            <button class="button button-gray" type="reset">Reset</button>
                                        </div>
                                    </form>
                                    <span id="testsms"></span>
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

                $("#send_button").click(function (e) {
                    var send_every = $("#how_often").val();
                    var button = $("#second_button");
                    var sms_form = $("#sms_form");
                    if (send_every == "test")
                    {
                        $("#testsms").load('process.php?action=send_sms');
                        e.preventDefault();
                    }
                });
                
                setInterval(function () {
                    $("#testsms").load('process.php?action=send_sms')
                }, <?php echo $r['Send_Every']; ?>);

            });
        </script>

    </body>
</html>
