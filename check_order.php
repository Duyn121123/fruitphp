<?php
session_start();
ob_start();
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
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
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

  <!-- fruit section -->

  <section class="fruit_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <hr>
        <h2>
         FRESH FRUIT
        </h2>
        <hr>
      </div>
    </div>
    <div class="container-fluid">
      <div class="fruit_container">
      <form method="POST">
        <table class="table table-stripper">
            <?php
              include('control.php');
              $get_data=new data_product();
              if(isset($_GET['or'])){
                $select=$get_data->select_product_id($_GET['or']);
              }
              $select=$get_data->select_order($_SESSION['name'],$_SESSION['PRODUCT']);
              foreach($select as $se)
            ?>
              <tr>
                <td>Tên khách hàng</td>
                <td><?php echo $se['User']?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><?php echo $se['Email']?></td>
              </tr>
              <tr>
                <td>Tên sản phẩm</td>
                <td><?php echo $se['NamePro']?></td>
              </tr>
              <tr>
                <td>Số lượng</td>
                <td><?php echo $se['number']?><td>
              </tr>
              <tr>
                <td>Đơn giá</td>
                <td><?php echo $se['PricePro']?></td>
              </tr>
              <tr>
                <td>Tổng tiền</td>
                <td><?php echo $se['money']?></td>
              </tr>
              <tr>
                <td>Tình trạng giao hàng</td>
                <td><?php echo $se['status_or']?></td>
              </tr>
            <?php
                //}
            ?>
        </table>
      </form>
    </div>
    </div>
  </section>

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



