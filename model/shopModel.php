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
				WHERE parentId = 0
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


}
?>