<!-- Footer -->
<footer id="footer" class="bg-black-222">
  <div class="container pt-80 pb-30">
    <div class="row border-bottom-black">
      <div class="col-sm-6 col-md-3">
        <div class="widget dark">
          <img class="mb-20" alt="" src="<?= $assets ?>images\logo-wide-white.png">
          <p><?= $Core->SiteInfo("address") ?></p>
          <ul class="list-inline mt-5">
            <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a class="text-gray" href="#"><?= $Core->SiteInfo('mobile') ?></a> </li>
            <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a class="text-gray" href="#"><?= $Core->SiteInfo('email') ?></a> </li>
            <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i> <a class="text-gray" href="#"><?= $Core->SiteInfo('website') ?></a> </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="widget dark">
          <h5 class="widget-title line-bottom">Useful Links</h5>
          <ul class="list angle-double-right list-border">
            <?php while ($page = mysqli_fetch_object($fPages)) : ?>
              <li><a href="./pages/<?= $page->slug ?>"><?= $page->menutitle ?></a></li>
            <?php endwhile; ?>
            <!-- <li><a href="#">About Us</a></li>
              <li><a href="#">How it Works</a></li>
              <li><a href="#">Shop with Us</a></li>
              <li><a href="#">Contact Us</a></li> -->
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="widget dark">
          <h5 class="widget-title line-bottom">Twitter Feed</h5>
          <div class="twitter-feed list-border clearfix" data-username="aguchux" data-count="2"></div>
        </div>
      </div>


      <div class="col-sm-6 col-md-3">
        <div class="widget dark">
          <h5 class="widget-title line-bottom">Latest News</h5>
          <div class="latest-posts">
            <?php while ($newspage = mysqli_fetch_object($NewsPages)) : ?>
              <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb"><img alt="" src="https://placehold.it/80x55"></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="#"><?= $newspage->contents ?></a></h5>
                  <p class="post-date mb-0 font-12"><?= date("j, F Y", strtotime($newspage->created)) ?></p>
                </div>
              </article>
            <?php endwhile; ?>
            <!-- <article class="post media-post clearfix pb-0 mb-10">
                <a href="#" class="post-thumb"><img alt="" src="https://placehold.it/80x55"></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="#">Industrial Coatings</a></h5>
                  <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                </div>
              </article> -->

            <div class="widget dark">
              <h5 class="widget-title mb-10">Connect With Us <strong>@KissaComm</strong></h5>
              <ul class="styled-icons icon-dark icon-circled icon-sm">

                <?php while ($social = mysqli_fetch_object($fSocials)) : ?>
                  <li><a href="<?= $social->social_link ?>"><i class="fa fa-<?= $social->social_icon ?>"></i></a></li>
                <?php endwhile; ?>

              </ul>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>


  <div class="footer-bottom bg-black-333">
    <div class="container pt-20 pb-20">
      <div class="row">
        <div class="col-md-6">
          <p class="font-11 text-black-777 m-0">Copyright ©2019 Chachas Global Resources Ltd. All Rights Reserved</p>
        </div>
        <div class="col-md-6 text-right">
          <div class="widget no-border m-0">
            <ul class="list-inline sm-text-center mt-5 font-12">

              <li><a href="./">Home</a></li>
              <li>|</li>

              <li><a href="#">FAQ</a></li>
              <li>|</li>

              <li><a href="./acp/">Login</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- \js | Calendar Event Data -->
<script src="<?= $assets ?>\js\calendar-events-data.js"></script>
<!-- <?= $assets ?>\js | Custom script for all pages -->
<script src="<?= $assets ?>\js\custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="<?= $assets ?>\js\revolution-slider\<?= $assets ?>\js\extensions\revolution.extension.actions.min.<?= $assets ?>\js"></script>
<script type="text/javascript" src="<?= $assets ?>\js\revolution-slider\<?= $assets ?>\js\extensions\revolution.extension.carousel.min.<?= $assets ?>\js"></script>
<script type="text/javascript" src="<?= $assets ?>\js\revolution-slider\<?= $assets ?>\js\extensions\revolution.extension.kenburn.min.<?= $assets ?>\js"></script>
<script type="text/javascript" src="<?= $assets ?>\js\revolution-slider\<?= $assets ?>\js\extensions\revolution.extension.layeranimation.min.<?= $assets ?>\js"></script>
<script type="text/javascript" src="<?= $assets ?>\js\revolution-slider\<?= $assets ?>\js\extensions\revolution.extension.migration.min.<?= $assets ?>\js"></script>
<script type="text/javascript" src="<?= $assets ?>\js\revolution-slider\<?= $assets ?>\js\extensions\revolution.extension.navigation.min.<?= $assets ?>\js"></script>
<script type="text/javascript" src="<?= $assets ?>\js\revolution-slider\<?= $assets ?>\js\extensions\revolution.extension.parallax.min.<?= $assets ?>\js"></script>
<script type="text/javascript" src="<?= $assets ?>\js\revolution-slider\<?= $assets ?>\js\extensions\revolution.extension.slideanims.min.<?= $assets ?>\js"></script>
<script type="text/javascript" src="<?= $assets ?>\js\revolution-slider\<?= $assets ?>\js\extensions\revolution.extension.video.min.<?= $assets ?>\js"></script>
</body>

</html>