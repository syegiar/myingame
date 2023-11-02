<nav class="navbar-dark bg-dark sticky-top">
<div class="container=fluid">
  <header class="blog-header mx-3 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-sm-4 col-3 pt-1">
        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="icon-align-justify fs-4" style="color: white"></i></button>
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
          <div class="offcanvas-header">
            <h4 class="offcanvas-titl0" id="offcanvasWithBothOptionsLabel">Menu</h4>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="list-group list-group-flush">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><a class="nav-link list-group-item-action" href="<?=base_url('artikel/baru')?>">Create Post</a></li>
                <li class="list-group-item"><a class="nav-link list-group-item-action" href="#!">Lastest Post</a></li>
                <li class="list-group-item"><a class="nav-link list-group-item-action" href="#!">Active Post</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-6 text-center">
      <a class="navbar-brand fs-4 fw-bold" href="<?=base_url('')?>">MyInGame</a>
      </div>
      <div class="col-sm-4 col-2 d-flex justify-content-end align-items-center">
      <div class="dropdown">
        <button class="btn btn-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="icon-user fs-3" style="color: white"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <?php if(isset($sess->user->id)){ ?>
            <li><a class="dropdown-item" href="<?=base_url('profile')?>">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="<?=base_url('logout')?>">Logout</a></li>
          <?php } else { ?>
          <li><a class="dropdown-item" href="<?=base_url('register')?>">Sign Up</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="<?=base_url('login')?>">Log In</a></li>
          <?php } ?>
        </ul>
      </div>    
      </div>
    </div>
  </header>
</div>
</nav>