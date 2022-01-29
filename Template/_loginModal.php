

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/mobile/Template/_handleLogin.php" method="POST">

                    <div class="form-group">
                        <!-- <label for="username">Username</label> -->
                        <input type="text" class="form-control" id="loginusername" name="loginusername" placeholder="Username" aria-describedby="emailHelp">

                    </div>
                    <div class="form-group">
                        <!-- <label for="password">Password</label> -->
                        <input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password">
                    </div>


                    <button type="submit" class="btn btn-primary">Login</button>
                
            </div>
            <div class="modal-footer">
                
            </div></form>
        </div>
    </div>
</div>