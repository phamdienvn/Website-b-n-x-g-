<?php 
    class DSSinhvien extends controller{
        public $dssv;
        function  __construct(){
            $this->dssv=$this->model('DSSinhvienModels');
         }
        function Getdata(){
           $this->view('TrangchuLogin',[
            'page'=>'DSSinhvienView',
            'kq'=>$this->dssv->Sinhvien_ListAll(),
            'kqtk'=>$this->dssv->TimkiemSV(''),
            'tk'=>''
            
           
           ]);
        }
        function Timkiem(){
            if(isset($_POST['btnTimkiem'])){
            
                $tk=$_POST['txtTimkiem'];
                $kq=$this->dssv->TimkiemSV($tk);
                $this->view('TrangchuLogin',[
                    'page'=>'DSSinhvienView',
                    'kq'=>$this->dssv->Sinhvien_ListAll(),
                    'kqtk'=>$kq,
                    'timkiem'=>$tk
                   
                    
                ]);
            }
        }
        function suasinhvien($msv){
            $_SESSION['Masv']=$msv;
            $this->view('TrangchuLogin',[
                'page'=>'SuaSinhvienView',
                'result'=>$this->dssv->Lophoc_All(),
                'thongbao'=>'',
                'kqtk'=>$this->dssv->TimkiemSV($msv,'','','')
            ]);
        }
        function Sua_sinhvien(){
            if(isset($_POST['btnLuu'])){
               $msv=$_POST['txtMasv'];
               $tsv=$_POST['txtHoten'];
               $ngs=$_POST['txtNgaysinh'];
               $gt=$_POST['gender'];
               $l=$_POST['txtLop'];
               $sdt=$_POST['txtSdt'];
               $dc=$_POST['txtQuequan'];
               $kq=$this->dssv->Sinhvien_upd($msv,$tsv,$ngs,$gt,$l,$sdt,$dc);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'SuaSinhvienView',
                    'result'=>$this->dssv->Lophoc_All(),
                    'thongbao'=>'Sửa thành công',
                    'kqtk'=>$this->dssv->TimkiemSV($msv,'','','')
                ]);
               }
               else{
                $this->view('TrangchuLogin',[
                    'page'=>'SuaSinhvienView',
                    'result'=>$this->dssv->Lophoc_All(),
                    'thongbao'=>'Sửa thất bại',
                    'kqtk'=>$this->dssv->TimkiemSV($msv,'','','')
                ]);
               }
            }
        }
        // function Xoa_sinhvien($msv){
               
        //        $kq1=$this->dssv->TimkiemSV('','','','');
        //        $kq=$this->dssv->Sinhvien_xoa($msv);
        //        if($kq){
        //         $this->view('MasterLayout',[
        //             'page'=>'DSSinhvienView',
        //             'result'=>$this->dssv->Lophoc_All(),
        //             'kqtk'=>$kq1
        //         ]);
        //        }
        //     }
    }
?>