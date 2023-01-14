<!-- panggil config -->
<?php require "../../../config/config.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="../../../assets/css/dashboard_style.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/021b758c3a.js" crossorigin="anonymous"></script>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- sidebar -->
    <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">LSP TELEMATIKA</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard_admin.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="list_asesor.php">
            <i class="fa-solid fa-chalkboard-user"></i>
            <span class="links_name">Asesor</span>
          </a>
        </li>
        <li>
          <a href="list_asesi.php">
            <i class="fa-solid fa-users"></i>
            <span class="links_name">Asesi</span>
          </a>
        </li>
        <li>
          <a href="list_skema.php">
          <i class="fa-solid fa-folder-open"></i>
            <span class="links_name">Skema</span>
          </a>
        </li>
        <li>
          <a href="lsp_graph.php">
            <i class="fa-solid fa-chart-pie"></i>
            <span class="links_name">Graph</span>
          </a>
        </li>
        <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>

    <section class="home-section">
        <!-- navigation -->
        <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Data Asesor</span>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search...">
            <i class='bx bx-search' ></i>
        </div>
        <div class="profile-details">
            <span class="admin_name">Prem Shahi</span>
            <i class='bx bx-chevron-down' ></i>
        </div>
        </nav>

        <div class="home-content">
            <div class="container" style="padding-bottom: 50px;">
            <div style="color: red;">
              <?php
                //ambil id schema
                if($_GET['id_schema'] == null) {
                  header("location: list_skema.php");
                }

                //ambil data schema
                $id_schema = $_GET['id_schema']; 
                $script = "SELECT * FROM certification_schema WHERE id_schema$id_schema = $id_schema"; 
                $query = mysqli_query($conn, $script); 
                $data = mysqli_fetch_array($query); 

                //inisialisasi data
                $assessor_name = $_POST['assessor_name'];
                $birth_place = $_POST['birth_place'];
                $birth_date = $_POST['birth_date'];
                $nik_number = $_POST['nik_number'];
                $gender = $_POST['gender'];
                $nationality = $_POST['nationality'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $phone_number = $_POST['phone_number'];
                $education_level = $_POST['education_level'];
                $bnsp_reg_num = $_POST['bnsp_reg_num'];
                $exp_date_sertificate = $_POST['exp_date_sertificate'];
                $institutional_name = $_POST['institutional_name'];
                $id_schema = $_POST['id_schema'];

                //foto asesor
                $file_tmp= $_FILES['assessor_photo']['tmp_name'];
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION); 
                $data = file_get_contents($file_tmp); 
                $assessor_photo='data:assets/img/' . $type.';base64,'. base64_encode($data);
            
                // Insert data into the database
                $sql = "INSERT INTO data_asesor (assessor_name, tempat_lahir, birth_date, nik_number, gender, nationality, address, email, phone_number, education_level, 
                bnsp_reg_num, exp_date_sertificate, institutional_name, id_schema, assessor_photo)
                VALUES ('$assessor_name', '$birth_place', '$birth_date', '$nik_number', '$gender', '$nationality', '$address', '$email', '$phone_number', '$education_level', '$bnsp_reg_num', '$exp_date_sertificate', 
                '$institutional_name', '$id_schema', 'assessor_photo')";
                $result = mysqli_query($conn, $sql);
              ?>
            </div>
            <h1 class="text-center">Tambah Data Asesor</h1>
            <form action="submit-data-asesor.php" method="post">
              <center><h4>Data Skema</h4></center>
              <center><h4>Data Asesor</h4></center>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="assessor_name" required>
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <select class="form-control" name="birth_place">
                        <option value="">-- Pilih Kota --</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Surabaya">Surabaya</option>
                        <option value="Medan">Medan</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Bekasi">Bekasi</option>
                        <option value="Tangerang">Tangerang</option>
                        <option value="Depok">Depok</option>
                        <option value="Semarang">Semarang</option>
                        <option value="Palembang">Palembang</option>
                        <option value="Makassar">Makassar</option>
                        <option value="Bogor">Bogor</option>
                        <option value="Denpasar">Denpasar</option>
                        <option value="Malang">Malang</option>
                        <option value="Yogyakarta">Yogyakarta</option>
                        <option value="Surakarta">Surakarta</option>
                        <option value="Padang">Padang</option>
                        <option value="Pekanbaru">Pekanbaru</option>
                        <option value="Bandar Lampung">Bandar Lampung</option>
                        <option value="Samarinda">Samarinda</option>
                        <option value="Cirebon">Cirebon</option>
                        <option value="Banjarmasin">Banjarmasin</option>
                        <option value="Manado">Manado</option>
                        <option value="Batam">Batam</option>
                        <option value="Balikpapan">Balikpapan</option>
                        <option value="Pontianak">Pontianak</option>
                        <option value="Ujung Pandang">Ujung Pandang</option>
                        <option value="Ambon">Ambon</option>
                        <option value="Jayapura">Jayapura</option>
                        <option value="Mataram">Mataram</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="birth_date" required>
                </div>
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" class="form-control" placeholder="No. NIK" name="nik_number" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="Laki-laki" required>
                        <label class="form-check-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan" required>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Kebangsaan</label>
                    <select class="form-control" name="nationality">
                        <option value="">-- Pilih Kebangsaan --</option>
                        <option value="WNI">WNI</option>
                        <option value="WNA">WNA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" placeholder="Alamat lengkap sesuai KTP" name="address" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Email Pribadi" name="email" required>
                </div>
                <div class="form-group">
                    <label>No. Telp</label>
                    <input type="text" class="form-control" placeholder="Nomor Hp yg aktif" name="phone_number" required>
                </div>
                <div class="form-group">
                    <label>Pendidikan Terakhir</label>
                    <select class="form-control" name="education_level">
                        <option value="">-- Pilih Pendidikan Terakhir --</option>
                        <option value="S3">S3</option>
                        <option value="S2">S2</option>
                        <option value="S1">S1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nomor Register BNSP</label>
                    <input type="text" class="form-control" placeholder="No. Reg BNSP" name="bnsp_reg_num" required>
                </div>
                <div class="form-group">
                    <label>Masa Berlaku Sertifikat Asesor</label>
                    <input type="date" class="form-control" name="exp_date_sertificate" required>
                </div>
                <div class="form-group">
                    <label>Nama Lembaga/Perusahaan</label>
                    <input type="text" class="form-control" placeholder="Nama perusahaan tempat kerja" name="institutional_name" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </section>

    <!-- script -->
    <script src="../../../assets/js/script.js"></script>
</body>
</html>