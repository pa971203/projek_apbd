<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Input Pendapatan Desa</h5>
                </div>
                <div class="card-body mt-2">
                    <form action="<?= base_url('Pendapatan/action') ?>" method="post">
                        <input type="hidden" name="id_pendapatan" value="">
                        <div class="form-group">
                            <label>Tahun</label>
                            <select name="tahun" class="form-control form-control-sm">
                                <?php for ($i = date('Y'); $i > 2015; $i--) : ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Pendapatan</label>
                            <input name="jenis_pendapatan" type="text" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input name="jumlah" type="text" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input name="tanggal" type="date" class="form-control form-control-sm">
                        </div>
                        <div class="form-group text-right">
                            <a href="" class="btn btn-secondary btn-sm">Batal</a>
                            <button class="btn btn-primary btn-sm" id="simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Data Pendapatan Desa</h5>
                </div>
                <div class="card-body mt-2">
                    <div class="table-responsive">
                        <table class="table" style="font-size: 10px !important; color: #000 !important;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Sumber Dana</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data_sumber as $value) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $value['tahun'] ?></td>
                                        <td><?= $value['jenis_pendapatan'] ?></td>
                                        <td><?= $value['jumlah'] ?></td>
                                        <td>
                                            <a href="<?= base_url('Pendapatan/index/' . $value['id_pendapatan']) ?>" class="btn btn-success btn-sm">Edit</a>
                                             <a href="<?= base_url('Pendapatan/hapus/' . $value['id_pendapatan']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>