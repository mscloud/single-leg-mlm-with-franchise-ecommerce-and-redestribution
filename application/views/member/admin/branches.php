    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Branches</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><h2>Branch</h2></div>
                        <div class="body">
                            <?php if(isset($status)) { ?>
                                <?php if ($status === TRUE) { ?>
                                    <div class="alert bg-green alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        Data uploaded.
                                    </div>
                                <?php } else if ($status === FALSE) { ?>
                                    <div class="alert bg-red alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <?php echo $status; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <?php echo form_open ("admin/branches",array("enctype"=>"multipart/form-data")); ?>
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <p><b>Branch Name</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="branch_name" placeholder="Branch name" reuired>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <p><b>Branch Category</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="branch_category" placeholder="Branch Category" reuired>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <p><b>Branch Code</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="branch_code" placeholder="Branch code" reuired>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <p><b>Branch Manager</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control sponsor" name="branch_manager" placeholder="user ID" reuired>
                                            </div>
                                            <label class="error" id="sponsor"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><br>
                                        <button style="margin-top:10px;" type="submit" class="btn btn-primary btn-lg waves-effect">UPLOAD</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><h2>Branches</h2></div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Branch Name</th>
                                            <th>Branch Category</th>
                                            <th>Branch Manager</th>
                                            <th>Branch Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($branches as $row): ?>
                                        <tr>
                                            <td><?php echo $row->brName; ?></td>
                                            <td><?php echo $row->brCategory; ?></td>
                                            <td><?php echo $row->brManager; ?></td>
                                            <td><?php echo $row->brCode; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>