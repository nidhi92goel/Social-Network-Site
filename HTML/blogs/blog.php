<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

  <style>
    body { padding-bottom: 60px; background:WHITE;}

    .btn-home{
      background:#FFC1C1;
      color:#FFFFFF;
    }
    .btn-create {
      background:#FFC1C1;
      color:#FFFFFF;
      font-weight:bold;
    }
    .btn-theme{
      background:#CD9CB0;
      color:#FFFFFF;
      border: 2px solid #ddcfe7;

    }
    .summernote .note-editable {
      text-align: left
    }

  </style>
</head>
<body>
<?php
  $connection = mysqli_connect("localhost:3306", "root", "", "webbuds");

  if (mysqli_connect_errno())
    echo 'Failed to connect to the MySQL server: '. mysqli_connect_error();
  $query = "SELECT * FROM blog_posts where postID = '{$_SESSION['postID']}'";
  $query_comments = "SELECT * FROM blog_comments where postID = '{$_SESSION['postID']}' ";
  $result = mysqli_query($connection,$query)
  or die('Error making select users query' . mysql_error());
  $blog_contents = mysqli_fetch_assoc($result);
  $comments = mysqli_query($connection,$query)
  or die('Error making select users query' . mysql_error());
  ?>
  <div class="container-fluid">
    <h2><a href="blogs.html" style="color:BLACK">Blogs</a> > <?php echo $blog_contents['title'] ?>
      <a href="../home/home.html" type="button" class="btn btn-home"><span class="glyphicon glyphicon-home"></span><strong>  Back to home page</strong></a>
      <div style="float:right;padding-right:40px;">
        <button type="button" class="btn btn-create" data-toggle="modal" data-target="#BlogModal"><span class="glyphicon glyphicon-pencil"></span>  Edit</button>
        <button type="button" class="btn btn-create" data-toggle="modal" data-target="#SettingModal"><span class="glyphicon glyphicon-cog"></span>  Settings</button>
      </div>
    </h2>
    <p style="font-size:15px;color:#c7c7c7;font-weight:bold"> Created on <?php echo $blog_contents['dateAdded'] ?></p>
    <p style = "font-size:15px;font-weight:bold"><?php echo $blog_contents['description'] ?></p>
    <div class="container-fluid text-justify col-md-8">
      <p><?php echo $blog_contents['content'] ?>

      </p>

    </div>
    <div class="col-md-4">
      <table style="margin: 0px auto;" class="table table-hover">
        <tbody>
          <tr>
            <td style="font-size:14px;background:#ffeaed"><span class="glyphicon glyphicon-thumbs-up" type="button" ></span>
              <strong> <?php echo $blog_contents['likes_count'] ?> Likes</strong></a>
            </td>
          </tr>
          <tr>
            <td><p><a href="../profile/profile_friends.html" style="Color:BLACK"><img src="../profile/assets/Profile_Pikachu.png" style="height:50px;width:50px; overflow:hidden;object-fit:cover"></a> 
              <strong><a href="../profile/profile.html" style="Color:BLACK">Pikachu</a></strong><br>Agree!</p>
            </td>
          </tr>
          <tr>
            <td><p><a href="../profile/profile_friends.html" style="Color:BLACK"><img src="../profile/assets/Profile-squirtle.png" style="height:50px;width:50px; overflow:hidden;object-fit:cover"></a> 
              <strong><a href="../profile/profile.html" style="Color:BLACK">Squirtle</a></strong><br>:D</p>
            </td>
          </tr>
          <tr>
            <td><p><a href="../profile/profile_friends.html" style="Color:BLACK"><img src="../profile/assets/Profile_Eevee.png" style="height:50px;width:50px; overflow:hidden;object-fit:cover"></a> 
              <strong><a href="../profile/profile.html" style="Color:BLACK">Eevee</a></strong><br>Bookmarked!</p>
            </td>
          </tr>
          <tr>
            <td><p><a href="../profile/profile_friends.html" style="Color:BLACK"><img src="../profile/assets/Profile-Ash.png" style="height:50px;width:50px; overflow:hidden;object-fit:cover"></a> 
              <strong><a href="../profile/profile.html" style="Color:BLACK">Oh</a></strong><br>Hi</p>
            </td>
          </tr>
          <td>
            <form method="post" action="submit_comments.php">
              <input type="text" placeholder="Leave your comments here..." class="form-control" id="comments">
              <button type="submit" class="btn btn-sm btn-default" style="margin-top:5px">Send</button> 
            </form>
          </td>
        </tr>
      </tbody>

    </table>
  </div>
  <div class="modal fade" id="BlogModal" tabindex="-1" role="dialog" aria-labelledby="Edit Blog" aria-hidden="true">
              <div class="modal-dialog" style="width:1200px">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Edit Blog</h5>
                  </div>
                  <div style="margin: 0 auto 0 auto;">
                    <div class="modal-body text-center" style="max-height:500px;overflow-y:auto;">
                      <!-- The form is placed inside the body of modal -->
                      <form id="EditForm" method="post" class="form-horizontal" action="submit.php" onsubmit="return postForm();">
                        <div class="form-group">
                           <label class="col-xs-2 control-label">Blog Title</label>
                           <div class="col-xs-9">
                              <input type="text" class="form-control" name="blogTitle" value="<?php echo $blog_contents['title'] ?>"/>
                           </div>
                        </div>
                        <div class="form-group">
                          <label class="col-xs-2 control-label" style="padding-top:20px;padding-bottom:10px">Blog Contents</label>
                          <div  class="col-xs-9">
                            <textarea id="blogContent" name = 'blogcontent'>
                              <?php echo $blog_contents['content'] ?>
                            </textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>


  <div class="modal fade" id="SettingModal" tabindex="-1" role="dialog" aria-labelledby="Settings" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="modal-title">Settings</h5>
        </div>

        <div style="margin: 0 auto 0 auto;">
          <div class="modal-body text-center">
            <form id="BlogSetting" method="post" class="form-horizontal" action="Blog_privacy.php">
              <div class="form-group" style="padding-top:10px">
                <label class="col-xs-3 control-label">Privacy Settings</label>
                <div class="col-xs-6 col-lg-6">
                  <select class="form-control" id="sel1">
                    <option>Public</option>
                    <option>Friends of friends</option>
                    <option>Friends</option>
                    <option>Circle 1</option>
                    <option>Circle 2</option>
                    <option>Circle 3</option>
                    <option>Only me</option>
                  </select>
                </div>
                <div class="col-xs-3 col-lg-3" style="padding-right:20px">
                  <button type="submit" class="btn btn-theme">Save</button>
                </div>            
              </div>
              
            </form>
            <button class="btn btn-danger" onClick="Delete()">Delete Blog</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    function postForm() {
    $('textarea[name="blogcontent"]').html($('#summernote').code());
    }


    function Delete(){
     var r = confirm("Are you sure you want to delete this blog? It will be permanently deleted.");
     if(r == true){
      window.location.href = "blogs.html";
    }
  }
  $(document).ready(function() {

    $('#blogContent').summernote({
      height: 300,
      width:850,
      minHeight: null,
      maxHeight: null,            
      focus: true               
    });
     });
</script>
</div>
</body>
