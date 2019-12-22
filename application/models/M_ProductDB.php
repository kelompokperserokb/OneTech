<?php
class M_ProductDB extends CI_Model
{
	/*ADMIN PRIVILEGE*/

    public function adminAddNewMerk($name){
		$data = array(
			'merk_name' => $name,
		);
		$this->db->trans_start();
		$this->db->insert('merk',$data);
		$this->db->trans_complete();

		$this->db->select('merk_id');
		$this->db->from('merk');
		$this->db->where('merk_name', $name);
		$query = $this->db->get();

		$data= $query->result();
		return $data;
	}

	public function adminGetMerk(){
		$this->db->select('*');
		$this->db->from('merk');
		$query = $this->db->get();

		$data= $query->result();
		return $data;
	}

	public function adminUpdateMerk($name, $id){
		$data = array(
			'merk_name' => $name,
		);
		$this->db->trans_start();
		$this->db->where('merk_id', $id);
		$this->db->update('merk', $data);
		$this->db->trans_complete();
	}

	public function adminDeleteMerk($id){
		$this->db->trans_start();
		$this->db->delete('merk', array('merk_id'=>$id));
		$this->db->trans_complete();
	}

	public function adminAddNewCategory($name){
		$data = array(
			'category_name' => $name,
		);
		$this->db->trans_start();
		$this->db->insert('category',$data);
		$this->db->trans_complete();

		$this->db->select('category_id');
		$this->db->from('category');
		$this->db->where('category_name', $name);
		$query = $this->db->get();

		$data= $query->result();
		return $data;
	}

	public function adminGetCategory(){
		$this->db->select('*');
		$this->db->from('category');
		$query = $this->db->get();

		$data= $query->result();
		return $data;
	}

	public function adminUpdateCategory($name, $id){
		$data = array(
			'category_name' => $name,
		);
		$this->db->trans_start();
		$this->db->where('category_id', $id);
		$this->db->update('category', $data);
		$this->db->trans_complete();
	}

	public function adminDeleteCategory($id){
		$this->db->trans_start();
		$this->db->delete('category', array('category_id'=>$id));
		$this->db->trans_complete();
	}

	public function adminAddNewSubCategory($categoryid, $subcategoryname){
        $data = array(
            'category_id' => $categoryid,
            'subcategory_name' => $subcategoryname,
        );
        $this->db->trans_start();
        $this->db->insert('sub-category',$data);
        $this->db->trans_complete();

        $this->db->select('subcategory_id');
        $this->db->from('sub-category');
        $this->db->where('subcategory_name', $subcategoryname);
        $this->db->where('category_id', $categoryid);
        $query = $this->db->get();

        $data= $query->result();
        return $data;

	}

	public function adminGetSubCategory(){
		$this->db->select('*');
		$this->db->from('sub-category');
		$this->db->join('category','category.category_id=sub-category.category_id');
		$query = $this->db->get();

		$data= $query->result();
		return $data;
	}

	public function adminGetDependentSubCategory($id){
		$this->db->select('*');
		$this->db->from('sub-category');
		$this->db->where("category_id",$id);
		$query = $this->db->get();

		$data= $query->result();
		return $data;
	}

	public function adminUpdateSubCategory($categoryid, $subcategoryid, $subcategoryname){
        $data = array(
            'category_id' => $categoryid,
            'subcategory_name' => $subcategoryname,
        );
        $this->db->trans_start();
        $this->db->where('subcategory_id', $subcategoryid);
        $this->db->update('sub-category', $data);
        $this->db->trans_complete();
	}

	public function adminDeleteSubCategory($categoryId, $subcategoryId){
		$this->db->trans_start();
		$this->db->delete('sub-category', array('category_id'=>$categoryId, 'subcategory_id'=>$subcategoryId));
		$this->db->trans_complete();
	}

	public function adminAddNewProduct($merk_id, $category_id, $subcategory_id, $product_name, $product_code, $product_price, $product_desc, $image_product1, $image_product2, $image_product3, $discount, $startDateDiscount, $lastDateDiscount, $datePost)
	{
		$data = array(
			'merk_id' => $merk_id,
			'category_id' => $category_id,
			'subcategory_id' => $subcategory_id,
			'product_name' => $product_name,
			'product_code' => $product_code,
			'product_price' => $product_price,
			'product_desc' => $product_desc,
			'product_img_1' => $image_product1,
			'product_img_2' => $image_product2,
			'product_img_3' => $image_product3,
			'discount' => $discount,
			'startDateDiscount' => $startDateDiscount,
			'lastDateDiscount' => $startDateDiscount,
			'datePost' => $datePost,
		);
		$this->db->trans_start();
		$this->db->insert('product',$data);
		$this->db->trans_complete();

		$this->db->select('product_id');
		$this->db->from('product');
		$this->db->where('product_name', $product_name);
		$this->db->where('merk_id', $merk_id);
		$this->db->where('category_id', $category_id);
		$this->db->where('subcategory_id', $subcategory_id);
		$query = $this->db->get();

		$datas= $query->result();
		return $datas;
	}

	public function adminGetProduct(){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('sub-category','sub-category.subcategory_id = product.subcategory_id');
		$this->db->join('category','category.category_id = sub-category.category_id');
		$this->db->join('merk','merk.merk_id = product.merk_id');

		$query = $this->db->get();

		$data= $query->result();
		return $data;
	}

	public function adminUpdateProduct($merk_id, $category_id, $subcategory_id, $product_id, $product_name, $product_code, $product_price, $product_desc, $image_product1, $image_product2, $image_product3, $datePost){
		$data = array(
			'merk_id' => $merk_id,
			'category_id' => $category_id,
			'subcategory_id' => $subcategory_id,
			'product_name' => $product_name,
			'product_code' => $product_code,
			'product_price' => $product_price,
			'product_desc' => $product_desc,
			'product_img_1' => $image_product1,
			'product_img_2' => $image_product2,
			'product_img_3' => $image_product3,
			'datePost' => $datePost,
		);
		$this->db->trans_start();
		$this->db->where('product_id', $product_id);
		$this->db->update('product', $data);
		$this->db->trans_complete();
	}

	public function adminDeleteProduct($product_id){
		$this->db->trans_start();
		$this->db->delete('product', array('product_id'=>$product_id));
		$this->db->trans_complete();
	}

	public function adminGetProductDiscount(){
		$this->db->select('*');
		$this->db->from('product');

		$query = $this->db->get();

		$data= $query->result();
		return $data;
	}

	public function adminUpdateProductDiscount($product_id, $discount, $startDateDiscount, $lastDateDiscount){
		$data = array(
			'discount' => $discount,
			'startDateDiscount' => $startDateDiscount,
			'lastDateDiscount' => $lastDateDiscount,
		);
		$this->db->trans_start();
		$this->db->where('product_id', $product_id);
		$this->db->update('product', $data);
		$this->db->trans_complete();
	}

	public function adminDeleteProductDiscount($product_id){
		$data = array(
			'discount' => 0,
			'startDateDiscount' => "0000-00-00",
			'lastDateDiscount' => "0000-00-00",
		);
		$this->db->trans_start();
		$this->db->where('product_id', $product_id);
		$this->db->update('product', $data);
		$this->db->trans_complete();
	}

	public function adminGetMerkAndCategory(){
		$data["merk"] = $this->adminGetMerk();
		$data["category"] = $this->adminGetCategory();
		return $data;
	}

	public function adminAddNewTypeProduct($product_id, $type_name, $quota, $description){
		$data = array(
			'product_id' => $product_id,
			'product_type' => $type_name,
			'quota' => $quota,
			'description_type' => $description,
		);

		$this->db->trans_start();
		$this->db->insert('type_product',$data);
		$this->db->trans_complete();

		$this->db->select('type_id');
		$this->db->from('type_product');
		$this->db->where('product_type', $type_name);
		$this->db->where('product_id', $product_id);
		$query = $this->db->get();

		$data= $query->result();
		return $data;

	}

	public function adminGetTypeProduct(){
		$this->db->select('*');
		$this->db->from('type_product');
		$this->db->join('product', 'product.product_id = type_product.product_id');
		$query = $this->db->get();

		$data= $query->result();
		return $data;
	}

	public function adminUpdateTypeProduct($product_id, $type_id, $type_name, $quota, $description){
		$data = array(
			'product_id' => $product_id,
			'product_type' => $type_name,
			'quota' => $quota,
			'description_type' => $description,
		);
		$this->db->trans_start();
		$this->db->where('type_id', $type_id);
		$this->db->update('type_product', $data);
		$this->db->trans_complete();
	}

	public function adminDeleteTypeProduct($product_id, $type_id){
		$this->db->trans_start();
		$this->db->delete('type_product', array('product_id'=>$product_id, 'type_id'=>$type_id));
		$this->db->trans_complete();
	}

	/*END OF ADMIN PRIVILEGE*/

	public function updateQuantity($type_id, $quantity){

		$quota = ((int)($this->getQuotaProduct($type_id))[0]->quota) - (int) $quantity;

		$data = array(
			'quota' => $quota,
		);
		$this->db->trans_start();
		$this->db->where('type_id', $type_id);
		$this->db->update('type_product', $data);
		$this->db->trans_complete();
	}

	private function getQuotaProduct($type_id){
		$this->db->select('*');
		$this->db->from('type_product');
		$this->db->where("type_id", $type_id);
		$query = $this->db->get();

		$data= $query->result();
		return $data;
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

	public function getProductBySearch($q){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by('datePost', 'DESC');
		$this->db->like('product_name', "$q");
		$query = $this->db->get();

		$data['count'] = $query->num_rows();
		return $data;
	}

	public function getProductBySearchLimit($q, $start ,$limit){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by('datePost', 'DESC');
		$this->db->like('product_name', $q);
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

	public function getProductBySubCategory($subcat_id){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by('DatePost', 'DESC');
		$this->db->where('subcategory_id', "$subcat_id");
		$query = $this->db->get();

		$data['data_array'] = $query->result();
		$data['count'] = $query->num_rows();
		return $data;
	}

	public function getProductBySubCategoryLimit($subcat_id, $start ,$limit){
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by('DatePost', 'DESC');
		$this->db->where('subcategory_id', $subcat_id);
		$this->db->limit($limit, $start);
		$query = $this->db->get();

		$data['limit'] = $limit;
		$data['data_array'] = $query->result();
		$data['count'] = $query->num_rows();
		return $data;
	}

	public function getSubCategoryName($subcat_id){
		$this->db->select('subcategory_name');
		$this->db->from('sub-category');
		$this->db->where('subcategory_id', $subcat_id);
		$query = $this->db->get();

		$data['data_array'] = $query->result();
		return $data;
	}
	
	public function addProduct(){


	}
}
?>
