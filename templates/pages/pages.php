<!-- Start main-content -->
<div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?= $assets ?>images/bg/bg6.jpeg">
        <div class="container pt-60 pb-0">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white"><?= $PageInfo->menutitle ?></h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active text-theme-colored"><?= $PageInfo->menutitle ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-push-1 text-black">
                    <p><span style="font-size:28px"><?= $PageInfo->menutitle ?></span></p>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                            <?= $PageInfo->content_text ?>
                            </div>
                        <div class="col-lg-6 ">
                            <div class="thumbnail">
                            <img src="<?= $PageInfo->page_photo ?>" class="img-responsive">
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



</div>
<!-- end main-content -->