<section class="page-section pb-0" id="portfolio">
    <div class="relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            Dars jarayoni
        </h2>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="section-text align-center mb-70 mb-xs-40">
                        O’quv markazimizda ta’lim oladigan har bir mijozimiz, avvalo o’z vaqtini behuda ketmayotganiga
                        amin bo’lishi lozim. Buning uchun unga foydali bilim va o’zi kutganidan ham ko’proq qiymatni
                        berishga harakat qilamiz.
                    </div>

                </div>
            </div>
        </div>

        <!-- Works Filter -->
        <div class="works-filter font-alt align-center">
            <a href="#" class="filter active" data-filter="*">All works</a>
            <?php foreach ($resultAllCatName as $item): ?>
                <a href="#<?= $item['name'] ?>" class="filter"
                   data-filter="<?= '.' . $item['name'] ?>"><?= $item['name'] ?></a>
            <?php endforeach; ?>
        </div>
        <!-- End Works Filter -->

        <!-- Works Grid -->
        <ul class="works-grid work-grid-3 work-grid-gut clearfix font-alt hover-white hide-titles" id="work-grid">

            <!-- Work Item (Lightbox) -->
            <?php foreach ($resultGallery as $item): ?>
                <li class="work-item mix <?php echo $resultFindGalleryCatName = $getThreePost->findGalleryCatName($item['category'])['name']; ?>">
                    <a href="/admin/gallery_photo/<?= $item['image'] ?>" class="work-lightbox-link mfp-image">
                        <div class="work-img">
                            <img src="/admin/gallery_photo/<?= $item['image'] ?>" alt="Work"/>
                        </div>
                        <div class="work-intro">
                            <h3 class="work-title"><?= $item['info'] ?></h3>

                        </div>
                    </a>
                </li>
                <!-- End Work Item -->
            <?php endforeach; ?>

        </ul>
        <!-- End Works Grid -->

    </div>
</section>