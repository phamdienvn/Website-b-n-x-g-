<?php 
    class DSPhong extends controller{
        public $dsp;
        public $map;
        
        function  __construct(){
            $this->dsp=$this->model('DSPhongModels');
         }
        function Getdata(){
           $this->view('TrangchuLogin',[
            'page'=>'DSPhongView',
            'kq'=>$this->dsp->lophoc_all(),
            'kqtk'=>$this->dsp->TimkiemSV('')
          
            
           
           ]);
        }
        function Timkiem(){
            if(isset($_POST['btnTimkiem'])){
            
                $tk=$_POST['txtTimkiem'];
                $kq=$this->dsp->TimkiemSV($tk);
                $this->view('TrangchuLogin',[
                    'page'=>'DSPhongView',
                    'kq'=>$this->dsp->lophoc_all(),
                    'kqtk'=>$kq,
                    'timkiem'=>$tk
                   
                    
                ]);
            }
        }
 
 
        function suaphong($map){
            $_SESSION['Maphong']=$map;
            $this->view('TrangchuLogin',[
                'page'=>'SuaPhongView',
                'result'=>$this->dsp->Lophoc_All(),
                'thongbao'=>'',
                'kqtk'=>$this->dsp->TimkiemSV($map)
            ]);
        }
        function CapnhapPhong(){
            if(isset($_POST['btnThemmoi'])){
                $map=$_POST['txtMaphong'];
                $lp=$_POST['loaiphong'];
                $gp=$_POST['txtGiaphong'];
                $ht=$_POST['txtSonguoio'];
                $td=$_POST['txtSonguoitd'];
                $tt=$_POST['tinhtrang'];
                $mt=$_POST['txtMota'];
                $kq=$this->dsp->Phong_upd($map,$lp,$gp,$ht,$td,$tt,$mt);
                if($kq){
                    $this->view('TrangchuLogin',[
                        'page'=>'SuaphongView',
                        'kq'=>$this->dsp->lophoc_all(),
                        'thongbao'=>'Cập nhập thành công',
                        'kqtk'=>$this->dsp->TimkiemSV($map)
                    
                     ]);
                    }else{
                        $this->view('TrangchuLogin',[
                            'page'=>'SuaphongView',
                            'kq'=>$this->dsp->lophoc_all(),
                            'thongbao'=>'Cập nhập thất bại',
                            'kqtk'=>$this->dsp->TimkiemSV($map)
                           
                         ]);
                    }
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin',['page'=>'DSPhongView',
                'kq'=>$this->dsp->lophoc_all(),
                'kqtk'=>$this->dsp->TimkiemSV('')
            ]);
            }
        }
        function Xoa_phong($map){
          
               $kq1=$this->dsp->TimkiemSV('');
               $kq=$this->dsp->Phong_xoa($map);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'DSPhongView',
                    'result'=>$this->dsp->Lophoc_All(),
                    'kqtk'=>$kq1
                ]);
               }
            }
    }
?>