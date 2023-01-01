<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<h1 class="h3 mb-3"><strong>Users'</strong> List  <button class="btn btn-primary btn-sm float-end btnAdd" data-bs-toggle="modal" data-bs-target="#formUserModal">Create New User</button></h1>
<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="d-none d-xl-table-cell">Email-Id</th>
                                <th>Mail Status</th>
                                <th>Mobile Number</th>
                                <th>Role</th>
                                <!-- <th>Created at</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Users as $users) : ?>
                                <tr>
                                    <td><?= $users['first_name'].' '.$users['last_name']; ?></td>
                                    <td class="d-none d-md-table-cell"><?= $users['email']; ?></td>
                                    <td class="d-none d-md-table-cell"><?= $users['mail_status']; ?></td>
                                    <td class="d-none d-md-table-cell"><?= $users['mobile_number']; ?></td>
                                    <td><span class="badge bg-success"><?= $users['role_name']; ?></span></td>
                                    <!-- <td><?= $users['created_at']; ?></td> -->
                                    <td>
                                        <button class="btn btn-info btn-sm btnEdit" data-bs-toggle="modal" data-bs-target="#formUserModal" data-id="<?= $users['userID']; ?>" data-first_name="<?= $users['first_name']; ?>" data-last_name="<?= $users['last_name']; ?>" data-username="<?= $users['email']; ?>" data-mobile_number="<?= $users['mobile_number'] ?>" data-role="<?= $users['role']; ?>">Edit</button>

                                        <?php if ($users['email'] != session()->get('username')) : ?>
                                            <form action="<?= base_url('users/deleteUser/' . $users['userID']); ?>" method="post" class="d-inline">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete <?= $users['first_name']; ?> ?')">Delete</button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="formUserModal" tabindex="-1" aria-labelledby="formUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formUserModalLabel">Create New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('users/createUser'); ?>" method="POST" onsubmit="if(!form_validation()){return false;}">
                <div class="modal-body">
                    <input type="hidden" name="userID" id="userID">
                    <div class="mb-3">
                        <div class="row">
                                <div class="col-3">
                        <label for="first_name" class="col-form-label">First Name:</label>
                        </div>
                        <div class="col-6">
                        <input type="text" class="form-control" name="first_name" id="first_name" required>
                        </div>
                    </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                                <div class="col-3">
                        <label for="last_name" class="col-form-label">Last Name:</label>
                        </div>
                        <div class="col-6">
                        <input type="text" class="form-control" name="last_name" id="last_name" required>
                        </div>
                    </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                                <div class="col-3">
                        <label for="email_id" class="col-form-label">Email-Id:</label>
                        </div>
                        <div class="col-6">
                        <input type="email" class="form-control" name="email" id="email_id" required>
                        </div>
                    </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                                <div class="col-3">
                        <label for="mobile_number" class="col-form-label">Mobile Number:</label>
                        </div>
                        <div class="col-6">
                        <input type="text" class="form-control" name="mobile_number" id="mobile_number" required>
                        </div>
                    </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                                <div class="col-3">
                        <label for="password" class="col-form-label">Password:</label>
                        </div>
                        <div class="col-6">
                        <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                                <div class="col-3">
                        <label for="password2" class="col-form-label">Confirm Password:</label>
                        </div>
                        <div class="col-6">
                        <input type="password" class="form-control" name="password2" id="password2">
                        </div>
                    </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-3">
                        <label for="role" class="col-form-label">Role:</label> 
                            </div>
                         <div class="col-6">   
                        <select name="role" id="role" class="form-control" required>
                            <option value="">-- Choose User Role --</option>
                            <?php foreach ($UserRole as $userRole) : ?>
                                <option value="<?= $userRole['id']; ?>"><?= $userRole['role_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url('/assets/js/form-validation.js') ?>"></script>
<script>
    $(document).ready(function() { 

         $(".btnAdd").click(function() {
            $('#formUserModalLabel').html('Create New User');
            $('#userID').val('');
            $('#first_name').val('');
            $('#last_name').val('');
            $('#email_id').val('');
            $('#mobile_number').val('');
            $('#password').val('').attr('required',true);
            $('#password2').val('').attr('required',true);
            $('#email_id').removeAttr('readonly');
        });

        $(".btnEdit").click(function() {
            const userId = $(this).data('id');
            const first_name = $(this).data('first_name');
            const last_name = $(this).data('last_name');
            const username = $(this).data('username');
            const mobile_number = $(this).data('mobile_number');
            const role = $(this).data('role');

            $('#password').removeAttr('required');
            $('#password2').removeAttr('required');

            $('#formUserModalLabel').html('Update user details');
            $('.modal-content form').attr('action', '<?= base_url('users/updateUser') ?>');
            $('#userID').val(userId);
            $('#first_name').val(first_name);
            $('#last_name').val(last_name);
            $('#email_id').val(username);
            $('#mobile_number').val(mobile_number); 
            $('#email_id').attr('readonly', true);
            $('#password').attr('required', false);
            $('#role').val(role);
        }); 
    });
</script>
<?= $this->endSection(); ?>