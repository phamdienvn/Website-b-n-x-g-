<form method="post" action="http://localhost/QLKT_MVC/DSSinhvien/Timkiem">
	<div class="content__bando">
						<span class="content__bando-tieude">Thêm sinh viên kí túc xá</span>
					</div>
					
					<div class="content__duoi">
						<div class="content__duoi-menu">
							<ul class="content__duoi-list">
								<li class="content__duoi-item"><a href="http://localhost:8080/QLKT_MVC/DSSinhvien" class="content__duoi-link "><i class="content__duoi-link-icon icon__home fa-solid fa-house"></i>HOME</a></li>
								<li class="content__duoi-item"><a href="" class="content__duoi-link"><i class="content__duoi-link-icon icon__add fa-solid fa-circle-plus"></i>Thêm sinh viên</a></li>
							</ul>
						</div>
						<div class="content__duoi-bang">
							<div class="content__duoi-dau">
										<input class="btn btn-Excel" type="submit" name="btnExcel" value="Xuất ra excel">
										<input class="txt-tiemkiem input" type="text" name="txtTimkiem" placeholder="Tìm kiếm...">
										<input class="btn " type="submit" name="btnTimkiem" value="Tìm kiếm">
							</div>
							
								<table border="1" cellspacing="0px" class="bang__quanly">
									<tr class="hang-1">
										
										<th class="cot-2">Mã Sinh viên</th>
										<th class="cot-3">Họ và tên</th>
										<th class="cot-4">Ngày sinh</th>
										<th class="cot-5">Giới tính</th>
										<th class="cot-6">Lop</th>
										<th class="cot-7">Điện thoại</th>
										<th class="cot-8">Quê quán</th>
										<th >Chức năng</th>
									</tr>
									<?php
									$i=1;
									
									foreach ($data['kq'] as $row){
										
									?>
										<tr>
										
											<td><?php echo $row['Masv'] ?></td>
											<td><?php echo $row['Hoten'] ?></td>
											<td><?php $dinh_dang_moi = date("d-m-Y", strtotime($row['Ngaysinh']));  echo $dinh_dang_moi  ?></td>
											<td><?php  echo $row['Gioitinh'] ?></td>
											<td><?php echo $row['Lop'] ?></td>
											<td><?php echo $row['Sdt'] ?></td>
											<td><?php echo $row['Quequan'] ?></td>
											<td>
												<a style="color: blue;" href="http://localhost/QLKT_MVC_API/DSSinhvien/suasinhvien/<?php echo $row['Masv'] ?>">Sửa</a>
												&nbsp;&nbsp;&nbsp;
												<a style="color: blue;" href="">Xóa</a>
											</td>
										</tr>
									<?php
									      }
										  ?>
										 
								</table>
							
						</div>
					</div>
</form>