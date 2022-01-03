<?php
try
{
	$db = new PDO('mysql:host=localhost;dbname=greendow_testdb;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<?php
$usersStatement = $db->prepare('SELECT * FROM users');
$usersStatement->execute();
$users=$usersStatement->fetchAll();

foreach($users as $user) {
?>
    <p><?php echo $user['name'] . ' est ' . $user['user_type'].'.'; ?></p>
<?php
}
?>

