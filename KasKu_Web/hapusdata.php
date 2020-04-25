<?php
    include "connect.php";

    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 
    
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT * FROM penyimpanan WHERE id = $id";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>
 
        <!-- MEMBUAT FORM -->
        <form action="delete.php" method="post">
        <h5><strong>Apakah anda yakin ingin menghapus data ini?</strong></h5><br>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <input type="hidden" name="id" value="<?php echo $baris['id'] ?>">
        <input type="submit" class="btn btn-danger" value="Hapus">
        </form>
        <?php } }
    $koneksi->close();
?>