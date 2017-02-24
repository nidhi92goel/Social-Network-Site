<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  <style>
  body { padding-bottom: 60px; background:WHITE;}
  .thumbnail
  {
      margin-bottom: 20px;
      padding: 0px;
      -webkit-border-radius: 0px;
      -moz-border-radius: 0px;
      border-radius: 0px;
  }

  .item.list-group-item
  {
      float: none;
      width: 100%;
      background-color: #fff;
      margin-bottom: 10px;
  }
  .item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
  {
      background: #428bca;
  }

  /*.item.list-group-item .list-group-image
  {
    margin-right: 10px;

  }*/
  .item.list-group-item .thumbnail
  {
    margin-bottom: 10px;
  }
  .item.list-group-item .caption
  {
    padding: 9px 9px 0px 9px;
  }
  .item.list-group-item:nth-of-type(odd)
  {
    background: #eeeeee;
  }

  .item.list-group-item:before, .item.list-group-item:after
  {
    display: table;
    content: " ";
  }

  .item.list-group-item img
  {
    float: left;
  }
  .item.list-group-item:after
  {
    clear: both;
  }
  .list-group-item-text
  {
    margin: 0 0 11px;
  }
  .btn-home{
    background:#FFC1C1;
    color:#FFFFFF;
  }
  .btn-create {
    background:#FFC1C1;
    color:#FFFFFF;
    font-weight:bold;
}

  
  </style>
</head>
<body>
<div class="container-fluid">
<h2>Circles
<a href="../home/home.html" type="button" class="btn btn-home"><span class="glyphicon glyphicon-home"></span><strong>  Back to home page</strong></a>
<div style="float:right;padding-right:40px;">
<button type="button" class="btn btn-create" data-toggle="modal" data-target="#CircleModal"><span class="glyphicon glyphicon-plus"></span>  Create a circle</a></button>
</div>
</h2>
<div class="container">
    <div id="circles" class="list-group">
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
            <a href="../circles/circle.php">
                <img class="group list-group-image" src="assets/pokeball.png" alt="" style="height:250px;width:400px;object-fit:cover"/>
            </a>
            <div class="caption">
                <a href="../circles/circle.php" style="color:BLACK">
                  <h4 class="group inner list-group-item-heading">
                    <strong>We are pokemons!</strong><span class="badge" style="float:right">20</span></h4>
                </a>
                </div>
            </div>
        </div>
        <div id="circles" class="list-group">
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
               <a href="#"> 
                <img class="group list-group-image" src="assets/Windsor.jpg" alt="" style="height:250px;width:400px;object-fit:cover"/>
               </a>
              <div class="caption">
                    <a href="#" style="color:BLACK">
                    <h4 class="group inner list-group-item-heading">
                        <strong>Let's go to Windsor for battle!</strong><span class="badge" style="float:right">5</span></h4>
                    </a>
                </div>
            </div>
        </div>
        </div>
  </div>
  <div id="circles" class="list-group">
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <a href="#">
                  <img class="group list-group-image" src="assets/Circle.png" alt="" style="height:250px;width:400px;object-fit:cover"/>
                </a>
                <div class="caption">
                    <a href="#" style="color:BLACK">
                    <h4 class="group inner list-group-item-heading">
                        <strong>Untitled</strong><span class="badge" style="float:right">20</span></h4>
                    </a>
                </div>
            </div>
        </div>
        <div id="circles" class="list-group">
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <a href="#">
                  <img class="group list-group-image" src="assets/Lighthouse.jpg" alt="" style="height:250px;width:400px;object-fit:cover" />
                </a>
                <div class="caption">
                    <a href="#" style="color:BLACK">
                    <h4 class="group inner list-group-item-heading">
                        <strong>Lighthouse</strong><span class="badge" style="float:right">5</span></h4>
                    </a>
                </div>
            </div>
        </div>
        </div>
</div>
</div>
</div>
<div class="modal fade" id="CircleModal" tabindex="-1" role="dialog" aria-labelledby="Create Circle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Create Circle</h5>
            </div>
      
        <div style="margin: 0 auto 0 auto;">
          <div class="modal-body text-center">
            <form id="CircleForm" method="post" class="form-horizontal" action="submit.php">
              <div class="form-group">
                <label class="col-xs-3 control-label">Circle Name</label>
                <div class="col-xs-5">
                  <input type="text" class="form-control" name="circlename"/>
                </div>
              </div>
              <div class="form-group" style="padding-top:10px">
                <label class="col-xs-3 control-label">Circle Photo</label>
                <div class="col-xs-5">
                  <input type="file" data-iconName="glyphicon glyphicon-inbox" id="imgInput" readonly>
                  <img id='img-upload' style="height:250px;width:400px;object-fit:cover;padding-top:10px" />
                </div>
              </div>
               <div class="form-group" style="padding-top:10px">
                <label class="col-xs-3 control-label">Add members</label>
                <div class="col-xs-5">
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
              <div class="text-right">
                <button type="submit" class="btn btn-theme" data-dismiss="modal">Submit</button>
                <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
              </div>            
            </form>
          </div>
        </div>
        </div>
    </div>
</div>
<script>

$(document).ready(function(){
   
    $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });

  $('.btn-file :file').on('fileselect', function(event, label) {
        
    var input = $(this).parents('.input-group').find(':text'),
        log = label;
        
    if( input.length ) {
        input.val(log);
    } else {
        if( log ) alert(log);
    }
      
    });
  function readURL(input) {
    if (input.files && input.files[0]) {
         var reader = new FileReader();
            
         reader.onload = function (e) {
            $('#img-upload').attr('src', e.target.result);
            url = e.target.result;
         }
            
         reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInput").change(function(){
    readURL(this);
  });      
      
});




</script>
</div>
</body>
