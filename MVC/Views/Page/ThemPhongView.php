<form method="POST" action="http://localhost/QLKT_MVC/Themphong/ThemmoiPhong">
<div class="content__bando">
						<span class="content__bando-tieude">Thêm phòng kí túc xá</span>
					</div>
					<div class="content__duoi">
						<div class="content__duoi-menu">
						<h3 class="content__duoi-link">Thêm phòng kí túc xá</h3>
						<?php 
							if(isset($data['thongbao'])){
								if($data['thongbao']=="Sửa thất bại")
									echo '<span style="color:#399ef8;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
									else
									echo '<span style="color:red;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
							}
							// echo '<span style="color:#399ef8;font-size:1.3rem; padding-left:30px">'.$data['thongbao'].'</span>';
                    	?>
						</div>
						
						<div class="content__duoi-inputthem">
							<span class="content__duoi-tieude">Mã phòng</span>
							<input type="text" name="txtMaphong" class="content__duoi-them" value="<?php if(isset($data['maphong'])) echo $data['maphong']; ?>">
							<span class="content__duoi-tieude">Loại phòng</span>
							<div class="gender   " style="margin-bottom: 14px; " >
								<label for="Nam" ><input type="radio" name="loaiphong" value="Nam" id="Nam" class=" genderfs" checked=""
									<?php if(isset($data['loaiphong'])){
								if($data['loaiphong']=='Nam') echo 'checked=""';
							} 
							?>> Nam</label>
								<label for="Nu" ><input type="radio" name="loaiphong" value="Nữ" id="Nu" class="gendermr genderfs"
								<?php if(isset($data['loaiphong'])){
									if($data['loaiphong']=='Nữ') echo 'checked=""';
									} 
								?>
								> Nữ</label>
								
							</div>


							<span class="content__duoi-tieude">Giá phòng</span>
							<input type="text" name="txtGiaphong" class="content__duoi-them" value="<?php if(isset($data['giaphong'])) echo $data['giaphong']; ?>" >
				

							<span class="content__duoi-tieude">Số người hiện tại</span>
							<input type="text" name="txtSonguoio" class="content__duoi-them" value="<?php if(isset($data['sosvht'])) echo $data['sosvht']; ?>">
							<span class="content__duoi-tieude">Số người tối đa</span>
							<input type="text" name="txtSonguoitd" class="content__duoi-them" value="<?php if(isset($data['sosvtd'])) echo $data['sosvtd']; ?>">
							<span class="content__duoi-tieude">Tình trạng</span>
							<div class="gender   " style="margin-bottom: 14px; ">
								<label for="Nam" ><input type="radio" name="tinhtrang" value="Còn trống" id="Nam" class=" genderfs" checked=""
								<?php if(isset($data['tinhtrang'])){
								if($data['tinhtrang']=='Còn trống') echo 'checked=""';
							} 
							?>
								>  Còn trống</label>
								<label for="Nu" ><input type="radio" name="tinhtrang" value="Đã đủ" id="Nu" class="gendermr genderfs"
								<?php if(isset($data['tinhtrang'])){
								if($data['tinhtrang']=='Đã đủ') echo 'checked=""';
							} 
							?>
								>  Đã đủ</label>
								
							</div>
							<span class="content__duoi-tieude">Mô tả</span>
							<input type="text" name="txtMota" class="content__duoi-them" value="<?php if(isset($data['mota'])) echo $data['mota']; ?>">
							<input type="submit" name="btnThemmoi" value="Thêm mới" class="btn">
							<input type="submit" name="btnNhaplai" value="Nhập lại" class="btn">
							<input type="submit" name="btnDanhsach" value="Danh sách" class="btn">
						</div>
					</div>
</form>