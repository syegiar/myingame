<main class="register">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md">
                <div class="card mt-5 mb-5 shadow border border-light border-2">
                    <div class="card-header">
                        <h3>New Post</h3>
                    </div>
                <div class="card-body">
                    <?php if(isset($sess->flash) && strlen($sess->flash)>0){ ?>
                        <div class="row">
                        <!-- Message Notification -->
                        <div class="alert alert-danger" role="alert">
                            <p class="white-text"><b>Alet</b> <?=$sess->flash?></p>
                        </div>
                    <?php } ?>
                    <form id="fartikel_tambah" action="<?=base_url()?>artikel/proses" method="post">
                        <div class="row mb-2">
                            <div class="col">
                                <label class="mb-2" for="iplatform">Platform</label>
                                <select class="form-select" id="iplatform" name="platform">
                                    <option selected disabled hidden>~Platform~</option>
                                    <option value="1">PC</option>
                                    <option value="2">Console</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="mb-2" for="igenre">Genre</label>
                                <select class="form-select" id="igenre" name="genre">
                                    <option selected disabled hidden>~Genre~</option>
                                    <option value="12">Action</option>
                                    <option value="13">Adventure</option>
                                    <option value="20">Card</option>
                                    <option value="21">Casino</option>
                                    <option value="5">FPS</option>
                                    <option value="15">Horror</option>
                                    <option value="19">Idle</option>
                                    <option value="8">MMORPG</option>
                                    <option value="6">MOBA</option>
                                    <option value="16">Open World</option>
                                    <option value="17">Pixel</option>
                                    <option value="11">Puzzle</option>
                                    <option value="18">Racing</option>
                                    <option value="7">RPG</option>
                                    <option value="3">Sandbox</option>
                                    <option value="10">Sports</option>
                                    <option value="4">Strategy</option>
                                    <option value="14">Survival</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm12 mb-2">
                                <label class="mb-2" for="ijudul">Judul</label>
                                <input class="form-control" id="ijudul" type="text" name="judul" placeholder="judul artikel" required/>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12 mb-2">
                            <label class="mb-2" for="iimg">img URL</label>
                                <input class="form-control" id="iimg" type="text" name="img" placeholder="img artikel" required/>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-12 mb-2">
                            <label class="mb-2" for="iisi">isi</label>
                                <input class="form-control" id="iisi" type="text" name="isi" placeholder="isi artikel" required/>
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