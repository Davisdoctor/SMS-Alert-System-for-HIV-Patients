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

                    <!-- Tables Section -->
                    <div class="main-content">
                        <header>
                            <input type="text" class="search fr" placeholder="Search..." />
                            <h2>Registered Patients</h2>
                        </header>
                        <section class="with-table">
                            <table class="datatable tablesort selectable paginate full">
                                <thead>
                                    <tr>
                                        <th>Full Names</th>
                                        <th>Sex</th>
                                        <th>Phone</th>
                                        <th>Date of Birth</th>
                                        <th>District</th>
                                        <th>Subcounty</th>
                                        <th>Care Entry Point</th>
                                        <th>Treatment Supporter</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x = 1;
                                    include 'init.php';
                                    $query = mysql_query("select * from patients order by First_Name");
                                    while ($row = mysql_fetch_assoc($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row["First_Name"] . " " . $row["Last_Name"]; ?></td>
                                            <td><?php echo $row['Sex'] ?></td>
                                            <td><?php echo $row["Phone"] ?></td>
                                            <td><?php echo streamline_date($row['Date_Of_Birth']); ?></td>
                                            <td><?php echo $row['District'] ?></td>
                                            <td><?php echo $row['Subcounty'] ?></td>
                                            <td><?php echo $row['Care_Entry_Point'] ?></td>
                                            <td><?php echo $row['Treatment_Supporter'] ?></td>
                                        </tr>
                                        <?php
                                        $x++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="container_6 clearfix">
                                <div class="grid_6">
                                    <div class="message info"><b>TIP:</b> You can press CTRL to select multiple rows</div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- End Tables Section -->
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
