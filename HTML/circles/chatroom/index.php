<?php include 'database.php'; ?>
<?php 
  $query = "SELECT * FROM messages ORDER BY id DESC";
  $messages = mysqli_query($connection, $query);
?>

    <div id="container" style="background:#CD9CB0">
      <header>
        <h4 style="color:WHITE;padding-left:24px;background-color:#CD9CB0;">Messages</h4>
      </header>
      <div id="messages">
        <ul>
          <?php while($row = mysqli_fetch_assoc($messages)) : ?>
            <li class="message">
              <span><?php echo $row['time'] ?> - </span><strong>
              <?php echo $row['user']?></strong>
              : <?php echo $row['message'] ?>
            </li>     
          <?php endwhile; ?>
        </ul>
      </div>
      <div id="input">
        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        <form method="post" action="chatroom/process.php">
          <input type="text" id="user" name="user" placeholder="Enter Your Name" style="border: 2px solid #ddcfe7;"/>
          <input type="text" id="newmessage" name="message" placeholder="Enter A Message" style="border: 2px solid #ddcfe7;"/>
          <input id="show-btn" type="submit" name="submit" value="Show It" class="btn-theme"/>
        </form>
      </div>
    </div>

