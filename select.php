<?php 

//if($_SERVER['REQUEST_METHOD'] == 'POST') {

 include 'connect.php';

 			$search = $_POST['search'];

			$stmt = $con->prepare('SELECT * FROM items WHERE name LIKE  "%$search%"');

			//$stmt->bindValue('keywords', '%' . $search . '%');

			$stmt->execute();
			// Assign To Variable 
			if (!$stmt->rowCount() == 0) {
		    while ($results = $stmt->fetch()) {?>
		        <img src="uploed/img/<?php echo $results['img']?>"> "<br />\n";
		  <?php echo $results['tage'] . "<br />\n";
		        echo $results['useranme'] . "<br />\n";
		        echo $results['not'] . "<br />\n";
		    }
		} else {
		    echo 'Nothing found';
}

//}




			/*$items = $stmt->fetchAll();


			foreach ($items as $item) {

			echo $item["name"] . "<p>";
			echo $item['img']  . "<p>";
			echo $item['pric'] . "<p>";
			echo $item["img"]  . "<p>";
			echo $item["not"]  . "<p>";
			echo $item["useranme"] . "<p>";
			echo $item["mobel"] . "<p>";



			          $stmt = $con->prepare("
      			 INSERT INTO 
       			 'items' (`name`,`tage`,`pric`,`img`,`useranme`,`aadress`,'Add-date',`text`,`moble`)
             VALUES  ('zname','ztage', 'zpric','zimg','zuser','dres','new()','ztext', 'zmoble')"); 

          $stmt->execute(array(

        'zname'  =>  $name,
        'ztage'  =>  $tage,
        'zpric'  =>  $pric,
        'zimg'   =>  $my,
        'zuser'  =>  $user,
        'ztext'  =>  $text,
        'zdres'  =>  $dres,
        'zmoble' =>  $moble












   $name    =  $_POST['name'];
   $img     =  $_FILES['img'];
   $tage    =  $_POST['tage'];
   $text    =  $_POST['text'];
   $pric    =  $_POST['pric'];
   $dres    =  $_POST['address'];   
   $user    =  $_POST['username'];
   $moble   =  $_POST['moble'];



			}*/

?>

<!--
<!DOCTYPE html>
<html>
<head>
	<title>img php</title>
</head>
<body>

	<img src="uploed/img/<?php //echo $item['img']?>"/>
</body>
</html>-->

