<form action="save-kpr.php" method="post" enctype="multipart/form-data">
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title">Tambah KPR</h4> 
                </div> 
                <div class="modal-body"> 
                    <div class="row"> 
                        <?php
                        include 'conndb.php';

                        $carikode = mysqli_query($mysqli, "SELECT id_kpr from tbl_kpr") or die (mysqli_error());

                        $datakode = mysqli_fetch_array($carikode);
                        $jumlah_data = mysqli_num_rows($carikode);

                        if ($datakode) {

                         $nilaikode = substr($jumlah_data[0], 1);

                         $kode = (int) $nilaikode;

                         $kode = $jumlah_data + 1;

                         $kode_otomatis = "09".str_pad($kode, 2, "0", STR_PAD_LEFT);
                     } else {
                         $kode_otomatis = "01001";

                     }
                     ?>  
                     <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-1" class="control-label">ID KPR</label> 
                            <input type="text" name="id" class="form-control" id="field-1" readonly="" value="<?php echo $kode_otomatis ?>"> 
                        </div> 
                    </div> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-2" class="control-label">Bank</label> 
                            <select class="form-control" name="bank">
                                <?php 
                                include 'conndb.php';
                                $result = mysqli_query($mysqli,"SELECT * FROM tbl_bank");
                                while($row = mysqli_fetch_assoc($result))
                                {

                                    ?>
                                    <option value="<?php echo $row['id_bank'] ?>"><?php echo $row['nama_bank'] ?></option>
                                   <?php } ?>
                                </select> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <label for="field-3" class="control-label">Jumlah Pinjaman</label> 
                                <div class="col-md-12">

                                    <input type="text" id="example-input3-group1" data-a-sign="Rp " name="pinjaman" class="form-control autonumber" placeholder=".."> 
                                    <span class="font-13 text-muted">Rupiah</span>
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label for="field-1" class="control-label">Jangka Waktu</label> 
                                <select class="form-control" name="jangka_waktu">
                                  <option value="10 Tahun">10 Tahun</option>
                                  <option value="11 tahun">11 Tahun</option>
                                  <option value="12 Tahun">12 Tahun</option>
                                  <option value="13 Tahun">13 Tahun</option>
                                  <option value="14 Tahun">14 Tahun</option>
                              </select> 
                          </div> 
                      </div> 
                      <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label for="field-2" class="control-label">Bunga</label> 
                            <select class="form-control" name="bunga">
                                <option value="6,75%">6,75%</option>
                                <option value="5%">5%</option>
                                <option>3%</option>
                                <option>4%</option>
                                <option>5%</option>
                            </select>
                        </div> 
                    </div> 
                </div> 
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label for="field-3" class="control-label">Angsuran</label> 
                            <input type="text" class="form-control autonumber" data-a-sign="Rp " name="angsuran" id="field-3"> 
                        </div> 
                    </div> 
                </div> 


            </div> 
            <div class="modal-footer"> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save changes</button> 
            </div> 
        </div> 
    </div>
</div><!-- /.modal -->
</form>