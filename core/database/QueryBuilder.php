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
    private $statement;

    /**
     * Querybuilder constructor.
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * selects whatever user passes
     *
     * @param String $query
     */
    public function createQuery($query)
    {
        $this->statement = $this->pdo->prepare($query);
    }

    /**
     * selects all data from table_name
     *
     * @param String $table
     */
    public function selectAll($table)
    {
        $this->statement = $this->pdo->prepare("SELECT * FROM {$table}");
    }

    /**
     * selects all data from table_name
     * with where statement
     *
     * @param String $table
     * @param Array $where
     */
    public function selectWhere($table, $where)
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
            $this->statement = $this->pdo->prepare($sql);
        } catch (Exception $e) {
            die('Woops, Something went wrong<br>');
        }
    }

    /**
     * insert into database by passing
     * table_name and parameters
     *
     * @param String $table
     * @param array $values
     */
    public function insert($table, $values)
    {
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', array_keys($values)),
            ':' . implode(', :', array_keys($values))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($values);
        } catch (Exception $e) {
            die('Woops, Something went wrong<br>');
        }
    }

    public function update($table, $set, $where)
    {
        $separator = ' = ';
        $sql = sprintf(
            "UPDATE %s SET %s WHERE %s",
            $table,
            implode(', ', array_map(
                    function($key, $value) use($separator) {
                        return $key . $separator . ':' . $value;
                    },
                    array_keys($set),
                    array_keys($set)
                )
            ),
            implode(' AND ', array_map(
                    function($key, $value) use($separator) {
                        return $key . $separator . ':' . $value;
                    },
                    array_keys($where),
                    array_keys($where)
                )
            )
        );

        $parameters = array_merge($set, $where);

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            die('Woops, Something went wrong<br>');
        }
    }

    /**
     * fetches only one array from database
     *
     * @param array $where
     * @return array with the result of the query
     */
    public function fetch($where = []) {
        $this->statement->execute($where);
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * fetches multiple arrays from database
     *
     * @param array $where
     * @return array with the results of the query
     */
    public function fetchAll($where = []) {
        $this->statement->execute($where);
        return $this->statement->fetchAll(PDO::FETCH_CLASS);
    }
}