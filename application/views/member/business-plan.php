    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                                Business - Plan <small>Way to success ...</small>
                            </h2>
                        </div>
                        <div class="body" style="text-align:justify;">
                            कम्पनी में किसी भी व्यक्ति की ज्वाइनिंग फ्री होगी । लेकिन जब तक वह व्यक्ति  अपनी आई डी से कम से कम 3000  B.V. की खरीदारी  नहीं कर लेता तब तक यह व्यक्ति Inactive mode में रहेगा ।यानी कि इस व्यक्ति का कोई पे आउट नहीं बनेगा । और एक बार आई डी ऐक्टिव हो जाने के बाद इस व्यक्ति का पे आउट सदैव बनता रहेगा ।लेकिन पे आउट पाने के लिये इस व्यक्ति को 1000 B.V. की खरीदारी लगातार हर क्लोजिंग के पहले  करनी होगी । 1000 B.V. की खरीदारी करने में असमर्थ रहने पर पे आउट की धनराशि Gap commission के रूप इस व्यक्ति के ठीक ऊपर बाले सीनियर को प्राप्त करा दी जायेगी । इस प्रकार कम्पनी बगैर B. V. मेन्टेन किये किसी व्यक्ति को पे आउट देने के लिये बाध्य नहीं  रहेगी ।<br>
कोई व्यक्ति जितनी ज्वाइनिंग चाहे उतनी ज्वाइनिंग बिल्कुल फ्री अपने डाइरेक्ट में लगा सकता है |
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                                Types of Income <small></small>
                            </h2>
                        </div>
                        <div class="body" style="text-align:justify;">
                            1. level Income<br>
                            2. Repurchase Income<br>
                            3. Gap Commission<br>
                            4.Club Income<br>
                            5. Fast Achiever Income<br>
                            6. Royalty Income<br>
                            7. Freedom Income<br>
                            8. Car Fund<br>
                            9. House Fund<br>
                            10. Gifts / Prize<br>
                            11. Tour packages
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                               1. Level income 
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Level</th>
                                            <th>Direct joining</th>
                                            <th>Self Team Joining</th>
                                            <th>Purchased B.V.</th>
                                            <th>Income (Rs.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($selfteam_income as $row): ?>
                                            <tr>
                                                <td><?php echo $row->levelID; ?></td>
                                                <td><?php echo $row->direct_joining; ?></td>
                                                <td><?php echo $row->self_team; ?></td>
                                                <td><?php echo $row->purchase_bv; ?></td>
                                                <td><?php echo $row->income; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                               2. Level income on Company Turnover
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Level</th>
                                            <th>Direct Sponsor</th>
                                            <th>Total Self Team</th>
                                            <th>Total Company Team</th>
                                            <th>Income (Rs.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($company_income as $row): ?>
                                            <tr>
                                                <td><?php echo $row->levelID; ?></td>
                                                <td><?php echo $row->direct_joining; ?></td>
                                                <td><?php echo $row->self_team; ?></td>
                                                <td><?php echo $row->company; ?></td>
                                                <td><?php echo $row->income; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                3. Gap Commission Income <small></small>
                            </h2>
                        </div>
                        <div class="body" style="text-align:justify;">
                            जब कोई ज्वाइन एक्टिव मेंम्बर क्लोजिंग बी.वी.यानी 1000 रिपरचेज बी.वी. मेन्टेन नहीं कर पाता तो उसका  पे आउट उसके इमीडिएट सीनियर को प्राप्त हो जायेगा । और ऐसे मेम्बर का पेआउट शून्य हो जायेगा ।
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                5. Fast Achiever Income <small></small>
                            </h2>
                        </div>
                        <div class="body" style="text-align:justify;">
                            ज्वाइनिंग एक्टिव होने के बाद एक माह के अन्दर Y Club  में Entry करने पर ₹ 15000/- प्रति माह 3 माह तक देय होगा । और अगले दो माह में अगले दो क्लब क्रमशः सिल्वर क्लब एवं गोल्ड क्लब एन्ट्री करने पर ₹25000/-प्रति माह अगले छह माह तक देय होगा ।
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>6. Freedom Income<small></small></h2>
                        </div>
                        <div class="body" style="text-align:justify;">
                            A. सिल्वर, गोल्ड , रूबी , पर्ल क्लब के सभी सदस्यों के मध्य कम्पनी के शुद्ध प्राफिट का 3% निकाल कर बराबर - बराबर बांटा जायेगा ।<br>
B. एमरल्ड , डायमण्ड एवं क्राउन डायमण्ड क्लब के सभी सदस्यों के मध्य कम्पनी के शुद्ध प्राफिट का 5% निकाल कर बराबर - बराबर बांटा जायेगा ।</div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                    <div class="card">
                        <div class="body bg-light-blue" style="text-align:justify;">
                            7. Royalty Income , Car Fund , House Fund 
 क्लब इनकम में दी गयी हैं ।</div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <iframe src="http://docs.google.com/gview?url=<?php echo base_url("public/business_plan.pdf"); ?>&embedded=true" style="width:100%; height:2000px;" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>