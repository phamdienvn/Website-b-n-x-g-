<?php 
    class DSNhanvienModels extends connectDB{
        public function lophoc_all(){
            $sql="Select * From quanly";
            return mysqli_query($this->con,$sql);
        }

        public function TimkiemNV($timkiem){
            $sql="Select * from quanly where Manv like '%$timkiem%'  or Hoten like '%$timkiem%'or Chucvu like '%$timkiem%'";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function nhanvien_ins($manv,$tnv,$ngs,$gt,$sdt,$dc,$cv){
            $sql="INSERT INTO `quanly`(`Manv`, `Hoten`, `Ngaysinh`, `Gioitinh`, `Sdt`, `Quequan`, `Chucvu`) VALUES 
            ('$manv','$tnv','$ngs','$gt','$sdt','$dc','$cv')";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function checktrungMNV($manv){
            $sql="SELECT Manv from quanly where Manv='$manv'";
            $ds=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($ds)>0){
                $kq=true;
            }
            return $kq;
        }
        public function Nhanvien_upd($manv,$tnv,$ngs,$gt,$sdt,$dc,$cv){
            $sql="UPDATE quanly SET Hoten='$tnv',Ngaysinh='$ngs',
            Gioitinh='$gt',Sdt='$sdt',Quequan='$dc' ,Chucvu='$cv'
            WHERE Manv='$manv'";
            return mysqli_query($this->con,$sql);
        }
        public function Nhanvien_xoa($manv){
            $sql="DELETE FROM quanly WHERE Manv='$manv'";
            return mysqli_query($this->con,$sql);
        }
    }
?>