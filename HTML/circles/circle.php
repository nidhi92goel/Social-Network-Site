<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="chatroom/css/style.css" type="text/css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
 <style>
   body { padding-bottom: 60px; 
     background:#ffffff;
   }
   .thumbnail {
    position: relative;
    width: 200px;
    height: 200px;
    overflow: hidden;
  }
  .thumbnail img {
    position: absolute;
    left: 50%;
    top: 50%;
    height: 100%;
    width: auto;
    -webkit-transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
  }
  .thumbnail img.portrait {
    width: 100%;
    height: auto;
  }
  .avatar{
    width:200px;
    height:200px;
    object-fit: cover;
    overflow: hidden;
    display: block;
    margin-left: auto;
    margin-right: auto;
    border-color:BLACK;
  }
  .btn-theme{
    background:#CD9CB0;
    color:#FFFFFF;
    border: 2px solid #ddcfe7;
  }
  
  table {
    border-collapse: separate;
    border-spacing: 50px 0;
  }
  th, td {
    padding: 5px;
  }
  .btn-theme{
    background:#ffeaed;
    color:BLACK;
    font-weight: BOLD;
    border: 2px solid #ddcfe7;
  }
  .btn-home{
    background:#FFC1C1;
    color:#FFFFFF;
  }

</style>
</head>
<body>
  <div class="container-fluid">
    <h2><a href="../circles/circles.php" style="color:BLACK">Circles</a> > We are pokemons!
      <a href="../home/home.html" type="button" class="btn btn-home"><span class="glyphicon glyphicon-home"></span> Back to home page</a>
    </h2>
    <p style="font-size:15px;color:#c7c7c7;font-weight:bold">Created on 10-9-2016</p>
    <p style = "font-size:15px;font-weight:bold">Description:blablablabla</p>
    <section class="col-md-8">
      <?php include("chatRoom/index.php"); ?>
    </section>
    <section class="col-md-4">
      <div class="text-center">
        <h4>Member List</h4>

        <div class="text-left">
          <table style="margin: 0px auto;" class="table table-hover">
            <tbody>
              <tr>
                <td style="font-size:14px;background:#ffeaed" data-toggle="modal" data-target="#MemberModal"><strong>Add Members</strong><span class="glyphicon glyphicon-plus" style="float:right"></span></a>
                </td>
              </tr>
              <tr>
                <td><a href="../profile/profile_friends.html" style="Color:BLACK"><img src="../profile/assets/Profile_Pikachu.png" style="height:50px;width:50px; overflow:hidden;object-fit:cover"></a> <a href="../profile/profile_friends.html" style="Color:BLACK">Pikachu</a></td>
              </tr>
              <tr>
                <td><a href="../profile/profile)friends.html" style="Color:BLACK"><img src="../profile/assets/Profile-squirtle.png" style="height:50px;width:50px; overflow:hidden;object-fit:cover"></a> <a href="../profile/profile_friends.html" style="Color:BLACK">Squirtle</a></td>
              </tr>
              <tr>
                <td><a href="../profile/profile_friends.html" style="Color:BLACK"><img src="../profile/assets/Profile_Eevee.png" style="height:50px;width:50px; overflow:hidden;object-fit:cover"></a> <a href="../profile/profile_friends.html" style="Color:BLACK">Eevee</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
      <div class="modal fade" id="MemberModal" tabindex="-1" role="dialog" aria-labelledby="Add Members" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h5 class="modal-title">Add Members</h5>
            </div>
            
            <div style="margin: 0 auto 0 auto;">
              <div class="modal-body text-center">
                <form>
                  <select class="selectpicker" data-show-subtext="true" data-live-search="true" multiple>
                    <option data-content="<img src='../profile/assets/Profile_Pikachu.png' style='height:30px;width:30px; overflow:hidden;object-fit:cover'> Pikachu">Pikachu</option>
                    <option data-content="<img src='../profile/assets/Profile-ash.png' style='height:30px;width:30px; overflow:hidden;object-fit:cover'> Ash">Ash</option>
                    <option data-content="<img src='../profile/assets/Profile-squirtle.png' style='height:30px;width:30px; overflow:hidden;object-fit:cover'> Squirtle">Squirtle</option>
                    <option data-content="<img src='../profile/assets/Profile_Charmander.png' style='height:30px;width:30px; overflow:hidden;object-fit:cover'> Charmander">Charmander</option>
                    <option data-content="<img src='../profile/assets/Profile_Bulbasaur.png' style='height:30px;width:30px; overflow:hidden;object-fit:cover'> Bulbasaur">Bulbasaur</option>
                    <option data-content="<img src='../profile/assets/Profile_Meowth.png' style='height:30px;width:30px; overflow:hidden;object-fit:cover'> Meowth">Meowth</option>

                  </select>
                </div>
              </div>
              <div class="text-right" style="padding-bottom:20px;padding-right:10px">
                <button type="submit" class="btn btn-theme" data-dismiss="modal">Submit</button>
                <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
