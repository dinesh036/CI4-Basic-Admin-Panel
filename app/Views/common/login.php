<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Ci 4 Basic Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <?= $this->include('common/alerts'); ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mt-4">
                                    <h1 class="h2">Welcome to CodeIgniter 4 Basic Panel</h1>
                                    <p class="lead">
                                        Sign in to your account to continue
                                    </p>
                                </div>
                                <div class="m-sm-4">
                                    <form action="<?= base_url('GetLogin'); ?>" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label">Email-Id / Mobile Number</label>
                                            <input class="form-control form-control-lg" type="text" name="email" placeholder="Enter your email-id or registered mobile number" required/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password"/>
                                            <small>
                                                <a href="<?= base_url('register') ?>">Don't have an account? Register</a>
                                            </small>
                                        </div>
                                        <div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <input type="submit" class="btn btn-lg btn-primary" value="Sign in" name="submit">
                                            <input type="submit" class="btn btn-lg btn-warning" name="submit" value="Sign in With OTP">
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