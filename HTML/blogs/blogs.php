<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script> 
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
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

  $query = "SELECT b.* FROM blogs as a, blog_posts as b where a.owner_userID = '{$_SESSION['userID']}' and a.blogID = b.blogID";
  $_SESSION['blogID'] = mysqli_fetch_assoc(mysqli_query($connection,$query))['blogID'];
  $query_blog = "SELECT * FROM blogs where owner_userID = '{$_SESSION['userID']}'";
  $result = mysqli_query($connection,$query)
  or die('Error making select users query' . mysql_error());
  $blog_details = mysqli_fetch_assoc(mysqli_query($connection,$query_blog))
  or die('Error making select users query' . mysql_error());
  ?>
  <div class="container-fluid">

    <h2>Blogs
      <span>
        <a href="../home/home.html" type="button" class="btn btn-home"><span class="glyphicon glyphicon-home"></span><strong>  Back to home page</strong></a>
      </span>

      <span style="float:right;padding-right:40px;">
        <button type="button" class="btn btn-create" data-toggle="modal" data-target="#BlogModal"><span class="glyphicon glyphicon-plus"></span>  Create a blog</a></button>
      </span>
    </div>
  </h2>
  <div class="container-fluid" style="padding-bottom:20px;padding-right:55px;padding-top:10px">
    <p style = "font-size:15px;font-weight:bold"> <?php echo $blog_details['description']?></p>
    <br>
    <span class="col-md-11">
     <input type="search" type="search" class="form-control input-sm" placeholder="Enter Search Term" style="height:35px">
   </span>
   <span class="col-md-1">
    <a type="button" class="btn btn-home" href="search.html"><strong><span class="glyphicon glyphicon-search"></span> Search</strong></a>
  </span>
</div>

<div class="container">
  <div id = "blog" class="list-group">
    <?php while($row = mysqli_fetch_assoc($result)) : ?>
      <a href="blog.php" class="list-group-item" id = "<?php echo  $row['postID'] ?>" onClick = '<?php echo $_SESSION['postID'] = $row['postID'] ?>' >
        <h4 class="list-group-item-heading" id = "<?php echo  $row['postID'] ?>"> <?php echo $row['title'] ?></h4>
        <p class="list-group-item-text"><?php echo $row['description'] ?></p>
      </a>
    <?php endwhile; ?>
  </div>
</div>
</div>
</div>
     
      <div class="modal fade" id="BlogModal" tabindex="-1" role="dialog" aria-labelledby="Create Blog" aria-hidden="true">
        <div class="modal-dialog" style="width:1200px">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h5 class="modal-title">Create Blog</h5>
            </div>
            <div style="margin: 0 auto 0 auto;">
              <div class="modal-body text-center" style="max-height:500px;overflow-y:auto;">
                <!-- The form is placed inside the body of modal -->
                <form id="BlogForm" method="post" class="form-horizontal" action="submit_new.php" onsubmit="return postForm();">
                  <div class="form-group">
                   <label class="col-xs-2 control-label">Blog Title</label>
                   <div class="col-xs-9">
                    <input type="text" class="form-control" name="blogTitle"/>
                  </div>
                </div>
                <div class="form-group">
                 <label class="col-xs-2 control-label">Description</label>
                 <div class="col-xs-9">
                  <input type="text" class="form-control" name="description" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-xs-2 control-label" style="padding-top:20px;padding-bottom:10px">Blog Contents</label>
                <div  class="col-xs-9">
                  <textarea id="blogContent" name = 'blogcontent'>
                  </textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="col-xs-2 control-label">Privacy Settings</label>
                <div class="col-xs-6 col-lg-9">
                  <select class="form-control" id="sel1" name = "privacy_blog">
                    <option>Public</option>
                    <option>Friends of friends</option>
                    <option>Friends</option>
                    <option>Circle 1</option>
                    <option>Circle 2</option>
                    <option>Circle 3</option>
                    <option>Only me</option>
                  </select>
                </div>
              </div> 
              <div class="form-group">
                <div class="col-xs-5 col-xs-offset-3">
                  <button type="submit" class="btn btn-theme" name="submit">Submit</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<script>
 function postForm() {
    $('textarea[name="blogcontent"]').html($('#summernote').code());
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
</body>