<?
require $_SERVER['DOCUMENT_ROOT'] . '/lib/bd.php';
$data = $_POST;

if( R::count('films', "title = ?", array($data['film_title'])) == 0  ) {
$film = R::dispense(films);
$film->title=$data['film_title'];
$film->year=$data['year'];
$film->country=$data['country'];
$film->lang=$data['lang'];
$film->genre=$data['genre'];
$film->duration=$data['duration'];
$film->rental=$data['rental'];
$film->trailer=$data['trailer'];
$film->poster=$data['poster'];
R::store($film);
echo '<p id="res2" class="text-success text-center">Фильм успешно добавлен.</p>';
} else {
	echo '<p id="res2" class="text-danger text-center">Такой фильм уже есть!</p>';
}
?>