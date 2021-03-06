<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $judul; ?> <small style="font-size: 12px;">Edit</small></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url($url); ?>"><?php echo $judul; ?></a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Data <?php echo $judul; ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form role="form" method="POST" action="<?php echo site_url($url.'/update'); ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="hidden" name="id" value="<?php echo $data->id; ?>" class="form-control" placeholder="Nama">
                <input type="text" name="nama" value="<?php echo $data->nama; ?>" class="form-control" placeholder="Nama">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" value="<?php echo $data->email; ?>" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
        			  <label for="exampleInputEmail1">Hak Akses</label>
                <select name="hak_akses" class="form-control" required>
        				<option value="">-</option>
        				<option <?php echo $data->hak_akses=="1"?"selected":""; ?> value="1">Operator</option>
        				<option <?php echo $data->hak_akses=="2"?"selected":""; ?> value="2">Kabupaten</option>
                <option <?php echo $data->hak_akses=="3"?"selected":""; ?> value="3">Provinsi</option>
        				<option <?php echo $data->hak_akses=="4"?"selected":""; ?> value="4">Pusat</option>
                </select>
        			</div>
              <div class="form-group">
        			  <label for="exampleInputEmail1">Provinsi</label>
                <select name="id_provinsi" id="provinsi" class="form-control">
                  <option value="">-</option>
                <?php
                  foreach($provinsi as $row) {
                ?>
                  <option <?php echo $data->id_provinsi==$row->id_prov?"selected":""; ?> value="<?php echo $row->id_prov; ?>"><?php echo $row->nama; ?></option>
                <?php
                  }
                ?>
                </select>
        			</div>
              <div class="form-group">
        			  <label for="exampleInputEmail1">Kabupaten</label>
                <select name="id_kabupaten" id="kabupaten" class="form-control">
                  <option value="">-</option>
                  <?php
                    foreach($kabupaten as $row) {
                  ?>
                    <option <?php echo $data->id_kabupaten==$row->id_kab?"selected":""; ?> value="<?php echo $row->id_kab; ?>"><?php echo $row->nama; ?></option>
                  <?php
                    }
                  ?>
                </select>
        			</div>
        			<div class="form-group">
        			  <label for="exampleInputEmail1">Status</label>
        			  <select name="status" class="form-control" required>
        				<option value="">-</option>
        				<option <?php echo $data->status=="1"?"selected":""; ?> value="1">Aktif</option>
        				<option <?php echo $data->status=="0"?"selected":""; ?> value="0">Tidak Aktif</option>
        			  </select>
        			</div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <a href="<?php echo site_url($url); ?>" class="btn btn btn-danger">
        			  <i class="fa fa-angle-double-left"></i> Back</a>
      			  <button type="submit" class="btn btn-primary">Simpan</button>
      			  <button type="reset" class="btn btn-warning">Batal</button>
            </div>
          </form>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<?php
	echo $this->session->flashdata('notif');
	echo $this->session->flashdata('audio');
?>
<script>
  $(function () {
    $("#provinsi").change(function() {
		var id = $("#provinsi").val();
		// return alert(id);

		$.ajax({

			url : '<?php echo site_url($url."/get_kabupaten"); ?>',
            data : 'id=' + id,
            type : 'get',
            success : function(result) {
                $("#kabupaten").html(result);

            }

		});

	});
  });
</script>
