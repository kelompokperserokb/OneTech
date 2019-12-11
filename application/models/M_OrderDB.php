<?php
class M_OrderDB extends CI_Model
{
    public function getCart()
	{
	    if (isset($_SESSION["email"])) {
            $this->db->select('*');
            $this->db->from('cart');
            $this->db->join('type_product', 'type_product.type_id = cart.type_id');
            $this->db->join('product', 'type_product.product_id = product.product_id');
            $this->db->where('email', $_SESSION["email"]);
            $query = $this->db->get();

            $data['data_array'] = $query->result();
            $data['count'] = $query->num_rows();
            return $data;
        }
    }

    public function updateCart($email, $type_id, $quantity){
        $data = array(
            'quantity' => $quantity
        );

        $this->db->trans_start();
        $this->db->where('email', $email);
        $this->db->where('type_id', $type_id);
        $this->db->update('cart', $data);
        $this->db->trans_complete();
    }

    public function addCart($data){
        $this->db->trans_start();
        $this->db->insert('cart',$data);
        $this->db->trans_complete();
    }

	public function removeFromCart($type_id){
		$this->db->trans_start();
		$this->db->delete('cart', array('type_id'=>$type_id));
		$this->db->trans_complete();
	}

    /*ADMIN PRIVILEGE*/

    public function adminGetOrderList(){
		$this->db->select('*');
		$this->db->from('orderitem');
		$this->db->join('user', 'user.email = orderitem.email');
		$this->db->order_by('orderitem.dateOrder', 'DESC');
		$query = $this->db->get();

		$data = $query->result();
		return $data;
	}

	public function adminVerifyOrder($order_id, $email){
		$data = array(
			'confirmation' => 1,
		);

		$this->db->trans_start();
		$this->db->where('order_id', $order_id);
		$this->db->where('email', $email);
		$this->db->update('orderitem', $data);
		$this->db->trans_complete();
	}

	public function adminUnVerifyOrder($order_id, $email){
		$data = array(
			'confirmation' => 0,
		);

		$this->db->trans_start();
		$this->db->where('order_id', $order_id);
		$this->db->where('email', $email);
		$this->db->update('orderitem', $data);
		$this->db->trans_complete();
	}

	public function adminGetOrderItemsList($id)
	{
		$this->db->select('*');
		$this->db->from('purchaseitem');
		$this->db->join('type_product', 'type_product.type_id = purchaseitem.type_id');
		$this->db->join('product', 'product.product_id = type_product.product_id');
		$this->db->join('merk', 'merk.merk_id = product.merk_id');
		$this->db->join('category', 'category.category_id = product.category_id');
		$this->db->join('sub-category', 'sub-category.subcategory_id = product.subcategory_id');

		$query = $this->db->get();

		$data = $query->result();
		return $data;
	}

	/*END OF ADMIN PRIVILEGE*/
}

?>
