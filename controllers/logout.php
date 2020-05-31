<?php
/**
 * Created by PhpStorm.
 * User: STALKER
 * Date: 08.10.2018
 * Time: 13:39
 */

unset($_SESSION['user']);
unset($_SESSION['isAdmin']);

Header('Location: index.php');
