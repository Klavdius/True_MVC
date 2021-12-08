<?php
include_once 'Code/Route.php';
Route::Run();
//phpinfo();
//$pdo = new \PDO('mysql:host=localhost;dbname=sample_book_database', 'root', 'root');
//use Core\Model\Db\Query\Builder\Filter;
//$builder = new \Core\Model\Db\Query\Select\Builder();
//
//$builder->from('books', 'main')
//    ->column('isbn')
//    ->column('name')
//    ->where('id', new Filter($pdo, Filter::GT, 2))
//;
//echo '<pre>';
//var_dump($pdo->query($builder->build())->fetchAll(PDO::FETCH_ASSOC));
//echo '</pre>';