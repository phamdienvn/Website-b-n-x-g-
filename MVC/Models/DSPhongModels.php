<?php 
    class DSPhongModels extends connectDB{
        public function lophoc_all(){
            $sql="Select * From phong";
            return mysqli_query($this->con,$sql);
        }

        public function TimkiemSV($timkiem){
            $sql="Select * from phong where Maphong like '%$timkiem%'  or Loaiphong like '%$timkiem%'or Giaphong like '%$timkiem%'";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function phong_ins($map,$lp,$gp,$ht,$td,$tt,$mt){
            $sql="INSERT INTO `phong`(`Maphong`, `Loaiphong`, `Giaphong`, `Tinhtrang`, `Songuoio`, `Soluongtd`, `Mota`) VALUES 
            ('$map','$lp','$gp','$tt','$ht','$td','$mt')";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function checktrungMP($map){
            $sql="SELECT Maphong from phong where Maphong='$map'";
            $ds=mysqli_query($this->con,$sql);
            $kq=false;
            if(mysqli_num_rows($ds)>0){
                $kq=true;
            }
            return $kq;
        }
        public function Phong_upd($map,$lp,$gp,$ht,$td,$tt,$mt){
            $sql="UPDATE phong SET Loaiphong='$lp',Giaphong='$gp',
            Tinhtrang='$tt',Songuoio='$ht',Soluongtd='$td',Mota='$mt' 
            WHERE Maphong='$map'";
            return mysqli_query($this->con,$sql);
        }
        public function Phong_xoa($map){
            $sql="DELETE FROM phong WHERE Maphong='$map'";
            return mysqli_query($this->con,$sql);
        }
    }
?>