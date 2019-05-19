    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><h2>Closing Details</h2></div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Amount</th>
                                            <th>Purpose</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($details as $row): ?>
                                        <tr>
                                            <td><?php echo $row->Name; ?></td>
                                            <td><?php echo $row->Contact; ?></td>
                                            <td><?php echo $row->amount; ?></td>
                                            <td><?php echo $row->purpose; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <?php echo form_open('admin/closing_details'); ?>
                                                    <button type="submit" name="pay_now" value="pay_now" class="btn btn-danger waves-effect">PAY NOW</button>
                                                    <button type="submit" name="revert_back" value="revert_back" class="btn btn-success waves-effect">REVERT BACK</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>