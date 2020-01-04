<?php 
class cart{
    private $DB;
    public function __construct($DB){
        if(!isset($_SESSION)){ // kiểm tra nếu không có session thì start nó
            session_start();
        }
        if(!isset($_SESSION['cart'])){ //kiểm tra nếu không có session giỏ hàng thì tạo cái mới gắn mảng
            $_SESSION['cart'] = array();
        }
        $this->DB = $DB;
        if(isset($_GET['delCart'])){
            $this->del($_GET['delCart']);
        }
        if (isset($_POST['cart'])) {
            $this->updateCart();
        }

    }
    public function add($product_id){
        if(isset($_SESSION['cart'][$product_id])){  //nếu sản phẩm trong giỏ hàng đã tồn tại 
            $_SESSION['cart'][$product_id]++;       // thì session sp đó tăng lên 
        }
        else{
            $_SESSION['cart'][$product_id] = 1; // nếu không tồn tại thì = 1
        }
     
    }
    public function updateCart(){
        foreach($_SESSION['cart'] as $product_id => $qty){
            if(isset( $_POST['cart']['qty'][$product_id])){
                $_SESSION['cart'][$product_id] = $_POST['cart']['qty'][$product_id];
            }
            
        }
    }
    public function countProduct(){
        return array_sum($_SESSION['cart']);
    }
    public function total(){ // tổng số tiền thanh toán
        $total = 0;                              // Gắn 
        $ids = array_keys($_SESSION['cart']);  
        if(empty($ids)){
            $products = array();
        }
        else{
            $products = $this->DB->query('SELECT id,price,promotionPrice FROM product WHERE id IN('.implode(',',$ids).')');
        }
        foreach($products as $pro){
            if($pro->promotionPrice != 0){
                $total += $pro->promotionPrice * $_SESSION['cart'][$pro->id];
            }
            else{
                $total += $pro->price * $_SESSION['cart'][$pro->id];
            }
   
        }
        return $total;
    }
    public function del($product_id){
        unset($_SESSION['cart'][$product_id]); // Xoá session cart dựa vào id sản phẩm
    }
}
?>