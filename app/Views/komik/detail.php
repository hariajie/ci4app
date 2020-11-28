<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Detail Komik</h1>

            <div class="card mb-3 shadow" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?php echo $komik['sampul']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $komik['judul']; ?></h5>
                            <p class="card-text"><b>Penulis :</b> <?php echo $komik['penulis']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Penerbit :</b> <?php echo $komik['penerbit']; ?></small> </p>
                            <a href="/komik/edit/<?php echo $komik['slug']; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>

                            <form action="/komik/<?php echo $komik['id']; ?>" method="post" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger ml-2" onclick="return confirm('Anda yakin menghapus?');" data-toggle="tooltip" data-placement="top" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            <br><br>
                            <a href="/komik">
                                << Kembali ke daftar komik</a> </div> </div> </div> </div> </div> </div> </div> <?php echo $this->endSection(); ?>