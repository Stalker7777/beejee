<?php

$current_page = 1;
$order_name = null;
$order_email = null;
$order_status = null;

$url_params = '';

if(isset($_GET['current_page'])) {
    $url_params .= '&current_page=' . $_GET['current_page'];
    $current_page = $_GET['current_page'];
}

if(isset($_GET['order_name'])) {
    $url_params .= '&order_name=' . $_GET['order_name'];
    $order_name = $_GET['order_name'];
}

if(isset($_GET['order_email'])) {
    $url_params .= '&order_email=' . $_GET['order_email'];
    $order_email = $_GET['order_email'];
}

if(isset($_GET['order_status'])) {
    $url_params .= '&order_status=' . $_GET['order_status'];
    $order_status = $_GET['order_status'];
}

if(isset($_POST['current_page']) && !empty($_POST['current_page'])) {
    $url_params .= '&current_page=' . $_POST['current_page'];
}

if(isset($_POST['order_name']) && !empty($_POST['order_name'])) {
    $url_params .= '&order_name=' . $_POST['order_name'];
}

if(isset($_POST['order_email']) && !empty($_POST['order_email'])) {
    $url_params .= '&order_email=' . $_POST['order_email'];
}

if(isset($_POST['order_status']) && !empty($_POST['order_status'])) {
    $url_params .= '&order_status=' . $_POST['order_status'];
}