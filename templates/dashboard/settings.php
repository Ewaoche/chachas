  <!-- Call To Action Section -->
  <section class="call-to-action-two">
  <form method="post" action="./dashboard/forms/settings" class="alert alert-info container px-5">

      <div class="auto-container">

          <div class="container">
              <h1 class="py-3">Settings:</h1>

              <table class="table table-bordered table-condenced">
                  <thead>
                      <tr>
                          <th>NAME</th>
                          <th>VALUE</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php while($info=mysqli_fetch_object($getAllSiteInfo)): ?>
                      <tr>
                          <td scope="row"><?= $info->name ?></td>
                          <td>
                            <?php if($info->type=="text"): ?>
                              <div class="form-group">
                                  <input class="form-control lg form-control" type="text" name="<?= $info->name ?>"
                                      placeholder="" value="<?= $info->value ?>" />
                              </div>
                            <?php elseif($info->type=="textarea"): ?>
                              <div class="form-group">
                                  <textarea class="form-control lg form-control" type="text" name="<?= $info->name ?>"><?= $info->value ?></textarea>
                              </div>

                            <?php endif; ?>
                          </td>
                      </tr>
                      <?php endwhile; ?>
                  </tbody>
              </table>

              <div class="form-group text-center">
                 <button  type="submit" name="submit-form" class="btn btn-primary">Update Settings</button>    
             </div>
          </div>


      </div>

  </form>
  </section>
  <!--End Gallery Section -->
