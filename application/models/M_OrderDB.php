<?php
class M_OrderDB extends CI_Model
{
	//0 Menunggu admin input logistic
	//1 Menunggu user upload bukti
	//2 Bukti terupload
	//3 Menunggu resi
	//4 Resi telah ada dan barang dikirim
    public function getCart($email)
	{
		$this->db->select('*');
		$this->db->from('cart');
		$this->db->join('type_product', 'type_product.type_id = cart.type_id');
		$this->db->join('product', 'type_product.product_id = product.product_id');
		$this->db->where('email', $email);
		$query = $this->db->get();

		$data['data_array'] = $query->result();
		$data['count'] = $query->num_rows();
		return $data;
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

	public function getOrderNotConfirmBy($email){
		if (isset($_SESSION["email"])) {
			$this->db->select('*');
			$this->db->from('orderitem');
			$this->db->where('email',$email);
			$this->db->where('confirmation',0);
			$query = $this->db->get();

			$data['data_array'] = $query->result();
			$data["count"] = $query->num_rows();
			return $data;
		}
	}

	public function getOrder($email)
	{
		$this->db->select('*');
		$this->db->from('orderitem');
		$this->db->where('email', $email);
		$this->db->order_by('dateOrder', 'DESC');
		$this->db->order_by('confirmation', 'ASC');
		$this->db->order_by('order_id', 'DESC');
		$query = $this->db->get();

		if ($query) {
			$data['data_array'] = $query->result();
			$data["count"] = $query->num_rows();
		} else {
			$data["count"] = 0;
		}
		return $data;
	}

	public function getSpecificOrder($email, $orderid)
	{
		$this->db->select('*');
		$this->db->from('orderitem');
		$this->db->where('email', $email);
		$this->db->where('order_id', $orderid);
		$query = $this->db->get();

		if ($query) {
			$data['data_array'] = $query->result();
			$data["count"] = $query->num_rows();
		} else {
			$data["count"] = 0;
		}
		return $data;
	}

	public function getOrderNotFinished($email){
		if (isset($_SESSION["email"])) {
			$this->db->select('*');
			$this->db->from('orderitem');
			$this->db->where('email',$email);
			$this->db->where('confirmation',0);
			$this->db->or_where('confirmation',1);
			$this->db->or_where('confirmation',2);
			$this->db->or_where('confirmation',3);
			$query = $this->db->get();

			if ($query) return $query->num_rows();
			else return 0;
		}
	}

	public function getOrderItem($order_id)
	{
		$this->db->select('*');
		$this->db->from('purchaseitem');
		$this->db->join('type_product','type_product.type_id = purchaseitem.type_id');
		$this->db->join('product','product.product_id = type_product.product_id');
		$this->db->where('order_id', $order_id);
		$query = $this->db->get();

		if ($query) {
			$data['data_array'] = $query->result();
			$data["count"] = $query->num_rows();
		} else {
			$data["count"] = 0;
		}
		return $data;
	}

	public function getOrderDate($order_id)
	{
		$this->db->select('dateOrder');
		$this->db->from('orderitem');
		$this->db->where('order_id', $order_id);
		$query = $this->db->get();

		$data['data_array'] = $query->result();
		$data["count"] = $query->num_rows();

		return $data;
	}

	public function changeAddress($order_id, $email, $address, $phone){
        $data = array(
            'address_order' => $address,
            'phonenumber_order' => $phone,
        );

        $this->db->trans_start();
        $this->db->where('order_id', $order_id);
        $this->db->where('email', $email);
        $this->db->update('orderitem', $data);
        $this->db->trans_complete();
    }

	public function createNewOrder($email, $dateOrder, $totalPrice, $unique_price, $address_order, $phonenumber_order){
		$data = array(
			'email' => $email,
			'dateOrder' => $dateOrder,
			'totalPrice' => $totalPrice,

			'confirmation' => 0,

			'logistic_price' => 0,
			'unique_price' => $unique_price,
			'address_order' => $address_order,
			'phonenumber_order' => $phonenumber_order,
		);

		$this->db->trans_start();
		$this->db->insert('orderitem',$data);
		$this->db->trans_complete();
	}

	public function updateBukti($email, $order_id, $image_bukti)
	{
		$data = array(
			'confirmation' => 2,
			'proofOfPayment' => $image_bukti,
		);

		$this->db->trans_start();
		$this->db->where('order_id', $order_id);
		$this->db->where('email', $email);
		$this->db->update('orderitem', $data);
		$this->db->trans_complete();
	}

	public function removeCart($email){
		$this->db->trans_start();
		$this->db->delete('cart', array('email'=>$email));
		$this->db->trans_complete();
	}

	public function addToOrder($order_id, $type_id, $quantity){
		$data = array(
			'type_id' => $type_id,
			'order_id' => $order_id,
			'quantity' => $quantity,
		);

		$this->db->trans_start();
		$this->db->insert('purchaseitem',$data);
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
			'confirmation' => 3,
		);

		$this->db->trans_start();
		$this->db->where('order_id', $order_id);
		$this->db->where('email', $email);
		$this->db->update('orderitem', $data);
		$this->db->trans_complete();
	}

	public function adminUpdateLogistic($order_id, $email , $logistic_price) {
		$data = array(
			'confirmation' => 1,
			'logistic_price' => $logistic_price,
		);

		$this->db->trans_start();
		$this->db->where('order_id', $order_id);
		$this->db->where('email', $email);
		$this->db->update('orderitem', $data);
		$this->db->trans_complete();
	}

	public function adminUpdateResi($order_id, $email , $resi, $kurir) {
		$data = array(
			'confirmation' => 4,
			'resi' => $resi,
			'kurir' => $kurir,
		);

		$this->db->trans_start();
		$this->db->where('order_id', $order_id);
		$this->db->where('email', $email);
		$this->db->update('orderitem', $data);
		$this->db->trans_complete();
	}

	public function adminEditStatus($order_id, $email, $status){
		$data = array(
			'confirmation' => $status,
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
		$this->db->where("purchaseitem.order_id",$id);

		$query = $this->db->get();

		$data = $query->result();
		return $data;
	}

	public function ordercount() {
		$this->load->database();
		$query = $this->db->query("SELECT COUNT(*) AS 'total' FROM orderitem ;");
		$data['data_array'] = $query->result();
		return $data;
	}

	public function incomecount() {
		$this->load->database();
		$query = $this->db->query("SELECT (SUM(totalPrice)+SUM(unique_price)+SUM(logistic_price)) AS 'total' FROM orderitem WHERE confirmation = 4;");
		$data['data_array'] = $query->result();
		return $data;

	}

	public function productcount() {
		$this->load->database();
		$query = $this->db->query("SELECT (SUM(quantity)) AS 'total' FROM purchaseitem;");
		$data['data_array'] = $query->result();
		return $data;
	}

	/*END OF ADMIN PRIVILEGE*/
}

?>
