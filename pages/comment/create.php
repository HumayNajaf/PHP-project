
<?php
storeComment($_POST);

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
                    <label for="exampleInputEmail1">Comment</label>
                    <textarea name="comments"  class="form-control" id="exampleInputEmail1" ></textarea>
                    <!-- <input type="text" class="form-control" name="email" id="exampleInputEmail1" value="" placeholder="Enter email"> -->
                </div>
                
                
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" name="store_comment" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- /.card 