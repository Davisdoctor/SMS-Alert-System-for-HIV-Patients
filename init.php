<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = 'root@1';
$dbName = 'data_dictionary';

$dbConn = mysql_connect($dbHost, $dbUser, $dbPass) or die('MySQL connect failed ' . mysql_error());
mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());

function redirect($message, $url) {
    ?>
    <script type="text/javascript">
        alert('<?php echo $message; ?>');
    </script>
    <?php
    page_route($url);
}

function page_route($url) {
    ?>
    <script type="text/javascript">
        function Redirect() {
            window.location = "<?php echo $url; ?>";
        }
        Redirect();
    </script>
    <?php
}

function streamline_date($date) {
    $create_date = date_create($date);
    $new_date = date_format($create_date, 'jS M Y');
    return $new_date;
}

function get_id_name($current_id, $id_column, $name_column, $table) {
    $row = mysql_fetch_array(mysql_query("select $id_column,$name_column from $table where $id_column='$current_id'"));
    $name = $row[1];
    return $name;
}

function custom_dropdown($table_name, $value_column, $name_column, $place_holder = "") {
    if ($place_holder != ""):
        $custom_dropdown .= "<option value=''>$place_holder</option>";
    endif;
    $query = mysql_query("select $value_column,$name_column from $table_name order by $name_column asc");
    while ($row = mysql_fetch_array($query)) {
        $custom_dropdown .= "<option value='$row[0]'>$row[1]</option>";
    }
    return $custom_dropdown;
}

function db_row_insert($table_name, $form_data) {
    $fields = array_keys($form_data);
    $sql = "INSERT INTO " . $table_name . "
    (`" . implode('`,`', $fields) . "`)
    VALUES('" . implode("','", $form_data) . "')";
    return mysql_query($sql) or die(mysql_error());
}

function db_row_delete($table_name, $where_clause = '') {
    $whereSQL = '';
    if (!empty($where_clause)) {
        if (substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE') {
            $whereSQL = " WHERE " . $where_clause;
        } else {
            $whereSQL = " " . trim($where_clause);
        }
    }
    $sql = "DELETE FROM " . $table_name . $whereSQL;
    return mysql_query($sql);
}

function db_row_update($table_name, $form_data, $where_clause = '') {
    $whereSQL = '';
    if (!empty($where_clause)) {
        if (substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE') {
            $whereSQL = " WHERE " . $where_clause;
        } else {
            $whereSQL = " " . trim($where_clause);
        }
    }
    $sql = "UPDATE " . $table_name . " SET ";

    $sets = array();
    foreach ($form_data as $column => $value) {
        $sets[] = "`" . $column . "` = '" . $value . "'";
    }
    $sql .= implode(', ', $sets);
    $sql .= $whereSQL;
    return mysql_query($sql) or die(mysql_error());
}

function get_full_name($current_id, $id_column, $name_column, $name_column2, $table) {
    $row = mysql_query("select $id_column,$name_column,$name_column2 from $table where $id_column='$current_id'");
    $row = mysql_fetch_array($row);
    $name = $row[1] . "  " . $row[2];
    return $name;
}

function SendSMS($host, $port, $username, $password, $phoneNoRecip, $msgText) {

    $fp = fsockopen($host, $port, $errno, $errstr);
    if (!$fp) {
        echo "errno: $errno \n";
        echo "errstr: $errstr\n";
        return $result;
    }

    fwrite($fp, "GET /?Phone=" . rawurlencode($phoneNoRecip) . "&Text=" .
            rawurlencode($msgText) . " HTTP/1.0\n");
    if ($username != "") {
        $auth = $username . ":" . $password;
        $auth = base64_encode($auth);
        fwrite($fp, "Authorization: Basic " . $auth . "\n");
    }
    fwrite($fp, "\n");

    $res = "";
    while (!feof($fp)) {
        $res .= fread($fp, 1);
    }
    fclose($fp);


    return $res;
}
