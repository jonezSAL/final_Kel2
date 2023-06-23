<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Fast Travel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="images/icons/icons.png" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: #ebebeb;
            font-family: "Open Sans", sans-serif;
        }

        .rekomendasi {
            color: black;
            font-size: 30px;
            /* Ukuran teks yang diinginkan, ganti dengan ukuran yang Anda inginkan */
        }

        .carousel {
            margin: 30px auto 60px;
            padding: 0 80px;
        }

        .carousel .carousel-item {
            text-align: center;
            overflow: hidden;
        }

        .carousel .carousel-item h4 {
            font-family: 'Varela Round', sans-serif;
        }

        .carousel .carousel-item img {
            max-width: 100%;
            display: inline-block;
        }

        .carousel .carousel-item .btn {
            border-radius: 0;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: bold;
            border: none;
            background: #0f172b;
            padding: 6px 15px;
            margin-top: 5px;
        }

        .carousel .carousel-item .btn:hover {
            background: #FEA116;
        }

        .carousel .carousel-item .btn i {
            font-size: 14px;
            font-weight: bold;
            margin-left: 5px;
        }

        .carousel .thumb-wrapper {
            margin: 5px;
            text-align: left;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .carousel .thumb-content {
            padding: 15px;
            font-size: 13px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            height: 44px;
            width: 44px;
            background: none;
            margin: auto 0;
            border-radius: 50%;
            border: 3px solid rgba(0, 0, 0, 0.8);
        }

        .carousel-control-prev i,
        .carousel-control-next i {
            font-size: 36px;
            position: absolute;
            top: 50%;
            display: inline-block;
            margin: -19px 0 0 0;
            z-index: 5;
            left: 0;
            right: 0;
            color: rgba(0, 0, 0, 0.8);
            text-shadow: none;
            font-weight: bold;
        }

        .carousel-control-prev i {
            margin-left: -3px;
        }

        .carousel-control-next i {
            margin-right: -3px;
        }

        .carousel-indicators {
            bottom: -50px;
        }

        .carousel-indicators li,
        .carousel-indicators li.active {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin: 4px;
            border: none;
        }

        .carousel-indicators li {
            background: #ababab;
        }

        .carousel-indicators li.active {
            background: #555;
        }

        .flex-container {
            display: flex;
            flex-wrap: wrap;
        }

        .flex-item {
            flex: 0 0 33.33%;
            padding: 10px;
        }

        .flex-item img {
            width: 100%;
            height: auto;
        }

        .rating {
            display: inline-block;
            font-size: 0;
        }

        .rating-input {
            display: none;
        }

        .rating-star {
            display: inline-block;
            padding: 5px;
            cursor: pointer;
        }

        .rating-star:before {
            content: "\2605";
            font-size: 24px;
            color: #ddd;
        }

        .rating-star:hover:before,
        .rating-star:hover~.rating-star:before,
        .rating-input:checked~.rating-star:before {
            color: #ffca08;
        }

        #description {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
        }

        label[for="description"] {
            font-weight: bold;
        }

        .highlight {
            background-color: #f6f6f6;
            padding: 10px;
            margin-bottom: 10px;
        }

        div.scroll-container {
            background-color: #333;
            overflow: auto;
            white-space: nowrap;
            padding: 10px;
        }

        div.scroll-container img {
            padding: 10px;
        }
    </style>

</head>
<?php
include_once("./admin/helper/connection.php");

if (isset($_GET["ID_Destinasi"])) {
    $IDdestinasi = (int)$_GET["ID_Destinasi"];

    $DetailDestinasi = mysqli_query($connection, "SELECT destinasi.*, detail_destinasi.*, gambar.* 
        FROM destinasi INNER JOIN detail_destinasi ON destinasi.ID_Destinasi = detail_destinasi.ID_Destinasi 
        INNER JOIN gambar ON detail_destinasi.ID_Detail = gambar.ID_Detail 
        WHERE detail_destinasi.ID_Destinasi='$IDdestinasi'");

    if ($DetailDestinasi && mysqli_num_rows($DetailDestinasi) > 0) {
        $row = mysqli_fetch_assoc($DetailDestinasi); // Ambil baris pertama dari hasil query

?>

        <body>
            <div class="container-xxl bg-white p-0">
                <!-- Header Start -->
                <div class="container-fluid bg-dark px-0">
                    <div class="row gx-0">
                        <div class="col-lg-3 bg-dark d-none d-lg-block">
                            <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                                <h1 class="m-0 text-primary text-uppercase">FAST TRAVEL</h1>
                            </a>
                        </div>
                        <div class="col-lg-9">
                            <div class="row gx-0 bg-white d-none d-lg-flex">
                                <div class="col-lg-7 px-5 text-start">
                                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                        <i class="fa fa-envelope text-primary me-2"></i>
                                        <a href="https://mail.google.com/mail/?view=cm&to=Kelompok2@gambel.com" class="mb-0" style="color: black;">Kelompok2@gambel.com</a>
                                    </div>
                                    <div class="h-100 d-inline-flex align-items-center py-2">
                                        <i class="fa fa-phone-alt text-primary me-2"></i>
                                        <a href="https://api.whatsapp.com/send?phone=6280123****" class="mb-0" style="color: black;">+628 0123 ****</a>
                                    </div>
                                </div>
                                <div class="col-lg-5 px-5 text-end">
                                    <div class="d-inline-flex align-items-center py-2">
                                        <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                                        <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                                        <a class="" href=""><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                                <a href="index.php" class="navbar-brand d-block d-lg-none">
                                    <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                                </a>
                                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                    <div class="navbar-nav mr-auto py-0">
                                        <a href="index.php" class="nav-item nav-link">Home</a>
                                        <a href="about.html" class="nav-item nav-link">About</a>
                                        <a href="destinasi.php" class="nav-item nav-link">Destinasi</a>
                                        <a href="Pemesanan.php" class="nav-item nav-link">Booking</a>
                                        <div class="nav-item dropdown">
                                            <a href="destinasi.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tours</a>
                                            <div class="dropdown-menu rounded-0 m-0">
                                                <a href="destinasi.php#wisata_alam" class="dropdown-item">Wisata Alam</a>
                                                <a href="destinasi.php#wisata_petualangan" class="dropdown-item">Wisata Petualangan</a>
                                                <a href="destinasi.php#wisata_pantai" class="dropdown-item">Wisata Pantai</a>
                                                <a href="destinasi.php#wisata_sejarah" class="dropdown-item">Wisata Sejarah</a>
                                                <a href="destinasi.php#wisata_hiburan" class="dropdown-item">Wisata Hiburan</a>
                                                <a href="destinasi.php#wisata_safari" class="dropdown-item">Wisata Safari</a>
                                            </div>
                                        </div>
                                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                                    </div>
                                    <div class=" mx-4">
                                        <a href="admin/login.php" type="button" class="btn btn-outline-warning">LOGIN </a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Header End -->
                <!-- Detail Destinasi -->
                <div class="container text-center mt-5">
                    <h6 class="section-title text-center text-uppercase" style="color: #FEA116">
                        our tours
                    </h6>
                    <h1 class="mb-5">
                        <?php echo $row['Nama_Destinasi'] ?>
                        <br>
                        <span class="text-center text-uppercase" style="color: #FEA116"> <?php echo $row['Lokasi'] ?></span>
                    </h1>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="scroll-container">
                                <?php
                                if ($row && mysqli_num_rows($DetailDestinasi) > 0) {
                                    while ($gambar = mysqli_fetch_array($DetailDestinasi)) {
                                        $gambar_url = $gambar['Nama_File']; // Replace 'Nama_File' with the correct column name
                                        echo '<img src="img/gambar/' . $gambar_url . '" alt="Photo" style="width: 100%; height: 100%;">';
                                    }
                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-md-6" style="text-align: justify;">
                            <div class="form-group">
                                <h5 for="description">Deskripsi :</h5>
                                <p id="description" class="form-control-static"> <?php echo $row['Deskripsi'] ?></p>
                            </div>
                            <hr>
                            <div class="form-group">
                                <h5 for="facilities">Fasilitas :</h5>
                                <p id="facilities">
                                    <?php echo $row['Fasilitas'] ?>
                                </p>
                            </div>
                            <hr>
                            <div class="form-group">
                                <h5 for="harga">Harga :</h5>
                                <p style="color: #FEA116" id="harga"><b>
                                        Rp. <?php echo number_format($row['Harga'], 0, ',', '.'); ?></b>
                                </p>
                            </div>
                            <div class="form-group text-center">
                                <form method="post" action="booking.php">
                                    <input type="hidden" name="ID_Destinasi" value="<?php echo $row['ID_Destinasi']; ?>">
                                    <button type="submit" class="btn btn-primary mt-3 mb-3">Beli Tiket</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
        <?php
    } else {
        echo "Data destinasi tidak ditemukan.";
    }
} else {
    echo "Parameter 'ID' tidak diberikan melalui URL.";
}
        ?>
        <!-- Detail Destinasi End-->
        <h1 class="mt-5 p-3 text-primary text-uppercase" style="background-color: #0f172b; text-align: center;">FAST TRAVEL</h1>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <h3>Beri Rating:</h3>
                    <form action="rating1.php" method="POST">
                        <input type="hidden" name="ID_Destinasi" value="<?php echo $IDdestinasi; ?>">

                        <div class="rating">
                            <input type="radio" class="rating-input" id="star5" name="Rating" value="5" />
                            <label for="star5" class="rating-star"></label>
                            <input type="radio" class="rating-input" id="star4" name="Rating" value="4" />
                            <label for="star4" class="rating-star"></label>
                            <input type="radio" class="rating-input" id="star3" name="Rating" value="3" />
                            <label for="star3" class="rating-star"></label>
                            <input type="radio" class="rating-input" id="star2" name="Rating" value="2" />
                            <label for="star2" class="rating-star"></label>
                            <input type="radio" class="rating-input" id="star1" name="Rating" value="1" />
                            <label for="star1" class="rating-star"></label>
                        </div>

                        <div class="card-text">
                            <label for="nama" class="form-label">Nama:</label>
                            <textarea class="form-control" id="nama" name="Nama_User" rows="3"></textarea>
                        </div>

                        <div class="card-text">
                            <label for="review" class="form-label">Review:</label>
                            <textarea class="form-control" id="review" name="Ulasan" rows="3"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4 mb-3">Submit</button>
                        </div>
                    </form>
                </div>
                </from>
            </div>
            <?php
            include_once("./admin/helper/connection.php");

            if (isset($_GET["ID_Destinasi"])) {
                $IDdestinasi = (int)$_GET["ID_Destinasi"];

                $DetailDestinasi = mysqli_query($connection, "SELECT destinasi.*, detail_destinasi.*, gambar.* 
                FROM destinasi INNER JOIN detail_destinasi ON destinasi.ID_Destinasi = detail_destinasi.ID_Destinasi 
                INNER JOIN gambar ON detail_destinasi.ID_Detail = gambar.ID_Detail 
                WHERE detail_destinasi.ID_Destinasi='$IDdestinasi'");

                if ($DetailDestinasi && mysqli_num_rows($DetailDestinasi) > 0) {
                    $row = mysqli_fetch_assoc($DetailDestinasi); // Ambil baris pertama dari hasil query

                    // Ambil ID_Kategori dari baris yang dipilih
                    $kategori_id = $row['ID_Kategori'];

                    // Menampilkan nama rekomendasi hanya untuk kategori yang sama
                    $nama_destinasi = mysqli_query($connection, "SELECT * FROM destinasi 
                    INNER JOIN kategori_destinasi ON destinasi.ID_Kategori = kategori_destinasi.ID_Kategori 
                    WHERE destinasi.ID_Kategori = $kategori_id");

                    // Menampilkan daftar rekomendasi hanya untuk kategori yang sama
                    $listrekomendasi = mysqli_query($connection, "SELECT * FROM destinasi 
                    INNER JOIN kategori_destinasi ON destinasi.ID_Kategori = kategori_destinasi.ID_Kategori 
                    WHERE destinasi.ID_Kategori = $kategori_id AND destinasi.ID_Destinasi != $IDdestinasi");

                    // Menampilkan komentar sesuai dengan destinasi yang dipilih
                    $komentar_destinasi = mysqli_query($connection, "SELECT * FROM ulasan
                    INNER JOIN detail_destinasi ON ulasan.ID_Detail = detail_destinasi.ID_Detail
                    WHERE detail_destinasi.ID_Destinasi = $IDdestinasi");
                }
            }
            ?>
            <div class="card">
                <div class="row mt-3">

                    <?php
                    if ($komentar_destinasi && mysqli_num_rows($komentar_destinasi) > 0) {
                        while ($komentar = mysqli_fetch_assoc($komentar_destinasi)) {
                    ?>
                            <div class="col-md-4 mt-3">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="far fa-user float-left"></i> <?php echo $komentar['Nama_User']; ?>
                                        <i class="far fa-star float-right"></i> <?php echo $komentar['Rating']; ?>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $komentar['Ulasan']; ?>

                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<p>Tidak ada komentar untuk destinasi ini.</p>";
                    }
                    ?>
                </div>

            </div>

        </div>
        <!-- Destinasi Rekomendasi -->
        <div class="container-xxl py-5">
            <div class="container">
                <?php
                include_once("./admin/helper/connection.php");

                if (isset($_GET["ID_Destinasi"])) {
                    $IDdestinasi = (int)$_GET["ID_Destinasi"];

                    $DetailDestinasi = mysqli_query($connection, "SELECT destinasi.*, detail_destinasi.*, gambar.* 
                        FROM destinasi INNER JOIN detail_destinasi ON destinasi.ID_Destinasi = detail_destinasi.ID_Destinasi 
                        INNER JOIN gambar ON detail_destinasi.ID_Detail = gambar.ID_Detail 
                        WHERE detail_destinasi.ID_Destinasi='$IDdestinasi'");

                    if ($DetailDestinasi && mysqli_num_rows($DetailDestinasi) > 0) {
                        $row = mysqli_fetch_assoc($DetailDestinasi); // Ambil baris pertama dari hasil query

                        // Ambil ID_Kategori dari baris yang dipilih
                        $kategori_id = $row['ID_Kategori'];

                        // Menampilkan nama rekomendasi hanya untuk kategori yang sama
                        $nama_destinasi = mysqli_query($connection, "SELECT * FROM destinasi 
                                INNER JOIN kategori_destinasi ON destinasi.ID_Kategori = kategori_destinasi.ID_Kategori 
                                WHERE destinasi.ID_Kategori = $kategori_id");

                        // Menampilkan daftar rekomendasi hanya untuk kategori yang sama
                        $listrekomendasi = mysqli_query($connection, "SELECT * FROM destinasi 
                                INNER JOIN kategori_destinasi ON destinasi.ID_Kategori = kategori_destinasi.ID_Kategori 
                                WHERE destinasi.ID_Kategori = $kategori_id AND destinasi.ID_Destinasi != $IDdestinasi");
                    }
                }
                ?>
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase mt-5">
                        rekomendasi wisata lainnya
                    </h6>
                    <?php
                    if ($nama_destinasi && mysqli_num_rows($nama_destinasi) > 0) {
                        $kategori = mysqli_fetch_array($nama_destinasi); // Ambil baris pertama dari hasil query
                    ?>
                        <h1 class="mb-5">
                            Explore Our <span class="text-primary"><?php echo $kategori['Nama_Kategori']; ?></span>
                        </h1>
                    <?php
                    }
                    ?>
                </div>
                <div class="row g-4">
                    <?php
                    while ($destinasi = mysqli_fetch_array($listrekomendasi)) {
                    ?>
                        <div class="col-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="room-item shadow rounded overflow-hidden">
                                <div class="position-relative">
                                    <img class="img-fluid" src="img/destinasi/<?php echo $destinasi['Foto']; ?>" style="width: 400px; width: 400px;" alt="" />
                                    <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">Start From Rp. <?php echo number_format($destinasi['Harga'], 0, ',', '.'); ?></small>
                                </div>
                                <div class="p-4 mt-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0"> <?php echo substr($destinasi['Nama_Destinasi'], 0, 15) ?></h5>
                                        <?php echo substr($destinasi['Lokasi'], 0, 13) ?>
                                    </div>
                                    <p class="text-body mb-3"> <?php echo substr($destinasi['Deskripsi'], 0, 80) ?></p>
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="detail_destinasi.php?ID_Destinasi=<?php echo $destinasi['ID_Destinasi']; ?>">View More</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Destinasi Rekomendasi End -->

        <!-- Newsletter Start -->
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4">
                                <span class="text-primary text-uppercase">FINAL PROJEK KELOMPOK 2
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Start -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-primary rounded p-4">
                            <a href="index.php">
                                <h1 class="text-white text-uppercase mb-3">FAST TRAVEL</h1>
                            </a>
                            <p class="text-white mb-0">
                                Download
                                <a class="text-dark fw-medium" href="https://htmlcodex.com/hotel-html-template-pro">Hotelier – Premium
                                    Version</a>, build a professional website for your hotel business and grab
                                the attention of new visitors upon your site’s launch.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">
                            Contact
                        </h6>
                        <p class="mb-2">
                            <i class="fa fa-map-marker-alt me-3"></i>FINAL EDUWORK Kelompok 2
                        </p>
                        <p class="mb-2">
                            <i class="fa fa-phone-alt me-3"></i>+628 0123 ****
                        </p>
                        <p class="mb-2">
                            <i class="fa fa-envelope me-3"></i>Kelompok2@project.com
                        </p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="row gy-5 g-4">
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">
                                    Company
                                </h6>
                                <a class="btn btn-link" href="">About Us</a>
                                <a class="btn btn-link" href="">Contact Us</a>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                &copy; <a class="border-bottom" href="index.html">Fast Travel</a>, All
                                Right Reserved.

                                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                Designed By
                                <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                            </div>
                            <div class="col-md-6 text-center text-md-end">
                                <div class="footer-menu">
                                    <a href="index.php">Home</a>
                                    <a href="">Help</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>
        <!-- Footer End -->

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script>
            function submitRating() {
                const ratingInputs = document.getElementsByClassName("rating-input");
                let selectedRating = "";

                for (let i = 0; i < ratingInputs.length; i++) {
                    if (ratingInputs[i].checked) {
                        selectedRating = ratingInputs[i].value;
                        break;
                    }
                }

                const review = document.getElementById("nama").value;
                const nama = document.getElementById("review").value;

                console.log("Rating yang dipilih:", selectedRating);
                console.log("Review:", review);
                console.log("Nama:", nama);

                const outputElement = document.getElementById("Rating");
                outputElement.innerText = `Rating yang dipilih: ${selectedRating}\nNama: ${review}\nReview: ${nama}`;
            }
        </script>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
            </div>
        </body>

</html>