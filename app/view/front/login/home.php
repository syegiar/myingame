<main class="login">
  <div class="container">
    <div class="container-fluid">
      <div class="row my-5 justify-content-center">
        <div class="col-lg-6 col-sm-9 bg-light">
          <div class="shadow p-5 my-4 bg-body rounded">
            <form id="flogin" action="<?=base_url()?>login/proses" method="post">

            <?php if(isset($sess->flash) && strlen($sess->flash)>0){ ?>
          <div class="row">
            <!-- Message Notification -->
            <div class="col s12 red darken-2">
              <p class="white-text"><b>Alert:</b> <?=$sess->flash?></p>
            </div>
          </div>
          <?php } ?>

              <legend class="text-center mb-5"><h2>Login</h2></legend>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input class="form-control" type="text" id="iusername" name="username" reqired>
                <div class="form-text"><a class="nav-link text-secondary" href="<?=base_url('register')?>">Don't have an account? register here!</a></div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input class="form-control" type="password" id="ipassword" name="password" required>
                <div class="form-text"><a class="nav-link text-secondary" href="#">Forget the password? click here!</a></div>
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-dark">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>