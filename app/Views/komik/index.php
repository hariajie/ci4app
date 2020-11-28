<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/komik/create" class="btn btn-primary btn-md mt-3 mt-3">Tambah Data Komik</a>
            <h1 class="mt-2">Daftar Komik</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($komik as $k) : ?>
                        <tr>
                            <th scope="row"><?php echo $no++; ?></th>
                            <td><img src="<?php echo base_url('/img/' . $k['sampul']); ?>" alt="" class="sampul"></td>
                            <td><?php echo $k['judul'] ?></td>
                            <td>
                                <a href="/komik/<?php echo $k['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>