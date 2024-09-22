<?php
	$user=  $_SESSION['User'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="http://localhost/QLKT_MVC/Public/CSS/ThemSinhvien.css">
    

	
	<title></title>
    <style>
        .content__duoihh {
            margin-top: 25px;
            height: 129px;
            background-color: #fff;
            box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%), 0 3px 1px -2px rgb(0 0 0 / 20%);
        }
        .content__duoi-dauhh{
            min-height: 25px;
            display: flex;
            
        }
        .btn{
            margin-left:10px;
        }
        .content__duoi-menu{
            padding-left: 50px;
            padding-top: 10px;
            border: none;
        }
        .content__text_hh{
            margin-bottom: 6px;
            margin-top: 8px;
            display: flex;
            font-size: 1.1rem;
        }
        .content__duoi-hthh{
            margin-top:16px;
            background-color: #fff; 
           
        }
        .widthchung{
            width: 80%;
            font-size: 1.1rem;
            color: #8693a0;
            height: 40px;
            border: 2px solid #cfd4da;
            outline-color: #5cb1e3;
        }
        .content__duoi-thembao{
            width: 100%;
            height: 40px;
            display: flex;
            justify-content: space-between;
            margin-bottom:20px;
        }
        .text__tien{
            font-size: 1.2rem;
            line-height: 40px;
           
        }
        /* .content__bando-mg{
            position: fixed;
            width: 100%;
            margin: -65px -30px 0px;
                'thongbao'=>'Bạn chưa nhập dữ liệu. Vui lòng nhập',
                        'mahoadon'=>$mahd,
                        'maphong'=>$map,
                        'ngaylap'=>$nl,
                        'sodien'=>$sd,
                        'sonuoc'=>$sn,
                        'mang'=>$m,
                        'thanhtien'=>$ttien,
                        'tongtien'=>$tongt,
                        'tinhtrang'=>$tt,
                        'kqp'=>$kq1,
                        'p'=>$timkiem,
        } */
    </style>
</head>

<form method="POST" action="http://localhost/QLKT_MVC/ThemHoadonphong/ThemmoiHoadon">
    <div class="content__bando-mg">
        <h1><i class="fa fa-dollar"></i> Thanh toán dịch vụ</h1>
        <p >Thanh toán theo mã sinh viên</p>
    </div>
    <div class="content__duoihh" >
        <div class="content__duoi-menu"  >
        <span class="content__text_hh"> Tìm kiến theo mã sinh viên</span>
        <div class="content__duoi-dauhh">
                                            
                                            <select class="ctxt-tiemkiem input "  name="txtTimkiem" style="font-size: 1rem; height: 32px;">
                                                <option value="" ><?php if(isset($data['p'])) echo $data['p'];else echo'--Chọn sinh viên--' ?></option>
                                                <?php
                                                while($row=mysqli_fetch_assoc($data['kq'])){
                                                    var_dump($row);
                                                    if(isset($data['p'])){
                                                        if($row['Masv']==$data['p']){
                                                            echo '<option value='.$row['Masv'].' selected >'.$row['Masv'].'</option>';
                                                        }
                                                        else{
                                                            echo '<option value='.$row['Masv'].' >'.$row['Masv'].'</option>';
                                                        }
                                                    }
                                                    else{
                                                    echo '<option value='.$row['Masv'].'>'.$row['Masv'].'</option>';
                                                    }
                                                
                                                }
                                            ?>
                                                
                                            </select>
                                            
                                            <input class="btn " type="submit" name="btnTimkiem" value="Tìm kiếm">
                                            <input class="btn btn-Excel" type="submit" name="btnExcel" value="Xuất ra excel">
                                            
                                </div>
                                <?php 
                                                if(isset($data['thongbao'])){
                                                        echo '<span style="color:red;font-size:1rem;">'.$data['thongbao'].'</span>';
                                                }
                                            ?>	
                
        
        </div> 
        <div class="content__duoi-hthh" <?php if( !isset($data['kqp'])) echo 'hidden'; ?> >
               
    <div class="content__duoi-inputthem"  >
        <div class="content__duoi-l-2  content__duoi-mg1">
                <span class="content__duoi-tieude">Mã hóa đơn</span>
                <?php
								$i=0;
								if(isset($data['kq1'])){
                                    $row=mysqli_fetch_assoc($data['kq1']);
									$i=$row['Mahdp'];
								
							}
								$i=$i+1;
								// $chuoi=str_pad($i,6,"0",STR_PAD_LEFT);
                                $chuoi=$i;
							?>
                <input type="text" name="txtMaHoadon" class="content__duoi-them" value="<?php if(isset($data['mahoadon'])) echo $data['mahoadon']; else echo $chuoi; ?>">
               
                  <?php
                    while($r=mysqli_fetch_array($data['kqp'])){
                ?>
                <span class="content__duoi-tieude">Tiền phòng</span>
                <input type="number" name="txtTienphong"  oninput="myfunction()" id="Tienphong" class="content__duoi-them " value="<?php if(isset($r['Tienphong'])) echo $r['Tienphong']; else echo'0'; ?>">
                <input type="text" name="txtThanhtien" id="Datra" oninput="myfunctionconno()" class="content__duoi-them " placeholder="0"  value="<?php if(isset($r['Tiencoc'])) echo $r['Tiencoc']; ?>  " hidden="">
                <input type="number" name="txtTongtien" onmouseout="myfunction()"  class="content__duoi-them" id="tongtien" placeholder="0"  value="<?php if(isset($r['Conno'])) echo $r['Conno']; else echo'0'; ?>" hidden="">
                <span class="content__duoi-tieude">Đã trả</span>
                <input type="text" name="txtDatra" id="Datra1" oninput="myfunctionconno()" class="content__duoi-them " placeholder="0"  value="<?php if(isset($data['datra'])){ echo $data['datra'];} else if(isset($r['Tiencoc'])) echo $r['Tiencoc']; ?>">
                <span class="content__duoi-tieude">Còn nợ </span>
                <input type="number" name="txtConno" onmouseout="myfunction()"  class="content__duoi-them" id="tongtien1" placeholder="0"  value="<?php if(isset($data['conno'])){ echo $data['conno'];} else if(isset($r['Conno'])) echo $r['Conno']; else echo'0'; ?>">
                <span class="content__duoi-tieude"> </span>
                <input type="number" name="txtMahopdong"   class="content__duoi-them" id="tongtien1" placeholder="0"  value="<?php if(isset($r['Mahd'])) echo $r['Mahd']; else echo'0'; ?>"  hidden="">
               <?php
                    }
                ?>
                
                
    
                <input type="submit" name="btnThanhtoan" value="Thanh toán" class="btn" >
                <!-- <input type="submit" name="btnNhaplai" value="Nhập lại" class="btn"> -->
                <input type="submit" name="btnDanhsach" value="Danh sách" class="btn">
        </div>
        <div class="content__duoi-l-2 content__duoi-mg2">
                 
                <span class="content__duoi-tieude">Ngày lập</span>
                
                <input type="date" name="txtNgaylap" class="content__duoi-them" id="d1">
                <script>
                                var d= new Date()
                                var yr=d.getFullYear();
                                var month=d.getMonth()+1
                                if(month<10){
                                    month='0'+date
                                }
                                var date=d.getDate();
                                if(date<10){
                                    date='0'+date
                                }
                                var c_date=yr+"-"+month +"-"+date;
                                document.getElementById('d1').value=c_date;
                                
                                
                </script>
                <?php
                    while($r=mysqli_fetch_array($data['kqtsv'])){
                ?>
                <span class="content__duoi-tieude">Mã sinh viên</span>
                <input type="text" name="txtMasv" class="content__duoi-them"  value="<?php if(isset($r['Masv'])) echo $r['Masv']; ?>">
                <span class="content__duoi-tieude">Họ và tên</span>
                <input type="text" name="txtHoten" class="content__duoi-them" value="<?php if(isset($r['Hoten'])) echo $r['Hoten']; ?>"> 
                <?php
                    }
                ?> 
                
                 <span class="content__duoi-tieude">Thanh toán</span>
                 <input type="number" name="txtThanhtoan" oninput="myfunctionconno()"   id="Conno" placeholder="0"   class="content__duoi-them"  value="<?php if(isset($data['thanhtoan'])) echo $data['thanhtoan'];  ?>"> 
                 <script type="text/javascript">
                    function myfunctionconno(){
                        var Conno =document.getElementById('Datra').value;
                        
                        var Datra =document.getElementById('tongtien').value;
                        var Thanhtoan =document.getElementById('Conno').value;
                        var a =Conno;
                        var b=Datra;
                        var Tong= parseInt(Thanhtoan) + parseInt(a);
                        var Tong1= parseInt(b) - parseInt(Thanhtoan);
                            document.getElementById('tongtien1').value= Tong1;
                       
                            document.getElementById('Datra1').value= Tong;
                      
                        
                    }
                </script>


    </div>
    </div> 
        </div>
</div>
</form>

