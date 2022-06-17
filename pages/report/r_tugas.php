<?php
ini_set("session.auto_start", 0);
include_once("__DIR__ .  ../../../../koneksi.php");
include_once("__DIR__ .  ../../../../fpdf/fpdf.php");

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,2,2,2);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->ln(1);
$pdf->SetFont('Helvetica','B',12);
$pdf->Image('rps.png', 2, 3, 5, 'C');
$pdf->Cell(25,0.7,"Laporan Rekap Data Tugas",0,10,'C');
$pdf->Cell(25,0.7,"PT. Jala Lintas Media",0,10,'C');
$pdf->Cell(25,0.7,"Ds. Getas Pejaten Kecamatan Jati Kabupaten Kudus",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Printed On : ".date("D d/M/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Petugas', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Wilayah', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Jadwal', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tgl. Tugas', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Catatan', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Keterangan', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
                $a = getTugas();
                $no = 1;
                foreach ($a as $key => $data) 
                {
                    // var_dump($data);
                    // die();
                    $pdf->Cell(1, 0.8, $no++, 1, 0, 'L');
                    $pdf->Cell(3, 0.8, $data['nama_kelompok'], 1, 0,'L');
                    $pdf->Cell(7, 0.8, $data['wilayah'], 1, 0,'L');
                    $pdf->Cell(4, 0.8, $data['nm_jadwal'], 1, 0,'L');
                    $pdf->Cell(3, 0.8, date('d-m-Y', strtotime($data['tanggal'])), 1, 0,'L');
                    $pdf->Cell(4, 0.8, $data['catatan_tugas'], 1, 0,'L');
                    $pdf->Cell(3, 0.8, $data['keterangan'], 1, 1,'L');

                    // $no++;
                }
$date = date('d-m-Y');
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(45,0.7,"Mengetahui,",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(45,0.7,"Kabag. Umum",0,10,'C');

//Nama file ketika di print
$pdf->Output("Laporan Tugas". $date .".pdf","I");
