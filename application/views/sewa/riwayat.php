<h1 class="font-weight-bold display-5 mb-3 pt-5">Riwayat Sewa <small class="h4 font-weight-light"> / Positive Vibes</small></h1>

<table id="myTable" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>No Sewa</th>
            <th>Tgl Sewa</th>
            <th>Total</th>
            <th>Status</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>0124001</td>
            <td>19/01/2024 - 20/01/2024</td>
            <td>Rp.720.000</td>
            <td><span class="badge badge-pill badge-warning">Belum Kembali</span></td>
            <td><button class="btn btn-default btn-sm">Detail</button></td>
        </tr>
        <tr>
            <td>1</td>
            <td>1223067</td>
            <td>29/12/2023 - 01/01/2024</td>
            <td>Rp.500.000</td>
            <td><span class="badge badge-pill badge-success">Kembali</span></td>
            <td><button class="btn btn-default btn-sm">Detail</button></td>

        </tr>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>