  <?php
$admin=new Admin();
$lid=$_SESSION['lid'];
  ?>
  
  <div class="widget stick-widget">
      <h4 class="widget-title">Shortcuts</h4>
      <ul class="naves">


          <li>
              <i class="ti-files"></i>
              <a href="myprofile.php" title="">My Profile</a>
          </li>
          <li>
              <i class="ti-user"></i>
              <a href="myfollower.php" title="">friends</a>
          </li>
          <li>
              <i class="ti-image"></i>
              <a href="mypost.php" title="">My Posts</a>
          </li>
          <li>
              <i class="ti-book"></i>
              <a href="" data-toggle="modal" data-target="#exampleModalCenter" title="">Feedback</a>
          </li>


          <li>
              <i class="ti-power-off"></i>
              <a href="logout.php" title="">Logout</a>
          </li>
      </ul>


      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Write your feedback.</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="controller/feedback.php" method="POST">
                          <label for="">Feedback</label>
                          
                          <textarea name="feedback" id="" class="form-control" cols="30" rows="4" placeholder="Feeback......"></textarea>
                      
                  </div>
                  <div class="modal-footer">
                      
                      <button type="submit" name="send" class="btn btn-primary">Send</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>