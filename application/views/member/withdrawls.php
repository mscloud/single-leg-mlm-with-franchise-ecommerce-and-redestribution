    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><h2>Previous fund withdrawls</h2></div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="20px">Serial no.</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Process Date</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($withdrawls as $row): ?>
                                        <tr style="<?php if ($row->cStatus == 'C') echo 'background-color: #F0C3B9 !important;'; 
                                                        else if ($row->cStatus == 'Y') echo 'background-color: #D1ECB9 !important;'; else echo 'background-color: yellow !important;';?>">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->amount; ?></td>
                                            <td><?php echo substr($row->date,0,10); ?></td>
                                            <td><?php if ($row->pr_date != "0000-00-00 00:00:00") echo substr($row->pr_date,0,10); ?></td>
                                            <td><?php echo $row->remarks; ?></td>
                                        </tr>
                                        <?php $i++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Chart Samples -->
        </div>
    </section>