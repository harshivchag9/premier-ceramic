
<div class="box" >
  <h2 style="color: teal">Contact form :</h2>
    <div class="form-group">
			<div class="row">
<?php 
  require_once("../../database/database.config.php");
  if(isset($_GET['status']))
  { 
    if($_GET['status']=="disp")
    { 
?>
        <form method="post" name='admincontact' id="admincontact"  >
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="firstname">Street 1</label>
                <input name="address1" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="lastname">Street 2</label>
                <input name="address2" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Landmark</label>
                <input name="address3" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="subject">City</label>
                <input name="address4" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="subject">Number</label>
                <input name="nmber" type="text" pattern="[0-9]{10}" maxlength="10" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="subject">Email</label>
                <input name="email" type="email" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="message">Map Link</label>
                <textarea name="maplink" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-md-12 text-center">
              <button onClick="AddContactUs();" type="submit" name="submit" value="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send message</button>
            </div>
          </div>
					<input type="hidden" value="insert" name="status">
        </form>

<?php
    }
  } 
		
  if(isset($_POST['status']))
  {
    if($_POST['status']=="insert")
    {
      $db = new Database();
			$sql = Database::getConnection();
      $sql->query("UPDATE `contactdetail` SET `address1`='$_POST[address1]',`address2`='$_POST[address2]',`address3`='$_POST[address3]',`address4`='$_POST[address4]',`callcenternumber`='$_POST[nmber]',`email`='$_POST[email]',`addressmap`='$_POST[maplink]' WHERE `id`=1");
    }
  }

?>
      </div>
    </div>						
</div>	
    