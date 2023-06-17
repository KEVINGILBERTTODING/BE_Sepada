<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Surat Cuti</title>

	<style>
		body {
			font-family: Times New Roman;
			margin: 0;
			padding: 40px;
		}

		#logo {
			width: 100px;
			float: left;
		}

		h1 {
			font-size: 24px;
			margin-top: 10px;
			margin-bottom: 20px;
		}

		p {
			font-size: 14px;
			margin: 0;
		}

		#info {
			float: right;
			text-align: right;
		}

		#info p {
			margin-bottom: 10px;
		}

		#content {
			margin-top: 40px;
		}

		#content p {
			margin-bottom: 10px;
		}

		ol {
			margin-left: 20px;
			margin-bottom: 10px;
		}

		strong {
			font-weight: bold;
		}

		#footer {
			margin-top: 40px;
		}
	</style>
</head>

<body>


	<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="height:0pt; text-align:left; display:block; position:absolute; z-index:-1;"><img src="https://1.bp.blogspot.com/-_oY-kH9IgcM/V_pMR6bJVlI/AAAAAAAAD0Q/cHXlZFKl8XgeahdE6ijGD5IlX0nFinzdwCLcB/s1600/Kota%2BSemarang.png" width="60" height="60" alt="" class="fr-fir fr-dib fr-draggable"></span><strong><span style="font-family:'Times New Roman';">DEWAN PERWAKILAN RAKYAT DAERAH</span></strong></p>
	<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><strong><span style="font-family:'Times New Roman';">KOTA SEMARANG</span></strong></p>
	<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%;"><span style="font-family:Arial;"> Jl. Pemuda No.146, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50132</span></p>
	<hr>

	<div id="content">


		<p>Tanggal: <span id="tanggal_surat"><?= $cuti['tgl_diajukan']; ?></span></p>
		<p>Kepada,</p>
		<p><strong>Yth. <?= $cuti['nama_lengkap']; ?></strong></p>
		<p><strong><?= $cuti['alamat']; ?></strong></p>

		<p><strong>Perihal: Persetujuan Kunjungan Tamu DPRD Kota Semarang</strong></p>

		<p>Dengan hormat,</p>

		<p>Berdasarkan permohonan yang telah diajukan oleh pihak <strong>Jabatan/Instansi Tamu</strong> pada tanggal <span id="tanggal_permohonan"><?= $cuti['tgl_diajukan']; ?></span> yang lalu, kami dengan ini memberikan persetujuan untuk melakukan kunjungan ke Dewan Perwakilan Rakyat Daerah (DPRD) Kota Semarang.</p>

		<p>Detail kunjungan sebagai berikut:</p>
		<ol>
			<li>Tanggal Kunjungan: <span id="tanggal_kunjungan"><?= $cuti['tanggal']; ?></span></li>
			<li>Waktu Kunjungan: <span id="waktu_kunjungan"><?= $cuti['jam']; ?></span></li>
			<li>Jabatan/Instansi: <span id="nama_tamu"><?= $cuti['nama_lengkap']; ?></span></li>
			<li>Jumlah Tamu: <span id="jumlah_tamu"><?= $cuti['jumlah']; ?></span></li>
			<li>Tujuan Kunjungan: <span id="tujuan_kunjungan"><?= $cuti['alasan']; ?></span></li>
		</ol>

		<p>Kami mohon kepada pihak <strong>Jabatan/Instansi Tamu</strong> untuk mengkonfirmasi kehadiran kunjungan ini minimal 2 hari sebelumnya. Harap disampaikan daftar nama-nama tamu yang akan hadir serta nomor identitas (KTP/SIM/Paspor) untuk keperluan administrasi keamanan.</p>

		<p>Adapun persyaratan yang harus dipenuhi oleh tamu dalam kunjungan ini adalah sebagai berikut:</p>
		<ol>
			<li>Setiap tamu diharapkan memiliki identitas resmi (KTP/SIM/Paspor) yang valid.</li>
			<li>Tamu diharapkan mematuhi aturan dan prosedur keamanan yang berlaku di DPRD Kota Semarang.</li>
			<li>Tamu diharapkan menjaga kesopanan dan tata krama selama kunjungan.</li>
		</ol>

		<p>Kami berharap kunjungan ini dapat berjalan dengan lancar dan memberikan manfaat yang positif bagi kedua belah pihak. Apabila terdapat perubahan jadwal atau hal-hal yang perlu disampaikan, harap segera menghubungi kami melalui kontak yang tertera di bawah ini.</p>

		<p>Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>


	</div>
</body>

</html>

</body>

</html>