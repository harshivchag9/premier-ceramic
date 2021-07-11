<?php  
  require_once("database/database.config.php");
  $sql = Database::getConnection(); 
?>
    <div class="card sidebar-menu mb-4">
      <div class="card-header">
        <h3 class="h4 card-title">price </h3>
      </div>
      <div class="card-body">
        <div class="row"> 
					<div class="form-group" style="style=width:350px;"><input placeholder="min" type="number" step="500" value="0" class="form-control" max="9999" min="0" id="min_price"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="form-group" style="style=width:350px;"><input placeholder="max" step="500" class="form-control" value="9999" type="number" max="9999" min="0" id="max_price"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id="submitprice"> <button id="priceapply" class="common_selector btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button> </div>
        </div>
      </div>
    </div>
    <div class="card sidebar-menu mb-4">
      <div class="card-header">
        <h3 class="h4 card-title">Color <a onclick="clear_filter('color');" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
      </div>
      <div class="card-body">
        <form>
          <div class="form-group">
					<?php
						$res=$sql->query("SELECT DISTINCT(`color`) FROM product_detail ORDER BY `color`");
						while($row = mysqli_fetch_array($res))
            {
          ?>
              <div class="checkbox">
                <label>
                  <label><input type="radio" name="color" class="common_selector color" value="<?= $row['color'] ?>" > <?= $row['color'] ?></label>
                </label>
              </div>
          <?php
            }
          ?>
        </form>
      </div>
      <!-- <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>-->
    </div>
  </div>
  <div class="card sidebar-menu mb-4">
    <div class="card-header">
      <h3 class="h4 card-title">Type <a onclick="clear_filter('type');" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
    </div>
    <div class="card-body">
      <form>
        <div class="form-group">
          <?php
						$res=$sql->query("SELECT DISTINCT(`type`) FROM product_detail ORDER BY `type`");
						while($row = mysqli_fetch_array($res))
            {
          ?>
              <div class="checkbox">
                <label><input type="radio" name="type" class="common_selector type" value="<?= $row['type'] ?>" > <?= $row['type'] ?></label>
              </div>
          <?php
            }
          ?>
        </div>
        <!--<button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>-->
      </form>
    </div>
  </div>
	  <div class="card sidebar-menu mb-4">
      <div class="card-header">
        <h3 class="h4 card-title">Thickness <a onclick="clear_filter('thickness');" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
      </div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <?php
				  	  $res=$sql->query("SELECT DISTINCT(`thickness`) FROM product_detail ORDER BY `thickness` DESC");
						  while($row = mysqli_fetch_array($res))
              {
            ?>
                <div class="checkbox">
                  <label>
                    <label><input type="radio" name="thickness" class="common_selector thickness" value="<?= $row['thickness'] ?>" > <?= $row['thickness'] ?></label>
                  </label>
                </div>
					  <?php }?>
          </div>
            <!--  <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button> -->
          </form>
        </div>
      </div>
	    <div class="card sidebar-menu mb-4">
        <div class="card-header">
          <h3 class="h4 card-title">Size <a onclick="clear_filter('size');" class=" btn btn-sm btn-danger pull-right"  ><i class="fa fa-times-circle"></i> Clear</a></h3>
        </div>
          <div class="card-body">
          <form>
            <div class="form-group">
            <?php
						  $res=$sql->query("SELECT DISTINCT(`size`) FROM product_detail ORDER BY `size`");
						  while($row = mysqli_fetch_array($res))
              {
            ?>
              <div class="checkbox">
                <label>
                  <label><input type="radio" name="size" class="common_selector size" value="<?= $row['size'] ?>" > <?= $row['size'] ?></label>
                </label>
              </div>
					    <?php }?>
            </div>
                  <!--  <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>-->
          </form>
        </div>
      </div>
	  	  
