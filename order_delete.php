<?php
        include "control.php";//goi trang
        $get_data=new data_product();//goi class
        $del=$get_data->delete_pro($_GET['del']);
        if($del) echo "<script> alert('fineshed')
                        window.location='order_select.php';
        </script>";
        else echo"<script> alert('NOT finish')
            </script>";
    ?>