<?php require "../../../config/config.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Skema</title>
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
    <div class="container">
        <h1 class="text-center">View Detail Asesor</h1>
        <table class="table table-bordered">
            <tbody>
                <?php
                
                // Retrieve data from the database
                $sql = "SELECT * FROM assessor WHERE nik_number='".$_GET['nik_number']."'";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo 
                        "<tr>
                        <th>Nama Lengkap</th>
                        <td>".$row["assessor_name"]."</td>
                        </tr>
                        <tr>
                        <th>Nama Lengkap</th>
                        <td>".$row["assessor_photo"]."</td>
                        </tr>
                        <tr>
                        <th>Tempat Lahir</th>
                        <td>".$row["birth_place"]."</td>
                        </tr>
                        <tr>
                        <th>Tanggal Lahir</th>
                        <td>".$row["birth_date"]."</td>
                        </tr>
                        <tr>
                        <th>NIK</th>
                        <td>".$row["nik_number"]."</td>
                        </tr>
                        <tr>
                        <th>Jenis Kelamin</th>
                        <td>".$row["gender"]."</td>
                        </tr>
                        <tr>
                        <th>Kebangsaan</th>
                        <td>".$row["nationality"]."</td>
                        </tr>
                        <tr>
                        <th>Alamat</th>
                        <td>".$row["address"]."</td>
                        </tr>
                        <tr>
                        <th>Email</th>
                        <td>".$row["email"]."</td>
                        </tr>
                        <tr>
                        <th>No. Telp</th>
                        <td>".$row["phone_number"]."</td>
                        </tr>
                        <tr>
                        <th>Pendidikan Terakhir</th>
                        <td>".$row["education_level"]."</td>
                        </tr>
                        <tr>
                        <th>Nomor Register BNSP</th>
                        <td>".$row["bnsp_reg_num"]."</td>
                        </tr>
                        <tr>
                        <th>Masa Berlaku Sertifikat Asesor</th>
                        <td>".$row["exp_date_sertificate"]."</td>
                        </tr>
                        <tr>
                        <th>Nama Lembaga/Perusahaan</th>
                        <td>".$row["institutional_name"]."</td>
                        </tr>";
                    }
                } else {
                    echo "0 results";
                }

                // Close the connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-6">
                    <a href="list_asesor.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
  