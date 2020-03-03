<section class="page-section" id="about">
    <div class="container relative">

        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">
            O'quv markazi haqida
        </h2>

        <div class="section-text mb-50 mb-sm-20">
            <div class="row">


                <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                    Bizning asosiy ahamiyat beradigan maqsadimiz — mijozning qanoatlanganligidir. Biz mijozlarimiz
                    ehtiyojlariga mos va ular kutgan darajadagi sifatli bilimlarni yetkazib beramiz va xizmat
                    ko'rsatamiz. Mijozlarimiz bilan samimiy va do'stona munosabatlarda bo'lamiz va ularning barcha
                    takliflari va arzlarini ko'rib chiqamiz.
                </div>
                <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                    O’quv markazimizda jamoa ichida sog'lom munosabatlarga zarar ko'rsatadigan hatti-harakatlar,
                    jumladan, kamsitish, haqoratlash, tuhmat qilish, g’iybat qilish, zo’ravonlik va ikki shaxs
                    o’rtasidagi chuqur shaxsiy munosabatlarga berilishga yo’l qo’yilmaydi.
                </div>

                <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                    Biz barcha xodimlarga barobar imkoniyatlar beramiz va ularning shaxsiy qobiliyatlari va unumdorlik
                    ko'rsatkichlariga ko'ra adolatli munosabatda bo'lamiz. Biz xodimlarimizni tinimsiz o'zlarini
                    o'stirishlariga chaqiramiz va ish vazifalarini bajarish uchun zarur bo'lgan takomillashuvlarni
                    qo'llab-quvvatlaymiz. Bundan tashqari, shaxsiy tashabbus va ijodiy yondashuvga yo'l ochishga yordam
                    beradigan ish muhitini yaratishga intilamiz.


                </div>

            </div>
        </div>

        <div class="row">

            <!-- Team item -->
            <?php foreach ($resultTeam as $item): ?>
                <div class="col-sm-4 mb-xs-30 wow fadeInUp">
                    <div class="team-item">

                        <div class="team-item-image">

                            <img src="/admin/team_photo/<?= $item['image'] ?>" alt=""/>

                            <div class="team-item-detail">

                                <h4 class="font-alt normal"><?= $item['title'] ?></h4>

                                <p>
                                    <?= $item['sub_title'] ?>
                                </p>

                                <div class="team-social-links">
                                    <a href="#" target="_blank"><i
                                                class="fa fa-instagram"><?= ' ' . $item['insta'] ?></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-phone"><?= ' ' . $item['tel'] ?></i></a>
                                </div>

                            </div>
                        </div>

                        <div class="team-item-descr font-alt">

                            <div class="team-item-name">
                                <?= $item['name'] ?>
                            </div>

                            <div class="team-item-role">
                                <?= $item['position'] ?>
                            </div>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
            <!-- End Team item -->


        </div>


    </div>
</section>