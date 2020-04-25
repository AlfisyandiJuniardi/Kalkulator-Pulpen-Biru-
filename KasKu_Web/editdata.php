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
        <form action="update.php" method="post">
            <div class="form-row">
            <input type="hidden" name="id" value="<?php echo $baris['id'] ?>">
            <div class="form-group col-md-5">
              <label for="inputState">Jenis</label>
              <input type="hidden">
              <select id="inputState" class="form-control" name="jenis">
                <option
                    <?php if($baris['jenis'] == "Pemasukan"){ echo "selected "; } ?> 
                value="Pemasukan">Pemasukan</option>
                <option 
                    <?php if($baris['jenis'] == "Pengeluaran"){ echo "selected "; } ?> 
                value="Pengeluaran">Pengeluaran</option>
              </select>
            </div>
            <div class="form-group col-md-7">
                <label for="inputPassword4">Nominal</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Rp</span>
                    </div>
                <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name="nominal" value="<?php echo $baris['nominal'] ?>">
                </div>
            </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Tanggal</label>
                <input type="date" class="form-control" id="inputAddress" name="tanggal" value="<?php echo $baris['tanggal'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Catatan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="catatan" rows="3"><?php echo $baris['catatan'] ?></textarea>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
        <?php } }
    $koneksi->close();
?>