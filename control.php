<?php 
include('connect.php');
 class data_product {
    public function select_category(){
        global $conn;
        $sql="Select * from category ";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    public function update_product($name, $number, $pic,$cate,$date,$price,$despro,$id){
        global $conn;
        $sql="update product set NamePro='$name',NumberPro='$number', Picture='$pic',CategoryPro='$cate', DatePro='$date',PricePro='$price',DesPro='$despro' where ID_product='$id'";
        echo $sql;
        $run=mysqli_query($conn,$sql);
        return $run;

    }
    public function delete_pro($id_fruit)
    {
        global $conn;
        $sql="delete from product where ID_product='$id_fruit'";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    public function select_product(){
    global $conn;
    $sql="Select * from product ";
    $run=mysqli_query($conn,$sql);
    return $run;
}
    public function select_product_id($id){
        global $conn;
        $select="select * from product where ID_product=$id ";
        $run=mysqli_query($conn,$select);
        return $run;
    }
  
    public function insert_order($id_pro,$user,$total,$status){
        global $conn;
        $sql="insert into order_pro(ID_product,User,total,status_or) values('$id_pro','$user','$total','$status')";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    public function select_order($name,$id){
        global $conn;
        $se_order="select * from product inner join order_pro on product.ID_product=order_pro.ID_product
                                           inner join register_nimon on order_pro.ID_Register = register_nimon.ID_Register where order_pro.ID_Register='$name' and order_pro.ID_product=$id"; 
        echo $se_order;
         $run=mysqli_query($conn,$se_order);
        return $run;
    }
    public function update_number($id,$numberpro){
        Global $conn;
        $sql="update product set NumberPro = '$numberpro' where ID_product='$id'";
        $run=mysqli_query($conn, $sql);
        return $run;
    }
 }

 class data_contact{
    public function insert_user($fullname,$email,$phone,$mess){
        global $conn;
        $sql="insert into contact(Fullname,Email,Phonenumber,Message) values('$fullname','$email','$phone','$mess')";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    public function insert_register($name,$pass,$email){
        global $conn;
        $sql="insert into register_nimon(User,Pass,Email) values('$name','$pass','$email')";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
 
    public function select_register_id($id){
        global $conn;
        $select="select * from register_nimon where ID_Register=$id ";
        $run=mysqli_query($conn,$select);
        return $run;
    }
    public function select_register(){
        global $conn;
        $select="select * from register_nimon ";
        $run=mysqli_query($conn,$select);
        return $run;
    }

           public function login($name, $pass)
           {
            global $conn;
            $select="select * from register_nimon where User='$name'
            and Pass='$pass'";
            $run=mysqli_query($conn,$select);
                return $run;
           }
           public function select_register_ninom_email($email)
    {
        global $conn;
        $select="select * from register_nimon where Email='$email'";
        $run=mysqli_query($conn,$select);
        return $run;
    }
        // }
          
        
    }

?>
