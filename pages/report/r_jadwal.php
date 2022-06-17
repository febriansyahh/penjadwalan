<?php
ini_set("session.auto_start", 0);
include_once("__DIR__ .  ../../../../koneksi.php");
include_once("__DIR__ .  ../../../../fpdf/fpdf.php");

$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(2,2,2,2);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->ln(1);
$pdf->SetFont('Helvetica','B',12);
$pdf->Image('rps.png', 2, 3, 5, 'C');
$pdf->Cell(20,0.7,"Laporan Rekap Data Jadwal",0,10,'C');
$pdf->Cell(20,0.7,"PT. Jala Lintas Media",0,10,'C');
$pdf->Cell(20,0.7,"Ds. Getas Pejaten Kecamatan Jati Kabupaten Kudus",0,10,'C');
$pdf->ln(1);
$pdf->Line(20, 273, 190, 273);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Printed On : ".date("D d/M/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jadwal', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Kelompok', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Rute', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Catatan', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
                $a = getjadwal();
                $no = 1;
                foreach ($a as $key => $data) 
                {
                    $pdf->Cell(1, 0.8, $no++, 1, 0, 'L');
                    $pdf->Cell(3, 0.8, $data['nm_jadwal'], 1, 0,'L');
                    $pdf->Cell(3, 0.8, $data['nama_kelompok'], 1, 0,'L');
                    $pdf->Cell(3, 0.8, date('d-m-Y', strtotime($data['tanggal'])), 1, 0,'L');
                    $pdf->Cell(3, 0.8, $data['rute'], 1, 0,'L');
                    $pdf->Cell(5, 0.8, $data['catatan'], 1, 1,'L');

                    // $no++;
                }
$date = date('d-m-Y');
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(32,0.7,"Mengetahui,",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(32,0.7,"Kabag. Umum",0,10,'C');

//Nama file ketika di print
$pdf->Output("Laporan Jadwal". $date .".pdf","I");
