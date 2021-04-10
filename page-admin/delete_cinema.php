<?
require $_SERVER['DOCUMENT_ROOT'] . '/lib/bd.php';
$data = $_POST;
$cinema = R::load('cinemas', $data["id"]);
R::trash($cinema);
echo '<p id="res3" class="text-success text-center">Кинотеатр удален</p>';
?>