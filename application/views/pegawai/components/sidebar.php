<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url();?>assets/image/logo-kota.png" alt="AdminLTE Logo"
            class="brand-image" style="opacity: .9">
        <span class="brand-text font-weight-light"><b>DPRD Kota Semarang</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url();?>assets/image/user2.png" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$this->session->userdata('username');?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url();?>Dashboard/dashboard_pegawai" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>Cuti/view_pegawai/<?=$this->session->userdata('id_user');?>" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Daftar Tamu</p>
                    </a>
                </li>
                <li class="nav-item">
                    
                    <a href="#" class="nav-link" data-toggle="modal"
                    data-target="#exampleModal">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Lengkapi Data</p>
                    </a>
                </li>
                <li class="nav-item" style="<?php echo  $pegawai['nama_lengkap'] == '' ? 'display:none;' : ' ' ?>">
                    <a href="<?= base_url();?>Form_Tamu/view_pegawai" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Permohonan Tamu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>Settings/view_pegawai" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lengkapi Data Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                                            $id = 0;
                                            foreach($pegawai_data as $i)
                                            :
                                            $id++;
                                            $id_user = $i['id_user'];
                                            $username = $i['username'];
                                            $password = $i['password'];
                                            $nama_lengkap = $i['nama_lengkap'];
                                            $id_jenis_kelamin = $i['id_jenis_kelamin'];
                                            $email = $i['email'];
                                            $nip = $i['nip'];
                                            $pangkat = $i['pangkat'];
                                            $jabatan = $i['jabatan'];
                                            $id_jenis_kelamin = $i['id_jenis_kelamin'];
                                            $no_telp = $i['no_telp'];
                                            $alamat = $i['alamat'];

                                            ?>
                <form action="<?= base_url();?>Settings/lengkapi_data" method="POST">
                    <input type="text" value="<?=$this->session->userdata('id_user');?>" name="id" hidden>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Instansi</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            aria-describedby="nama_lengkap" value="<?=$nama_lengkap?>" required>
                    </div>

                    <div class="form-group">
                        <label for="no_telp">Alamat Instansi</label>
                        <textarea class="form-control" id="alamat" rows="3" name="alamat" required><?=$alamat?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" aria-describedby="nip" value="<?=$nip?>" required>
                    </div>

                    <div class="form-group">
                        <label for="id_jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin" required>
                            <?php foreach($jenis_kelamin as $u)
                                                                :
                                                                $id = $u["id_jenis_kelamin"];
                                                                $jenis_kelamin = $u["jenis_kelamin"];
                                                                ?>
                            <option value="<?= $id ?>" <?php if($id == $id_jenis_kelamin){
                                                                            echo 'selected';
                                                                        }else{
                                                                            echo '';
                                                                        }?>><?= $jenis_kelamin ?></option>

                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No HP</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp" value="<?=$no_telp?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="pangkat">Pangkat</label>
                        <input type="text" class="form-control" id="pangkat" name="pangkat" aria-describedby="pangkat" value="<?=$pangkat?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" aria-describedby="jabatan" value="<?=$jabatan?>" required>
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>