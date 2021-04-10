<?
require $_SERVER['DOCUMENT_ROOT'] . '/lib/bd.php';
$data = $_POST;
$user = R::load('user', $_SESSION['logged_user']->id);
$user->number_phone=$data['input_phone'];
R::store($user);
echo '<p class="d-inline">'.$user->number_phone.'</p>';
?>