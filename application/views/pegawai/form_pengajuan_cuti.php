<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("pegawai/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php if ($this->session->flashdata('input')){ ?>
    <script>
    swal({
        title: "Success!",
        text: "Data Berhasil Ditambahkan!",
        icon: "success"
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_input')){ ?>
    <script>
    swal({
        title: "Erorr!",
        text: "Data Gagal Ditambahkan!",
        icon: "error"
    });
    </script>
    <?php } ?>

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url();?>assets/admin_lte/dist/img/Loading.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view("pegawai/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("pegawai/components/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Form Pengajuan Pendaftaran Tamu</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Formulir</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <form action="<?= base_url();?>Form_Tamu/proses_cuti" method="POST" enctype="multipart/form-data">
                        <input type="text" value="<?=$this->session->userdata('id_user') ?>" name="id_user" hidden>
                        <div class="form-group">
                            <tr><td> <label for="tujuan">Tujuan Bagian </label></td></tr>
                            <select class="form-control" id="tujuan" aria-describedby="tujuan"
                                name="tujuan" required>
                            <option value="">--pilih--</option>
                            <option value="Umum">Umum</option>
                            <option value="Keuangan">Keuangan</option>
                            <option value="Persidangan">Persidangan</option>
                            <option value="Humas">Humas</option>
                            <option value="Komisi-A">Komisi A</option>
                            <option value="Komisi-B">Komisi B</option>
                            <option value="Komisi-C">Komisi C</option>
                            <option value="Komisi-D">Komisi D</option>
                            </select></td></tr>
                        </div>
                        <div class="form-group">
                            <label for="alasan">Alasan</label>
                            <textarea class="form-control" id="alasan" rows="3" name="alasan" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="tanggal">Tanggal Kedatangan</label>
                            <input type="date" class="form-control" id="tanggal" aria-describedby="tanggal" name="tanggal"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="jam">Jam Kedatangan</label>
                            <input type="time" class="form-control" id="jam" aria-describedby="jam" name="jam"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah Rombongan</label>
                            <input type="text" class="form-control" id="jumlah" aria-describedby="jumlah"
                                name="jumlah" required>

                        </div>

                        <div class="form-group">
                            <label for="file">Upload File</label>
                            <input type="file" class="form-control" id="file" aria-describedby="file"
                                name="file" required>

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("pegawai/components/js.php") ?>
</body>

</html>