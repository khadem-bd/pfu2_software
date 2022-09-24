<div id="newUser" class="pfu2-modal">
    <a class="closeModal" href="javascript:void(0)"><span class="icon-close"></span></a>
    <form id="new-user" action="#" method="POST">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2>New User</h2>
                    <div id="newUserSuccess" class="success"></div>
                    <div id="newUserError" class="error"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="tile">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name= "user_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" name= "contact_no" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>E-mail ID</label>
                                <input type="email" name= "email" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label>User Type</label>
                                <select name="user_type" class="form-control"  id="">
                                <option class="form-control" >Super Admin</option>
                                <option class="form-control" >Admin</option>
                                </select>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name= "password" class="form-control">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 text-right">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>