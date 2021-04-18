	<?php require 'head.php' ?>
<body>
		<div class="modal">
			<div class="modal-body">
		<div class="form">
			<div class="modal-title"><h1>Tambah Barang</h1></div>
			<br><br>
		<form method="POST" action="../vendor/insert_barang">
			<div class="rows">
				
			
			<div class="column">
			<label for="">kode barang</label>
			<br><br>
			<input type="text" name="kode_barang" required>
			<br><br>
			<label for="">Nama barang</label>
			<br><br>
			<input type="text" name="nama_barang" required>
			<br><br>
			<label for="">Harga barang</label>
			<br><br>
			<input type="number" name="harga_barang"  required>
			<br><br>
			</div>
			<div class="column">
			<label for="">satuan</label>
			<br><br>
			<select name="satuan">
				<option value="biji">Biji</option>
				<option value="PCS">PCS</option>
				<option value="UNIT">UNIT</option>
				<option value="sachet">sachet</option>
			</select>
			<br><br>
			<label for="">diskon</label>
			<br><br>
			<input type="text" name="diskon"  required>
			<br><br>
				<label for="">jumlah</label>
			<br><br>
			<input type="number" name="jumlah"  required>
			<br><br>
			</div>
			</div>
			<button class="btn" name="done">Submit</button>
			<br><br>
			<button class="btn-delete" type="button" onclick="closeModal();">Batal</button>
		</form>
		</div>
			</div>
			<br><br>
		</div>
		<br>
<div class="container">
	<div class="jumbotron">
		
			
		<button class="btn skyblue to-right" onclick="history.back();">Kembali <i class="far fa-arrow-right right"></i></button>
		<br><br>
		<h1>Barang</h1>
		<br>
		<button class="btn skyblue" onclick="showModal();">Tambah Barang<i class="far fa-plus-circle r-icon"></i></button>
		<br><br>
		<div class="box">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
		<div class="wrap-table">
        <thead>
            <tr>
                <th>id_barang</th>
                <th>kode_barang</th>
                <th>nama_barang</th>
                <th>harga</th>
                <th>satuan</th>
                <th>diskon</th>
                <th>jumlah</th>
                <th>tanggal_masuk</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	    include '../vendor/connect.php';
        		$sql = "SELECT * FROM barang";
				$query = mysqli_query($connect,$sql);

				while ($rows = mysqli_fetch_array($query)) {
        	?>
            <tr>
            	
                    <td><?php echo $rows['id_barang']; ?></td>
				    <td><?php echo $rows['kode_barang']; ?></td>
				    <td><?php echo $rows['nama_barang'];?></td>
					<td>Rp.<?php echo $rows['harga_barang']; ?></td>
					<td><?php echo $rows['satuan']; ?></td>
					<td><?php echo $rows['diskon']; ?>%</td>
					<td><?php echo $rows['jumlah']; ?></td>
					<td><?php echo $rows['tanggal_masuk']?></td>
					<td>
					<a href="../vendor/update_barang?id_barang=<?php echo $rows['id_barang']?>"><button title="Ubah" class="btn-update"><i class="far fa-edit"></i></button></a>
					<a href="../vendor/update_barang?id_barang=<?php echo $rows['id_barang']?>"><button title="Ubah Stock" class="btn-update skyblue"><i class="far fa-edit"></i></button></a>
					<a href="../vendor/delete_barang?id_barang=<?php echo $rows['id_barang']?>">
					<button title="Hapus" class="btn-delete" onclick="return confirm('Apakah anda yakin ingin menghapus field ini?');"><i class="far fa-trash"></i></button></a>
			</td>
			
            </tr>
        <?php } ?> 
        </tbody>
          <tfoot>
          	<tr></tr>
        </tfoot>
        </div>
    </table>

		</div>
	</div>
</div>
<br><br>
</body>
</html>
<style>
	.column{
		width: 100%;
	}
	.rows{
		display: flex;
	}
	table{
		
	}
</style>
<script>
	document.title = "Kasir - Barang";

document.querySelector(".link2").style.fontWeight = "600";
</script>