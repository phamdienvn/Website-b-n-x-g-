<?php 
    class ThemNhanvien extends controller{
        public $nv;
        public function __construct(){
            $this ->nv=$this->model('DSNhanvienModels');
        }
        public function Getdata(){
            // tham số page gọi đến trang bằng cách =>
            $this->view('TrangchuLogin',[
                'page'=>'ThemNhanvienView',
            'kq'=>$this->nv->lophoc_all() 
        ]);
        }
        public function ThemmoiNV(){
            if(isset($_POST['btnLuu'])){
                $mnv=$_POST['txtManv'];
                $tnv=$_POST['txtHoten'];
                $ngs=$_POST['txtNgaysinh'];
                $gt=$_POST['gender'];
                $sdt=$_POST['txtSdt'];
                $dc=$_POST['txtQuequan'];
                $cv=$_POST['ddlChucvu'];
                 $kq1=$this->nv->checktrungMNV($mnv);
                if(!$kq1){
                    $kq=$this->nv->nhanvien_ins($mnv,$tnv,$ngs,$gt,$sdt,$dc,$cv);
                    if($kq){
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemNhanvienView',
                            'kq'=>$this->nv->lophoc_all(),
                            'thongbao'=>'Thêm mới thành công',
                            'manv'=>$mnv,
                            'tennv'=>$tnv,
                            'ngaysinh'=>$ngs,
                            'gioitinh'=>$gt,
                            'diachi'=>$dc,
                            'sdt'=>$sdt,
                            'chucvu'=>$cv
                         ]);
                    }else{
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemNhanvienView',
                            'kq'=>$this->nv->lophoc_all(),
                            'thongbao'=>'Thêm mới thất bại',
                            'manv'=>$mnv,
                            'tennv'=>$tnv,
                            'ngaysinh'=>$ngs,
                            'gioitinh'=>$gt,
                            'diachi'=>$dc,
                            'sdt'=>$sdt,
                            'chucvu'=>$cv
                         ]);
                    }

                }else{
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemNhanvienView',
                        'kq'=>$this->nv->lophoc_all(),
                        'thongbao'=>'Mã Nhân viên đã tồn tại. Vui lòng nhập lại!',
                        'manv'=>$mnv,
                            'tennv'=>$tnv,
                            'ngaysinh'=>$ngs,
                            'gioitinh'=>$gt,
                            'diachi'=>$dc,
                            'sdt'=>$sdt,
                            'chucvu'=>$cv
                     ]);
                }

               
            }
            if(isset($_POST['btnNhaplai'])){
                $this->view('TrangchuLogin',['page'=>'ThemNhanvienView',
                'kq'=>$this->nv->lophoc_all() ]);
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin',['page'=>'DSNhanvienView',
                'kq'=>$this->nv->lophoc_all(),
                'kqtk'=>$this->nv->TimkiemNV('')
            ]);
            }
        }
    }
?>