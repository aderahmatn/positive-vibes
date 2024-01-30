<h1 class="font-weight-bold display-5 mb-3 pt-5">Riwayat Sewa <small class="h4 font-weight-light"> / Positive Vibes</small></h1>

<div class="card">
    <div class="card-body">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Sewa</th>
                    <th>Tgl Sewa</th>
                    <th>Total Hari</th>
                    <th>Total Bayar</th>
                    <th>Tgl Transaksi</th>
                    <th>Status Pembayaran</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($sewa as $key) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $key->no_sewa ?></td>
                        <td><?= TanggalIndo($key->tgl_awal)  . ' - ' . TanggalIndo($key->tgl_akhir) ?></td>
                        <td><?= $key->total_hari ?></td>
                        <td><?= rupiah($key->total_bayar) ?></td>
                        <td><?= TanggalIndo($key->tgl_transaksi)  ?></td>
                        <td>
                            <span class=" text-uppercase text-sm text-white badege badge-pill <?= $key->is_payment == 0 ? 'badge-warning' : 'badge-success' ?> "><small><?= $key->is_payment == 0 ? 'belum bayar' : 'sudah bayar' ?></small></span>
                        </td>
                        <td><a data-toggle="modal" onclick="showDetail(<?= $key->id_sewa ?>)" href="#modal_detail" class="btn  btn-outline-dark btn-xs">
                                Lihat Detail
                            </a>

                            <a href="https://wa.me/6285175030524/?text=Hallo saya ingin konfirmasi pembayaran" class="btn  btn-outline-success btn-xs <?= $key->is_payment == 0 ? '' : 'disabled' ?>" target="_blank"><i class="fab fa-whatsapp"></i> Konfirmasi pembayaran</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-body">

                <span class=" text-bold h5">
                    Cara Pembayaran :
                </span>
                <br>
                <small class="ml-4">Silahkan lakukan pembayaran sesuai <b>total bayar</b> pesanan anda dengan cara transfer bank.</small>
                <div class="ml-4  rounded">
                    <span class=" h7 text-bold">
                        Rekening Bank BCA <br>
                        A.N. Januar Fikri - 6070566654
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" id="body_detail">
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    function showDetail(id) {
        $.ajax({
            type: "get",
            url: "<?= site_url('sewa/show_detail/'); ?>" + id,
            dataType: "html",
            success: function(response) {
                $('#body_detail').empty();
                $('#body_detail').append(response);
            }
        });
    }
</script>