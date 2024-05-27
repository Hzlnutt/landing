<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "preserve";

$conn = mysqli_connect($servername, $username, $password, $dbname);

session_start();




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Preserve</title>
    <link rel = stylesheet href= user_page.css></link>

            <!-- icons (boxicons)-->
            <link rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
        <!-- icons (remixicons)-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    
        <!-- google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
        <!--font awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <script src="https://kit.fontawesome.com/fa00c87e2e.js" crossorigin="anonymous"></script>

        <!-- font Epilogue -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <a href="#" class="logo">PRESERVE</a>
        <ul class="navlist">
          <li><a href="#home">Home</a></li>
          <li><a href="#poin">Wisata</a></li>
          <li><a href="#Keunggulan">Keunggulan</a></li>
          <li><a href="tour_list_admin.php">Tiket Saya</a></li>
          <li><a href="admin_panel.php"><i>Admin Panel</i></a></li>
          <li><a href="logout.php">Logout</a></li>
          <li><h4> Halo Admin, <?php echo $_SESSION['username'];?> </li>
        </ul>
      <div class="bx bx-menu" id="menu-icon"></div> 
      </header>

      <section class = "tulisan_landing" >
        <h1>Booking tiket anda sekarang</h1>
        <h5><i>semoga liburan anda menyenangkan</i></h5>
          </section>


      <section class="poin" id="poin">



        <div class="content">
          <div class="title"><span><h1>Paket Wisata</h1></span></div>
          <div class="boxes">
            <div class="box">
              <div class="icon">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="topic" id = "Tour_1">Tour 1</div>
              <p class="text-height">Tour mengunjungi italia di roma dan melihat bangunan menara pisa yang miring!
              </p>
              <a href = "Tour1.php">
              <button class = "tombol_booking">Booking Sekarang</button>
                </a>
            </div>
            <div class="box">
              <div class="icon">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="topic" id = "Tour_2">Tour 2</div>
              <p class="text-height">Tour mengunjungi Menara Eiffel di Paris dan melihat keindahannya!
              </p>
              <a href = "Tour2.php">
              <button class = "tombol_booking">Booking Sekarang</button>
                </a>
            </div>
            <div class="box">
              <div class="icon">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="topic" id = "Tour_3">Tour 3</div>
              <p class="text-height">Tour mengunjungi raja ampat dan melihat keindahannya
              </p>
              <a href = "Tour3.php">
              <button class = "tombol_booking">Booking Sekarang</button>
                </a>
            </div>
            <div class="box">
              <div class="icon">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="topic" id = "Tour_4">Tour 4</div>
              <p class="text-height">Tour mengunjungi Jogja untuk melihat candi Borobudur dan Prambanan!
              </p>
              <a href = "Tour4.php">
              <button class = "tombol_booking">Booking Sekarang</button>
                </a>
            </div>
            <div class="box">
              <div class="icon" id = "Tour_5">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="topic">Tour 5</div>
              <p class="text-height">Tour mengunjungi Piramida di Mesir yang tinggi dan Menakjubkan!
              </p>
              <a href = "Tour5.php">
              <button class = "tombol_booking">Booking Sekarang</button>
                </a>
            </div>
            <div class="box">
              <div class="icon" id = "Tour_6">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="topic">Tour 6</div>
              <p class="text-height">Tour mengunjungi Pantai Kuta di Bali yang ramai dan melihat pulau pulau yang indah!
              </p>
              <a href = "Tour6.php">
              <button class = "tombol_booking">Booking Sekarang</button>
                </a>
            </div>

             
          </div>
        </div>


      <section class = "Keunggulan" id = "Keunggulan">

      <div class="h1-keunggulan">


      <h1> Why Us? </h1>

        </div>

    <section class = "why_us_box">


      <div class = "why_us_content">
        <h1>Karena Kami selalu mencoba menyediakan layanan yang terbaik untuk customer kami dan kami masih mencoba untuk memberi harga yang murah dan juga layanan booking yang cepat agar pelanggan kami puas dan juga membuat tampilan website yang bagus agar disukai oleh banyak orang</h1>

      </div>


      </section>
      

        </section>
        


          <footer class = "footer">
    <h1>&copy; 2024 Preserve.web . All rights reserved.</h1>

  </footer>



      </section>



  </body>
</html>
</body>
</html>
