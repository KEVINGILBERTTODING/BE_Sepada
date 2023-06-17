<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ExcelModel extends CI_Model
{

	public function createExcel($status, $dateStart, $dateEnd)
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		// Set title and merge cells for the first row
		$sheet->setCellValue('A1', 'DEWAN PERWAKILAN RAKYAT DAERAH');
		$sheet->mergeCells('A1:H1');
		$sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

		// Set title and merge cells for the second row
		$sheet->setCellValue('A2', 'KOTA SEMARANG');
		$sheet->mergeCells('A2:H2');
		$sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

		// Set title and merge cells for the second row
		$sheet->setCellValue('A3', 'REKAP TAMU');
		$sheet->mergeCells('A3:H3');
		$sheet->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


		// Set title for the third row
		$sheet->setCellValue('A4', 'Periode ' . $dateStart . " - " . $dateEnd);
		$sheet->mergeCells('A4:H4');
		$sheet->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

		$headerStyle = $sheet->getStyle('A5:H5');
		$headerStyle->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$headerStyle->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('004643'); // Warna biru
		$headerStyle->getFont()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE)); // Warna putih
		// Add data headers to the spreadsheet
		$sheet->setCellValue('A5', 'No');
		$sheet->setCellValue('B5', 'Nama Lengkap');
		$sheet->setCellValue('C5', 'Nama Instansi');
		$sheet->setCellValue('D5', 'Telepon');
		$sheet->setCellValue('E5', 'Tanggal');
		$sheet->setCellValue('F5', 'jam');
		$sheet->setCellValue('G5', 'Jumlah');
		$sheet->setCellValue('H5', 'Tujuan Bagian');


		if ($status == 'all') {
			$this->db->select('*');
			$this->db->from('cuti');
			$this->db->join('user', 'user.id_user = cuti. id_user', 'left');
			$this->db->join('user_detail', 'user_detail.id_user_detail = cuti. id_user', 'left');
			$this->db->where('cuti.tanggal >=', $dateStart);
			$this->db->where('cuti.tanggal <=', $dateEnd);
			$this->db->order_by('cuti. tgl_diajukan', 'desc');
			$data = $this->db->get()->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('cuti');
			$this->db->join('user', 'user.id_user = cuti. id_user', 'left');
			$this->db->join('user_detail', 'user_detail.id_user_detail = cuti. id_user', 'left');
			$this->db->where('cuti.id_status', $status);
			$this->db->where('cuti.tanggal >=', $dateStart);
			$this->db->where('cuti.tanggal <=', $dateEnd);
			$this->db->order_by('cuti. tgl_diajukan', 'desc');
			$data = $this->db->get()->result_array();
		}

		// Add data rows to the spreadsheet
		$row = 6;
		$no = 1;
		foreach ($data as $item) {
			$sheet->setCellValue('A' . $row, $no++);
			$sheet->setCellValue('B' . $row, $item['username']);
			$sheet->setCellValue('C' . $row, $item['nama_lengkap']);
			$sheet->setCellValue('D' . $row, $item['no_telp']);
			$sheet->setCellValue('E' . $row, $item['tanggal']);
			$sheet->setCellValue('E' . $row, $item['tanggal']);
			$sheet->setCellValue('F' . $row, $item['jam']);
			$sheet->setCellValue('G' . $row, $item['jumlah']);
			$sheet->setCellValue('H' . $row, $item['tujuan']);

			// Set border for each cell
			$cellRange = 'A' . $row . ':H' . $row;
			$sheet->getStyle($cellRange)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


			$row++;
		}

		// Save the Excel file
		$filename = 'Rekap Tamu.xlsx';
		$writer = new Xlsx($spreadsheet);
		$writer->save($filename);

		// Set file headers for download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');

		// Output the Excel file
		$writer->save('php://output');
	}
}
