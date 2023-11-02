<main class="register">
    <div class="container">
      <div class="container-fluid">
        <div class="row my-5 justify-content-center">
        <div class="col-lg-7 col-sm-9 bg-light">
          <div class="shadow p-5 my-4 bg-body rounded">
            <form id="register" action="<?=base_url()?>/register/proses" method="post">
              <legend class="mb-5 text-center"><h2>Register</h2></legend>
              <div class="row mb-5">
                <div class="col">
                  <label for="exampleInputEmail1" class="form-label">Username</label>
                </div>
                <div class="col-md-8">
                  <input class="form-control" type="username" id="iusername" name="username" required>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col">
                  <label for="exampleInputEmail1" class="form-label">Email Address</label>
                </div>
                <div class="col-md-8">
                 <input class="form-control" type="email" id="iemail" name="email" required>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col">
                  <label for="exampleInputPassword1" class="form-label">Password</label required>
                </div>
                <div class="col-md-8">
                 <input class="form-control" type="password" id="ipassword" name="password" required>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col">
                  <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                </div>
                <div class="col-md-8">
                  <input class="form-control" type="password" id="ipassword_konfirmasi" name="password_konfirmasi" required>
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-dark">Register</button>
              </div>
            </form>
           </div>
          </div>
      </div>
      </div>
    </div>
</main>