<div class="container">
                    <div class="col-md-6 mx-auto">
                    <h2 class="text-center mb-4">Change Password</h2>
                    <form id="changePasswordForm" method="post">
                        <div class="form-group">
                            <label for="oldPassword">Old Password</label>
                            <input type="password" class="form-control" id="oldPassword" name="op">
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="np" required>
                        </div>
                        <div class="form-group">
                            <label for="reenterPassword">Re-enter New Password</label>
                            <input type="password" class="form-control" id="reenterPassword" name="rp">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="update_pass_button">Update Password</button>
                    </form>
                <div id="message" class="mt-3"></div>
                    </div>
                </div>