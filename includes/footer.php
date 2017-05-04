<footer>
    <div id="footer-inner" class="container_8 clearfix">
        <div class="grid_8">
            <span class="fr"><a href="#">SMS Alert System for HIV Patients</a></span>Data Dictionary  | Final Year Project &copy; 2016. All rights reserved. 
        </div>
    </div>
</footer>
<?php
//require_once 'init.php';
if (empty($_SESSION['full_names']) || empty($_SESSION['user_id'])):
    page_route("index.php");
endif;
?>