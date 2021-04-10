<?
require $_SERVER['DOCUMENT_ROOT'] . '/lib/bd.php';
$data = $_POST;
$cinema = R::dispense(cinemas);
$cinema->name=$data['cinema_name'];
$cinema->adress=$data['adress'];
$cinema->icon=$data['icon_link'];
R::store($cinema);
echo '<p id="res" class="text-success text-center">Кинотеатр добавлен</p>';
?>