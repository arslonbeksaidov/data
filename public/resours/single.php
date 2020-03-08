<?php
require '../admin/app/Post.php';
$Post = new Post();

if (!empty($_REQUEST['Post'])){

    $result = intval($_REQUEST['Post']);
    $getPostInfo = $Post->findPost($result);
}else{
    header('Location: /public');
}


?>
    <!-- Head Section -->
    <section class="small-section bg-gray-lighter">
        <div class="relative container align-left">

            <div class="row">

                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">To'liq o'qish</h1>
                    <div class="hs-line-4 font-alt black">

                    </div>
                </div>

                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="/public">Asosiy</a>&nbsp;/&nbsp;<span>Xabar</span>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- End Head Section -->


    <!-- Section -->
    <section class="page-section">
        <div class="container relative">

            <div class="row">

                <!-- Content -->
                <div class="col-sm-10 col-sm-offset-1">

                    <!-- Post -->
                    <div class="blog-item mb-80 mb-xs-40">

                        <!-- Text -->
                        <div class="blog-item-body">

                            <h1 class="mt-0 font-alt"><?=$getPostInfo['title']?></h1>

                            <div class="lead">
                                <p>
                                    <?=$getPostInfo['sub_title']?>
                                </p>
                            </div>
                            <!-- End Text -->

                            <!-- Media Gallery -->
                            <div class="blog-media mt-40 mb-40 mb-xs-30">
                                <ul class="clearlist content-slider">

                                    <li>
                                        <img src="/admin/uploads/<?=$getPostInfo['image']?>" alt="" />
                                    </li>
                                </ul>
                            </div>

                            <p>
                                <?=$getPostInfo['full_text']?>
                            </p>
                         </div>
                        <!-- End Text -->

                    </div>
                    <!-- End Post -->
                 </div>
                <!-- End Content -->

            </div>

        </div>
    </section>
    <!-- End Section -->


