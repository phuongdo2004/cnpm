<?php
    class Taotaikhoan extends controller{
        private $sv;
        function __construct(){
            $this->sv = $this->model('Sinhvien_m');
        }
        
        function Get_data(){
            $this->view('MasterLayout_QL',[
                'page'=>'Taotaikhoan_v'
            ]);
        }

        function Themmoi(){
            if(isset($_POST['btnDangKy'])){
                $masv=$_POST['txtMaSV'];
                $tensv=$_POST['txtTenSV'];
                $ngaysinh=$_POST['txtNgaySinh'];
                $email=$_POST['txtEmail'];
                $sdt=$_POST['txtSoDienThoai'];

                $checkmasv=$this->sv->CheckMaSV($masv);
                if($checkmasv){
                    echo '<script>alert("Mã sinh viên đã tồn tại!")</script>'; 
                }
                else{
                    $ins=$this->sv->ThemSinhVien($masv,$tensv,$ngaysinh,$email,$sdt);
                    if($ins){
                        echo '<script>alert("Tạo tài khoản sinh viên thành công!")</script>'; 
                    }
                    else{
                        echo '<script>alert("Tạo tài khoản sinh viên thất bại!")</script>'; 
                    }
                }

                $this->view('MasterLayout_QL',[
                    'page'=>'Taotaikhoan_v',
                    'masv'=>$masv,
                    'tensv'=>$tensv,
                    'ngaysinh'=>$ngaysinh,
                    'email'=>$email,
                    'sdt'=>$sdt
                ]);
            }
        }
    }
?>