<?php
   header('Access-Control-Allow-Origin:*');
   header('Content-Type: application/json');
   header('Access-Control-Allow-Methods:POST');
   header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


    include_once('../../Core/db.php');
    include_once('../../Models/ApidanhsachSV.php');

    $db =new db();
    $connect = $db->connect();
    $apidanhsachvs= new ApidanhsachSV($connect);

    $read=$apidanhsachvs->read();
    $num=$read->rowCount();
    if($num>0){
        $questiom_array=[];
        $question_array['data']=[];

        while($row = $read->fetch(PDO::FETCH_ASSOC)){// đọc dữ liệu từ $read

    

            extract($row);// Đổ data
            $question_item = array(
                'manv'=> $Masv,
                'tennv'=> $Hoten,
                'ngaysinh'=> $Ngaysinh,
                'gioitinh'=> $Gioitinh,
                'lop'=> $Lop,
                'sdt'=> $Sdt,
                'diachi'=> $Quequan
                
              
            );

            array_push( $question_array['data'],$question_item);// Đẩy dữ liệu từ mảng User_array -> user_string['data]
        }
        echo json_encode($question_array);
    }
    function Timkiem(){
        if(isset($_POST['btnTimkiem'])){
        
            $tk=$_POST['txtTimkiem'];
            $kq=$this->dssv->TimkiemSV($tk);
            $this->view('TrangchuLogin',[
                'page'=>'DSSinhvienView',
                'kq'=>$this->dssv->lophoc_all(),
                'kqtk'=>$question_array,
                'timkiem'=>$tk
               
                
            ]);
        }
    }

?>