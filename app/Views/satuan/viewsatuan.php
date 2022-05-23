<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Manajemen Data Satuan
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<?= form_button(' ', '<i class="fa fa-plus-circle"></i> Tambah Data', [
    'class' => 'btn btn-primary',
    'onclick' => "location.href=('" . site_url('satuan/formtambah') . "')"
]) ?>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>

<?= session()->getFlashdata('sukses'); ?>
<?= form_open('satuan/index') ?>
<div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Cari Data Satuan" value="<?= $cari ?>" name="cari" aria-label="Recipient's username" aria-describedby="button-addon2">
    <div class="input-group-append">
        <button class="btn btn-outline-danger" type="submit" id="tombolcari" name="tombolcari"><i class="fa fa-search"></i></button>
    </div>
</div>
<?= form_close(); ?>
<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%">No</th>
            <th>Nama Satuan</th>
            <th style="width: 15%">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $nomor = 1 + (($nohalaman - 1) * 5);
        foreach ($tampildata as $row) :
        ?>
            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $row['satnama'] ?></td>
                <td>
                    <button type="button" class="btn btn-info" title="Edit Data" onclick="edit('<?= $row['satid'] ?>')">
                        <i class="fa fa-edit"></i>
                    </button>

                    <form method="POST" action="/satuan/hapus/<?= $row['satid'] ?>" style="display:inline;" onsubmit="hapus();">
                        <input type="hidden" value="DELETE" name="_method">
                        <button type="submit" class="btn btn-danger" title="Hapus Data">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="float-center">
    <?= $pager->links('satuan', 'paging'); ?>
</div>

<script>
    function edit(id) {
        window.location = ('/satuan/formedit/' + id);
    }

    function hapus() {
        pesan = confirm('Yakin data kategori dihapus?');

        if (pesan) {
            return true;
        } else {
            return false;
        }
    }
</script>











<?= $this->endSection('isi') ?>