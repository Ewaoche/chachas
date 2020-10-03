  <!-- Call To Action Section -->
  <section class="call-to-action-two">
        <div class="auto-container">

        <div class="container">
     <!--Contact Info Section-->
             <!-- Contact Form-->
             <form method="post" action="./dashboard/<?= $PageInfo->id ?>/update-page" class="alert alert-info container px-5">
                    <div class="sec-title centered mt-5">
                        <div class="sub-title">Edit Page</div>
                    </div>
                    
                    <div class="row clearfix">
                     
                    <div class="col-md-10 col-sm-12 form-group">
                        <label>Page Title</label>
                         <input class="form-control lg" type="text" name="menutitle" placeholder="Page Title" required="" value="<?= $PageInfo->menutitle ?>">
                     </div>

                     <div class="col-md-2 col-sm-12 form-group">
                        <label>Sorting</label>
                         <input class="form-control lg" type="number" name="sort" value="<?= $PageInfo->sort ?>">
                     </div>


                     <hr/>

                     <div class="col-md-12 col-sm-12 form-group">
                        <label>Page Contents</label>
                        <textarea class="form-control lg" name="content_text" id="texteditor" cols="30" rows="10"  data-value="<?= $PageInfo->content_text ?>" value="<?= $PageInfo->content_text ?>"><?= $PageInfo->content_text ?></textarea>
                     </div>

                     <div class="col-md-12 col-sm-12 form-group text-center">
                         <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span
                                 class="btn-title">Edit Page</span></button>
                     </div>
                 </div>
             </form>



        </div>


        </div>
    </section>
    <!--End Gallery Section -->