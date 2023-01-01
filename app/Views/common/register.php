<!DOCTYPE html>
<html lang="en">
<head> 
<title>Ci 4 Basic Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('/assets/js/form-validation.js') ?>"></script>
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Welcome to CodeIgniter 4 Basic Panel</h1>
                            <p class="lead">
                                Register New Account
                            </p>
                        </div>
                        <?= $this->include('common/alerts'); ?>
                        <div class="card">
                            <form action="<?= base_url('register'); ?>" method="POST" onsubmit="if(!form_validation()){return false;}">
                                <div class="card-body">
                                    <div class="m-sm-4">
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-4">
                                            <label class="form-label">First Name</label>
                                            </div>
                                            <div class="col-8">
                                            <input class="form-control form-control-lg" type="text" name="first_name" id="first_name" placeholder="Enter your first name" required />
                                            </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-4">
                                            <label class="form-label">Last Name</label>
                                            </div>
                                            <div class="col-8">
                                            <input class="form-control form-control-lg" type="text" name="last_name" id="last_name" placeholder="Enter your last name" required />
                                            </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-4">
                                            <label class="form-label">Mobile Number</label>
                                            </div>
                                            <div class="col-8">
                                            <input class="form-control form-control-lg" type="text" name="mobile_number" id="mobile_number" placeholder="Enter your mobile number" required />
                                            </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-4">
                                            <label class="form-label">Email</label>
                                            </div>
                                            <div class="col-8">
                                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required />
                                            </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-4">
                                            <label class="form-label">Password</label>
                                            </div>
                                            <div class="col-8">
                                            <input class="form-control form-control-lg" type="password" name="password" id="password" placeholder="Enter your password" required />
                                            </div>
                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-4">
                                            <label class="form-label">Confirm Password</label>
                                            </div>
                                            <div class="col-8">
                                            <input class="form-control form-control-lg" type="password" name="password2" id="password2" placeholder="Confirm your password" required />
                                            </div>
                                            </div>
                                            <small>
                                                <a href="<?= base_url() ?>">Have an account? Login</a>
                                            </small>
                                        </div>
                                    </div> 
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>
    </main>
</body>

</html>