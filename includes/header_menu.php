<?php
session_start();
//error_reporting(0);

$user_type_session = $_SESSION['user_type'];
?>
<header>
    <div class="clearfix">
        <div class="clear"></div>

        <nav>
            <ul class="clearfix">
                <li class="active"><a href="home.php">Home</a></li>
                <?php if ($user_type_session == "Admin" || $user_type_session == "Doctor"): ?>
                    <li><a href="#" class="arrow-down">Initiation</a>
                        <ul>
                            <li><a href="new_initiation.php">New</a></li>
                            <li><a href="view_initiation.php">View</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($user_type_session == "Admin" || $user_type_session == "Lab Technician"): ?>
                    <li><a href="#" class="arrow-down">Laboratory</a>
                        <ul>
                            <li><a href="new_lab.php">New</a></li>
                            <li><a href="view_lab.php">View</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($user_type_session == "Admin" || $user_type_session == "Doctor"): ?>
                    <li><a href="#" class="arrow-down">Review</a>
                        <ul>
                            <li><a href="new_review.php">New</a></li>
                            <li><a href="view_review.php">View</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($user_type_session == "Admin" || $user_type_session == "Lab Technician"): ?>
                    <li><a href="#" class="arrow-down">Viral Load</a>
                        <ul>
                            <li><a href="new_viral_load.php">New</a></li>
                            <li><a href="view_viral_load.php">View</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($user_type_session == "Admin" || $user_type_session == "Receptionist"): ?>
                    <li><a href="#" class="arrow-down">Patients</a>
                        <ul>
                            <li><a href="view_patients.php">Registered patients</a></li>
                            <li><a href="new_patient.php">New patient</a></li>
                            <li><a href="manage_patients.php">Edit and Delete</a></li>
                            <li><a href="edit_sms.php">SMS Alert</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($user_type_session == "Admin"): ?>
                    <li><a href="#" class="arrow-down">Users</a>
                        <ul>
                            <li><a href="view_users.php">Registered Users</a></li>
                            <li><a href="new_user.php">New user</a></li>
                            <li><a href="manage_users.php">Edit and Delete</a></li>
                        </ul>
                    </li>
                <?php endif; ?> 

                <li class="fr action">
                    <a href="process.php?action=logout" class="button button-red" rel="#overlay">Logout</a>
                </li>
                <li class="fr"><a href="#" class="arrow-down" style="color: green; font-weight: bold">
                        <?php echo $_SESSION['full_names'] . " - (" . $_SESSION['user_type'] . ")"; ?>
                    </a>
                    <!--                    <ul>
                                            <li><a href="#">Profile</a></li>
                                        </ul>-->
                </li>
            </ul>
        </nav>
    </div>
</header>