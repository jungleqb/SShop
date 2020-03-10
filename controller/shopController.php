<?php 
require_once"model/shopModel.php";
require"helper/Pager.php";

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
		$model = new shopModel;
		if(isset($_GET['url'])){
			$url = $_GET['url'];
		}

		$quantity = 2;
		$page = 1;
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		$position = ($page-1)*$quantity;
		$pro = $model->getProductsByIdType($url,$position,$quantity);
		$totalProduct = count($model->getProductsByIdType($url));

		$pager = new Pager($totalProduct,$page,$quantity, 3);
		$showPagination = $pager->showPagination();


		return array(
			'pro' => $pro,
			'showPagination' => $showPagination,
		);
	}
	//  Hàm xử lý ở trang chi tiết sản phẩm
	public function detail(){
		$ssname = '';
		if(isset($_GET['id']) && isset($_GET['url']) && isset($_GET['title'])){
			$id = $_GET['id'];
			$url = $_GET['url'];
			$title = $_GET['title'];
				
		}
		$model = new shopModel;
		$pro = $model->getProductDetail($id,$url,$title);

		$thumb = $model->getThumbnail($pro->id);
		// Tính view

		
		$ssname .='sanpham-'.$pro->idp;


		if(!$_SESSION[$ssname]){
			$_SESSION[$ssname] = 1;
			$add = $pro->view + 1;
			$addView = $model->updateView($add,$pro->idp);
		}



		return array(
			'pro'=>$pro,
			'thumb'=>$thumb
		);
	}
	// Hàm xử lý ở trang cửa hàng
	public function shop(){
		if(isset($_GET['shop'])){
			$shop = $_GET['shop'];
			$model = new shopModel;
			$s = $model->getProductByShop($shop);
			$count = $model->count('product',$s[0]->idShop);
			$sum = $model->sum('product',$s[0]->idShop);
		}
		return array(
			's' => $s,
			'count' => $count,
			'sum' => $sum
		);
	}



}

?>