<?php
    require '../includes/members.inc.php';
    require '../../classes/controller.class.php';
?>

<!doctype html>
<html lang="en" dir="ltr">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!-- CSS -->
	<!-- <link rel="stylesheet" href="../../assets/css/login.css"> -->

	<!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">

	<title>Login | ADMIN PAGE</title>
</head>
<body class="container">
	<?php
		if(isset($_SESSION['message'])): ?>
		<div class="alert alert-<?=$_SESSION['msg_type']?>">
			<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
    <div>
        <h3>Choir Members</h3>
        <form action="" method="GET">
            <button class="btn btn-primary" type="submit">ADD</button>
        </form>
    </div>

    <div class="row justify-content-center">
    <table class="table table-hover table-responsive-md">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Phone number</th>
                <th scope="col">Part</th>
                <th scope="col">Instrument</th>
                <th colspan='2'>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $result = Controller::query('SELECT * FROM members');
                foreach($result as $member){
                    echo '<tr>';
                    echo ' <td scope="row">'.$member['id'].'</td>';
                    echo ' <td>'.$member['firstname'].'</td>';
                    echo ' <td>'.$member['gender'].'</td>';
                    echo ' <td>'.$member['phone_number'].'</td>';
                    echo ' <td>'.$member['part'].'</td>';
                    echo ' <td>'.$member['instrument'].'</td>';
                    echo ' <td>
                        <a href="#?edit='.$member['id'].'" class="btn btn-info">Edit</a>
                        <a href="../includes/members.inc.php?delete='.$member['id'].'" class="btn btn-danger">Delete</a>
                    </td>';
                    echo '<tr>';
                }
            ?>
        </tbody>
        </table>
    </div>
<script src="../../assets/jquery.js"></script>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>