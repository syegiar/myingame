<div style="margin: 10px;">
    <div class="container-fluid">
        <div class="row mt-2 mb-2">
            
            <div class="col-12">
                <br>
                <h3>Search For "<?=($keyword)?>"</h3>
            </div>
        </div>
        <div class="row justify-content-end mb-3">
            <div class="col-sm-4 col-lg-3">
                <form class="d-flex" action="<?=base_url('search/result')?>">
                    <input name="keyword" class="form-control ms-5" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="icon-search"></i></button>
                </form>
            </div>
        </div>
            <div class="row border shadow">
            <div class="col-lg-12 mb-3 mt-2">
            <div class="d-flex justify-content-between border-bottom mb-3">
                
            </div>
            <?php if(count($ckm)){ foreach($ckm as $a) {?>
                <div class="container-fluid">
                    <div class="row mb-2 bg-light shadow-sm">
                        <div class="col-auto col-sm-auto mt-3">
                        <img src="https://www.trashedgraphics.com/wp-content/uploads/2012/02/default_icon-778x584.jpg" width="70px">
                    </div>
                    <div class="col col-sm">
                        <p><strong><a class="nav-border list-group-item-action" href="<?=base_url('home/detail/'.$a->id)?>"><?=substr(strip_tags($a->judul),0,100).''?></a></strong><br>
                        <small><?=$a->username?>   | <?=$a->cdate?></small></p>
                    </div>
                    <div class="row justify-content-evenly justify-content-sm-end">
                        <div class="col-4">
                            View : <?=$a->viewcount?>
                        </div>
                        <div class="col-4">
                            Replies: <?=$a->replycount?>
                        </div>
                    </div>
                </div>
            </div>
                    <?php } }else{ ?>
            <div class="co-12">
                <div class="alert alert-succes" role="alert">
                    Hasil pencarian tidak ditemukan
                </div>
            </div>
            <?php } ?>
                <div class="d-flex justify-content-between border-top mt-2">
                <div class="col">
                
                </div>
            </div>
            </div>
        </div>
    </div>
</div>