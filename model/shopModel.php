<?php 
require_once "DBConnect.php";


class shopModel extends DBConnect{
// Lấy slide
	function getSlide(){
		$sql = "SELECT *
				FROM slide 
		";
	}
// Lấy danh mục sản phẩm
	function getListHome(){
		$sql = "SELECT * 
				FROM typeproduct
				WHERE parentId = 0;
		";
	return $this->getMoreRows($sql);
	}
// lấy danh sách sản phẩm sale trong 1 ngày hiện tại
	function getSaleOfDay($date){
		$sql = "SELECT p.*,t.name,t.nameKo
				FROM product p  
				INNER JOIN typeproduct t ON t.id = idType
				WHERE promotionPrice != 0
				-- AND $date - DATE_FORMAT(updateAt,'%Y%m%d') <= 1
		";
		return $this->getMoreRows($sql);
	}
// lấy danh sạc sản phẩm hot nhất trong tuần 
	function getHotOfWeek($date){
		$sql = "SELECT p.*,t.name,t.nameKo
				FROM product p  
				INNER JOIN typeproduct t ON t.id = idType
				WHERE status =1
				-- AND $date - DATE_FORMAT(updateAt,'%Y%m%d') <= 7
		";
		return $this->getMoreRows($sql);
	}
// Lấy loại cha 
	function getMenuParent(){
		$sql = "SELECT * 
				FROM typeproduct 
				WHERE parentId = 0; 

		";
		return $this->getMoreRows($sql);
	}
//  Lấy loại con
	function getMenuChil($idParent){
		$sql = "SELECT *
				FROM typeproduct
				WHERE parentId = $idParent;
		";
		return $this->getMoreRows($sql);
	}
// lấy sản phẩm theo thể loại
	function getProductsByIdType($url,$position = -1, $quantity = -1){
		$sql = "SELECT p.*, t.name, t.nameKo
				FROM product p
				INNER JOIN typeproduct t ON t.id = idType
				WHERE nameKo = '$url' 
				ORDER BY id DESC
		";
		if($position != -1 && $quantity != -1){
			$sql .="LIMIT $position,$quantity";
		}
		return $this->getMoreRows($sql);
	}
// Lấy chi tiết tin
	function getProductDetail($id,$url,$title){
		$sql = "SELECT p.*, t.name, t.nameKo
				FROM product p 
				INNER JOIN typeproduct t ON t.id = idType
				WHERE p.id = $id
				AND nameKo = '$url'
				AND titleKo = '$title'
		";
		return $this->getOneRow($sql);
	}
// Lấy ảnh thumbnail 
	function getThumbnail($idP){
		$sql = "SELECT * 
				FROM thumbnail
				WHERE idProduct = $idP
		";
		return $this->getMoreRows($sql);
	}
// insert thông tin ở fb 
	function setLoginFacebook($idfb,$name,$mail){
		$sql = "INSERT INTO loginfb(idfb,name,mail)
				VALUES($idfb,'$name','$mail')
		";
		return $this->executeQuery($sql);
	}
//  Đăng ký tài khoản người dùng
	function register($name,$mail,$pass){
		$sql = "INSERT INTO user(name,mail,pass)
				VALUES('$name','$mail','$pass')
	
		";
		return $this->executeQuery($sql);
	}










// Thông tin khách hàng
	function setCustomer($name, $gender, $mail, $tel, $address, $pass){
		$sql = "INSERT INTO customer(name, gender, mail, tel, address, password) 
				VALUES('$name', $gender, '$mail', '$tel', '$address', '$pass')
		";
		$check = $this->executeQuery($sql);
		if($check) return $this->getRecentIdInsert();
        return false;
	}
// Thêm hoá đơn
	function setBill($idCustomer, $total, $dateOrder, $note){
		$sql = "INSERT INTO bill(idCustomer, total, dateOrder, note)
				VALUES($idCustomer, '$total', '$dateOrder', '$note')
		";
		$check = $this->executeQuery($sql);
		if($check) return $this->getRecentIdInsert();
        return false;
	}
// Thêm hoá đơn chi tiết
	function setBillDetail($idProduct,$idBill,$quantity,$price,$discountPrice){
		$sql = "INSERT INTO billdetail(idProduct,idBill,quantity,price,discountPrice)
				VALUES($idProduct,$idBill,'$quantity','$price','$discountPrice')
		";
		return $this->executeQuery($sql);
	}


}
?>