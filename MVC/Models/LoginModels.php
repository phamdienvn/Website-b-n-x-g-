<?php 
    class LoginModels extends connectDB{
        public function Login($dn,$mk){
            $sql="Select * From quanly where Tendangnhap='$dn' and Matkhau='$mk'";
            return mysqli_query($this->con,$sql);
        }

       
    }
?>