<div class="modal fade" id="newUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enter User Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="new-user" action="#" method="POST">      
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div id="newUserSuccess" class="success"></div>
                        <div id="newUserError" class="error"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name= "user_name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name= "contact_no" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>E-mail ID</label>
                            <input type="email" name= "email" class="form-control">
                        </div>
                        

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>User Type</label>
                                <select name="user_type" class="form-control">
                                    <option class="form-control">Super Admin</option>
                                    <option class="form-control">Admin</option>
                                </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name= "password" class="form-control">
                        </div>
                    </div>
                </div>          
            
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
        </form>

    </div>
  </div>
</div>