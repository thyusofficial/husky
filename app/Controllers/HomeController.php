<?php
require_once '../Models/Order.php';

$action = $_GET['action'];

switch ($action) {
  case 'index':
    try {
      $orders = (new Order())->index();
      echo json_encode($orders);
    } catch (Exception $err) {
      echo $err->getMessage();
    }
    break;

  case 'show':
    try {
      $orderId = $_POST['orderId'];
      $order = (new Order())->show($orderId);

      echo json_encode($order);
    } catch (Exception $err) {
      echo $err->getMessage();
    }
    break;

  case 'store':
    try {
      $order = (new Order())->store($_POST['order']);
      echo json_encode($order);
    } catch (Exception $err) {
      echo $err->getMessage();
    }
    break;
  case 'update':
    try {
      $order = (new Order())->update($_POST['order']);
      echo json_encode($order);
    } catch (Exception $err) {
      echo $err->getMessage();
    }
    break;
  case 'delete':
    try {
      $order = (new Order())->delete($_POST['orderId']);
      echo json_encode($order);
    } catch (Exception $err) {
      echo $err->getMessage();
    }
    break;

  default:
    # code...
    break;
}
