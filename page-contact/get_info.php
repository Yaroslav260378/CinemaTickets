<?
require $_SERVER['DOCUMENT_ROOT'] . '/lib/bd.php';
$data = $_POST;
$contact = R::load('vacancies', $data["id"]);


echo '<p class="ml-19">Время работы: '.$contact->time.'<br>'.$contact->adress.'<br>Телефон: '.$contact->phone.'</p>';
?>