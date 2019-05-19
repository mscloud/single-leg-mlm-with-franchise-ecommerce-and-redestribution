    <style>
        .team_member {
            background: #0BA9F9; 
            border-radius:50%;
        }
        .name {
            color: white !important;
        }
        
    </style>
    <div id="our-team">
    <div class="team">
      <div class="container">
        <div class="row">
            <?php foreach ($frienchies as $row): ?>
                <div class="col-md-3 wow fadeInRight team_member" data-wow-offset="0" data-wow-delay="0.3s" >
                    <div class="text-center">
                        <!--img src="<?php echo base_url("public/img/team/team1.jpg"); ?>" class="img-responsive" alt="" -->
                        <h2 class="name"><?php echo $row->Name; ?></h2>
                        <h4 class="name"><?php echo $row->brCategory.' - '.$row->brCity; ?></h4>
                        <!--p>Address: this</p -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <!--/#our-team-->
