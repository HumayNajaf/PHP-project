
<?php
storeUser($_POST);
// $keys = array_keys($_POST);

// print_r($keys);


?>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        
        <form action="" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="" placeholder="Enter Fullname">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1_conf">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1_conf" name="password_conf" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Type</label>

                  <select class="custom-select form-control-border" name="type" id="exampleSelectBorder">
                    <option value="1" selected >Super Admin</option>
                    <option value="2"  >Admin</option>
                   
                  </select>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" name="store_user" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- /.card 