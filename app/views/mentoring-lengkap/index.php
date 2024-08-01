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
              <li class="breadcrumb-item"><a href="<?= BASEURL?>">Home</a></li>
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
          <!-- Left col -->
          <div class="col-md-12">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary button-style" onclick="add('Mentoring')">Tambah</a>
                
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
                            <table id="example" class="table" style="width:100%">
                                <thead class="table-light">
                                    <tr>
                                      <th scope="col" style="width:5%;" class="text-center">No</th>
                                      <th scope="col" class="text-center">Tanggal</th>
                                      <th scope="col" class="text-center">Uraian Materi</th>
                                      <th scope="col" class="text-center">Uraian Tugas</th>
                                      <th scope="col" class="text-center">Nama Dosen</th>
                                      <th scope="col" class="text-center">Asisten 1</th>
                                      <th scope="col" class="text-center">Asisten 2</th>
                                      <th scope="col" class="text-center">Asisten Pengganti</th>
                                      <th scope="col" class="text-center">Matakuliah</th>
                                      <th scope="col" class="text-center">Kelas</th>
                                      <th scope="col" class="text-center">Laboratorium</th>
                                      <th scope="col"  style="width:15%" class="text-center">Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $no=0; foreach  ($data['mentoring'] as $mentoring) : $no++;?>
                                      <tr>
                                        <td class="text-middle" align="center"><?= $no;?></td>
                                        <td><?= $mentoring['tanggal'];?></td>
                                        <td><?= $mentoring['uraian_materi'];?></td>
                                        <td><?= $mentoring['uraian_tugas'];?></td>
                                        <td><?= $mentoring['nama_dosen'];?></td>
                                        <td><?= $mentoring['asisten_1'];?></td>
                                        <td><?= $mentoring['asisten_2'];?></td>
                                        <td><?= $mentoring['asisten_pengganti'];?></td>
                                        <td><?= $mentoring['nama_matkul'];?></td>
                                        <td><?= $mentoring['kelas'];?></td>
                                        <td><?= $mentoring['nama_ruangan'];?></td>
                                        <td align="center">
                                                <a class="btn btn-primary btn-sm button-style text-center" onclick="change('Mentoring', '<?= $mentoring['id_mentoring']; ?>')" role="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm button-style text-center" onclick="deleteData('Mentoring', '<?= $mentoring['id_mentoring']; ?>')" role="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-trash"></i></a>
                                        </td>
                                      </tr>
                                  <?php endforeach; ?>
                                </tbody>
                            </table>
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