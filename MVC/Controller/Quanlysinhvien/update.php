<?php
   header('Access-Control-Allow-Origin:*');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods:PUT');
   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


    include_once('../../Core/db.php');
    include_once('../../Models/ApidanhsachSV.php');

    $db =new db();
    $connect = $db->connect();
    $apidanhsachvs= new ApidanhsachSV($connect);

    
    $data = json_decode(file_get_contents('php://input'));
    $apidanhsachvs->Masv= $data->Masv;
    $apidanhsachvs->Hoten= $data->Hoten;
    $apidanhsachvs->Ngaysinh= $data->Ngaysinh;
    $apidanhsachvs->Gioitinh= $data->Gioitinh;
    $apidanhsachvs->Lop= $data->Lop;
    $apidanhsachvs->Sdt= $data->Sdt;
    $apidanhsachvs->Quequan= $data->Quequan;
    
    if($apidanhsachvs->update()){
        echo json_encode(array('message','Sửa thanh cong'));
    }else{
        echo json_encode(array('message','Sửa khong thanh cong'));
    }

    ?>