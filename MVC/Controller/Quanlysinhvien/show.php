<?php
   header('Access-Control-Allow-Origin:*');
   header('Content-Type: application/json');
   

    include_once('../../Core/db.php');
    include_once('../../Models/ApidanhsachSV.php');

    $db =new db();
    $connect = $db->connect();
    $apidanhsachvs= new ApidanhsachSV($connect);

    
    

    $apidanhsachvs->Masv=isset($_GET['Masv'])?$_GET['Masv']:die();

    $apidanhsachvs->Timkiem();
  

    $apidanhsachlop_item=array(
        'Masv'=> $apidanhsachvs->Masv,
        'Hoten'=> $apidanhsachvs->Hoten,
        'Ngaysinh'=> $apidanhsachvs->Ngaysinh,
        'Gioitinh'=> $apidanhsachvs->Gioitinh,
        'Lop'=> $apidanhsachvs->Lop,
        'Sdt'=> $apidanhsachvs->Sdt,
        'Quequan'=> $apidanhsachvs->Quequan


    );
  
     printf(json_encode( $apidanhsachlop_item));
      


    ?>
    