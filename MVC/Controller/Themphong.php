<?php 
    class Themphong extends controller{
        public $po;
        public function __construct(){
            $this -> po=$this->model('DSPhongModels');
        }
        public function Getdata(){
            //tham số page gọi đến trang bằng cách =>
            $this->view('TrangchuLogin',['page'=>'ThemphongView',
            'kq'=>$this->po->lophoc_all() 
        ]);
        }
        public function ThemmoiPhong(){
            if(isset($_POST['btnThemmoi'])){
                $map=$_POST['txtMaphong'];
                $lp=$_POST['loaiphong'];
                $gp=$_POST['txtGiaphong'];
                $ht=$_POST['txtSonguoio'];
                $td=$_POST['txtSonguoitd'];
                $tt=$_POST['tinhtrang'];
                $mt=$_POST['txtMota'];
                $kq1=$this->po->checktrungMP($map);
                if($tt>$td){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemphongView',
                        'kq'=>$this->po->lophoc_all(),
                        'thongbao'=>'Bạn đã nhập quá số người',
                        'maphong'=>$map,
                        'loaiphong'=>$lp,
                        'giaphong'=>$gp,      
                        'sosvht'=>$ht,
                        'sosvtd'=>$td,
                        'mota'=>$mt,
                        'tinhtrang'=>$tt
                     ]);
                }
                if(!$kq1){
                    $kq=$this->po->phong_ins($map,$lp,$gp,$ht,$td,$tt,$mt);
                    if($kq){
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemphongView',
                            'kq'=>$this->po->lophoc_all(),
                            'thongbao'=>'Thêm mới thành công',
                            'maphong'=>$map,
                            'loaiphong'=>$lp,
                            'giaphong'=>$gp,      
                            'sosvht'=>$ht,
                            'sosvtd'=>$td,
                            'mota'=>$mt,
                            'tinhtrang'=>$tt
                         ]);
                    }else{
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemphongView',
                            'kq'=>$this->po->lophoc_all(),
                            'thongbao'=>'Thêm mới thất bại',
                            'maphong'=>$map,
                            'loaiphong'=>$lp,
                            'giaphong'=>$gp,
                            'sosvht'=>$ht,
                            'sosvtd'=>$td,
                            'mota'=>$mt,
                            'tinhtrang'=>$tt
                         ]);
                    }

                }else{
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemphongView',
                        'kq'=>$this->po->lophoc_all(),
                        'thongbao'=>'Mã sinh viên đã tồn tại. Vui lòng nhập lại!',
                        'maphong'=>$map,
                        'loaiphong'=>$lp,
                        'giaphong'=>$gp,
                        'sosvht'=>$ht,
                        'sosvtd'=>$td,
                        'mota'=>$mt,
                        'tinhtrang'=>$tt
                     ]);
                }

               
            }
            if(isset($_POST['btnNhaplai'])){
                $this->view('TrangchuLogin',['page'=>'ThemphongView',
                'kq'=>$this->po->lophoc_all() ]);
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin',['page'=>'DSPhongView',
                'kq'=>$this->po->lophoc_all(),
                'kqtk'=>$this->po->TimkiemSV('')
            ]);
            }
        }
    }
?>