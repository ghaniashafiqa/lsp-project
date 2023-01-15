<?php require "../../../config/config.php";

    if($_GET['id_schema'] != null){
        $id_schema = $_GET['id_schema']; 
        $script = "SELECT * FROM certification_schema WHERE id_schema=$id_schema"; 
        $query = mysqli_query($conn, $script);
        $data = mysqli_fetch_array($query);
    }else {
        header("location: error.php");
    }

    $query2 = null;

    if(isset($_POST['hapus'])) {
        $script2 = "DELETE FROM certification_schema WHERE id_schema = $id_schema"; 
        $query2 = mysqli_query($conn, $script2);
    }

    if($query2 != null){
        header("location: list_skema.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Skema</title>
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
                <span class="dashboard">Data Skema</span>
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
          <div class="wrapper" style="padding-left: 50px;"> 
            <a href="list_skema.php" type="submit" class="btn btn-primary">< Back</a>
            <br>
            <br>
            <h1 class="text-center">Detail Skema</h1>
              <div class="row"> 
                <div class="col-4"> 
                  <div class="box-detail-books">
                    <img src="<?= $data['schema_cover'] ?>" width="80%" alt=""> 
                  </div>
                </div> 
                <div class="col-4" style="background-color: white;"> 
                <div class="box-desc">
                  <div class="container"></div>
                    <div class="row">
                      <div class="col">
                        <h4>Nama Skema</h4>
                        <p><?= $data['schema_name'] ?></p>
                        <h4>Deskripsi Skema</h4>
                        <p><?= $data['description'] ?></p>
                        <h4>Unit Skema</h4>
                      </div>
                    </div>
                </div>

                <div class="box-button">
                  <form method="post">
                    <h3>Action</h3>
                    <a href="edit_skema.php?id_schema=<?= $data['id_schema'] ?>" class="btn btn-warning">Update</a>
                    <a href="../asesor/create_asesor.php?id_schema=<?= $data['id_schema'] ?>" class="btn btn-info">Tambah Data Asesor</a>
                    <input type="submit" name="hapus" value="Delete" class="btn btn-danger"> 
                  </form> 
                </div>
            </div>
          </div>
        </div>
    </section>
    
    <!-- script -->
    <script src="../../../assets/js/script.js"></script>
</body>
</html>