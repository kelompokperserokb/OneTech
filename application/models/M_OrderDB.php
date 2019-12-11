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

    /*ADMIN PRIVILEGE*/

    public function adminGetOrderList(){
		$this->db->select('*');
		$this->db->from('purchaseitem');
		$this->db->join('order', 'order.order_id = purchaseitem.order_id');
		$this->db->join('user', 'user.email = order.email');
		$this->db->order_by('order.dateOrder', 'DESC');
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
		$this->db->update('order', $data);
		$this->db->trans_complete();
	}

	public function adminUnVerifyOrder($order_id, $email){
		$data = array(
			'confirmation' => 0,
		);

		$this->db->trans_start();
		$this->db->where('order_id', $order_id);
		$this->db->where('email', $email);
		$this->db->update('order', $data);
		$this->db->trans_complete();
	}

	/*END OF ADMIN PRIVILEGE*/
}

?>
