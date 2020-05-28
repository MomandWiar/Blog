<?php

namespace Wiar\Core;
use \PDO;

/**
 * Class Querybuilder
 *
 * creates queries using PDO
 */
class QueryBuilder
{
    protected $pdo;

    /**
     * Querybuilder constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * selects whatever user passes
     *
     * @param String $table
     * @return array with all data from table_name
     */
    public function createQuery($query)
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * selects all data from table_name
     *
     * @param String $table
     * @return array with all data from table_name
     */
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * selects all data from table_name
     * with where statement
     *
     * @param String $table
     * @return array with all data from table_name
     */
    public function selectAllWhere($table, $where)
    {
        $symbol = ' = ';
        $sql = sprintf(
            "SELECT * FROM %s WHERE %s",
            $table,
            implode(' AND ', array_map(
                    function($k, $v) use($symbol) {
                        return $k . $symbol . "'" . $v . "'";
                    },
                    array_keys($where),
                    array_values($where)
                )
            )
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($where);
            return $statement->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die('Woops, Something went wrong<br>');
        }
    }

    /**
     * insert into database by passing
     * table_name and parameters
     *
     * @param String $table
     * @param array $parameters
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            die('Woops, Something went wrong<br>');
        }
    }
}