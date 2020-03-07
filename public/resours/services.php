<?php

$AllCourseName = new CourseCategory();
$AllCourseText = new Course();
$getCourseName = $AllCourseName->getAllCategory();
$getCourseText = $AllCourseText->getAllCourse();
?>
<section class="page-section" id="services">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            Kurslar
        </h2>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs tpl-alt-tabs font-alt pt-30 pt-sm-0 pb-30 pb-sm-0">
            <?php foreach ($getCourseName as $item): ?>
                <li>
                    <a href="#<?= $item['id'] ?>" data-toggle="tab">

                        <div class="alt-tabs-icon">
                            <span class="<?= $item['logo'] ?>"></span>
                        </div>

                        <?= $item['name'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <!-- End Nav tabs -->

        <!-- Tab panes -->
        <div class="tab-content tpl-tabs-cont">

            <!-- Service Item -->
            <?php foreach ($getCourseName as $item): ?>
                <div class="tab-pane fade " id="<?= $item['id'] ?>">

                    <div class="section-text">
                        <div class="row">
                            <?php
                            $text = new Course();
                            $getAllText = $text->findCourseText($item['id']);
                            foreach ($getAllText as $value):
                                ?>

                                <div class="col-md-4 mb-md-40 mb-xs-30">


                                    <?php echo $value['text'] ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
            <!-- End Service Item -->


        </div>
        <!-- End Tab panes -->

    </div>
</section>