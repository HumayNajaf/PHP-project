
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Responsive Hover Table</h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User_ID</th>
                        <th>User Fullname</th>
                        <th>Comment</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (getComments() as $key) {  "<pre>";
                        // print_r($key);
                        ?>
                        <tr>
                            <td><?=$key['comment_id']?></td>
                            <td><?=$key['user_id']?></td>
                            <td><?=$key['fullname']?></td>
                            <td><?=$key['comments']?></td>
                            <td>
                                <a href="?page=comment&action=update&id=<?=$key['comment_id']?>" style="margin-right: 10px;">Editle</a>
                                <a href="?page=comment&action=delete&id=<?=$key['comment_id']?>">Sil </a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>