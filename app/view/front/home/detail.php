<div style="margin: 10px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 my-3">
        <h2><?=$ckm->judul?></h2>
      </div>
      <div class="col-12">
        <div class="bg-light">
        <ul class="nav">
          <li class="nav-item nav-link text-dark">
            <i>KATEGORI></i>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="#"></a>
          </li>
        </ul>
        </div>
      </div>
    </div>
     
    <div class="row mt-3">
      <div class="col-sm-2 bg-light text-center">
        <div class="my-3">
          <div class="row">
            <div class="col-sm-12 col-4 mb-2">
              <svg class="img-fluid rounded" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
            </div>
            <div class="col-sm-12 col-7 align-self-sm-baseline">
            <?php if(isset($sess->user->id) && ($sess->user->id == $article->b_user_id)){?>
              <a class="text-dark" style="text-decoration: none;" href="<?=base_url ('profile')?>"><h5><?=$ckm->penulis->username?></h5></a>
            <?php }else{?>
                <a class="text-dark" style="text-decoration: none;" href="<?=base_url ('profile/detail/'.$ckm->penulis->id)?>"><h5><?=$ckm->penulis->username?></h5></a>
            <?php }?>
              <div class="d-block bg-primary text-white btn-sm mb-3"><?=$ckm->penulis->role?></div>
            <div class="col-sm-12 col-12 justify-content-sm-center">
              <p><i class="far fa-copy mx-2"></i><?=$ckm->penulis->postcount?></p>
              <p><i class="far fa-thumbs-up mx-2"></i><?=$ckm->penulis->likecount?></p>
            </div>
          </div>
          </div>
        </div>
      </div>
       
      <div class="col-sm-10 shadow p-3 bg-body rounded">
        <div class="row mb-3">
        <div class="col-6">
          <p><small><?=$ckm->cdate?></small></p>
        </div>
          <?php if(isset($sess->user->id) && ($sess->user->id == $article->b_user_id || $sess->user->role == 'admin' || $sess->user->role == 'owner')){ ?>
            <div class="col-6 text-end">
              <div class="btn-group" role="group" aria-label="Basic example">
                <a href="<?=base_url()?>artikel/edit/<?=$article->id?>" class="btn btn-primary">Edit</a>
                <a href="<?=base_url()?>artikel/hapus/<?=$article->id?>" class="btn btn-danger">Hapus</a>
              </div>
            </div>
          <?php } ?>
        </div>
          <p><img src="<?php echo $ckm->img ?>" class="img-fluid mx-auto d-block" alt="..."></p>
          <p style="text-align: justify;"><?=$ckm->isi?></p>
      </div>
    </div>  
   
      <br>

      <hr>
      <?php if(count($ckm->komentar)>0){ ?>
        <?php foreach($ckm->komentar as $k){ ?>
          <div class="row mt-3">
            <div class="col-sm-2 bg-light text-center">
              <div class="my-3">
                <div class="row">
                  <div class="col-sm-12 col-4 mb-2">
                    <svg class="img-fluid rounded" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
                  </div>
                  <div class="col-sm-12 col-7 align-self-sm-baseline">
                    <?php if(isset($sess->user->id) && ($sess->user->id == $k->b_user_id)){?>
                      <a class="text-dark" style="text-decoration: none;" href="<?=base_url ('profile')?>"><h5><?=$k->penulis_nama?></h5></a>
                    <?php }else{?>
                      <a class="text-dark" style="text-decoration: none;" href="<?=base_url ('profile/detail/'.$k->b_user_id)?>"><h5><?=$k->penulis_nama?></h5></a>
                    <?php }?> 
                    <div class="d-block bg-primary text-white btn-sm mb-3"><?=$k->penulis_role;?></div>
                  <div class="col-sm-12 col-12 justify-content-sm-center">
                    <p><i class="far fa-copy mx-2"></i><?=$k->total_post?></p>
                    <p><i class="far fa-thumbs-up mx-2"></i><?=$k->likecount?></p>
                  </div>
                </div>
                </div>
              </div>
            </div>
            
            <div class="col-sm-10 shadow p-3 bg-body rounded">
              <div class="row">
                <div class="col-6">
                  <p><small><?=$k->date_post;?></small></p>
                </div>
                <?php if(isset($sess->user->id) && ($sess->user->id == $k->b_user_id || $sess->user->role == 'admin' || $sess->user->role == 'owner')){ ?>
                  <div class="col-6 text-end">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="<?=base_url()?>komentar/hapus/<?=$article->id?>/<?=$k->id?>" class="btn btn-danger">Hapus</a>
                  </div>
                </div>
                <?php } ?>
              </div>
                <p><?=$k->komentar?></p>
            </div>
          </div>
        <?php } ?>
      <?php }else{ ?>
        <p class="text-center">tidak ada balasan posting</p>
      <?php } ?>

      <?php if(isset($sess->user->id)){ ?>
      <form action="<?=base_url('komentar/proses')?>" method="post">
        <div class="container row">
        <div class="col mt-5">
          <div class="d-flex form-floating">
            <textarea class="form-control" id="iisi" name="isi" placeholder="Leave a comment here" style="height: 100px"></textarea>
            <input type="hidden" name="c_konten_id" value="<?=$ckm->id?>">
            <label for="iisi">Post reply</label>
          </div>
          <div class="d-flex justify-content-end mb-4">
            <button  class="btn btn-secondary mt-3">Post</button>
          </div>
        </div>
        </div>
      </form>
      <?php }else{ ?>
      <?php } ?>

    </div>
    </div>
  </div>
</div>