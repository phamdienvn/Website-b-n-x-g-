<?php 
    class ThemSinhvien extends controller{
        public $hd;
      
        public function __construct(){
            $this -> hd=$this->model('DSSinhvienModels');
        }
        public function Getdata(){
            //tham số page gọi đến trang bằng cách =>
            $this->view('TrangchuLogin',[
                'page'=>'ThemSinhvienView',
            // 'kq'=>$this->hd->phong_all(),
            // 'kq1'=>$this->hd->lophoc_all() ,
            // 'kq2'=>$this->hd->hopdong_all() ,
        ]);
        }
        public function ThemmoiSinhvien(){
            
          
            if(isset($_POST['btnThemmoi'])){
                $masv=$_POST['txtMasv'];
                $tsv=$_POST['txtHoten'];
                $ngs=$_POST['txtNgaysinh'];
                $gt=$_POST['gender'];
                $l=$_POST['txtLop'];
                $sdt=$_POST['txtSdt'];
                $dc=$_POST['txtQuequan'];
                $today = date("Y-m-d");
                $another_date = $ngs;
                $kq1=$this->hd->checktrungMSV($masv);
                if(empty($masv)&& empty($tsv)&&empty($ngs)&&empty($l)&&empty($sdt)&&empty($dc)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemSinhvienView',
                        'thongbao'=>'Bạn chưa nhập thông tin. Vui lòng nhập lại!',
                        'masv'=>$masv,
                        'tsv'=>$tsv,
                        'ngs'=>$ngs,
                        'gt'=>$gt,
                        'l'=>$l,
                        'sdt'=>$sdt,
                        'dc'=>$dc,
                        
                     ]);
                }else if(empty($masv)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemSinhvienView',
                        'thongbao'=>'Bạn chưa chon mã sinh viên. Vui lòng chọn!',
                        'masv'=>$masv,
                        'tsv'=>$tsv,
                        'ngs'=>$ngs,
                        'gt'=>$gt,
                        'l'=>$l,
                        'sdt'=>$sdt,
                        'dc'=>$dc,
                     ]);
                }elseif(empty($tsv)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemSinhvienView',
                        'thongbao'=>'Bạn chưa nhập tên sinh viên. Vui lòng nhập!',
                        'masv'=>$masv,
                        'tsv'=>$tsv,
                        'ngs'=>$ngs,
                        'gt'=>$gt,
                        'l'=>$l,
                        'sdt'=>$sdt,
                        'dc'=>$dc,
                     ]);
                }elseif(empty($ngs)){
                    $today = date("Y-m-d");
                    $another_date = $ngs;
                    if (strtotime($today) < strtotime($another_date)) {
                     $thongbao=true;
                    }

                    
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemSinhvienView',
                        'thongbao'=>'Bạn chưa nhập ngày sinh. Vui lòng nhập!',
                        'masv'=>$masv,
                        'tsv'=>$tsv,
                        'ngs'=>$ngs,
                        'gt'=>$gt,
                        'l'=>$l,
                        'sdt'=>$sdt,
                        'dc'=>$dc,
                     ]);
                } elseif(empty($l)){
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemSinhvienView',
                        'thongbao'=>'Bạn chưa nhập số điện thoại. Vui lòng nhập!',
                        'masv'=>$masv,
                        'tsv'=>$tsv,
                        'ngs'=>$ngs,
                        'gt'=>$gt,
                        'l'=>$l,
                        'sdt'=>$sdt,
                        'dc'=>$dc,
                     ]);
                    } elseif(empty($sdt)){
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemSinhvienView',
                            'thongbao'=>'Bạn chưa nhập số điện thoại. Vui lòng nhập!',
                            'masv'=>$masv,
                            'tsv'=>$tsv,
                            'ngs'=>$ngs,
                            'gt'=>$gt,
                            'l'=>$l,
                            'sdt'=>$sdt,
                            'dc'=>$dc,
                         ]);    
                }else if(empty($dc))
                {
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemSinhvienView',
                        'thongbao'=>'Bạn chưa nhập quê quán. Vui lòng nhập!',
                        'masv'=>$masv,
                        'tsv'=>$tsv,
                        'ngs'=>$ngs,
                        'gt'=>$gt,
                        'l'=>$l,
                        'sdt'=>$sdt,
                        'dc'=>$dc,
                     ]);
                }elseif (strtotime($today) < strtotime($another_date)) {
                    
                     $this->view('TrangchuLogin',[
                        'page'=>'ThemSinhvienView',
                        'thongbao'=>'Nhập ngày tháng ko được lớn hơn ngày hiện tại. Vui lòng nhập!',
                        'masv'=>$masv,
                        'tsv'=>$tsv,
                        'ngs'=>$ngs,
                        'gt'=>$gt,
                        'l'=>$l,
                        'sdt'=>$sdt,
                        'dc'=>$dc,
                    ]);
                    }elseif(!$kq1){
                    $kq=$this->hd-> sinhvien_ins($masv,$tsv,$ngs,$gt,$l,$sdt,$dc);
                    if($kq){
                        
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemSinhvienView',
                            'thongbao'=>'Thêm mới thành công',
                            'masv'=>$masv,
                            'tsv'=>$tsv,
                            'ngs'=>$ngs,
                            'gt'=>$gt,
                            'l'=>$l,
                            'sdt'=>$sdt,
                            'dc'=>$dc,
                            
                         ]);
                    }else{
                        $this->view('TrangchuLogin',[
                            'page'=>'ThemSinhvienView',
                            'thongbao'=>'Thêm mới thất bại',
                            'masv'=>$masv,
                            'tsv'=>$tsv,
                            'ngs'=>$ngs,
                            'gt'=>$gt,
                            'l'=>$l,
                            'sdt'=>$sdt,
                            'dc'=>$dc,
                         ]);
                    }

                }else{
                    $this->view('TrangchuLogin',[
                        'page'=>'ThemSinhvienView',
                        'thongbao'=>'Mã sinh viên đã tồn tại. Vui lòng nhập lại!',
                        'masv'=>$masv,
                            'tsv'=>$tsv,
                            'ngs'=>$ngs,
                            'gt'=>$gt,
                            'l'=>$l,
                            'sdt'=>$sdt,
                            'dc'=>$dc,
                     ]);
                }

               
            }
            if(isset($_POST['btnNhaplai'])){
                $this->view('TrangchuLogin',[
                    'page'=>'ThemSinhvienView',
             
                 ]);
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin', [
                    'page'=>'DSSinhvienView',
                    'kq'=>$this->hd->lophoc_all(),
                    'kqtk'=>$this->hd->TimkiemSV(''),
                    'tk'=>'',
            ]);
            }
        }
    }
?>