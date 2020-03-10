				<p><span style="font-size: 24px;">Hồ Sơ Của Tôi</span>  đã tham gia : <?=$acc->updateAt?></p>
				Quản lý thông tin hồ sơ để bảo mật tài khoản.
				</div>
				<div class="contentcon">
					<div class="row">
						<div class="col-md-9">
							<form class="form-horizontal" method="POST">
							  <div class="form-group">
							    <label class="control-label col-sm-3" for="text">Tên </label>
							    <div class="col-sm-9">
							      <input type="text" name="ten" value="<?=$acc->name?>" class="form-control" id="text" placeholder="Enter text">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-3" for="text">Giới tính </label>
							    <div class="col-sm-9">
							    	<?php if($acc->gender == 0): ?>
							     <label class="radio-inline"><input value="0" name="home" type="radio" checked="checked">Nam</label>
                                <label class="radio-inline"><input value="1" name="home" type="radio" >Nữ</label>
                                <?php else: ?>
                                	<label class="radio-inline"><input value="0" name="home" type="radio" >Nam</label>
                                <label class="radio-inline"><input value="1" name="home" type="radio" checked="checked">Nữ</label>
                            <?php endif ?>
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-3" for="text">Email </label>
							    <div class="col-sm-9">
							      <input type="text" name="mail" value="<?=$acc->mail?>" class="form-control" id="text" placeholder="Enter text">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-3" for="text">Số điện thoại </label>
							    <div class="col-sm-9">
							      <input type="text" name="sdt" value="<?=$acc->phone?>" class="form-control" id="text" placeholder="Enter text">
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="col-sm-offset-3 col-sm-9">
							      <button type="submit" name="sm" class="btncc">Lưu</button>
							    </div>
							  </div>
							</form>
						</div>
						<div class="col-md-3">

						</div>
					</div>
					<!--  -->
				</div>