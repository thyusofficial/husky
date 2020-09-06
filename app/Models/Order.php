<?php
require_once '../../lib/Database/Connection.php';
class Order
{
  // List all orders
  public function index()
  {
    $con = Connection::getConn();

    $sql = "SELECT * FROM orders";
    $sql = $con->prepare($sql);
    $sql->execute();

    $orders = [];

    if ($sql->rowCount() > 0) {
      $orders = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    return $orders;
  }
  // List order by id
  public function show($id)
  {
    $con = Connection::getConn();

    $sql = "SELECT * FROM orders WHERE id = :id";
    $sql = $con->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();

    $order = [];

    if ($sql->rowCount() > 0) {
      $order = $sql->fetch(PDO::FETCH_ASSOC);
    }

    return $order;
  }
  // Create order
  public function store($order)
  {
    $phoneUnmask = str_replace(['(', ')', '-', ' '], '', $order['phoneInput']);
    $originCepUnmask = str_replace('-', '', $order['originCep']);
    $destinationCepUnmask = str_replace('-', '', $order['destinationCep']);
    $con = Connection::getConn();
    $sql = "INSERT INTO orders SET 
                client_name = :cname,
                phone = :phone,
                origin_cep = :originCep,
                origin_street = :originStreet,
                origin_neighborhood = :originNeighborhood,
                origin_number = :originNumber,
                origin_complement = :originComplement,
                origin_reference = :originReference,
                destination_cep = :destinationCep,
                destination_street = :destinationStreet,
                destination_neighborhood = :destinationNeighborhood,
                destination_number = :destinationNumber,
                destination_complement = :destinationComplement,
                destination_reference = :destinationReference";

    $sql = $con->prepare($sql);
    $sql->bindValue(':cname', $order['nameInput']);
    $sql->bindValue(':phone', $phoneUnmask);
    $sql->bindValue(':originCep', $originCepUnmask);
    $sql->bindValue(':originStreet', $order['originStreet']);
    $sql->bindValue(':originNeighborhood', $order['originNeighborhood']);
    $sql->bindValue(':originNumber', $order['originNumber']);
    $sql->bindValue(':originComplement', $order['originComplement']);
    $sql->bindValue(':originReference', $order['originReference']);
    $sql->bindValue(':destinationCep', $destinationCepUnmask);
    $sql->bindValue(':destinationStreet', $order['destinationStreet']);
    $sql->bindValue(':destinationNeighborhood', $order['destinationNeighborhood']);
    $sql->bindValue(':destinationNumber', $order['destinationNumber']);
    $sql->bindValue(':destinationComplement', $order['destinationComplement']);
    $sql->bindValue(':destinationReference', $order['destinationReference']);

    try {
      $sql->execute();
      return true;
    } catch (Exception $err) {
      echo $err->getMessage();
    }
    return false;
  }
  // Update order
  public function update($order)
  {
    $phoneUnmask = str_replace(['(', ')', '-', ' '], '', $order['phoneInput']);
    $originCepUnmask = str_replace('-', '', $order['originCep']);
    $destinationCepUnmask = str_replace('-', '', $order['destinationCep']);

    $con = Connection::getConn();
    $sql = "UPDATE orders SET 
                client_name = :cname,
                phone = :phone,
                origin_cep = :originCep,
                origin_street = :originStreet,
                origin_neighborhood = :originNeighborhood,
                origin_number = :originNumber,
                origin_complement = :originComplement,
                origin_reference = :originReference,
                destination_cep = :destinationCep,
                destination_street = :destinationStreet,
                destination_neighborhood = :destinationNeighborhood,
                destination_number = :destinationNumber,
                destination_complement = :destinationComplement,
                destination_reference = :destinationReference WHERE id = :id";

    $sql = $con->prepare($sql);
    $sql->bindValue(':cname', $order['nameInput']);
    $sql->bindValue(':phone', $phoneUnmask);
    $sql->bindValue(':originCep', $originCepUnmask);
    $sql->bindValue(':originStreet', $order['originStreet']);
    $sql->bindValue(':originNeighborhood', $order['originNeighborhood']);
    $sql->bindValue(':originNumber', $order['originNumber']);
    $sql->bindValue(':originComplement', $order['originComplement']);
    $sql->bindValue(':originReference', $order['originReference']);
    $sql->bindValue(':destinationCep', $destinationCepUnmask);
    $sql->bindValue(':destinationStreet', $order['destinationStreet']);
    $sql->bindValue(':destinationNeighborhood', $order['destinationNeighborhood']);
    $sql->bindValue(':destinationNumber', $order['destinationNumber']);
    $sql->bindValue(':destinationComplement', $order['destinationComplement']);
    $sql->bindValue(':destinationReference', $order['destinationReference']);
    $sql->bindValue(':id', $order['orderId']);

    try {
      $sql->execute();
      return true;
    } catch (Exception $err) {
      echo $err->getMessage();
    }
    return false;
  }

  public function delete($id)
  {
    $con = Connection::getConn();

    $sql = "DELETE FROM orders WHERE id = :id";
    $sql = $con->prepare($sql);
    $sql->bindValue(':id', $id);

    try {
      $sql->execute();
      return true;
    } catch (Exception $err) {
      echo $err->getMessage();
    }
  }
}
