<?php
/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */


require_once "vendor/autoload.php";
$controller = new \Daft\Controller\IndexController();

// CONTROLLER
$controller->indexAction();