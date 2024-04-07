<?php
session_start();
?>
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
      <a class="navbar-brand" href="index.php">
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
                <?php if(isset($_SESSION['name'])): ?>
                    <li class="nav-item">
                        <span class="nav-link">Xin chào, <?php echo $_SESSION['name']; ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Login</a>
                    </li>
                <?php endif; ?>
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


  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="offset-lg-3 col-md-10 offset-md-1">
          <div class="heading_container">
            <hr>
            <h2>
              INSERT-FRUIT
            </h2>
            <hr>
          </div>
        </div>
      </div>

      <div class="layout_padding2-top">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-5 offset-md-1">

          <?php
              include "control.php"; 
              $get_data = new data_product(); 

              if(isset($_GET['up'])) {
              $update = $get_data->select_product_id($_GET['up']); 
              foreach ($update as $i_pr) {
          ?>          
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="contact_form-container">
                <div>
                  <div>
                  <label>NAME PRODUCT</label>
                    <input type="text" name="txtNP" value="<?php echo $i_pr['NamePro']?>" >
                     </div>
                  
                  <div>
                  <label>NUMBER PRODUCT</label>
                    <input type="text" name="txtNUP" value="<?php echo $i_pr['NumberPro']?>" >
    
                  </div>
                  <div>
                  <label>PICTURE PRODUCT</label>
                    <input type="file" name="txtPIP" value="<?php echo $i_pr['Picture']?>" ></div>
                  </div>
                  <div>
                  <label>CATEGORY PRODUCT</label>
                         <select name="txtCP">
                                                <option value="<?php echo $i_pr['CategoryPro'];?>"><?php echo $i_pr['CategoryPro'];?></option>
                                                <?php
                                                 
                                                 $se_cate=$get_data->select_category();
                                                 foreach ($se_cate as $i_cate) {
                                                ?>
                                                <option value="<?php echo $i_cate['NameCatye']?>">
                                                    <?php echo $i_cate['NameCatye']?>
                                                </option>
                                                    <?php
                                                 }
                                                ?>
                  </div>
                  <div>
                  <label>DATE PRODUCT</label>
                    <input type="date" name="txtDP" value="<?php echo $i_pr['DatePro']?>" >
                  </div>
                  <div> <label>PRICE PRODUCT</label>
                                            <input type="text" name="txtPP" value="<?php echo $i_pr['PricePro']?>" ></div>
                  <div>
                  <label>DESCRIPTION PRODUCT</label>
                                            <textarea rows="3" name="txtDEP" value="<?php echo $i_pr['DesPro']?>" ></textarea>
                    <button type="submit" name="txtsub">
                      Send
                    </button>
                  </div>
                </div>
              </div>
            </form>
        
  <?php
    }
}
    
    if(isset($_POST['txtsub'])){// kiểm tra nút đăng ký đã ấn hay chưa
        $up=$get_data->update_product(
       
        $_POST['txtNP'],
        $_POST['txtNUP'],
        $_FILES['txtPIP']['name'],
        $_POST['txtCP'],
        $_POST['txtDP'],
        $_POST['txtPP'],
        $_POST['txtDEP'],
        $_GET['up']
    );
        
        if($up) { 
            echo"<script> alert('Thanh cong');
        window.location='order_select.php';
        </script>";
         
    }
        else echo"<script>alert('Khong thuc thi duoc')</script>";

    }
    ?>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->


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