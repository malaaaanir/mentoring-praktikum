<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><?= $data['title'];?></h3> 
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php if ($_SESSION['role'] == 'Admin') : ?>
              <li class="breadcrumb-item"><a href="<?= BASEURL?>">Home</a></li>
              <?php endif; ?>
              <li class="breadcrumb-item active"><?= $data['title'];?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <!-- Main row -->
        <div class="row">
          <?php if ($_SESSION['role'] == 'Asisten') : ?>
            <div class="col-md-4">
              <div class="card">
                  <div class="card-header">
                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                          </button>
                      </div>
                  </div>
                  <div class="card-body p-0">
                      <div class="d-md-flex justify-content-center align-items-center" style="height: 100%;">
                          <div class="p-1 flex-fill" style="overflow: hidden; display: flex; justify-content: center; align-items: center;">
                              <!-- Map ICLabs will be created here -->
                              <div id="world-map-markers" style="text-align: center;">
                                  <div class="col-md-12 mt-3 pb-3 mb-3">
                                      <div class="overflow-auto">
                                          <!-- FOTO UNTUK PROFILE ASISTEN -->
                                          <?php foreach ($data['asisten'] as $asisten) : ?>
                                              <img src="<?= BASEURL; ?>/<?= $asisten['photo_profil'] ?>" alt="Foto" style="max-width: 100%; max-height: 100%; height: auto;">
                                          <?php endforeach; ?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div><!-- /.d-md-flex -->
                  </div>
              </div>
          </div>
          <?php endif; ?>

          <!-- Left col -->
          <?php if ($_SESSION['role'] == 'Admin') : ?>
          <div class="col-md-12">
          <?php endif; ?>
          <?php if ($_SESSION['role'] == 'Asisten') : ?>
          <div class="col-md-8">
          <?php endif; ?>
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <?php if ($_SESSION['role'] == 'Admin') : ?>
                  <a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary button-style" onclick="add('Asisten')">Tambah</a>
                  <?php endif; ?>
                
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                  <div class="p-1 flex-fill" style="overflow: hidden">
                    <!-- Map ICLabs will be created here -->
                    <div id="world-map-markers">
                        <div class="col-md-12 mt-3 pb-3 mb-3">
                          <div class="overflow-auto">
                          <?php if ($_SESSION['role'] == 'Admin') : ?>
                            <table id="myTable" class="table" style="width:100%">
                              <thead class="table-light">
                                <tr>
                                  <th scope="col" style="width:5%;" class="text-center">No</th>
                                  <th scope="col" class="text-center">Stambuk</th>
                                  <th scope="col">Nama Asisten</th>
                                  <th scope="col" class="text-center">Angkatan</th>
                                  <th scope="col">Status</th>
                                  <th scope="col" class="text-center">Jenis Kelamin</th>
                                  <?php if ($_SESSION['role'] == 'Admin') : ?>
                                  <th scope="col">Nama User</th>
                                  <?php endif; ?>
                                  <th scope="col" class="text-center">Foto Profil</th>
                                  <th scope="col" class="text-center">Tanda Tangan</th>
                                  <?php if ($_SESSION['role'] == 'Admin') : ?>
                                  <th scope="col"  style="width:15%" class="text-center">Menu</th>
                                  <?php endif; ?>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php $no=0; foreach  ($data['asisten'] as $asisten) : $no++;?>
                                    <tr>
                                      <td class="text-middle" align="center"><?= $no;?></td>
                                      <td class="text-center"><?= $asisten['stambuk'];?></td>
                                      <td><?= $asisten['nama_asisten'];?></td>
                                      <td class="text-center"><?= $asisten['angkatan'];?></td>
                                      <td><?= $asisten['status'];?></td>
                                      <td class="text-center"><?= $asisten['jenis_kelamin'];?></td>
                                      <?php if ($_SESSION['role'] == 'Admin') : ?>
                                      <td><?= $asisten['username'];?></td>
                                      <?php endif; ?>                                      
                                      <td class="text-center"><img src="<?= BASEURL; ?>/<?= $asisten['photo_profil'] ?>" alt="Foto" style="max-width: 100px; max-height: 100px;"></td>
                                      <td class="text-center"><img src="<?= BASEURL; ?>/<?= $asisten['photo_path'] ?>" alt="Foto" style="max-width: 100px; max-height: 100px;"></td>                                      
                                      <td align="center">
                                        <a class="btn btn-primary btn-sm button-style text-center" onclick="change('Asisten', '<?= $asisten['id_asisten']; ?>')" role="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger btn-sm button-style text-center" onclick="deleteData('Asisten', '<?= $asisten['id_asisten']; ?>')" role="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-trash"></i></a>
                                      </td>
                                    </tr>
                                    <?php endforeach; ?>
                                  </tbody>
                                </table>
                                <?php endif; ?>                                      


                            <!-- BAGIAN USER DATA USER INDIVIDU -->
                            <?php if ($_SESSION['role'] == 'Asisten') : ?>                             
                              <table class="table table-hover table-borderless">
                                <tbody>
                                    <?php foreach ($data['user'] as $user) : ?>
                                      <tr>
                                        <td width="30%">Username</td>
                                        <td><?= $user['username']; ?></td>
                                      </tr>
                                      <?php endforeach; ?>
                                    <?php foreach ($data['asisten'] as $asisten) : ?>
                                      <tr>
                                        <td>Stambuk</td>
                                        <td><?= $asisten['stambuk']; ?></td>
                                      </tr>
                                      <?php endforeach; ?>
                                      <?php foreach ($data['user'] as $user) : ?>
                                      <tr>
                                        <td>Nama</td>
                                        <td><?= $user['nama_user']; ?></td>
                                      </tr>
                                      <?php endforeach; ?>
                                      <?php foreach ($data['asisten'] as $asisten) : ?>
                                      <tr>
                                        <td>Angkatan</td>
                                        <td><?= $asisten['angkatan']; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Jenis Kelamin</td>
                                        <td><?= $asisten['jenis_kelamin']; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Tanda Tangan</td>
                                        <!-- <td class="text-center"><img src="<?= BASEURL; ?>/<?= $asisten['photo_profil'] ?>" alt="Foto" style="max-width: 100px; max-height: 100px;"></td> -->
                                        <td><img src="<?= BASEURL; ?>/<?= $asisten['photo_path'] ?>" alt="Foto" style="max-width: 100px; max-height: 100px;"></td>
                                      </tr>
                                      <tr>
                                        <td colspan="2">
                                            <a class="btn btn-primary btn-sm button-style text-center" onclick="change('User', '<?= $user['id_user']; ?>')" role="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-edit"></i></a>
                                        </td>
                                      </tr>
                                    <?php endforeach; ?>
                                </tbody>
                              </table>
                              <?php endif; ?>
                              <!-- AKHIR BAGIAN USER -->



                          </div>
                        </div>
                    </div>
                  </div>
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->