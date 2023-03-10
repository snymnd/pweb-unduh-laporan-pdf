<?php
// memanggil library FPDF
require('./phpfpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'DATA PENDAFTAR SISWA BARU',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Tahun Ajaran 2022/2023',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(1,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,6,'FOTO',1,0);
$pdf->Cell(27,6,'NIS',1,0);
$pdf->Cell(50,6,'NAMA',1,0);
$pdf->Cell(30,6,'JENIS KELAMIN',1,0);
$pdf->Cell(35,6,'NOMOR TELEPON',1,0);
$pdf->Cell(40,6,'ALAMAT',1,1);

$pdf->SetFont('Arial','',10);
        // Load file koneksi.php
include "koneksi.php";
$sql = $pdo->prepare("SELECT * FROM siswa");
$sql->execute(); // Eksekusi querynya
$line = 1;
while ($data = $sql->fetch()) {
    $image = './images/'.$data['foto'];
    
    $pdf->Cell(40,31,$pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 33.78, 30.50),1,0);
    $pdf->Cell(27,31,$data['nis'],1,0);
    $pdf->Cell(50,31,$data['nama'],1,0);
    $pdf->Cell(30,31,$data['jenis_kelamin'],1,0); 
    $pdf->Cell(35,31,$data['telp'],1,0); 
    $pdf->Cell(40,31,$data['alamat'],1,1);
    
    $lin = $line + 1;
}

$pdf->Output();
?>