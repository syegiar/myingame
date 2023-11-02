<div class="container">
    <div class="container-fluid">
        <div class="container-fluid py-5">
            <div class="card shadow">
                <h5 class="card-header bg-light">Profile</h5>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <img src="https://i0.wp.com/itpoin.com/wp-content/uploads/2014/06/guest.png" class="img-thumbnail" width="200px" alt="...">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-text text-center"><?= $sess->user->username ?></h5>
                            <div class="bg-primary text-white btn-sm mb-3 text-center"><?php echo $bum->role; ?></div>
                            <div class="row text-center mb-3">
                                <div class="col">
                                    <i class="fas fa-thumbs-up fa-lg"></i> <?php echo $bum->likecount ?>
                                </div>
                                <div class="col">
                                    <i class="far fa-copy fa-lg"></i> <?php echo $bum->postcount; ?>
                                </div>
                            </div>
                            <table class="card-text table table-borderless">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?php echo $bum->name; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?php echo $bum->bdate; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?php echo $bum->address; ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Registrasi</td>
                                    <td>:</td>
                                    <td><?php echo $bum->cdate; ?></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td><?php echo $bum->description; ?></td>
                                </tr>
                            </table>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Edit Profile
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php if (isset($sess->flash) && strlen($sess->flash) > 0) { ?>
                                                <div class="row">
                                                    <!-- Message Notification -->
                                                    <div class="alert alert-danger" role="alert">
                                                        <p class="white-text"><b>Alert:</b> <?= $sess->flash ?></p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <form id="fprofile" action="<?= base_url() ?>profile/proses" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <label for="formFile" class="form-label">Profile Picture</label>
                                                        <input class="form-control" type="file" id="ifoto" name="gambar">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="iusername" class="form-label">Username</label>
                                                        <input type="text" class="form-control" value="<?= $bum->username ?>" id="iusername" name="username">
                                                    </div>
                                                    <?php if ($sess->user->role == 'owner') { ?>
                                                        <div class="col-12">
                                                            <label for="irole" class="form-label">Set Role</label>
                                                            <select id="irole" class="form-select" name="role">
                                                                <option value="owner" <?php if ($bum->role == 'owner') echo 'selected'; ?>>Owner</option>
                                                                <option value="admin" <?php if ($bum->role == 'admin') echo 'selected'; ?>>Administrator</option>
                                                                <option value="user" <?php if ($bum->role == 'user') echo 'selected'; ?>>User</option>
                                                            </select>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="col-12">
                                                            <label for="irole" class="form-label">Role</label>
                                                            <select id="irole" class="form-select" name="role" disabled>
                                                                <option value="owner" <?php if ($bum->role == 'owner') echo 'selected'; ?>>Owner</option>
                                                                <option value="admin" <?php if ($bum->role == 'admin') echo 'selected'; ?>>Administrator</option>
                                                                <option value="user" <?php if ($bum->role == 'user') echo 'selected'; ?>>User</option>
                                                            </select>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="col-sm col-12">
                                                        <label for="iname" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" value="<?= $bum->name ?>" id="iname" name="name">
                                                    </div>
                                                    <div class="col-sm col-12">
                                                        <label for="ibdate" class="form-label">Tanggal Lahir</label>
                                                        <input type="date" class="form-control" value="<?= $bum->bdate ?>" id="ibdate" name="bdate">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="iaddress" class="col-form-label">Alamat</label>
                                                        <textarea class="form-control" id="iaddress" name="address"><?= $bum->address ?></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="idescription" class="col-form-label">Deskripsi</label>
                                                        <textarea class="form-control" id="idescription" name="description"><?= $bum->description ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>