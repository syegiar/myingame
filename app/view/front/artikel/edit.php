<main class="register">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md">
                <div class="card mt-5 mb-5 shadow border border-light border-2">
                    <div class="card-header">
                        <h3>Edit Post</h3>
                    </div>
                <div class="card-body">
                    <?php if(isset($sess->flash) && strlen($sess->flash)>0){ ?>
                        <div class="row">
                        <!-- Message Notification -->
                        <div class="alert alert-danger" role="alert">
                            <p class="white-text"><b>Alet</b> <?=$sess->flash?></p>
                        </div>
                    <?php } ?>
                    <form id="fartikel_tambah" action="<?=base_url()?>artikel/proses_edit/<?= $id?>" method="post">
                        <div class="row mb-2">
                        <input type="hidden" name="b_user_id" value="<?=$ckm->b_user_id?>">
                            <div class="col">
                                <label class="mb-2" for="iplatform">Platform</label>
                                <select class="form-select" id="iplatform" name="platform">
                                    <option selected hidden disabled>~Platform~</option>
                                    <option value="1"<?php if ($ckm->b_kategori_id == '1') echo ' selected="selected"'; ?>>PC</option>
                                    <option value="2"<?php if ($ckm->b_kategori_id == '2') echo ' selected="selected"'; ?>>Console</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="mb-2" for="igenre">Genre</label>
                                <select class="form-select" id="igenre" name="genre" value="">
                                    <option selected disabled hidden>~Genre~</option>
                                    <option value="12"<?php if ($ckm->b_kategori_id_genre == '12') echo ' selected="selected"'; ?>>Action</option>
                                    <option value="13"<?php if ($ckm->b_kategori_id_genre == '13') echo ' selected="selected"'; ?>>Adventure</option>
                                    <option value="20"<?php if ($ckm->b_kategori_id_genre == '20') echo ' selected="selected"'; ?>>Card</option>
                                    <option value="21"<?php if ($ckm->b_kategori_id_genre == '21') echo ' selected="selected"'; ?>>Casino</option>
                                    <option value="5"<?php if ($ckm->b_kategori_id_genre == '5') echo ' selected="selected"'; ?>>FPS</option>
                                    <option value="15"<?php if ($ckm->b_kategori_id_genre == '15') echo ' selected="selected"'; ?>>Horror</option>
                                    <option value="19"<?php if ($ckm->b_kategori_id_genre == '19') echo ' selected="selected"'; ?>>Idle</option>
                                    <option value="8"<?php if ($ckm->b_kategori_id_genre == '8') echo ' selected="selected"'; ?>>MMORPG</option>
                                    <option value="6"<?php if ($ckm->b_kategori_id_genre == '6') echo ' selected="selected"'; ?>>MOBA</option>
                                    <option value="16"<?php if ($ckm->b_kategori_id_genre == '16') echo ' selected="selected"'; ?>>Open World</option>
                                    <option value="17"<?php if ($ckm->b_kategori_id_genre == '17') echo ' selected="selected"'; ?>>Pixel</option>
                                    <option value="11"<?php if ($ckm->b_kategori_id_genre == '11') echo ' selected="selected"'; ?>>Puzzle</option>
                                    <option value="18"<?php if ($ckm->b_kategori_id_genre == '18') echo ' selected="selected"'; ?>>Racing</option>
                                    <option value="7"<?php if ($ckm->b_kategori_id_genre == '7') echo ' selected="selected"'; ?>>RPG</option>
                                    <option value="3"<?php if ($ckm->b_kategori_id_genre == '3') echo ' selected="selected"'; ?>>Sandbox</option>
                                    <option value="10"<?php if ($ckm->b_kategori_id_genre == '10') echo ' selected="selected"'; ?>>Sports</option>
                                    <option value="4"<?php if ($ckm->b_kategori_id_genre == '4') echo ' selected="selected"'; ?>>Strategy</option>
                                    <option value="14"<?php if ($ckm->b_kategori_id_genre == '14') echo ' selected="selected"'; ?>>Survival</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm12 mb-2">
                                <label class="mb-2" for="ijudul">Judul</label>
                                <input class="form-control" id="ijudul" type="text" name="judul" value="<?=$ckm->judul?>" placeholder="judul artikel" required/>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12 mb-2">
                            <label class="mb-2" for="iimg">img URL</label>
                                <input class="form-control" id="iimg" type="text" name="img" value="<?=$ckm->img?>" placeholder="img artikel" required/>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12 mb-2">
                            <label class="mb-2" for="iisi">isi</label>
                                <input class="form-control" id="iisi" type="text" name="isi" value="<?=$ckm->isi?>" placeholder="isi artikel" required/>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12 mb-2">
                            <div class="center-align">
                                <button class="btn btn-primary" type="submit" name="action">
                                    Simpan artikel <i class="fa fa-save"></i>
                                </button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>