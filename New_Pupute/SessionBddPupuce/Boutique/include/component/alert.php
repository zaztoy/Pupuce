<?php if(isset($msgKO) && !empty($msgKO)) { ?>
				<div class="alert alert-danger" role="alert">
				  <?php echo $msgKO;?>
				</div>
<?php } ?>
<?php if(isset($msgOK) && !empty($msgOK)) { ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $msgOK;?>
				</div>
<?php } ?>
    			