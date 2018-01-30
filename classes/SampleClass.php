<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../libs/CrudOperation.php");
include_once ($filepath."/../helpers/Format.php");

/**
* Sample Class for photo uploading, insert data, update data and others.
*/
class SampleClass
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new CrudOperation();
		$this->fm = new Format();
	}

	function showPath(){
		return realpath(dirname(__FILE__));
	}
	function dbcon(){
		return $this->db->link;
	}
	// //Product Add by Category and Brand.
	// public function insertProduct($data, $file){
	// 	//validation of product data
	// 	$productName = $this->fm->validation($data['pname']);
	// 	$productName = mysqli_real_escape_string($this->db->link, $productName);

	// 	$pcategory = $this->fm->validation($data['pcategory']);
	// 	$pcategory = mysqli_real_escape_string($this->db->link, $pcategory);

	// 	$pbrand = $this->fm->validation($data['pbrand']);
	// 	$pbrand = mysqli_real_escape_string($this->db->link, $pbrand);

	// 	$pdescription = $data['pdescription'];
	// 	$pdescription = mysqli_real_escape_string($this->db->link, $pdescription);

	// 	$p_price = $this->fm->validation($data['p_price']);
	// 	$p_price = mysqli_real_escape_string($this->db->link, $p_price);

	// 	$ptype = $this->fm->validation($data['ptype']);
	//     $ptype = mysqli_real_escape_string($this->db->link, $ptype);

	// 	//take image information using super global variable $_FILES[];
	// 	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	// 	$file_name = $file['image']['name'];
	// 	$file_size = $file['image']['size'];
	// 	$file_temp = $file['image']['tmp_name'];

		
	// 	if (empty($productName) or empty($pcategory) or empty($pbrand) or empty($pdescription) or empty($p_price) or empty($ptype) or empty($file_name))
	// 	{
	// 		$msg = "<span class='error'>Fields must not be empty !.</span>";
	// 		return $msg;
	// 	}else{
	// 		//validate uploaded images
	// 		$div = explode('.', $file_name);
	// 		$file_ext = strtolower(end($div));
	// 		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	// 		$uploaded_image = "uploads/products/".$unique_image;
			
	// 		if ($file_size >1048567) {
	// 			$msg = "<span class='error'>Product not found !.</span>";
	// 			return $msg;
	// 		} elseif (in_array($file_ext, $permited) === false) {
	// 			echo "<span class='error'>You can upload only:-"
	// 			.implode(', ', $permited)."</span>";
	// 		}else{
	// 			move_uploaded_file($file_temp, $uploaded_image);
				
	// 			$query = "INSERT INTO tbl_product(productName,catId,brandId,body,price,image,type) 
	// 			VALUES('$productName','$pcategory','$pbrand','$pdescription','$p_price','$uploaded_image','$ptype')";

	// 			$inserted = $this->db->insert($query);
	// 			if ($inserted) {
	// 				$msg = "<span class='success'>Product inserted successfully.</span>";
	// 				return $msg;
	// 			}else{
	// 				$msg = "<span class='error'>Failed to insert.</span>";
	// 				return $msg;
	// 			}
	// 	 	}

	// 	}

	// }
	// //get All product list
	// public function getAllProduct(){
	// 	//query for get all data from tbl_product combinning with tbl_category(catName) and tbl_brand(brandName) using INNER JOIN
	// 	$sql = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
	// 			FROM tbl_product
	// 			INNER JOIN tbl_category
	// 			ON tbl_product.catId = tbl_category.catId
	// 			INNER JOIN tbl_brand
	// 			ON tbl_product.brandId = tbl_brand.brandId
	// 			ORDER BY tbl_product.pid DESC ";
	// 	//Same Query using Alias(giving a temporary name to a table or Column)
	// 	/*$sql = "SELECT p.*, c.catName, b.brandName
	// 			FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b
	// 			WHERE p.catId = c.catId AND p.brandId = b.brandId
	// 			ORDER BY p.pid DESC ";*/
	// 	$result = $this->db->select($sql);
	// 	if ($result) {
	// 		return $result;
	// 	}else{
	// 		$msg = "<span class='error'>Product not found !.</span>";
	// 		return $msg;
	// 	}
	// }
	// //get Product by ID
	// public function getProdById($id){
	// 	$pid = $this->fm->validation($id);
	// 	$pid = mysqli_real_escape_string($this->db->link, $pid);
	// 	$sql = "SELECT * FROM tbl_product WHERE pid = '$pid' ";
	// 	$result = $this->db->select($sql);
	// 	return $result;
	// }
	// //delete product by product id
	// public function deleteProduct($id){
	// 	$getImgSql =  "SELECT * FROM tbl_product WHERE pid='$id'";
	// 	$getimg = $this->db->select($getImgSql);
	// 	if ($getimg) {
	// 		while ($rows = $getimg->fetch_assoc()) {
	// 			$delimg = $rows['image'];
	// 			unlink($delimg);
	// 		}
	// 	}
	// 	//query for delete all info from product table	
	// 	$sql = "DELETE FROM tbl_product WHERE pid='$id'";
	// 	$result = $this->db->delete($sql);
	// 	if ($result) {
	// 		$msg = "<span class='success'>Product Successfully Deleted !.</span>";
	// 		return $msg;
	// 	}else{
	// 		$msg = "<span class='error'>Failed to Delete.</span>";
	// 		return $msg;
	// 	}
	// }
	// //update product by product id
	// public function updateProduct($data, $file, $id){
	// 	$productName = $this->fm->validation($data['pname']);
	// 	$productName = mysqli_real_escape_string($this->db->link, $productName);

	// 	$pcategory = $this->fm->validation($data['pcategory']);
	// 	$pcategory = mysqli_real_escape_string($this->db->link, $pcategory);

	// 	$pbrand = $this->fm->validation($data['pbrand']);
	// 	$pbrand = mysqli_real_escape_string($this->db->link, $pbrand);

	// 	$pdescription = $data['pdescription'];
	// 	$pdescription = mysqli_real_escape_string($this->db->link, $pdescription);

	// 	$p_price = $this->fm->validation($data['p_price']);
	// 	$p_price = mysqli_real_escape_string($this->db->link, $p_price);

	// 	$ptype = $this->fm->validation($data['ptype']);
	//     $ptype = mysqli_real_escape_string($this->db->link, $ptype);

	// 	//take image information using super global variable $_FILES[];
	// 	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	// 	$file_name = $file['image']['name'];
	// 	$file_size = $file['image']['size'];
	// 	$file_temp = $file['image']['tmp_name'];

		
	// 	if (empty($productName) or empty($pcategory) or empty($pbrand) or empty($pdescription) or empty($p_price) or empty($ptype) )
	// 	{
	// 		$msg = "<span class='error'>Fields must not be empty !.</span>";
	// 		return $msg;
	// 	}else{

	// 		if (!empty($file_name)) {
	// 			//validate uploaded images
	// 			$div = explode('.', $file_name);
	// 			$file_ext = strtolower(end($div));
	// 			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	// 			$uploaded_image = "uploads/products/".$unique_image;
				
	// 			if ($file_size >1048567) {
	// 				$msg = "<span class='error'>Product not found !.</span>";
	// 				return $msg;
	// 			} elseif (in_array($file_ext, $permited) === false) {
	// 				echo "<span class='error'>You can upload only:-"
	// 				.implode(', ', $permited)."</span>";
	// 			}else{
	// 				move_uploaded_file($file_temp, $uploaded_image);
	// 				$query = "UPDATE tbl_product
	// 						  SET 
	// 						  productName     = '$productName',
	// 						  catId 		  = '$pcategory',
	// 						  brandId         = '$pbrand',
	// 						  body            = '$pdescription',
	// 						  price           = '$p_price',
	// 						  image           = '$uploaded_image',
	// 						  type            = '$ptype'
	// 						  WHERE pid       = '$id' ";

	// 				$updated = $this->db->update($query);
	// 				if ($updated) {
	// 					$msg = "<span class='success'>Product updated successfully.</span>";
	// 					return $msg;
	// 				}else{
	// 					$msg = "<span class='error'>Failed to updated.</span>";
	// 					return $msg;
	// 				}
	// 		 	}
	// 		}else{

	// 			$query = "UPDATE tbl_product
	// 						  SET
	// 						  productName     = '$productName',
	// 						  catId 		  = '$pcategory',
	// 						  brandId         = '$pbrand',
	// 						  body            = '$pdescription',
	// 						  price           = '$p_price',
	// 						  type            = '$ptype'
	// 						  WHERE pid       = '$id' ";

	// 				$updated = $this->db->update($query);
	// 				if ($updated) {
	// 					$msg = "<span class='success'>Product updated successfully.</span>";
	// 					return $msg;
	// 				}else{
	// 					$msg = "<span class='error'>Failed to updated.</span>";
	// 					return $msg;
	// 				}

	// 		}
			
	// 	}

	// }

	// //get All Featured Product from product table
	// public function getFeaturedProduct(){
	// 	$sql = "SELECT * FROM tbl_product WHERE type = '1' ORDER BY pid DESC LIMIT 4";
	// 	$result = $this->db->select($sql);
	// 	return $result;
	// }
	// //get all new product
	// public function getNewProduct(){
	// 	$sql = "SELECT * FROM tbl_product ORDER BY pid DESC LIMIT 4";
	// 	$result = $this->db->select($sql);
	// 	return $result;
	// }
	// // get Single product
	// public function getSingleProduct($id){
	// 	$sql = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
	// 			FROM tbl_product
	// 			INNER JOIN tbl_category
	// 			ON tbl_product.catId = tbl_category.catId
	// 			INNER JOIN tbl_brand
	// 			ON tbl_product.brandId = tbl_brand.brandId
	// 			WHERE tbl_product.pid = '$id' ";
	// 	//Same Query using Alias(giving a temporary name to a table or Column)
	// 	/*$sql = "SELECT p.*, c.catName, b.brandName
	// 			FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b
	// 			WHERE p.catId = c.catId AND p.brandId = b.brandId AND p.pid = '$id' ";*/
	// 	$result = $this->db->select($sql);
	// 	return $result;
	// }

	// //load product brand wise...Iphone
	// public function getLatestIphone(){
	// 	$sql = "SELECT * FROM tbl_product WHERE brandId='6' ORDER BY pid DESC LIMIT 1";
	// 	$result = $this->db->select($sql);
	// 	return $result;
	// }
	// //load product brand wise..Samsung
	// public function getLatestSamsung(){
	// 	$sql = "SELECT * FROM tbl_product WHERE brandId='7' ORDER BY pid DESC LIMIT 1";
	// 	$result = $this->db->select($sql);
	// 	return $result;
	// }
	// //load product brand wise...Acer
	// public function getLatestAcer(){
	// 	$sql = "SELECT * FROM tbl_product WHERE brandId='8' ORDER BY pid DESC LIMIT 1";
	// 	$result = $this->db->select($sql);
	// 	return $result;
	// }
	// //load product brand wise...Canon
	// public function getLatestCanon(){
	// 	$sql = "SELECT * FROM tbl_product WHERE brandId='9' ORDER BY pid DESC LIMIT 1";
	// 	$result = $this->db->select($sql);
	// 	return $result;
	// }
	// //get product category wise
	// public function getProductByCat($catid){
	// 	$sql = "SELECT * FROM tbl_product WHERE catId = '$catid' ";
	// 	$result = $this->db->select($sql);
	// 	return $result;
	// }

	// //add product to compare table
	// public function insertCompare($csid,$prodId){
	// 	$ckSql = "SELECT * FROM tbl_compare WHERE csId='$csid' AND productId='$prodId'";
	// 	$getCmp = $this->db->select($ckSql);
	// 	if ($getCmp) {
	// 		$msg = "<span class='error'>Already added.</span>";
	// 			return $msg;
	// 	}else{
	// 	$sql = "SELECT * FROM tbl_product WHERE pid = '$prodId' ";
	// 	$result = $this->db->select($sql)->fetch_assoc();
	// 	if ($result) {
	// 		$productName = $result['productName'];
	// 		$price = $result['price'];
	// 		$image = $result['image'];
	// 		$query = "INSERT INTO tbl_compare(csId,productId,productName,price,image)VALUES('$csid','$prodId','$productName','$price','$image')";
	// 			$inserted = $this->db->insert($query);
	// 			if ($inserted) {
	// 				$msg = "<span class='success'>Added to Compare.</span>";
	// 				return $msg;
	// 			}else{
	// 				$msg = "<span class='error'>Failed to Added.</span>";
	// 				return $msg;
	// 			}
	// 		}
	// 	}
	// }
	// //get Compared data by Customer Id
	// public function getComparedData($csid){
	// 	$sql = "SELECT * FROM tbl_compare WHERE csId ='$csid'";
	// 	$result = $this->db->select($sql);
	// 	return $result;
	// }
	// //check compare table data
	// public function checkCompareData($csid){
	// 	$sql = "SELECT * FROM tbl_compare WHERE csId = '$csid'";
	// 	$result = $this->db->select($sql);
	// 	return $result;
	// }
	// //delete compare data when logout
	// public function delCustomerCompare($csid){
	// 	$sql = "DELETE FROM tbl_compare WHERE csId = '$csid'";
	// 	$result = $this->db->delete($sql);
	// }
	// //save product to wishlist
	// public function saveToWishlist($csid,$pdid){
	// 	$ckSql = "SELECT * FROM tbl_wishlist WHERE csId='$csid' AND productId='$pdid'";
	// 	$getwlist = $this->db->select($ckSql);
	// 	if ($getwlist) {
	// 		$msg = "<span class='error'>Already added to list.</span>";
	// 			return $msg;
	// 	}else{
	// 	$sql = "SELECT * FROM tbl_product WHERE pid = '$pdid' ";
	// 	$result = $this->db->select($sql)->fetch_assoc();
	// 	if ($result) {
	// 		$productName = $result['productName'];
	// 		$price = $result['price'];
	// 		$image = $result['image'];
	// 		$query = "INSERT INTO tbl_wishlist(csId,productId,productName,price,image)VALUES('$csid','$pdid','$productName','$price','$image')";
	// 			$inserted = $this->db->insert($query);
	// 			if ($inserted) {
	// 				$msg = "<span class='success'>Added ! Check wishlist page.</span>";
	// 				return $msg;
	// 			}else{
	// 				$msg = "<span class='error'>Failed to Added.</span>";
	// 				return $msg;
	// 			}
	// 		}
	// 	}
	// }
	// //check wishlist data
	// public function checkWishlistData($csid){
	// 	$sql = "SELECT * FROM tbl_wishlist WHERE csId = '$csid'";
	// 	$result = $this->db->select($sql);
	// 	return $result;
	// }
	// //delete compare data when logout
	// public function delCustomerwishlist($csid, $pdid){
	// 	$sql = "DELETE FROM tbl_wishlist WHERE csId = '$csid' AND productId='$pdid'";
	// 	$result = $this->db->delete($sql);
	// 	if ($result) {
	// 		$msg = "<span class='success'>Wishlist product deleted.</span>";
	// 		return $msg;
	// 	}else{
	// 		$msg = "<span class='error'>Failed to delete.</span>";
	// 		return $msg;
	// 	}
	// }

//end of sample class
}
?>