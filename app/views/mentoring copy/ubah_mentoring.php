<div class="container">
    <form id="formUbahMentoring" action="<?= BASEURL?>/Mentoring/prosesUbah" method="post" autocomplete="off">
    <input type="hidden" value="<?= $data['ubahdata']['id_mentoring']?>" name="id_mentoring">
        <div class="row">
            <div class="col-12">
                <div class="form-group mb-1">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control " value="<?= $data['ubahdata']['tanggal']?>" >
                </div>
                <div class="form-group mb-1">
                    <label for="uraian_materi" class="form-label">Uraian Materi</label>
                    <textarea name="uraian_materi" class="form-control"><?= $data['ubahdata']['uraian_materi'] ?></textarea>
                </div>
                <div class="form-group mb-1">
                    <label for="uraian_tugas" class="form-label">Uraian Tugas</label>
                    <textarea name="uraian_tugas" class="form-control"><?= $data['ubahdata']['uraian_tugas'] ?></textarea>
                </div>
                <div class="form-group mb-1">
                    <label for="id_dosen" class="form-label">Dosen</label>
                    <select name="id_dosen" class="form-control ">
                        <?php
                        foreach ($data['dosenOptions'] as $dosen) {
                            $selected = ($dosen['id_dosen'] == $data['ubahdata']['id_dosen']) ? 'selected' : '';
                            echo "<option value='{$dosen['id_dosen']}' {$selected}>{$dosen['nama_dosen']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-1">
                    <label for="id_asisten1" class="form-label">Asisten 1</label>
                    <select name="id_asisten1" class="form-control ">
                        <?php
                        foreach ($data['asistenOptions'] as $asisten) {
                            $selected = ($asisten['id_asisten'] == $data['ubahdata']['id_asisten1']) ? 'selected' : '';
                            echo "<option value='{$asisten['id_asisten']}' {$selected}>{$asisten['nama_asisten']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-1">
                    <label for="id_asisten2" class="form-label">Asisten 2</label>
                    <select name="id_asisten2" class="form-control ">
                        <?php
                        foreach ($data['asistenOptions'] as $asisten) {
                            $selected = ($asisten['id_asisten'] == $data['ubahdata']['id_asisten2']) ? 'selected' : '';
                            echo "<option value='{$asisten['id_asisten']}' {$selected}>{$asisten['nama_asisten']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- <div class="form-group mb-1">
                    <label for="id_asisten_pengganti" class="form-label">Asisten Pengganti</label>
                    <select name="id_asisten_pengganti" class="form-control ">
                        <?php
                        foreach ($data['asistenOptions'] as $asisten) {
                            $selected = ($asisten['id_asisten'] == $data['ubahdata']['id_asisten_pengganti']) ? 'selected' : '';
                            echo "<option value='{$asisten['id_asisten']}' {$selected}>{$asisten['nama_asisten']}</option>";
                        }
                        ?>
                    </select>
                </div> -->
                <div class="form-group mb-1">
                    <label for="id_asisten_pengganti" class="form-label">Asisten Pengganti</label>
                    <select name="id_asisten_pengganti" class="form-control">
                        <option value="">Tidak ada asisten pengganti</option>
                        <?php
                        foreach ($data['asistenOptions'] as $asisten) {
                            $selected = ($asisten['id_asisten'] == $data['ubahdata']['id_asisten_pengganti']) ? 'selected' : '';
                            echo "<option value='{$asisten['id_asisten']}' {$selected}>{$asisten['nama_asisten']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-1">
                    <label for="id_matkul" class="form-label">Matakuliah</label>
                    <select name="id_matkul" class="form-control ">
                        <?php
                        foreach ($data['matakuliahOptions'] as $matakuliah) {
                            $selected = ($matakuliah['id_matkul'] == $data['ubahdata']['id_matkul']) ? 'selected' : '';
                            echo "<option value='{$matakuliah['id_matkul']}' {$selected}>{$matakuliah['nama_matkul']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-1">
                    <label for="id_kelas" class="form-label">Kelas</label>
                    <select name="id_kelas" class="form-control ">
                        <?php
                        foreach ($data['kelasOptions'] as $kelas) {
                            $selected = ($kelas['id_kelas'] == $data['ubahdata']['id_kelas']) ? 'selected' : '';
                            echo "<option value='{$kelas['id_kelas']}' {$selected}>{$kelas['kelas']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-1">
                    <label for="id_ruangan" class="form-label">Laboratorium</label>
                    <select name="id_ruangan" class="form-control ">
                        <?php
                        foreach ($data['ruanganOptions'] as $ruangan) {
                            $selected = ($ruangan['id_ruangan'] == $data['ubahdata']['id_ruangan']) ? 'selected' : '';
                            echo "<option value='{$ruangan['id_ruangan']}' {$selected}>{$ruangan['nama_ruangan']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <button type="button" class="btn btn-secondary ml-2" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </form>
</div>