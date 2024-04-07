<?php session_start();
ob_start();?>
<!DOCTYPE html>
<html>

<head>
  
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Ninom</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <div class="brand_box">
      <a class="navbar-brand" href="index.html">
        <span>
          Ninom
        </span>
      </a>
    </div>
    <!-- end header section -->
  </div>

  <!-- nav section -->

  <section class="nav_section">
    <div class="container">
      <div class="custom_nav2">
        <nav class="navbar navbar-expand custom_nav-container ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
              <li class="nav-item active">
                  <a class="nav-link" href="index123.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="fruit.php">Our Fruit </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="testimonial.php">Testimonial</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                <?php
               
                if(isset($_SESSION['name'])): ?>
                <li class="nav-item">
                    <span class="nav-link">Xin chào, <?php echo$_SESSION['name'];?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php endif; ?>
        </ul>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </section>

  <!-- end nav section -->

  <!-- fruit section -->

  <section class="fruit_section layout_padding">
    <div class="container">
      <div class="heading_container">
      <?php
 include('control.php');// Chèn lại control
 $getdata=new data_product();//gọi lớp 
 $select=$getdata->select_product_id($_GET['or']);
?>
      <form action="" method="POST" enctype="multipart/form-data">
      <div class="contact_form-container">
    <table class="table table-stripper"> 
      <thead>
        <tr>
          <td>Tên hàng</td>
          <td>Hình ảnh</td>
          <td>Đơn giá</td>
          <td colspan="3">Số lượng(Nhập số lượng bạn muốn mua)</th>
          <td></td>
          
        </tr>
      <?php
      foreach($select as $se_fruit)
      
      ?>
      <tr>
      <td><?php echo $se_fruit['NamePro']?></td>
      <td><img src="../Admin/advance-admin/upload/<?php echo $se_fruit['Picture']?>" style ="width:30%; height:30%" alt=""></td>
        <td><?php echo $se_fruit['PricePro']?>.000đ/kg</td>
        <td><input type="number" name="txtnumber" width="10px" value="<?php echo isset($_POST['txtnumber']) ? $_POST['txtnumber'] : '' ?>" placeholder="1">
            </br>   <?php echo "Số lượng tối đa có: ".$se_fruit['NumberPro']?>
            </td>
      
        <td><input type="submit" name="txtup" value="Update"></td>
        <td><input type="submit" name="txtdel" value="Delete">
        <?php
        
        if(isset($_POST['txtdel'])){
            header('location:fruit.php');
        }
        ?>
</td>
<td></td>
</tr>
<tr>
    <td colspan="3" >Tổng tiền:
    <?php
    $total=0;
    if(isset($_POST['txtup'])){
        if($_POST['txtnumber']<=0) echo "<script> alert('Bạn không được nhập số âm'</script>)";
    else{
        if($_POST['txtnumber']>$se_fruit['NumberPro'])
        echo "Bạn chọ quá số lượng cho phép";
      else{
        $total= intval($_POST['txtnumber']) * intval($se_fruit['PricePro']);
        echo $total.".000đ";
        
      }
    }
    
    }
    
    
    ?>
    </td>
  
</tr>
<tr>
  <td colspan="3"></td>
  <td><input type="submit" name="txtsub" value="Xác nhận"></td>
</tr>
    </table>
    </div>
    
   
    
  </form>
    <?php
  if(isset($_POST['txtsub'])){
    if($se_fruit['NumberPro']==0)
    echo"<script> alert('Sản phẩm bạn chọn mua đã hết. Bạn vui lòng chọn sản phẩm khác')";
  else{
    if(empty($_POST['txtnumber'])) echo"<script>alert('Bạn chưa nhập số lượng')</script>";
    else{
      if(empty($_SESSION['name']))
      {
        echo"<script> if(confirm('Bạn phải đăng nhập để thực hiện đặt hàng')) windown.location='Login.php';</script>";
      }
      else{
        if($_POST['txtnumber']>$se_fruit['NumberPro'])
        echo"<script>alert('Số lượng không đủ, bạn vui lòng chọn lại')</script>";
      else{
         $_SESSION['PRODUCT']= $se_fruit['ID_product'];
         $number_total = intval($se_fruit['NumberPro']) - intval($_POST['txtnumber']);
         $update=$getdata->update_number($number_total,$se_fruit['ID_product']);
         $insert=$getdata->insert_order($_GET['or'],
          $se_fruit['NamePro'],
         $_SESSION['name'],
         $_POST['txtnumber'],
         $se_fruit['PricePro'] * $_POST['txtnumber'],0
      );
      if($insert) {
        echo "<script>window.location.href = 'check_order.php';</script>";
      }
      else echo "Không thành công";
      }
      }
    }
  }
  }
?>
  </section>

  <!-- end fruit section -->


  <!-- info section -->

  <section class="info_section layout_padding">
    <div class="container">
      <div class="info_logo">
        <h2>
          NiNom
        </h2>
      </div>
      <div class="info_contact">
        <div class="row">
          <div class="col-md-4">
            <a href="">
              <img src="images/location.png" alt="">
              <span>
                Passages of Lorem Ipsum available
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/call.png" alt="">
              <span>
                Call : +012334567890
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/mail.png" alt="">
              <span>
                demo@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
            <form action="">
              <input type="text" placeholder="Enter your email">
              <button>
                subscribe
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="info_social">
            <div>
              <a href="">
                <img src="images/facebook-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/twitter-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
 
</body>

</html>