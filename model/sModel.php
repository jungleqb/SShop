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
}
?>