<?php

session_start();
$action = isset($_GET['action']) ? $_GET['action'] : '';
require_once 'init.php';

switch ($action) {

    case 'new_initiation' :
        new_initiation();
        break;

    case "new_lab":
        new_lab();
        break;

    case "new_review":
        new_review();
        break;

    case "new_viral_load":
        new_viral_load();
        break;

    case "new_patient":
        new_patient();
        break;

    case "new_user":
        new_user();
        break;

    case "login":
        login();
        break;

    case "send_sms":
        send_sms();
        break;

    case "logout":
        logout();
        break;

    default :
        header('Location: home.php');
}

function new_initiation() {

    $expected = array("prior_art", "hiv_enrolled", "eligible_for_art", "eligible_and_ready", "clinical_stage", "cd4", "cohort", "height", "weight", "start_art", "regimen", "patient_id");

    foreach ($expected as $key) {
        if (!empty($_POST[$key])) {
            ${$key} = $_POST[$key];
        } else {
            ${$key} = NULL;
        }
    }

    $formdata = array(
        "Prior_ART" => $prior_art,
        "Hiv_Enrolled" => $hiv_enrolled,
        "Eligible_For_ART" => $eligible_for_art,
        "Eligible_And_Ready" => $eligible_and_ready,
        "Clinical_Stage" => $clinical_stage,
        "CD4" => $cd4,
        "Cohort" => $cohort,
        "height" => $height,
        "Weight" => $weight,
        "Start_ART" => $start_art,
        "Regimen" => $regimen,
        "Patient_Id" => $patient_id
    );

    $query = db_row_insert("initiation", $formdata);
    if ($query):
        redirect("Successful", "view_initiation.php");
    else:
        echo "There was an error";
    endif;
}

function new_lab() {
    $expected = array(
        "patient_id", "lab_where", "result", "test_type"
    );

    foreach ($expected as $key) {
        if (empty($_POST[$key])):
            ${$key} = NULL;
        else:
            ${$key} = $_POST[$key];
        endif;
    }

    $form_data = array(
        "Patient_Id" => $patient_id,
        "Test_Type" => $test_type,
        "Where" => $lab_where,
        "Result" => $result
    );

    $query = db_row_insert("laboratory", $form_data);

    if ($query):
        redirect("Successful", "view_lab.php");
    else:
        echo "There was an error";
    endif;
}

function new_review() {
    $expected = array("patient_id", "date_scheduled", "next_view_date", "weight", "function_at_status", "who_clinical_stage", "ceptrine", "adherence", "regimen", "dosage", "vl", "cd4", "doctor_initials");
    foreach ($expected as $key) {
        if (empty($_POST[$key])):
            ${$key} = NULL;
        else:
            ${$key} = $_POST[$key];
        endif;
    }
    $form_data = array(
        "Patient_Id" => $patient_id,
        "Date_Scheduled" => $date_scheduled,
        "Next_View_Date" => $next_view_date,
        "Weight" => $weight,
        "Function_At_Status" => $function_at_status,
        "Who_Clinical_Stage" => $who_clinical_stage,
        "Ceptrine" => $ceptrine,
        "Adherence" => $adherence,
        "Regimen" => $regimen,
        "Dosage" => $dosage,
        "VL" => $vl,
        "CD4" => $cd4,
        "Doctor_Initials" => $doctor_initials
    );
    $query = db_row_insert("review", $form_data);

    if ($query):
        redirect("Successful", "view_review.php");
    else:
        echo "There was an error";
    endif;
}

function new_viral_load() {
    $expected = array("vl_numbers", "date_sample_drawn", "date_sample_returned", "patient_id");
    foreach ($expected as $key) {
        if (empty($_POST[$key])):
            ${$key} = NULL;
        else:
            ${$key} = $_POST[$key];
        endif;
    }
    $form_data = array(
        "VL_Numbers" => $vl_numbers,
        "Date_Sample_Drawn" => $date_sample_drawn,
        "Date_Sample_Returned" => $date_sample_returned,
        "Patient_Id" => $patient_id
    );
    $query = db_row_insert("viral_load", $form_data);

    if ($query):
        redirect("Successful", "view_viral_load.php");
    else:
        echo "There was an error";
    endif;
}

function new_patient() {
    $expected = array("first_name", "last_name", "sex", "phone", "date_of_birth", "district", "subcounty", "parish", "village", "care_entry_point", "treatment_supporter");
    foreach ($expected as $key) {
        if (empty($_POST[$key])):
            ${$key} = NULL;
        else:
            ${$key} = $_POST[$key];
        endif;
    }
    $form_data = array(
        "First_Name" => $first_name,
        "Last_Name" => $last_name,
        "Sex" => $sex,
        "Phone" => $phone,
        "Date_Of_Birth" => $date_of_birth,
        "District" => $district,
        "Subcounty" => $subcounty,
        "Parish" => $parish,
        "Village" => $village,
        "Care_Entry_Point" => $care_entry_point,
        "Treatment_Supporter" => $treatment_supporter
    );
    $query = db_row_insert("patients", $form_data);
    if ($query):
        redirect("Successful", "view_patients.php");
    else:
        echo "There was an error";
    endif;
}

function new_user() {
    $expected = array("full_names", "sex", "phone", "email", "username", "password", "user_type");
    foreach ($expected as $key) {
        if (empty($_POST[$key])):
            ${$key} = NULL;
        else:
            ${$key} = $_POST[$key];
        endif;
    }
    $form_data = array(
        "Full_Names" => $full_names,
        "Sex" => $sex,
        "Phone" => $phone,
        "Email" => $email,
        "Username" => $username,
        "Password" => md5($password),
        "User_Type" => $user_type
    );
    $query = db_row_insert("users", $form_data);
    if ($query):
        redirect("Successful", "view_users.php");
    else:
        echo "There was an error";
    endif;
}

function login() {

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysql_query("select * from users where Username='$username' AND Password = '$password' limit 1");

    $num_row = mysql_num_rows($query);

    if ($num_row > 0):
        $row = mysql_fetch_assoc($query);
        $_SESSION['username'] = $row['Username'];
        $_SESSION['full_names'] = $row['Full_Names'];
        $_SESSION['user_type'] = $row['User_Type'];
        $_SESSION['user_id'] = $row['User_Id'];

        redirect($row['User_Type'] . " login", "home.php");
        exit();
    else:
        redirect("Check username and password", "index.php");
        exit();
    endif;
}

function logout() {
    session_destroy();
    redirect("You have been logged out", "index.php");
}

function send_sms() {

    if (isset($_POST['send_button'])):
        $message = $phone_number = str_replace("  ", " ", $_POST['message']);
        $how_often = $_POST['how_often'];

        $form_data = array(
            "Message" => $message,
            "Send_Every" => $how_often
        );

        $update = db_row_update("sms", $form_data, "Message_Id=1");
        page_route("edit_sms.php");
        exit();
    endif;

    $query = mysql_query("select i.Patient_Id, p.Phone from patients p, initiation i where i.Patient_Id = p.Patient_Id");
    $number_array = array();
    while ($row = mysql_fetch_array($query)) {
        $number_array[] = $row[1];
    }

    $message = get_id_name(1, "Message_Id", "Message", "sms");
    foreach ($number_array as $value) {

        $phone_number = str_replace(")", "", $value);
        $phone_number = str_replace("(", "", $phone_number);
        $phone_number = str_replace("-", "", $phone_number);
        $phone_number = str_replace(" ", "", $phone_number);

        SendSMS('127.0.0.1', 8800, 'Davis', '1234', $phone_number, $message);
    }

    echo "Messages have been sent to all patients";
}
