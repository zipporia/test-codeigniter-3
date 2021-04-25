<?php
class Product extends CI_Model{
    function get_all_product(){
        return $this->db->query("SELECT * FROM products")->result_array();
    }

    function get_quantity(){
        return $this->db->query("SELECT SUM(quantity) quantity FROM orders")->result_array();
    }

    function add_order_item($order){
        $query = "INSERT INTO orders (product_id, quantity, created_at, updated_at) VALUES (?,?,?,?)";
        $values = array($order['id'], $order['quantity'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }

    function customer_billing($user){
        $query = "INSERT INTO customers (name, address, card, created_at, updated_at) VALUES (?,?,?,?,?)";
        $values = array($user['name'], $user['address'], $user['card'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }

    function customer_id(){
        return $this->db->query("SELECT id FROM customers")->result_array();
    }

    function get_all_order_item(){
        return $this->db->query("SELECT *, (price * quantity) AS total_price  FROM products INNER JOIN orders ON orders.product_id=products.id")->result_array();
    }

    function sum_amount(){
        return $this->db->query("SELECT SUM(price * quantity) AS grand_total FROM products INNER JOIN orders ON orders.product_id=products.id ")->result_array();
    }

    function delete_this_row($user_id){
        $this->db->query("DELETE FROM orders WHERE id=?", array($user_id));
    }
   
}