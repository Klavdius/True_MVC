<?php
include_once 'Code/Route.php';

$pdo = new PDO('mysql:dbname=sample_book_database;host=127.0.0.1', 'root', 'root');
use Core\Model\Db\Sql\Search\Filter;
use Core\Model\Db\Sql\Search\FilterGroup;
use Core\Model\Db\Sql\Search\Expression;

//$statement = $pdo->prepare('select * from books where id = ? or id = ?');
//$statement->bindValue(1, 1);
//$statement->bindValue(2, 2);
//$statement->execute();
//var_dump($statement->fetchAll(PDO::FETCH_ASSOC));

$builder = new \Core\Model\Db\Sql\SelectBuilder();

$builder->from('books', 'a')
    ->joinInner(
        new \Core\Model\Db\Sql\Part\Join\TableInfo('authors', 'b'),
        new Expression('b.id = a.author_id')
    )
    ->joinLeft(
        new \Core\Model\Db\Sql\Part\Join\TableInfo('authors', 'c'),
        new Expression('c.id = a.author_id')
    )
    ->columns(
        new \Core\Model\Db\Sql\Part\Column('id', null, 'a'),
        new \Core\Model\Db\Sql\Part\Column('name', 'book_name', 'a')
    )
    ->limit(1)
    ->where(new FilterGroup(new Filter('id', 'eq', '2'), new Expression('id = 3', 'and')))
;
echo $builder;
//var_dump($pdo->query($builder)->fetchAll(PDO::FETCH_ASSOC));

