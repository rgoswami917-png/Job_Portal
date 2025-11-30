<?php

function strip_zeros_from_date($marked_string="") {
    $no_zeros = str_replace('*0', '', $marked_string);
    $cleaned_string = str_replace('*0', '', $no_zeros);
    return $cleaned_string;
}

function redirect_to($location = NULL) {
    if ($location != NULL) {
        header("Location: {$location}");
        exit;
    }
}

function redirect($location = NULL) {
    if ($location != NULL) {
        echo "<script>window.location='{$location}'</script>";
    } else {
        echo "error location";
    }
}

function output_message($message="") {
    return !empty($message) ? "<p class=\"message\">{$message}</p>" : "";
}

function date_toText($datetime="") {
    $nicetime = strtotime($datetime);
    return strftime("%B %d, %Y at %I:%M %p", $nicetime);    
}

/*  
|----------------------------------------------------------------------
|  FIXED AUTOLOAD FUNCTION (for PHP 7/8)
|----------------------------------------------------------------------
*/
spl_autoload_register(function($class_name) {
    $class_name = strtolower($class_name);
    $path = LIB_PATH . DS . "{$class_name}.php";

    if (file_exists($path)) {
        require_once($path);
    } else {
        die("The file {$class_name}.php could not be found.");
    }
});


function currentpage_public() {
    $bits = explode('/', $_SERVER['SCRIPT_NAME']);
    return $bits[2] ?? '';
}

function currentpage_admin() {
    $bits = explode('/', $_SERVER['SCRIPT_NAME']);
    return $bits[4] ?? '';
}

function curPageName() {
    return substr($_SERVER['REQUEST_URI'], 21, strrpos($_SERVER['REQUEST_URI'], '/') - 24);
}

function currentpage() {
    $bits = explode('/', $_SERVER['SCRIPT_NAME']);
    return $bits[3] ?? '';
}

function publiccurrentpage() {
    $bits = explode('/', $_SERVER['SCRIPT_NAME']);
    return $bits[2] ?? '';
}

function msgBox($msg="") {
    ?>
    <script type="text/javascript">
        alert("<?php echo $msg; ?>");
    </script>
    <?php
}

?>
