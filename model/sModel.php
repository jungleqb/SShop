<?php 
require_once"DBConnect.php";

class sModel extends DBConnect{
	// Lấy thông tin thông qua iduser
	function getIdUser($id){
		$sql = "SELECT * 
				FROM user 
				WHERE id = $id 
		";
		return $this->getOneRow($sql);
	}
	// từ id người dùng lấy id shop
	function getIdShop($id){
		$sql = "SELECT id
				FROM shop 
				WHERE idUser = $id 
		";
		return $this->getOneRow($sql);
	}
	// Lấy sản phẩm thông qua iduser
	function getProductById($id){
		$sql = "SELECT * 
				FROM product  
				WHERE idShop = (
								SELECT s.id 
								FROM shop as s 
								INNER JOIN user as u ON u.id = idUser 
								WHERE u.id = $id	
								)
		";
		return $this->getMoreRows($sql);
	}
	// Lấy tất cả danh mục con 
	function getAllCatalog(){
		$sql = "SELECT * 
				FROM typeproduct
				WHERE parentId != 0 
				AND deleted = 0
		";
		return $this->getMoreRows($sql);
	}
	// Thêm sản phẩm mới
	function setProduct($idType,$idShop,$title,$titleKo,$detail,$price,$promotionPrice,$img,$status){
		$sql = "INSERT INTO product(idType,idShop,title,titleKo,detail,price,promotionPrice,img,status)
				VALUES($idType,$idShop,'$title','$titleKo','$detail','$price','$promotionPrice','$img',$status)
		";
		return $this->executeQuery($sql);
	}
	// lấy tất cả sản phẩm dựa vào shop
	function getProductByShop($id){
		$sql = "SELECT *,bd.status as bdstatus, b.id as idb
				FROM billdetail bd
				INNER JOIN bill b ON b.id = idBill
				INNER JOIN product p ON p.id = idProduct
				WHERE p.idShop = (
								SELECT s.id 
								FROM shop as s 
								INNER JOIN user as u ON u.id = idUser 
								WHERE u.id = $id	
								)
				ORDER BY bd.id DESC
		";
		return $this->getMoreRows($sql);
	}
	// Lấy những sản phẩm trạng thái khác nhau
	function getProductWaitCheck($id,$x){
		$sql = "SELECT *, bd.status as bdstatus, bd.id as idbd, b.id as idb
				FROM billdetail bd
				INNER JOIN bill b ON b.id = idBill
				INNER JOIN product p ON p.id = idProduct
				WHERE p.idShop = (
								SELECT s.id 
								FROM shop as s 
								INNER JOIN user as u ON u.id = idUser 
								WHERE u.id = $id	
								)
				
		";
		if($x == 0) $sql .= "AND bd.status = 0 ORDER BY bd.id DESC";            // chờ thanh toán 
		elseif($x == 1) $sql .= "AND bd.status = 1 ORDER BY bd.id DESC";        // chờ lấy hàng
		elseif($x == 2) $sql .= "AND bd.status = 2 ORDER BY bd.id DESC";        // đang giao 
		elseif($x == 3) $sql .= "AND bd.status = 3 ORDER BY bd.id DESC";        // đã giao
		else $sql .= "AND bd.status = 4 ORDER BY bd.id DESC";  					// đã huỷ               
		return $this->getMoreRows($sql);
	}
	// Xác nhận dơn hàng
	function aceptBill($id,$x){
		$sql = "UPDATE billdetail
				SET status = $x 
				WHERE id = $id 
		";
		return $this->executeQuery($sql);
	}

	// In ra các hoá đơn có liên quan đến shop không trùng nhau
	function getBillByShop($id){
		$sql = "SELECT DISTINCT  idBill,bd.status as bdstatus, b.id as idb, b.dateOrder
				FROM billdetail bd
				INNER JOIN bill b ON b.id = idBill
				INNER JOIN product p ON p.id = idProduct
				WHERE p.idShop = (
								SELECT s.id 
								FROM shop as s 
								INNER JOIN user as u ON u.id = idUser 
								WHERE u.id = $id	
								)
				ORDER BY bd.id DESC
		";
		return $this->getMoreRows($sql);
	}
	// In ra sản phẩm có cùng hoá đơn và cùng shop 
	function getProductByBillShop($idBill,$idShop){
		$sql = "SELECT *,p.id as idp ,bd.status as bdstatus
				FROM billdetail bd 
				INNER JOIN bill b ON b.id = bd.idBill 
				INNER JOIN product p ON p.id = bd.idProduct
				WHERE 	p.idShop = (
								SELECT s.id 
								FROM shop as s 
								INNER JOIN user as u ON u.id = idUser 
								WHERE u.id = $idShop	
								)
				AND bd.idBill = $idBill
				AND bd.status != 4
				ORDER BY bd.id DESC 
		";
		return $this->getMoreRows($sql);
	}
	// Lấy thông tin khách hàng thông qua bill
	function getUserByBill($idBill){
		$sql = "SELECT *
				FROM user u 
				INNER JOIN bill b ON idUser = u.id 
				WHERE b.id = $idBill
		";
		return $this->getOneRow($sql);
	}
	//  Tạo thông báo khi có sản phẩm cần xác nhận
	function ringProduct($id){
		$sql = "SELECT *,bd.status as bdstatus, b.id as idb
				FROM billdetail bd
				INNER JOIN bill b ON b.id = idBill
				INNER JOIN product p ON p.id = idProduct
				WHERE p.idShop = (
								SELECT s.id 
								FROM shop as s 
								INNER JOIN user as u ON u.id = idUser 
								WHERE u.id = $id	
								)
				AND bd.status = 0
				ORDER BY bd.id DESC
		";
		return $this->getMoreRows($sql);
	}
	// Lấy sản phẩm dựa vào idp get 
	function getProductByIdGet($id){
		$sql = "SELECT *
				FROM product 
				WHERE id = $id 
		";
		return $this->getOneRow($sql);
	}
	// Lấy sản phẩm dựa vào idu get
	function getUserById($id){
		$sql = "SELECT *
				FROM user 
				WHERE id = $id 
		";
		return $this->getOneRow($sql);
	} 
	// Cập nhật tổng điểm của người dùng
	function updateCoin($id,$coin){
		$sql = "UPDATE user
				SET coinTotal = $coin 
				WHERE id = $id 
		";
		return $this->executeQuery($sql);
	}






}
?>