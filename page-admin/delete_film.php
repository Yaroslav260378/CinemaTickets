<?
require $_SERVER['DOCUMENT_ROOT'] . '/lib/bd.php';
$data = $_POST;
$film = R::load('films', $data["id"]);
R::trash($film);
echo '<p id="res4" class="text-success text-center">Фильм успешно удален</p>';
?>