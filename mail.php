<?php
session_start();
?>
<?php
 include("PHPMailer/src/OAuth.php");
 include("PHPMailer/src/Exception.php");
 include("PHPMailer/src/POP3.php");
 include("PHPMailer/src/PHPMailer.php");
 include("PHPMailer/src/SMTP.php");
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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


  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="offset-lg-3 col-md-10 offset-md-1">
          <div class="heading_container">
            <hr>
            <h2>
              Forgot Password
            </h2>
            <hr>
          </div>
        </div>
      </div>

      <div class="layout_padding2-top">
        <div class="row">
          <div class="col-lg-4 offset-lg-4 col-md-5 offset-md-1">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="email" placeholder="Nhập email của bạn" name="txtemail"/>
                  </div>
                  <div>
                    <button type="submit" name="txtsub">
                    Send
                    </button>
                  </div>
                  <div>
                  Register <a href="register.php" >click here </a> or <a href="Login.php">Login</a> 
                  </div>
                </div>
              </div>
            </form>
    

    <?php
       include('control.php');
       $get_data=new data_contact();
       if(isset($_POST['txtsub'])){
        $email = $_POST['txtemail'];
        $select_fruit = $get_data->select_register_ninom_email($email);
        if ($select_fruit) {
          $password = '';
          foreach ($select_fruit as $row) {
            $password = $row['Pass']; 
        }
    $mail= new PHPMailer(true);
    try{
        $mail->SMTPDebug=2;
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth=true;
        $mail->Username='phanduyeen12112003@gmail.com';
        $mail->Password='sauzrsbipapzdiqr';
        $mail->SMTPSecure='tls';
        $mail->Port=587;
        $mail->CharSet='UTF-8';
        $mail->setFrom('phanduyeen12112003@gmail.com');
        $mail->addAddress('phanduyenqh@gmail.com','Duyen');
        $mail->isHTML(true);
        $mail->Subject='Cam on!';
        $mail->Body='Cam on b da quan tam noi dung web';
        $mail->send();
        echo'Email has been sent';

    }
    catch (Exception $e){
       echo 'Mailer Error',
       $mail->ErrorInfo;
    }   
    echo "<script>alert('Gửi thành công');
    window.location='Login.php';
          </script>";
}
else {
                
    echo "Không tìm thấy thông tin với email cung cấp.";
}
}
    ?>
    
    </div>
          
          </div>
        </div>
      </div>
    </section>
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
