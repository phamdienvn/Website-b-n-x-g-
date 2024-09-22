<?php
   header('Access-Control-Allow-Origin:*');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods:DELETE');
   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


    include_once('../../Core/db.php');
    include_once('../../Models/ApidanhsachSV.php');

    $db =new db();
    $connect = $db->connect();
    $apidanhsachvs= new ApidanhsachSV($connect);

    
    $data = json_decode(file_get_contents('php://input'));
    $apidanhsachvs->Masv= $data->Masv;
    
    
    if($apidanhsachvs->delete()){
        echo json_encode(array('message','Sửa thanh cong'));
    }else{
        echo json_encode(array('message','Sửa khong thanh cong'));
    }

    ?>