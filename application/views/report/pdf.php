<?php


$pdf = new FPDF('p', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->SetTitle("LAPORAN TRANSAKSI PENYEWAAN", 1);

// setting jenis font yang akan digunakan
// mencetak string 
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(45, 3, '', 0, 0, 'L');
$pdf->Cell(70, 3, '', 0, 0, 'R');
$pdf->Cell(78, 3, 'Jln. Veteran Kadu Jaya, Curug Tangerang', 0, 1, 'R');
$pdf->Cell(10, 1, '', 0, 0, 'C');
$pdf->SetFont('Arial', 'B', 20);

$pdf->Cell(35, 5, 'POSITIVE VIBES', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(70, 5, '', 0, 0, 'R');
$pdf->Image(base_url() . "assets/images/logo_positivevibes.png", 10, 10, 10, 0, 'PNG');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(78, 7, 'Kabupaten Tangerang, Banten 15810', 0, 1, 'R');
$pdf->SetLineWidth(0.4);
$pdf->Line(10, 20, 202, 20);
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(192, 20, 'LAPORAN TRANSAKSI PENYEWAAN', 0, 1, 'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(193, 7, 'PERIODE ' . TanggalIndo($tgl_awal) . " - " . TanggalIndo($tgl_akhir), 0, 1, 'R');
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(210, 221, 242);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C', true);
$pdf->Cell(35, 7, 'NO SEWA', 1, 0, 'C', true);
$pdf->Cell(30, 7, 'TGL TRANSAKSI', 1, 0, 'C', true);
$pdf->Cell(60, 7, 'PELANGGAN', 1, 0, 'C', true);
$pdf->Cell(22, 7, 'HARI SEWA', 1, 0, 'C', true);
$pdf->Cell(35, 7, 'TOTAL BAYAR', 1, 1, 'C', true);
$pdf->SetFont('Arial', '', 9);
$no = 1;
foreach ($sewa as $key) {
    $pdf->Cell(10, 5, $no++, 1, 0, 'C');
    $pdf->Cell(35, 5, strtoupper($key->no_sewa), 1, 0, 'C');
    $pdf->Cell(30, 5, TanggalIndo($key->tgl_transaksi), 1, 0, 'C');
    $pdf->Cell(60, 5, strtoupper($key->nama_pelanggan), 1, 0, 'L');
    $pdf->Cell(22, 5, $key->total_hari, 1, 0, 'C');
    $pdf->Cell(35, 5, rupiah($key->total_bayar), 1, 1, 'R');
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(157, 7, 'TOTAL PENDAPATAN', 1, 0, 'C');
$pdf->Cell(35, 7, rupiah($total_bayar), 1, 1, 'R');


$pdf->Output('', "POSITIVE-VIBES-LAPORAN.pdf", 'POSITIVE-VIBES-LAPORAN.pdf');
