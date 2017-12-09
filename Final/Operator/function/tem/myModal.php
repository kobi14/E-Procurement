<div id="myModal" class="modal fade" role="dialog" data-backdrop="false" data-keyboard="false">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" id="firstName" class="form-control">
                    <?php
                    echo $_GET['var'];
                    ?>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" id="lastName" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" id="email" class="form-control">
                </div>
                <input type="hidden" id="userId" class="form-control">


            </div>
            <div class="modal-footer">
                <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

