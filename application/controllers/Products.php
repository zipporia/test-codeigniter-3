<?php

class Products extends CI_Controller{

    public function index(){
        $this->load->model('Product');
        $data = array(
            'product' => $this->Product->get_all_product(),
            'quantity' => $this->Product->get_quantity()
        );
        $this->load->view('products/index', $data);
    }   

    public function orders(){
        $this->load->model('Product');
        $product_detail = array(
            'id' => $this->security->xss_clean($this->input->post('id')),
            'quantity' => $this->security->xss_clean($this->input->post('quantity'))
        );
        $data = $this->Product->add_order_item($product_detail);

        redirect('/');
    }

    public function cart(){
        $this->load->model('Product');
        $data = array(
            'order_item' => $this->Product->get_all_order_item(),
            'sum_amount' => $this->Product->sum_amount(),
            'customer_id' => $this->Product->customer_id()
        );
        $this->load->view('products/cart', $data);
    }

    public function billing(){
        $this->load->model('Product');
        $customer_detail = array(
            'name' => $this->security->xss_clean($this->input->post('name')),
            'address' => $this->security->xss_clean($this->input->post('address')),
            'card' => $this->security->xss_clean($this->input->post('card'))
        );
        $data = $this->Product->customer_billing($customer_detail);
        redirect('/');
    }

    public function destroy($id){
        $this->load->model('Product');
        $this->Product->delete_this_row($id);
        redirect('/products/cart');
    }

}