    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Team members
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Members
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <?php if ($this->session->ylifetype == 'A') { ?>
                                                <th>Password</th>
                                            <?php } ?>
                                            <th>Address</th>
                                            <th>Joining Date</th>
                                            <th>Sponsor</th>
                                            <th>Sponsor Contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($members as $row): ?>
                                        <tr style="<?php if ($row->Active == 'N') echo 'background-color: #F0C3B9 !important;'; else echo 'background-color: #D1ECB9 !important;'; ?>">
                                            <td><?php echo $row->Name; ?></td>
                                            <td><?php echo $row->Contact; ?></td>
                                            <?php if ($this->session->ylifetype == 'A') { ?>
                                                <td><?php echo $row->Pass; ?></td>
                                            <?php } ?>
                                            <td><?php echo $row->Address; ?></td>
                                            <td><?php echo $row->Rgdate; ?></td>
                                            <td><?php echo $row->spName; ?></td>
                                            <td><?php echo $row->spContact; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>