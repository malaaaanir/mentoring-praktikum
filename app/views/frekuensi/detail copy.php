<style>
    .tanda-tangan {
        width: 50px; 
        height: auto;
        display: none; /* Awalnya disembunyikan */
        margin: 0 auto; 
    }
    /* .btn, .card-header, footer {
        display: none;
    } */
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info">
                <?= $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3><?= $data['title']; ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php if ($_SESSION['role'] == 'Admin') : ?>
                        <li class="breadcrumb-item"><a href="<?= BASEURL?>">Home</a></li>
                        <?php endif; ?>
                        <li class="breadcrumb-item"><a href="<?= BASEURL ?>/frekuensi">Jadwal Praktikum</a></li>
                        <li class="breadcrumb-item active"><?= $data['title']; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary button-style" onclick="add('Mentoring')">Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="overflow-auto">
                                <div class="data-title d-flex flex-column justify-content-center align-items-center text-center">
                                    <strong>MONITORING PRAKTIKUM</strong>
                                    <strong>LABORATORIUM KOMPUTER - FAKULTAS ILMU KOMPUTER</strong>
                                    <strong>SEMESTER <span>: <?= $data['detail']['semester']; ?> <?= $data['detail']['tahun_ajaran']; ?></span></strong>
                                </div><br>
                                <div class="data-frekuensi d-flex flex-row justify-content-between mb-4 text-bold">
                                    <div class="column-1 d-flex flex-row gap-3">
                                        <div class="frek-header d-flex flex-column">
                                            <span>Kode Matakuliah</span> 
                                            <span>Nama Matakuliah</span> 
                                            <span>Frekuensi</span> 
                                            <span>Hari / Jam</span> 
                                        </div>
                                        <div class="frek-value d-flex flex-column">
                                            <span>: <?= $data['detail']['kode_matkul']; ?></span> 
                                            <span>: <?= $data['detail']['nama_matkul']; ?></span> 
                                            <span>: <?= $data['detail']['frekuensi']; ?></span> 
                                            <span>: <?= $data['detail']['hari']; ?>/<?= date('H:i', strtotime($data['detail']['jam_mulai'])); ?>-<?= date('H:i', strtotime($data['detail']['jam_selesai'])); ?></span>
                                        </div>
                                    </div>
                                    <div class="column-2 d-flex flex-row gap-3">
                                        <div class="frek-header d-flex flex-column">
                                            <span>Ruangan</span> 
                                            <span>Dosen</span> 
                                            <span>Asisten 1</span> 
                                            <span>Asisten 2</span> 
                                        </div>
                                        <div class="frek-value d-flex flex-column">
                                            <span>: <?= $data['detail']['nama_ruangan']; ?></span> 
                                            <span>: <?= $data['detail']['nama_dosen']; ?></span> 
                                            <span>: <?= $data['detail']['asisten_1']; ?></span> 
                                            <span>: <?= $data['detail']['asisten_2']; ?></span> 
                                        </div>
                                    </div>
                                </div>
                                <div class="data-mentoring">
                                    <style>
                                        .table-row {
                                            height: 100px;
                                        }
                                    </style>
                                    <table id="example" class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th rowspan="2">NO</th>
                                                <th rowspan="2">TANGGAL</th>
                                                <th rowspan="2">URAIAN MATERI</th>
                                                <th rowspan="2">URAIAN TUGAS</th>
                                                <th colspan="2">KEHADIRAN</th>
                                                <th colspan="4">TTD</th>
                                            </tr>
                                            <tr class="text-center">
                                                <td><b>H</b></td>
                                                <td><b>A</b></td>
                                                <td><b>DOSEN</b></td>
                                                <td><b>ASISTEN 1</b></td>
                                                <td><b>ASISTEN 2</b></td>
                                                <td><b>PENGGANTI</b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 0;
                                            if (!empty($data['mentoring'])): 
                                                foreach ($data['mentoring'] as $mentoring): 
                                                    $no++;?>
                                                    <tr class="table-row">
                                                        <td class="text-center"><?= $no;?></td>
                                                        <td class="text-center"><?= $mentoring['tanggal']; ?></td>
                                                        <td><?= $mentoring['uraian_materi']; ?></td>
                                                        <td><?= $mentoring['uraian_tugas']; ?></td>
                                                        <td class="text-center"><?= $mentoring['hadir']; ?></td>
                                                        <td class="text-center"><?= $mentoring['alpa']; ?></td>
                                                        <td class="text-center">
                                                            <?php if ($mentoring['status_dosen'] === 'Hadir'): ?>
                                                                <img src="<?= BASEURL; ?>/<?= $data['detail']['photo_path'] ?>" alt="Foto" style="max-width: 100px; max-height: 100px;">
                                                            <?php else: ?>
                                                                <span>-</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php if ($mentoring['status_asisten1'] === 'Hadir'): ?>
                                                                <img src="<?= BASEURL; ?>/<?= $data['detail']['photo_path_asisten1'] ?>" alt="Foto" style="max-width: 100px; max-height: 100px;">
                                                            <?php else: ?>
                                                                <span>-</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php if ($mentoring['status_asisten2'] === 'Hadir'): ?>
                                                                <img src="<?= BASEURL; ?>/<?= $data['detail']['photo_path_asisten2'] ?>" alt="Foto" style="max-width: 100px; max-height: 100px;">
                                                            <?php else: ?>
                                                                <span>-</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center"><?= $mentoring['nama_asisten_pengganti']; ?></td>
                                                    </tr>
                                                <?php endforeach; 
                                            endif; 
                                            for ($i = $no; $i < 10; $i++): ?>
                                                <tr class="table-row">
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                </tr>
                                            <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="<?= BASEURL ?>/frekuensi" class="btn btn-secondary me-2" style="padding: 10px 20px;">Kembali</a>
                                    <a href="<?= BASEURL ?>/exportpdf" class="btn btn-primary" style="padding: 10px 20px;">Export to PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
