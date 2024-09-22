<?php 
    class DSNhanvien extends controller{
        public $dsnv;
        public $mnv;
        function  __construct(){
            $this->dsnv=$this->model('DSNhanvienModels');
         }
        function Getdata(){
           $this->view('TrangchuLogin',[
            'page'=>'DSNhanvienView',
            'kq'=>$this->dsnv->lophoc_all(),
            'kqtk'=>$this->dsnv->TimkiemNV(''),
            'tk'=>'',
            
           
           ]);
        }
        function Timkiem(){
            if(isset($_POST['btnTimkiem'])){
            
                $tk=$_POST['txtTimkiem'];
                $kq=$this->dsnv->TimkiemNV($tk);
                $this->view('TrangchuLogin',[
                    'page'=>'DSNhanvienView',
                    'kq'=>$this->dsnv->lophoc_all(),
                    'kqtk'=>$kq,
                    'timkiem'=>$tk
                   
                    
                ]);
            }
            if(isset($_POST['btnXuatex'])){
                $objExcel=new PHPExcel();
                $objExcel->setActiveSheetIndex(0);
                $sheet=$objExcel->getActiveSheet()->setTitle('DSNV');
                $rowCount=1;
                //Tạo tiêu đề cho cột trong excel
                $sheet->setCellValue('A'.$rowCount,'Mã Nhân viên');
                $sheet->setCellValue('B'.$rowCount,'Họ và tên');
                $sheet->setCellValue('C'.$rowCount,'Ngày sinh');
                $sheet->setCellValue('D'.$rowCount,'Giới tính');
                $sheet->setCellValue('E'.$rowCount,'Điện thoại');
                $sheet->setCellValue('F'.$rowCount,'Địa chỉ');
                $sheet->setCellValue('G'.$rowCount,'Chức vụ');
               
                //định dạng cột tiêu đề
                $sheet->getColumnDimension('B')->setAutoSize(true);
                $sheet->getColumnDimension('A')->setAutoSize(true);
                $sheet->getColumnDimension('C')->setAutoSize(true);
                $sheet->getColumnDimension('E')->setAutoSize(true);
                $sheet->getColumnDimension('F')->setAutoSize(true);
                //gán màu nền
                $sheet->getStyle('A1:G1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
                //căn giữa
                $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
                $tk=$_POST['txtTimkiem'];
                $kq=$this->dsnv->TimkiemNV($tk);
                while($row=mysqli_fetch_array($kq)){
                    $rowCount++;
                    $sheet->setCellValue('A'.$rowCount,$row['Manv']);
                    $sheet->setCellValue('B'.$rowCount,$row['Hoten']);
                    $sheet->setCellValue('C'.$rowCount,$row['Ngaysinh']);
                    $sheet->setCellValue('D'.$rowCount,$row['Gioitinh']);
                    $sheet->setCellValue('E'.$rowCount,$row['Sdt']);
                    $sheet->setCellValue('F'.$rowCount,$row['Quequan']);
                    $sheet->setCellValue('G'.$rowCount,$row['Chucvu']);
                }
                //Kẻ bảng 
                $styleAray=array(
                    'borders'=>array(
                        'allborders'=>array(
                            'style'=>PHPExcel_Style_Border::BORDER_THIN
                        )
                    )
                    );
                $sheet->getStyle('A1:'.'G'.($rowCount))->applyFromArray($styleAray);
                $objWriter=new PHPExcel_Writer_Excel2007($objExcel);
                $fileName='DanhsachNV.xlsx';
                $objWriter->save($fileName);
                header('Content-Disposition: attachment; filename="'.$fileName.'"');
                header('Content-Type: application/vnd.openxlmformatsofficedocument.speadsheetml.sheet');
                header('Content-Length: '.filesize($fileName));
                header('Content-Transfer-Encoding:binary');
                header('Cache-Control: must-revalidate');
                header('Pragma: no-cache');
                readfile($fileName);
    
            }
            if(isset($_POST['btnUpdeteex'])){
                $this->view('TrangchuLogin',[
                    'page'=>'DSNhanvienFileView',
                ]);
            }
        }
        function suanhanvien($mnv){
            $_SESSION['Manv']=$mnv;
            $this->view('TrangchuLogin',[
                'page'=>'SuaNhanvienView',
                'result'=>$this->dsnv->Lophoc_All(),
                'thongbao'=>'',
                'kqtk'=>$this->dsnv->TimkiemNV($mnv)
            ]);
        }
        // function themsinhvien(){
          
        //     $this->view('TrangchuLogin',[
        //         'page'=>'ThemSinhvienView'
                
        //     ]);
        // }
        function Sua_nhanvien(){
            if(isset($_POST['btnLuu'])){
               $mnv=$_POST['txtManv'];
               $tnv=$_POST['txtHoten'];
               $ngs=$_POST['txtNgaysinh'];
               $gt=$_POST['gender'];
               $sdt=$_POST['txtSdt'];
               $dc=$_POST['txtQuequan'];
               $cv=$_POST['ddlChucvu'];
               $kq=$this->dsnv->Nhanvien_upd($mnv,$tnv,$ngs,$gt,$sdt,$dc,$cv);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'SuaNhanvienView',
                    'result'=>$this->dsnv->Lophoc_All(),
                    'thongbao'=>'Sửa thành công',
                    'kqtk'=>$this->dsnv->TimkiemNV($mnv)
                ]);
               }
               else{
                $this->view('TrangchuLogin',[
                    'page'=>'SuaNhanvienView',
                    'result'=>$this->dsnv->Lophoc_All(),
                    'thongbao'=>'Sửa thất bại',
                    'kqtk'=>$this->dsnv->TimkiemNV($mnv)
                ]);
               }
            }
            if(isset($_POST['btnDanhsach'])){
                $this->view('TrangchuLogin',[
                    'page'=>'DSNhanvienView',
                    'kq'=>$this->dsnv->lophoc_all(),
                    'kqtk'=>$this->dsnv->TimkiemNV('')
                   ]);
            }
        }
        function Xoa_nhanvien($mnv){
            
               $kq1=$this->dsnv->TimkiemNV('');
               $kq=$this->dsnv->Nhanvien_xoa($mnv);
               if($kq){
                $this->view('TrangchuLogin',[
                    'page'=>'DSNhanvienView',
                    'result'=>$this->dsnv->Lophoc_All(),
                    'kqtk'=>$kq1
                ]);
               }
            }
    }
?>