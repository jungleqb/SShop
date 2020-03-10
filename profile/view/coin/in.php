
<ul class="nav nav-pills c">
  <li><a href="ca-nhan?com=coin">Tất cả</a></li>
  <li class="active"><a href="ca-nhan?com=coin&act=in">Đã nhận</a></li>
  <li><a href="ca-nhan?com=coin&act=out">Đã dùng</a></li>
</ul>
<?php foreach($show as $s): ?>
<div class="item" style="margin-top: 20px">
	<div class="row" style="margin-top: 20px">
		<div class="col-md-2">
			<img src="upload/product/<?=$s->img?>" width="100%">
		</div>
		<div class="col-md-8">
			<p style="font-size: 20px"><?=$s->title?></p>
			<p style="color: #666">Tặng sau khi hoàn thành sản phẩm</p>
			<p style="color: #666">Ngày mua: <?=$s->dateOrder?></p>
		</div>
		<div class="col-md-2">
			<span style="font-size: 30px; color:orangered">+<?=$s->coin?></span>
		</div>
	</div>
</div>
<?php endforeach ?>

