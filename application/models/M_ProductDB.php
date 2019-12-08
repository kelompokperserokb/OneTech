 <?php

class M_ProductDB extends CI_Model
{
    public function registProduct($name, $type, $quota, $price, $disc, $startDate, $lastDate, $desc, $image, $date)
    {
		$data = array(
			'productName' => $name,
			'productType' => $type,
			'productQuota' => $quota,
			'productPrice' => $price,
			'discount' => $disc,
			'startDateDiscount' => $startDate,
			'lastDateDiscount' =>  $lastDate,
			'description' => $desc,
			'ProductImage' => $image,
			'DatePost' =>  $date
		);
		$this->db->trans_start();
		$this->db->insert('product',$data);
		$this->db->trans_complete();
    }

    public function removeProduct($id)
	{
		$this->db->trans_start();
		$this->db->remove('product', array('id'=>$id));
		$this->db->trans_complete();
	}

	public function editProduct($name, $type, $quota, $price,  $description, $image, $id) {
		$data = array(
			'productName' => $name,
			'productType' => $type,
			'productQuota' => $quota,
			'productPrice' => $price,
			'description' => $description,
			'ProductImage' => $image,
		);
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('product', $data);
		$this->db->trans_complete();
	}

	public function giveDiscount($discount, $startDateDiscount, $lastDateDiscount, $id) {
		$data = array(
			'discount' => $discount,
			'startDateDiscount' => $startDateDiscount,
			'lastDateDiscount' =>  $lastDateDiscount
		);

    	$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('product', $data);
		$this->db->trans_complete();
	}

	public function getProduct($id){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('product_id',"$id");
		$query = $this->db->get();
		$data['data_array'] = $query->result();
		return $data;
	}

	public function getProductData($id,$type_id){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('type_product','type_product.product_id = product.product_id');
		$this->db->where('product.product_id',"$id");
		$this->db->where('type_product.type_id',"$type_id");
		$query = $this->db->get();

		$data['data_array'] = $query->result();
		return $data;
	}

	//digunakan untuk tabel
	public function getProductTypeData($id){
		$this->db->select('*');
		$this->db->from('type_product');
		$this->db->where('product_id',"$id");
		$query = $this->db->get();
		$data['count'] = $query->num_rows();
		$data['data_array'] = $query->result();
		return $data;
	}

	public function getProductByLimit($start, $limit){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by('DatePost', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		$data['limit'] = $limit;
		$data['data_array'] = $query->result();
		$data['count'] = $query->num_rows();
		return $data;
	}


	public function getProductAll(){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by('DatePost', 'DESC');
		$query = $this->db->get();

		$data['data_array'] = $query->result();
		$data['count'] = $query->num_rows();
		return $data;
	}

	public function getCategory(){
		$this->db->select('*');
		$this->db->from('category');
		$this->db->limit(6);
		$query = $this->db->get();

		$data['data_array'] = $query->result();
		$data['count'] = $query->num_rows();
		return $data;
	}

	public function getSubCategory($category){
		$this->db->select('*');
		$this->db->from('sub-category');
		$this->db->where('category_id', "$category");
		$query = $this->db->get();

		$data['data_array'] = $query->result();
		$data['count'] = $query->num_rows();
		return $data;
	}

	public function getAllSubCategory(){
		$this->db->select('*');
		$this->db->from('sub-category');
		$query = $this->db->get();

		$data['data_array'] = $query->result();
		$data['count'] = $query->num_rows();
		return $data;
	}

	public function getProductByCategory($cat_id){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by('DatePost', 'DESC');
		$this->db->where('category_id', "$cat_id");
		$query = $this->db->get();

		$data['data_array'] = $query->result();
		$data['count'] = $query->num_rows();
		return $data;
	}

	public function getProductByCategoryLimit($cat_id, $start ,$limit){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by('DatePost', 'DESC');
		$this->db->where('category_id', $cat_id);
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		$data['limit'] = $limit;
		$data['data_array'] = $query->result();
		$data['count'] = $query->num_rows();
		return $data;
	}

	public function getCategoryName($cat_id){
		$this->db->select('category_name');
		$this->db->from('category');
		$this->db->where('category_id', $cat_id);
		$query = $this->db->get();

		$data['data_array'] = $query->result();
		return $data;
	}

}

?>
