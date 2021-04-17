<table>
				<tr>
					<th>id_barang</th>
					<th>kode_barang</th>
					<th>nama_barang</th>
					<th>Harga</th>
					<th>satuan</th>
					<th>diskon</th>
					<th>Jumlah</th>
					<th>Tanggal_masuk</th>
					<th>Aksi</th>
				</tr>
				<tr>
				<?php

				include '../vendor/connect.php';
				error_reporting(0);
				$halaman = 5;
				$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
				$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
				$search = $_POST['search'];
				$sql2 = "SELECT * FROM barang LIMIT $mulai, $halaman";
				$query = mysqli_query($connect,$sql2);
				// $queries = mysqli_query($connect,$sql1);
				$queryCount = mysqli_query($connect,"SELECT * FROM `barang`");
				$row = mysqli_num_rows($queryCount);
				$pages = ceil($row/$halaman);
				$rows = mysqli_num_rows($query);
				if ($rows == 0) {
				echo "<td></td>";
				echo "<td></td>";
				echo "<td>Data tidak tersedia atau tidak ditemukan!</td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				}
		
				while ($rows = mysqli_fetch_array($query)){
					
				?>
				    <td><?php echo $rows['id_barang']; ?></td>
				    <td><?php echo $rows['kode_barang']; ?></td>
				    <td><?php echo $rows['nama_barang'];?></td>
					<td class="ellipsis"><span>Rp.<?php echo $rows['harga_barang']; ?></span></td>
					<td><?php echo $rows['satuan']; ?></td>
					<td><?php echo $rows['diskon']; ?></td>
					<td><?php echo $rows['jumlah']; ?></td>
					<td><?php echo $rows['tanggal_masuk']?></td>
					<td>
					<a href="../vendor/update_barang?id_barang=<?php echo $rows['id_barang']?>"><button class="btn-update">Ubah <i class="far fa-edit r-icon"></i></button></a>
					
					<a href="../vendor/delete_barang?id_barang=<?php echo $rows['id_barang']?>">
					<button class="btn-delete" onclick="return confirm('Apakah anda yakin ingin menghapus field ini?');">Hapus <i class="far fa-trash r-icon"></i></button></a>
			</td>
				</tr>

				<?php
			}
				?>
				<tr>
					<th><label for="">Ditampilkan data barang dari :  <b><?php echo 1; ?></b> ke <b><?php echo $halaman ?></b> </label></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th><label>Jumlah barang : <b><?php echo $row; ?></b></label></th>
				</tr> 
			</table>
			<br>
		</div>
		<div class="pagination">
  <a href="#" onclick="history.back();">Previous</a>
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>" class="active"><?php echo $i; ?></a>
  <?php } ?>
   <a href="#">Next</a>
</div>
</div>
	</div> 
</div>