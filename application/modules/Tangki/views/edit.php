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
                <label for="exampleInputEmail1">Jenis BBM</label>
                <input type="hidden" name="id" value="<?php echo $data->id; ?>" class="form-control">
                <select name="id_jenis_bbm" class="form-control">
                <option value="">-</option>
                <?php 
                foreach($jenis_bbm as $row){
                ?>
                <option <?php echo $row->id == $data->id_jenis_bbm ? "selected" : ""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                <?php
                }
                ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Tangki</label>
                <input name="nama" class="form-control" value="<?php echo $data->nama;?>" placeholder="nama Tangki">
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
