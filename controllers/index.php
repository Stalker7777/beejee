<?php

require_once  ($dir_file_index . '/models/tasks.php');

$tasks = new Tasks();

$admin = false;

if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) {
    $admin = true;
}

$order_by = '';
$order_name = null;
$order_email = null;
$order_status = null;

$order_name_icon = '';
$order_email_icon = '';
$order_status_icon = '';

$url_order = '';

if(isset($_GET['order_name'])) {
    
    if(isset($_GET['order'])) {
        if ($_GET['order_name'] == null) {
            $order_name = 'ASC';
        } else if ($_GET['order_name'] == 'ASC') {
            $order_name = 'DESC';
        } else if ($_GET['order_name'] == 'DESC') {
            $order_name = 'ASC';
        }
    }
    else {
        $order_name = $_GET['order_name'];
    }
    
    if($order_name == 'ASC') {
        $order_name_icon = '(A -> Z)';
    }
    else {
        $order_name_icon = '(Z -> A)';
    }
    
    $order_by = " ORDER BY name " . $order_name;
    $url_order = "&order_name=" . $order_name;
}

if(isset($_GET['order_email'])) {
    
    if(isset($_GET['order'])) {
        if ($_GET['order_email'] == null) {
            $order_email = 'ASC';
        } else if ($_GET['order_email'] == 'ASC') {
            $order_email = 'DESC';
        } else if ($_GET['order_email'] == 'DESC') {
            $order_email = 'ASC';
        }
    }
    else {
        $order_email = $_GET['order_email'];
    }
    
    if($order_email == 'ASC') {
        $order_email_icon = '(A -> Z)';
    }
    else {
        $order_email_icon = '(Z -> A)';
    }
    
    $order_by = " ORDER BY email " . $order_email;
    $url_order = "&order_email=" . $order_email;
}

if(isset($_GET['order_status'])) {
    
    if(isset($_GET['order'])) {
        if ($_GET['order_status'] == null) {
            $order_status = 'ASC';
        } else if ($_GET['order_status'] == 'ASC') {
            $order_status = 'DESC';
        } else if ($_GET['order_status'] == 'DESC') {
            $order_status = 'ASC';
        }
    }
    else {
        $order_status = $_GET['order_status'];
    }
    
    if($order_status == 'ASC') {
        $order_status_icon = '(A -> Z)';
    }
    else {
        $order_status_icon = '(Z -> A)';
    }
    
    $order_by = " ORDER BY status " . $order_status;
    $url_order = "&order_status=" . $order_status;
}

$result = $tasks->select($order_by);

$current_page = 1;

if(isset($_GET['current_page']) && !empty($_GET['current_page'])) {
    $current_page = $_GET['current_page'];
}

$total_row = count($result['data']);

$total_page = 0;

if($total_row > 0) {
    $total_page = ceil($total_row / 3);
}

$start_row = ($current_page - 1) * 3;
$end_row = $start_row + 3;

if($end_row > $total_row) $end_row = $total_row;

$data_form = [];

for($i = $start_row; $i < $end_row; $i++) {
    $data_form[] = $result['data'][$i];
}

$start_pagination = $current_page - 4;
if($start_pagination < 1) $start_pagination = 1;
$end_pagination = $current_page + 4;
if($end_pagination > $total_page) $end_pagination = $total_page;

require_once($dir_file_index . '/views/index/index.php');