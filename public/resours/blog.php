
<section class="page-section" id="news">
    <div class="container relative">

        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">
            Eng yangi habarlar

            <a href="blog-classic-sidebar-right.html" class="section-more right">All News in our blog <i class="fa fa-angle-right"></i></a>

        </h2>

        <div class="row multi-columns-row">


            <!-- Post Item -->
            <?php foreach ($result as $item): ?>
            <div class="col-sm-6 col-md-4 col-lg-4 mb-md-50 wow fadeIn" data-wow-delay="0.1s" data-wow-duration="2s">

                <div class="post-prev-img">
                    <a href="blog-single-sidebar-right.html"><img src="/admin/uploads/<?= $item['image']?>" alt="" /></a>
                </div>

                <div class="post-prev-title font-alt">
                    <a href=""><?=$item['title']?></a>
                </div>

                <div class="post-prev-info font-alt">
                    <a href=""><?=$getThreePost->findUser($item['created_by'])[0]['fio'];?></a> | <?=$item['created_at'];?>
                </div>

                <div class="post-prev-text">
                 <?=$item['sub_title']?>
                </div>

                <div class="post-prev-more">
                    <a href="" class="btn btn-mod btn-gray btn-round">To'liq o'qish<i class="fa fa-angle-right"></i></a>
                </div>

            </div>
            <?php endforeach; ?>
            <!-- End Post Item -->



        </div>

    </div>
</section>