<?php 
class proModel extends DBConnect{
	// lấy tất cả sản phẩm dựa vào khách hàng
	function getProductByUser($id){
		$sql = "SELECT *,bd.status as bdstatus
				FROM billdetail bd
				INNER JOIN bill b ON b.id = idBill
				INNER JOIN product p ON p.id = idProduct
				WHERE b.idUser = $id
				ORDER BY bd.id DESC
		";
		return $this->getMoreRows($sql);
	}
	// Lấy những sản phẩm trạng thái khác nhau
	function getProductWaitCheck($id,$x){
		$sql = "SELECT *, bd.status as bdstatus, bd.id as idbd
				FROM billdetail bd
				INNER JOIN bill b ON b.id = idBill
				INNER JOIN product p ON p.id = idProduct
				WHERE b.idUser = $id
				
		";
		if($x == 0) $sql .= "AND bd.status = 0 ORDER BY bd.id DESC";            // chờ thanh toán 
		elseif($x == 1) $sql .= "AND bd.status = 1 ORDER BY bd.id DESC";        // chờ lấy hàn
		elseif($x == 2) $sql .= "AND bd.status = 2 ORDER BY bd.id DESC";        // đang giao 
		elseif($x == 3) $sql .= "AND bd.status = 3 ORDER BY bd.id DESC";        // đã giao
		else $sql .= "AND bd.status = 4 ORDER BY bd.id DESC";  					// đã huỷ               
		return $this->getMoreRows($sql);
	}
	// Lấy thông tin shop dựa vào Sản phẩm 
	function getShopbyProduct($id){
		$sql = "SELECT *
				FROM shop 
				WHERE id = $id 
		";
		return $this->getOneRow($sql);
	}
	// Huỷ đơn hàng
	function cancel($id){
		$sql = "UPDATE  billdetail
				SET status = 4
				WHERE id = $id
		";
		return $this->executeQuery($sql);
	}


}
?>