<?php

namespace App\Core;

use PDO;

class Model extends DbConnection
{
    /**
     * Get user's IP
     *
     * @return string $ip User's IP
     */
    public function getUsersIp(): string
    {
        if (! empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    /**
     * Get the amount of the same value in the current column
     *
     * @return int
     */
    public function checkAmountOfTheSameValueInOneColumn(
      $columnName, $columnValue, $tableName)
    {
        $query = $this->connect()->prepare("SELECT
            id
              FROM $tableName
                WHERE $columnName = ?
        ");

        $query->execute([$columnValue]);

        $amountOfRecords = $query->rowCount();

        return $amountOfRecords;
    }
}
