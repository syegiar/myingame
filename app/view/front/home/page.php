<style type="text/css">
        .nav-border {
            text-decoration: none;
            color: black;
        }
        .nav-border:link {
            color: black;
        }
        .nav-border:hover {
            color: black;
        }
        .dropdown-large{ padding:1rem; }

		/* ============ desktop view ============ */
		@media all and (min-width: 992px) {
			.dropdown-large{min-width:300px;}
		}	
		/* ============ desktop view .end// ============ */
</style>
    <div class="container-fluid p-5 mb-5" style="background-position: center;background-image: url(https://media.istockphoto.com/vectors/abstract-black-background-people-pattern-vector-id1213224833?b=1&k=20&m=1213224833&s=170667a&w=0&h=ixZKr-t-Wm5A7k-MTUvyLrWNum3AoXKmgKFzvbZpHHU=)">
        <div class="container-md py-5 text-white rounded-3" >
            <h1 class="display-5 fw-bold">Welcome to MyInGame</h1>
            <p class="col-md-8 fs-4">A place for discussions, talks, directions, and information about the world of games</p>
        </div>
    </div>
<div style="margin:20px;">
    <div class="container-fluid">
        <div class="row justify-content-end mb-3">
            <div class="col-sm col-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Sort By
            </button>
            <div class="dropdown-menu dropdown-large">
                <form action="<?=base_url('search/result')?>" method="get">
                <div class="row g-3">
                    <div class="col-6">
                        <h6 class="title">PLATFORM</h6>
                        <ul class="list-unstyled">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="pc" name="platform[]" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                PC
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="console" name="platform[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Console
                                </label>
                            </div>
                        </ul>
                    </div><!-- end col-3 -->
                    <div class="col-3">
                        <h6 class="title">GENRES</h6>
                        <ul class="list-unstyled">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="action" name="genre[]" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                Action
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="adventure"  name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Adventure
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="card" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Card
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="cassino" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Cassino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="fps" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                FPS
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" vvalue="horror" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Horror
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="idle" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Idle
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="mmorpg" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                MMORPG
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="moba" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                MOBA
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="openworld" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                OpenWorld
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="pixel" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Pixel
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="puzzle" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Puzzle
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="racing" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Racing
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="rpg" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                RPG
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="sandbox" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Sandbox
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="sports" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Sports
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="strategy" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Strategy
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="survival" name="genre[]" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                Survival
                                </label>
                            </div>
                        </ul>
                    </div><!-- end col-3 -->
                    <button class="btn btn-outline-success" type="submit">Submit</button>
                </div><!-- end row -->
                </form>
            </div> <!-- dropdown-large.// -->
            </div>
            <div class="col-sm-4 col-lg-3 col-10">
                <form class="d-flex" action="<?=base_url('search/result')?>">
                    <input name="keyword" class="form-control ms-5" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="icon-search"></i></button>
                </form>
            </div>
        </div>
        <div class="row border bg-white shadow">
            <div class="col">
                <div class="row mb-2 mt-4">
                    <div class="col">
                        <ul class="pagination pagination-sm">
                            <li class="page-item <?=$page<=1 ? 'disabled' : '' ?>"><a class="page-link" href="<?=base_url('home/page/'.($page-1))?>">Previous</a></li>
                            <?php
                            $i=1;
                            $pagemax = $pagetotal;
                        ?>
                        <?php
                        if($pagetotal>5){
                            $i=$page-1;
                            if($i<=1) $i=1;
                            $pagemax = $page+5;
                        }
                        ?>
                        <?php for($i;$i<$pagemax;$i++){ ?>
                            <li class="page-item <?= $page==$i ? 'active' : '' ?>"><a class="page-link" href="<?=base_url('home/page/'.$i)?>"><?=$i?></a></li>
                            <?php } ?>
                            <li class="page-item <?=$page>$pagetotal ? 'disabled' : '' ?>"><a class="page-link" href="<?=base_url('home/page/'.($page+1))?>">Next</a></li>
                        </ul>
                    </div>
                    <div class="col text-end">
                    <?php if(isset($sess->user->id)){ ?>
                        <a href="<?=base_url('artikel/baru')?>" class="btn btn-success">
                            <i class="fa fa-plus"></i> New Post
                        </a>
                    <?php } ?>
                    </div>
                </div>
                <?php foreach($artikel_list as $kl) {?>
                        <div class="container-fluid">
                            <div class="row mb-2 bg-light shadow-sm">
                                <div class="col-auto col-sm-auto mt-3">
                                    <img src="https://www.trashedgraphics.com/wp-content/uploads/2012/02/default_icon-778x584.jpg" width="60px">
                                </div>
                                <div class="col col-sm mt-2">
                                    <p><strong><a class="nav-border list-group-item-action" href="<?=base_url('home/detail/'.$kl->id)?>"><?=substr(strip_tags($kl->judul),0,100).''?></a></strong><br>
                                    <small><?=$kl->username?>  | <?=$kl->cdate?></small></p>
                                </div>
                                <div class="row justify-content-evenly justify-content-sm-center">
                                    <div class="col-4">
                                        View :  <?=$kl->viewcount?>
                                    </div>
                                    <div class="col-4">
                                        Replies: <?=$kl->replycount?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php } ?>
                <div class="row mb-2 mt-4">
                    <div class="col">
                        <ul class="pagination pagination-sm">
                            <li class="page-item <?=$page<=1 ? 'disabled' : '' ?>"><a class="page-link" href="<?=base_url('home/page/'.($page-1))?>">Previous</a></li>
                            <?php
                            $i=1;
                            $pagemax = $pagetotal;
                        ?>
                        <?php
                        if($pagetotal>5){
                            $i=$page-1;
                            if($i<=1) $i=1;
                            $pagemax = $page+5;
                        }
                        ?>
                        <?php for($i;$i<$pagemax;$i++){ ?>
                            <li class="page-item <?= $page==$i ? 'active' : '' ?>"><a class="page-link" href="<?=base_url('home/page/'.$i)?>"><?=$i?></a></li>
                            <?php } ?>
                            <li class="page-item <?=$page>$pagetotal ? 'disabled' : '' ?>"><a class="page-link" href="<?=base_url('home/page/'.($page+1))?>">Next</a></li>
                        </ul>
                    </div>
                    <div class="col text-end">
                    <?php if(isset($sess->user->id)){ ?>
                        <a href="<?=base_url('artikel/baru')?>" class="btn btn-success">
                            <i class="fa fa-plus"></i> New Post
                        </a>
                    <?php } ?>
                    </div>
                </div>
            </div>
         </div>
         </div>
    </div>
    </div>
</div>