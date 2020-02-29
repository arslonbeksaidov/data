<section class="page-section" id="contact">
    <div class="container relative">

        <h2 class="section-title font-alt mb-70 mb-sm-40">
            Contact
        </h2>

        <div class="row mb-60 mb-xs-40">

            <div class="col-md-8 col-md-offset-2">
                <div class="row">

                    <!-- Phone -->
                    <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                        <div class="contact-item">
                            <div class="ci-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="ci-title font-alt">
                                Bog'laning
                            </div>
                            <div class="ci-text">
                                +998 91-999-888-6
                            </div>
                        </div>
                    </div>
                    <!-- End Phone -->

                    <!-- Address -->
                    <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                        <div class="contact-item">
                            <div class="ci-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="ci-title font-alt">
                                Moʻljal:
                            </div>
                            <div class="ci-text">
                                Urganch shahri"Hub" kovorking markaz
                            </div>
                        </div>
                    </div>
                    <!-- End Address -->

                    <!-- Email -->
                    <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                        <div class="contact-item">
                            <div class="ci-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="ci-title font-alt">
                                Email
                            </div>
                            <div class="ci-text">
                                <a href="mailto:support@bestlooker.pro">support@bestlooker.pro</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Email -->

                </div>
            </div>

        </div>

        <!-- Contact Form -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <form method="post" action="../../admin/app/Message.php" class="form contact-form" id="contact_form">
                    <div class="clearfix">

                        <div class="cf-left-col">

                            <!-- Name -->
                            <div class="form-group">
                                <input type="text" name="title" id="name" class="input-md round form-control" placeholder="Name" pattern=".{3,100}" >
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <input type="email" name="mail" id="email" class="input-md round form-control" placeholder="Email" pattern=".{5,100}" >
                            </div>
                            <div class="form-group">
                                <input type="tel" name="tel_number" id="tel" class="input-md round form-control" placeholder="Tel" pattern=".{5,100}" >
                            </div>

                        </div>

                        <div class="cf-right-col">

                            <!-- Message -->
                            <div class="form-group">
                                <textarea name="message" id="message" class="input-md round form-control" style="height: 130px;" placeholder="Message"></textarea>
                            </div>

                        </div>

                    </div>

                    <div class="clearfix">

                        <div class="cf-left-col">

                            <!-- Inform Tip -->
                            <div class="form-tip pt-20">
                                <i class="fa fa-info-circle"></i> Maydonlarni to'ldiring
                            </div>

                        </div>

                        <div class="cf-right-col">

                            <!-- Send Button -->
                            <div class="align-right pt-10">
                                <button type="submit" onclick="sweetAlert()" name="sendMessage" value="sendMessage" class="submit_btn btn btn-mod btn-medium btn-round">Xabarni yuborish</button>

                            </div>

                        </div>

                    </div>



                    <div id="result"></div>
                </form>

            </div>
        </div>
        <!-- End Contact Form -->

    </div>
</section>

<!--sweeet alert star-->


<!--sweet alert end-->