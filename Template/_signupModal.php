<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">SignUp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
           

                <form action="/mobile/Template/_handleSignup.php" method="POST">
                    <div class="row form-group">
                        <div class="col">
                            <input type="text" id="fname" name="fname" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <label for="username">Username</label> -->
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" aria-describedby="emailHelp">

                    </div>
                    <div class="form-group">
                        <!-- <label for="username">Username</label> -->
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-describedby="emailHelp">

                    </div>
                    <div class="form-group">
                        <!-- <label for="password">Password</label> -->
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <!-- <label for="cpassword">Confirm Password</label> -->
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                        <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
                    </div>
                    <div class="form-group">
                        <!-- <label for="username">Username</label> -->
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone" aria-describedby="emailHelp">

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>