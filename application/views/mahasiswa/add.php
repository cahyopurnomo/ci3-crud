<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Mahasiswa</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('mahasiswa'); ?>">Data Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmAddMahasiswa', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Nama" name="nama" value=" <?= set_value('nama'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama') ?>
                            </small>
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="JenisKelamin" name="jenis_kelamin" value="Laki-laki" <?php if (set_value('jenis_kelamin') == "Laki-Laki") : echo "checked"; endif; ?>>
                                    <label class="form-check-label" for="JenisKelamin">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="JenisKelamin2" name="jenis_kelamin" value="Perempuan" <?php if (set_value('jenis_kelamin') == "Perempuan") : echo "checked"; endif; ?>>
                                    <label class="form-check-label" for="JenisKelamin2">Perempuan</label>
                                </div>
                                <small class="text-danger">
                                    <?php echo form_error('jenis_kelamin') ?>
                                </small>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="Alamat" name="alamat" rows="3"><?= set_value('alamat'); ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('alamat') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Alamat" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="Agama" name="agama">
                                <option value="" selected disabled>Pilih</option>
                                <option value="Buddha" <?php if (set_value('agama') == "Buddha") : echo "selected"; endif; ?>>Buddha</option>
                                <option value="Hindu" <?php if (set_value('agama') == "Hindu") : echo "selected"; endif; ?>>Hindu</option>
                                <option value="Islam" <?php if (set_value('agama') == "Islam") : echo "selected"; endif; ?>>Islam</option>
                                <option value="Katolik" <?php if (set_value('agama') == "Katolik") : echo "selected"; endif; ?>>Katolik</option>
                                <option value="Protestan" <?php if (set_value('agama') == "Protestan") : echo "selected"; endif; ?>>Protestan</option>
                                <option value="Kepercayaan" <?php if (set_value('agama') == "Kepercayaan") : echo "selected"; endif; ?>>Kepercayaan</option>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('agama') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="NoHp" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="NoHp" name="handphone" value="<?= set_value('handphone'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('handphone') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Email" name="email" value="<?= set_value('email'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('email') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#FrmAddMahasiswa').submit(function(e){
            if ( confirm('Yakin data disimpan?') ) {
                return true;
            }

            e.preventDefault();
        });
    })

</script>