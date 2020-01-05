<?php 
require_once"model/shopModel.php";


class shopController{
	
	// Hàm xử lý ở trang chu
	public function index(){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$date = date('Ymd',time());

		$model = new shopModel;
		$listHome = $model->getListHome();
		$saleOfDay = $model->getSaleOfDay($date);
		$hotOfWeek = $model->getHotOfWeek($date);

		return array(
			'list' => $listHome,
			'sale' => $saleOfDay,
			'hot' => $hotOfWeek,
		);
	}
	// Hàm xử lý ở trang thể loại
	public function type(){


		return array(

		);
	}
	//  Hàm xử lý ở trang chi tiết sản phẩm
	public function detail(){


		return array(

		);
	}



}

?>