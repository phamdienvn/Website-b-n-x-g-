<?php 
    class DSSinhvienModels extends connectDB{
        public function Sinhvien_ListAll()
        {
            $url = 'http://localhost:3000/sinhvien'; // URL API nganhhoc
            $curl = curl_init($url);
    
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
            $response = curl_exec($curl);
    
            if ($response === false) {
                $error = curl_error($curl);
                // Xử lý lỗi khi gọi API
                echo "Error: " . $error;
                return []; // Trả về một mảng rỗng nếu có lỗi
            }
    
            $data = json_decode($response, true);
            curl_close($curl);;
            // Kiểm tra key 'nganh' tồn tại trong mảng $data
            if (!empty($data)) {
                $data = json_decode($response, true);
                return $data;
                // Trả về mảng dữ liệu lớp học
            } else {
                echo "Không có dữ liệu lớp học";
                return []; // Trả về một mảng rỗng nếu không có dữ liệu
            }
            
        }
        public function lophoc_all(){
            $sql="Select * From sinhvien";
            return mysqli_query($this->con,$sql);
        }

        public function TimkiemSV($timkiem){
            $sql="Select * from sinhvien where Masv like '%$timkiem%'  or Hoten like '%$timkiem%'or Lop like '%$timkiem%'";
            $kq = mysqli_query($this->con,$sql);
            return $kq;
        }
        public function Sinhvien_upd($masv,$tsv,$ngs,$gt,$l,$sdt,$dc){
            $sql="UPDATE sinhvien SET Hoten='$tsv',Ngaysinh='$ngs',
            Gioitinh='$gt',Lop='$l',Sdt='$sdt',Quequan='$dc' 
            WHERE Masv='$masv'";
            return mysqli_query($this->con,$sql);
        }
        public function Sinhvien_xoa($masv){
            $sql="DELETE FROM sinhvien WHERE Masv='$masv'";
            return mysqli_query($this->con,$sql);
        }
    }
?>