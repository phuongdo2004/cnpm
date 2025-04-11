<?php 
    class TrangChu extends controller{
        function Get_data(){
            $this->view('MasterLayout_QL',[
                'page'=>'TrangChu_v'
            ]);
        }
    }
?>