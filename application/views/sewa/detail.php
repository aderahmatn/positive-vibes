<div class="row ">
    <div class="col-md-12">
        <h1 class="font-weight-bold h4 mb-3">Detail Peyewaan </h1>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kategori Barang</th>
                    <th scope="col">Harga Sewa</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($barang as $key) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><img class="img-thumbnail" width="50px" src="<?= base_url('uploads/barang/') . $key->gambar ?>" alt="gambar barang"></td>
                        <td><?= $key->nama_barang ?></td>
                        <td><?= $key->kategori ?></td>
                        <td><?= rupiah($key->harga_sewa) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <hr>
        <button class="btn btn-primary float-right" id="closemodal">TUTUP</button>
        <script>
            $(document).ready(function() {
                $('#closemodal').click(function() {
                    $('#modal_detail').modal('hide');
                });
            });
        </script>
    </div>

</div>