<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Manajemen Data Barang
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-sm btn-info" onclick="location.href=('/barang/tambah')">
    <i class="fa fa-plus-circle"> Tambah Barang</i>
</button>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<?= session()->getFlashdata('error') ?>
<?= session()->getFlashdata('sukses') ?>

<?= form_open('barang/index') ?>
<div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Cari Data Berdasarkan Kode,Nama barang & Kategori" name="cari" autofocus value="<?= $cari ?>">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit" name="tombolcari"><i class="fa fa-search"></i></button>
    </div>
</div>
<?= form_close(); ?>

<span class="badge badge-success mb-2">
    <h5>
        <?= "Total Data : $totaldata"; ?>
    </h5>
</span>

<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Stok</th>
            <th style="width: 15%">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $nomor = 1 + (($nohalaman - 1) * 10);
        foreach ($tampildata as $row) :
        ?>
            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $row['brgkode'] ?></td>
                <td><?= $row['brgnama'] ?></td>
                <td><?= $row['katnama'] ?></td>
                <td><?= $row['satnama'] ?></td>
                <td><?= number_format($row['brgharga'], 0); ?></td>
                <td><?= number_format($row['brgstok'], 0); ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-info" onclick="edit('<?= $row['brgkode'] ?>')"><i class="fa fa-edit"></i></button>

                    <form method="POST" action="/barang/hapus/<?= $row['brgkode'] ?>" style="display:inline;" onsubmit="return hapus();">
                        <input type="hidden" value="DELETE" name="_method">
                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="float-left mt-4">
    <?= $pager->links('barang', 'paging') ?>
</div>

<script>
    function edit(kode) {
        window.location.href = ('/barang/edit/' + kode);
    }

    function hapus(kode) {
        pesan = confirm('Yakin Data Ingin Dihapus?...');
        if (pesan) {
            return true;
        } else {
            return false;
        }
    }
</script>



<?= $this->endSection('isi') ?>