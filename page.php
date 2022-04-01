<?php
	ob_start(); // Output Buffering Start

   include 'init.php';
	/*
	================================================
	== Items Page
	================================================
	*/
	session_start();
	if (isset($_SESSION['Username'])) {
		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
		if ($do == 'Manage') {
			$stmt = $con->prepare("SELECT * FROM items");
			// Execute The Statement
			$stmt->execute();
			// Assign To Variable 
			$items = $stmt->fetchAll();
			if (! empty($items)) { ?>
			<h1 class="text-center">Manage Items</h1>
			<div class="container">
				<div class="table-responsive">
					<table class="main-table text-center table table-bordered">
						<tr>
							<td>#الاياد</td>
							<td>اسم المنتوج</td>
							<td>وصف</td>
							<td>ثمن</td>
							<td>تاريخ الاضافة</td>
							<td>تلفون</td>
							<td>اسم شخاص</td>
							<td>الادارة</td>
						</tr>
						<?php
							foreach($items as $item) {
								echo "<tr>";
									echo "<td>" . $item['id'] . "</td>";
									echo "<td>" . $item['Name'] . "</td>";
									echo "<td>" . $item['Descr'] . "</td>";
									echo "<td>" . $item['Price'] . "</td>";
									echo "<td>" . $item['Add_Date'] ."</td>";
									echo "<td>" . $item['Mobile'] ."</td>";
									echo "<td>" . $item['Username'] ."</td>";
									echo "<td>
										<a href='page.php?do=Edit&eid=" . $item['id'] . "' class='btn btn-success'><i class='fa fa-edit'></i> تعديل Edit</a>
										<a href='page.php?do=Delete&id=" . $item['id'] . "&im=". $item['Image'] . "&im1=". $item['Image1'] .
										 "&im2=". $item['Image2'] . "&im3=". $item['Image3'] . "&im4=". $item['Image4'] ."' class='btn btn-danger confirm'><i class='fa fa-close'></i> حذاف Delete </a>";
										if ($item['Approve'] == 0) {
											echo "<a 
													href='page.php?do=Approve&itemid=" . $item['id'] . "' 
													class='btn btn-info activate'>
													<i class='fa fa-check'></i> Approve</a>"; }
									echo "</td>";
								echo "</tr>";	} ?>
						<tr>
					</table>
			<?php } else {
				echo '<div class="container">';
					echo '<div class="nice-message">There\'s No Items To Show</div>';
					echo '<a href="upload.php" class="btn btn-sm btn-primary">
							<i class="fa fa-plus"></i> New Item
						</a>';
				echo '</div>';
			} ?>
		<?php 
		} elseif ($do == 'Edit') {

			// Check If Get Request item Is Numeric & Get Its Integer Value
			$eid = isset($_GET['eid']) && is_numeric($_GET['eid']) ? intval($_GET['eid']) : 0;
			// Select All Data Depend On This ID
			$stmt = $con->prepare("SELECT * FROM Items WHERE id = ?");
			$stmt->execute(array($eid));
			$tiem = $stmt->fetch();
			$count = $stmt->rowCount();
			if ($count > 0)  { ?>

        <div class="upload">
            <div class="container">
                <h1><i class="fa fa-cloud-upload fa-2x"></i>تعديل</h1>
                <p class="desc text-center">تعديل المنتوج</p>
		 <form class=   "form-upload" 
		       role=    "form" 
		       action=  "page.php?do=Update" 
		       method=  "post" 
		       enctype= "multipart/form-data">
		       <input type="hidden" name="itemid" value="<?php echo $eid; ?>">
                    <div class="form-group">                        
                        <input name="Name" type="text" class="form-control input-lg" placeholder="أوكتب اسم منتوجك" value="<?php echo $tiem['Name'];?>"/>
                        <input name="Text" class="form-control input-lg" value="<?php echo $tiem['Descr']?>">
                        <input name="Price" type="text" class="form-control input-lg" placeholder="أوكتب السعر بادرهم" value="<?php echo $tiem['Price'];?>"/>
                        <input name="Username" type="text" class="form-control input-lg" placeholder="أوكتب اسمك" value="<?php echo $tiem['Username'];?>" />
                        <input name="Moble" type="phone" class="form-control input-lg" placeholder="أوكتب رقم الهاتف" value="<?php echo $tiem['Mobile'];?>"/>
                        <input class="btn btn-success btn-block" name="signup" type="submit" />                        
                    </div>
                </form>
            </div>
        </div>
<!--End form upload-->
	<?php  }
		} elseif ($do == 'Update') {

			echo "<h1 class='text-center'>Update Item</h1>";
			echo "<div class='container'>";
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// Get Variables From The Form
				$eid 		= $_POST['itemid'];
				$name 		= $_POST['Name'];
				$pric 		= $_POST['Price'];
				$user		= $_POST['Username'];
				$moble   	= $_POST['Moble'];
				$text 		= $_POST['Text'];
				// Validate The Form
				$formErrors = array();
				if (empty($name)) {
					$formErrors[] = '<strong>الاسم</strong>اكتب';}
				if (empty($pric)) {
					$formErrors[] = '<strong>ثمن</strong>اكتب';}
				if (empty($user)) {
					$formErrors[] = '<strong>اسم شخاص</strong>اكتب ';}
				if (empty($moble)) {
					$formErrors[] = '<strong>تلفون</strong>اكتب رقم ';}
				if (empty($text)) {
					$formErrors[] = '<strong>وصف</strong>اكتب ';
				}
				// Loop Into Errors Array And Echo It
				foreach($formErrors as $error) {
					echo '<div class="alert alert-danger">' . $error . '</div>';}
				// Check If There's No Error Proceed The Update Operation
				if (empty($formErrors)) {
					// Update The Database With This Info
				$stmt = $con->prepare("UPDATE items SET
										 Name 	     = ?, 
										 Price     	 = ?, 
										 Username 	 = ?, 
										 Mobile   	 = ?, 
										 Descr       = ?
										 WHERE id 	 = ?");
				$stmt->execute(array($name, 
					                 $pric, 
					                 $user, 
					                 $moble, 
					                 $text, 
					                 $eid));
			if ($stmt->rowCount()== 0){
				echo "<div class='text-center alert alert-success'>الم يتم تعديل اي شئ</div>";
			}else{
				header('Location: page.php');
		 }
	  }
	  }
		} elseif ($do == 'Delete') {
			echo "<h1 class='text-center'>Delete Item</h1>";
			echo "<div class='container'>";
				// Check If Get Request Item ID Is Numeric & Get The Integer Value Of It
				$ID = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
					$stmt = $con->prepare("DELETE FROM items WHERE id = :id");
					$stmt->bindParam(":id", $ID);
					$stmt->execute();
					unlink('upload/img/'. $_GET['im']);
					unlink('upload/img/'. $_GET['im1']);
					unlink('upload/img/'. $_GET['im2']);
					unlink('upload/img/'. $_GET['im3']);
					unlink('upload/img/'. $_GET['im4']);
					header('location: page.php');

			} elseif ($do == 'Approve') {

				echo "<h1 class='text-center'>Approve Item</h1>";
				echo "<div class='container'>";
	
					// Check If Get Request Item ID Is Numeric & Get The Integer Value Of It
	
					$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
	
					// Select All Data Depend On This ID
	
					$check = checkItem('id', 'items', $itemid);
	
					// If There's Such ID Show The Form
	
					if ($check > 0) {
	
						$stmt = $con->prepare("UPDATE items SET Approve = 1 WHERE id = ?");
	
						$stmt->execute(array($itemid));
	
						header('location: page.php');

					} else {
						echo'<div class="alert alert-danger">This ID is Not Exist</div>';
					}
				echo '</div>';
			}
		include 'footer.php';
	} else {
		header('location: admin.php');
		exit();}
	ob_end_flush(); // Release The Output
?>