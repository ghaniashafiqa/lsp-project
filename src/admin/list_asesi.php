<!-- panggil config -->
<?php require "../../config/config.php"?>

<!DOCTYPE html>
<html>
<head>
    <title>View Data Asesor</title>
    <link rel="stylesheet" href="../../assets/css/dashboard_style.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/021b758c3a.js" crossorigin="anonymous"></script>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
          <a href="../dashboard_admin.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="asesor/list_asesor.php">
            <i class="fa-solid fa-chalkboard-user"></i>
            <span class="links_name">Asesor</span>
          </a>
        </li>
        <li>
          <a href="../list_asesi.php" class="active">
            <i class="fa-solid fa-users"></i>
            <span class="links_name">Asesi</span>
          </a>
        </li>
        <li>
          <a href="../skema/list_skema.php">
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
            <span class="dashboard">Dashboard</span>
        </div>
        <form method="get" class="search-box">
            <input type="text" name="search" placeholder="Search...">
            <i class='bx bx-search' ></i>
        </form>
        <div class="profile-details">
            <span class="admin_name">Prem Shahi</span>
            <i class='bx bx-chevron-down' ></i>
        </div>
        </nav>

        <div class="home-content">
            <div class="container px-5">
                <h1 class="text-center mb-5">Peserta Uji Kompetensi LSP</h1>
                <table class="table table-bordered table-striped table-hover" style="font-size: 14px">
                    <thead class="table-info text-center">
                        <tr>
                            <th>NO</th>
                            <th>NIK</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $batas = 5; 
                        $halaman = $_GET['halaman'] ?? null;
            
                        if(empty($halaman)){
                            $posisi = 0; $halaman = 1;
                        }else{
                            $posisi = ($halaman-1) * $batas;
                        }

                        if(isset($_GET['search'])){ 
                            $search = $_GET['search']; 
                            $sql="SELECT * FROM accession WHERE accession_name LIKE '%$search%' ORDER BY id_accession ASC LIMIT $posisi, $batas"; 
                        }else{ 
                            $sql="SELECT * FROM accession ORDER BY id_accession ASC LIMIT $posisi, $batas";
                        }

                        // Retrieve data from the database
                        $hasil=mysqli_query($conn, $sql); 
                        while ($row = mysqli_fetch_array($hasil)) {
                        // Output data of each row
                            echo "<tr class='text-center'>
                            <td>".$row["id_accession"]."</td>
                            <td>".$row["ktp"]."</td>
                            <td class='text-capitalize'>".$row["accession_name"]."</td>
                            <td>".$row["email"]."</td>
                            <td>
                                <a href='detail_asesi.php?id_accession=" .$row['id_accession']."' style='color: green'>
                                    <i class='fa-regular fa-eye'></i></a> 
                                <a href='update.php?id_accession=" .$row['id_accession']."'> 
                                    <i class='fa-regular fa-pen-to-square'></i></a> 
                                <a href='delete.php?id_accession=" .$row['id_accession']."' style='color: red'>
                                    <i class='fa-solid fa-trash'></i></a>
                            </td>
                            </tr>";
                        }
                    ?>
                    </tbody>
                </table>
                
                <?php
                    if(isset($_GET['search'])){
                        $search= $_GET['search']; 
                        $query2="SELECT * FROM accession WHERE accession_name LIKE '%$search%' ORDER BY accession_name ASC"; 
                    }else{ 
                        $query2="SELECT * FROM accession ORDER BY accession_name ASC";
                    }

                    $result2 = mysqli_query($conn, $query2); 
                    $jmldata = mysqli_num_rows($result2); 
                    $jmlhalaman = ceil($jmldata/$batas);
                ?>
                <br>
                <ul class="pagination container"> 
                    <?php 
                        for($i=1;$i<=$jmlhalaman; $i++) {
                            if ($i != $halaman) { 
                                if(isset($_GET['search'])){ 
                                    $search = $_GET['search'];
                                    echo "<li class='page-item'><a class='page-link' href='read.php?halaman=$i&search=$search'>
                                        $i</a></li>";
                                }else{ 
                                    echo "<li class='page-item'><a class='page-link' href='read.php?halaman=$i'>$i</a></li>";
                                }
                            } else {
                                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                            }
                        }
                    ?>
                </ul> 
            </div>
        </div>
    </section>

    <script src="../../assets/js/script.js"></script>
</body>
</html>