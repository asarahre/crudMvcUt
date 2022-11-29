<?php

namespace app\traits;

use PDOException;

trait Delete
{

    public function delete (array $deleteFieldAndValues)
    {
        $splPlaceHolder = sprintf(
            'delete into %s (%s) values ($s);',
            $this->table,
            implode(',',array_keys($deleteFieldAndValues)),
            ':' . implode(',:',array_keys($deleteFieldAndValues))
        );
        try {
            $prepared = $this->connection->prepare($splPlaceHolder);
            return $prepared->prepared->execute($deleteFieldAndValues);
        }catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}



