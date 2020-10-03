  <!-- Call To Action Section -->
  <section class="call-to-action-two">
      <form method="post" action="./post/settings" class="alert alert-info container px-5">

          <div class="auto-container">

              <div class="container">
                  <h1 class="py-3">Manage Pages:</h1>

                  <table class="table table-bordered table-condenced">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Title</th>
                              <th>Slug</th>
                              <th> Actions </th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php while($blog=mysqli_fetch_object($getPages)): ?>
                          <tr>
                              <td scope="row"><?= $blog->id ?></td>
                              <td><?= $blog->menutitle ?></td>
                              <td><?= $blog->slug ?></td>
                              <td>
                                  <a href="/chachanew/dashboard/<?= $blog->id ?>/edit-page" class="btn btn-info" name="submit-form">Edit</a>
                                  <a href="/chachanew/dashboard/<?= $blog->id ?>/delete-page" class="btn btn-danger" name="submit-form">Delete</a>
                              </td>
                          </tr>
                          <?php endwhile; ?>
                      </tbody>
                  </table>
              </div>


          </div>

      </form>
  </section>
  <!--End Gallery Section -->
