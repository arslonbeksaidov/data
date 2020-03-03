
<section class="page-section" id="about">
    <div class="container relative">

        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">
           O'quv markazi haqida
        </h2>

        <div class="section-text mb-50 mb-sm-20">
            <div class="row">

                <div class="col-md-4">
                    <blockquote>
                        <p>
                            Design is&nbsp;not making beauty, beauty emerges from selection, affinities, integration, love.
                        </p>
                        <footer>
                            Louis Kahn
                        </footer>
                    </blockquote>
                </div>

                <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus ligula semper metus pellentesque mattis. Maecenas  volutpat, diam enim sagittis quam, id porta quam. Sed id dolor consectetur fermentum nibh volutpat, accumsan purus.
                </div>

                <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                    Etiam sit amet fringilla lacus. Pellentesque suscipit ante at ullamcorper pulvinar neque porttitor. Integer lectus. Praesent sed nisi eleifend, fermentum orci amet, iaculis libero. Donec vel ultricies purus. Nam dictum sem, eu aliquam.
                </div>

            </div>
        </div>

        <div class="row">

            <!-- Team item -->
            <?php foreach ($resultTeam as $item):?>
            <div class="col-sm-4 mb-xs-30 wow fadeInUp">
                <div class="team-item">

                    <div class="team-item-image">

                        <img src="/admin/team_photo/<?=$item['image']?>" alt="" />

                        <div class="team-item-detail">

                            <h4 class="font-alt normal"><?=$item['title']?></h4>

                            <p>
                              <?=$item['sub_title']?>
                            </p>

                            <div class="team-social-links">
                                <a href="#" target="_blank"><i class="fa fa-instagram"><?=' '.$item['insta']?></i></a>
                                <a href="#" target="_blank"><i class="fa fa-phone"><?=' '.$item['tel']?></i></a>
                            </div>

                        </div>
                    </div>

                    <div class="team-item-descr font-alt">

                        <div class="team-item-name">
                            <?=$item['name']?>
                        </div>

                        <div class="team-item-role">
                            <?=$item['position']?>
                        </div>

                    </div>

                </div>
            </div>
            <?php endforeach; ?>
            <!-- End Team item -->




        </div>


    </div>
</section>