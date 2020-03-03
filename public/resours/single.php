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
                                    Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa.
                                    Fusce non ante sed lorem rutrum feugiat.
                                </p>
                            </div>
                            <!-- End Text -->

                            <!-- Media Gallery -->
                            <div class="blog-media mt-40 mb-40 mb-xs-30">
                                <ul class="clearlist content-slider">
                                    <li>
                                        <img src="images/portfolio/full-project-1.jpg" alt="" />
                                    </li>
                                    <li>
                                        <img src="images/portfolio/full-project-2.jpg" alt="" />
                                    </li>
                                    <li>
                                        <img src="images/portfolio/full-project-3.jpg" alt="" />
                                    </li>
                                </ul>
                            </div>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet dui. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa.
                            </p>

                            <p>
                                Fusce non ante sed lorem rutrum feugiat. Vestibulum pellentesque, purus ut&nbsp;dignissim consectetur, nulla erat ultrices purus, ut&nbsp;consequat sem elit non sem.
                                Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa.
                                Fusce non ante sed lorem rutrum feugiat.
                            </p>

                            <blockquote>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a&nbsp;ante.
                                </p>
                                <footer>
                                    Someone famous in
                                    <cite title="Source Title">
                                        Source Title
                                    </cite>
                                </footer>
                            </blockquote>

                            <p>
                                Praesent ultricies ut ipsum non laoreet. Nunc ac <a href="#">ultricies</a> leo. Nulla ac ultrices arcu. Nullam adipiscing lacus in consectetur posuere. Nunc malesuada tellus turpis, ac pretium orci molestie vel.
                                Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa.
                                Fusce non ante sed lorem rutrum feugiat.
                            </p>

                            <ul>
                                <li>First item of the list</li>
                                <li>Second item of the list</li>
                                <li>Third item of the list</li>
                            </ul>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet dui. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa.
                                Fusce non ante sed lorem rutrum feugiat. Vestibulum pellentesque, purus ut&nbsp;dignissim consectetur, nulla erat ultrices purus, ut&nbsp;consequat sem elit non sem.
                            </p>


                        </div>
                        <!-- End Text -->

                    </div>
                    <!-- End Post -->

                    <!-- Comments -->
                    <div class="mb-80 mb-xs-40">

                        <h4 class="blog-page-title font-alt">Comments<small class="number">(3)</small></h4>

                        <ul class="media-list text comment-list clearlist">

                            <!-- Comment Item -->
                            <li class="media comment-item">

                                <a class="pull-left" href="#"><img class="media-object comment-avatar" src="images/user-avatar.png" alt="" width="50" height="50"></a>

                                <div class="media-body">

                                    <div class="comment-item-data">
                                        <div class="comment-author">
                                            <a href="#">John Doe</a>
                                        </div>
                                        Feb 9, 2014, at 10:23<span class="separator">&mdash;</span>
                                        <a href="#"><i class="fa fa-comment"></i>&nbsp;Reply</a>
                                    </div>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.
                                    </p>

                                    <!-- Comment of second level -->
                                    <div class="media comment-item">

                                        <a class="pull-left" href="#"><img class="media-object comment-avatar" src="images/user-avatar.png" alt=""></a>

                                        <div class="media-body">

                                            <div class="comment-item-data">
                                                <div class="comment-author">
                                                    <a href="#">Sam Brin</a>
                                                </div>
                                                Feb 9, 2014, at 10:27<span class="separator">&mdash;</span>
                                                <a href="#"><i class="fa fa-comment"></i>&nbsp;Reply</a>
                                            </div>

                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.
                                            </p>


                                        </div>

                                    </div>
                                    <!-- End Comment of second level -->

                                </div>

                            </li>
                            <!-- End Comment Item -->

                            <!-- Comment Item -->
                            <li class="media comment-item">

                                <a class="pull-left" href="#"><img class="media-object comment-avatar" src="images/user-avatar.png" alt=""></a>

                                <div class="media-body">

                                    <div class="comment-item-data">
                                        <div class="comment-author">
                                            <a href="#">Emma Johnson</a>
                                        </div>
                                        Feb 9, 2014, at 10:37<span class="separator">&mdash;</span>
                                        <a href="#"><i class="fa fa-comment"></i>&nbsp;Reply</a>
                                    </div>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.
                                    </p>

                                </div>

                            </li>
                            <!-- End Comment Item -->

                            <!-- Comment Item -->
                            <li class="media comment-item">

                                <a class="pull-left" href="#"><img class="media-object comment-avatar" src="images/user-avatar.png" alt=""></a>

                                <div class="media-body">

                                    <div class="comment-item-data">
                                        <div class="comment-author">
                                            <a href="#">John Doe</a>
                                        </div>
                                        Feb 9, 2014, at 10:3<span class="separator">&mdash;</span>
                                        <a href="#"><i class="fa fa-comment"></i>&nbsp;Reply</a>
                                    </div>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.
                                    </p>

                                </div>

                            </li>
                            <!-- End Comment Item -->

                        </ul>

                    </div>
                    <!-- End Comments -->


                    <!-- Add Comment -->
                    <div class="mb-80 mb-xs-40">

                        <h4 class="blog-page-title font-alt">Leave a comment</h4>

                        <!-- Form -->
                        <form method="post" action="#" id="form" role="form" class="form">

                            <div class="row mb-20 mb-md-10">

                                <div class="col-md-6 mb-md-10">
                                    <!-- Name -->
                                    <input type="text" name="name" id="name" class="input-md form-control" placeholder="Name *" maxlength="100" required>
                                </div>

                                <div class="col-md-6">
                                    <!-- Email -->
                                    <input type="email" name="email" id="email" class="input-md form-control" placeholder="Email *" maxlength="100" required>
                                </div>

                            </div>

                            <div class="mb-20 mb-md-10">
                                <!-- Website -->
                                <input type="text" name="website" id="website" class="input-md form-control" placeholder="Website" maxlength="100" required>
                            </div>

                            <!-- Comment -->
                            <div class="mb-30 mb-md-10">
                                <textarea name="text" id="text" class="input-md form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
                            </div>

                            <!-- Send Button -->
                            <button type="submit" class="btn btn-mod btn-medium">
                                Send comment
                            </button>

                        </form>
                        <!-- End Form -->

                    </div>
                    <!-- End Add Comment -->

                    <!-- Prev/Next Post -->
                    <div class="clearfix mt-40">
                        <a href="#" class="blog-item-more left"><i class="fa fa-angle-left"></i>&nbsp;Prev post</a>
                        <a href="#" class="blog-item-more right">Next post&nbsp;<i class="fa fa-angle-right"></i></a>
                    </div>
                    <!-- End Prev/Next Post -->

                </div>
                <!-- End Content -->

            </div>

        </div>
    </section>
    <!-- End Section -->


