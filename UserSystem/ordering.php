<?php  
if(isset($_POST['order-submit'])){

		$name=($_POST['firstname']);
		$email=($_POST['email']);
		$address=($_POST['address']);
		$country=($_POST['country']);
	    $city=($_POST['city']);
		$zip=($_POST['zip']);
		$cardName=($_POST['cardname']);
		$cardNumber=($_POST['cardnumber']);
		$expireMonth=($_POST['expmonth']);
		$expireYear=($_POST['expyear']);
		$cvv=($_POST['cvv']);

		echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Succesfully Order Items');
		    sleep(8);
		    window.location ='./index.php';
		    </script>");
		echo "<script>setTimeout(\"location = './index.php';\",2500);</script>";
          exit();
          header("Location: ../index.php?SomethingWentWrong");
	
}
else {
	header("Location: ../index.php?SomethingWentWrong");
	exit();
}


