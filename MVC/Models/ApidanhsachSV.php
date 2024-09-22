<?php
    class ApidanhsachSV{
        private $conn;
        
        public $Masv;
        public $Hoten;
        public $Ngaysinh;
        public $Gioitinh;
        public $Lop;
        public $Sdt;
        public $Quequan;

        public function __construct($db){
            $this->conn=$db;
        }

        public function read(){
            $sql="SELECT * FROM sinhvien   ";
            
            $stmt= $this->conn->prepare($sql);

            $stmt->execute();
            return $stmt;

        }
        public function show(){
            $sql="SELECT * FROM sinhvien WHERE Masv = ? ";
            $stmt= $this->conn->prepare($sql);
            $stmt->bindParam(1,$this->Masv );
            $stmt->execute();
            $row =$stmt->fetch(PDO::FETCH_ASSOC);

           
            $this->Hoten = $row['Hoten'];
            $this->Ngaysinh = $row['Ngaysinh'];
            $this->Gioitinh = $row['Gioitinh'];
            $this->Lop =  $row['Lop'];
            $this->Sdt = $row['Sdt'];
            $this->Quequan = $row['Quequan'];
        }
        public function Timkiem(){
           
           
            $ma= "'%";
            $a="%'";
            
           
            if ($ma) {
                $sql ="SELECT * FROM sinhvien WHERE Masv LIKE '.$ma.' ?  '.$a.'";
                $stmt= $this->conn->prepare($sql);
                $stmt->bindParam(1, $ma);
                $stmt->execute();
                $row =$stmt->fetch(PDO::FETCH_ASSOC);

            
                $this->Hoten = $row['Hoten'];
                $this->Ngaysinh = $row['Ngaysinh'];
                $this->Gioitinh = $row['Gioitinh'];
                $this->Lop =  $row['Lop'];
                $this->Sdt = $row['Sdt'];
                $this->Quequan = $row['Quequan'];
            }
  
        }
        
        public function create(){
            $sql="INSERT INTO sinhvien SET Masv=:Masv, Hoten=:Hoten,Ngaysinh=:Ngaysinh,Gioitinh=:Gioitinh,Lop=:Lop,Sdt=:Sdt,Quequan=:Quequan ";

            $stmt= $this->conn->prepare($sql);

            $this->Masv = htmlspecialchars(strip_tags($this->Masv));
            $this->Hoten = htmlspecialchars(strip_tags($this->Hoten));
            $this->Ngaysinh = htmlspecialchars(strip_tags($this->Ngaysinh));
            $this->Gioitinh = htmlspecialchars(strip_tags($this->Gioitinh));
            $this->Lop = htmlspecialchars(strip_tags($this->Lop));
            $this->Sdt = htmlspecialchars(strip_tags($this->Sdt));
            $this->Quequan = htmlspecialchars(strip_tags($this->Quequan));

            $stmt->bindParam(':Masv',$this->Masv);
            $stmt->bindParam(':Hoten',$this->Hoten);
            $stmt->bindParam(':Ngaysinh',$this->Ngaysinh);
            $stmt->bindParam(':Gioitinh',$this->Gioitinh);
            $stmt->bindParam(':Lop',$this->Lop);
            $stmt->bindParam(':Sdt',$this->Sdt);
            $stmt->bindParam(':Quequan',$this->Quequan);

            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
        return false;
        }


        public function update(){
            $sql="UPDATE  sinhvien SET  Hoten=:Hoten,Ngaysinh=:Ngaysinh,Gioitinh=:Gioitinh,Lop=:Lop,Sdt=:Sdt,Quequan=:Quequan WHERE Masv=:Masv ";

            $stmt= $this->conn->prepare($sql);

            $this->Masv = htmlspecialchars(strip_tags($this->Masv));
            $this->Hoten = htmlspecialchars(strip_tags($this->Hoten));
            $this->Ngaysinh = htmlspecialchars(strip_tags($this->Ngaysinh));
            $this->Gioitinh = htmlspecialchars(strip_tags($this->Gioitinh));
            $this->Lop = htmlspecialchars(strip_tags($this->Lop));
            $this->Sdt = htmlspecialchars(strip_tags($this->Sdt));
            $this->Quequan = htmlspecialchars(strip_tags($this->Quequan));

            $stmt->bindParam(':Masv',$this->Masv);
            $stmt->bindParam(':Hoten',$this->Hoten);
            $stmt->bindParam(':Ngaysinh',$this->Ngaysinh);
            $stmt->bindParam(':Gioitinh',$this->Gioitinh);
            $stmt->bindParam(':Lop',$this->Lop);
            $stmt->bindParam(':Sdt',$this->Sdt);
            $stmt->bindParam(':Quequan',$this->Quequan);

            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
        return false;
        }
        public function delete(){
            $sql="DELETE FROM sinhvien  WHERE Masv=:Masv ";

            $stmt= $this->conn->prepare($sql);

            $this->Masv = htmlspecialchars(strip_tags($this->Masv));
            

            $stmt->bindParam(':Masv',$this->Masv);
           

            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
        return false;
        }
    }

?>