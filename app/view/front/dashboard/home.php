<div class="container">
  <div class="row">
    <div class="col s12">
      <h1><small>Selamat Datang</small> <?=$sess->user->username?></h1>
      <?php if($sess->user->role == 'admin' || $sess->user->role == 'owner') { ?>
      <a href="<?=base_url('artikel/baru')?>" class="btn btn-success">
        <i class="fa fa-plus"></i> Artikel
      </a>
      <?php } ?>
    </div>
  </div>
</div>