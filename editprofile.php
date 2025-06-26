<div class="container">
                <div class="profile-form">
                    <h2>Edit Profile</h2>
                    <form method="post">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" name="fullname" value=" <?php echo $data['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" value=" <?php echo $data['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Number</label>
                        <input type="text" class="form-control" name="contact" value=" <?php echo $data['contact'] ?>" >
                    </div>
                    <button type="submit" class="btn btn-primary" name="Update_button">Update</button>
                </form>
                </div>
            </div>