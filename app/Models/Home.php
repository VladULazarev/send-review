<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Home extends Model
{
    /**
    * @var string Name of the table
    */
    private $tableName = 'review';

    /**
    * @return $data All existing reviews
    */
    public function getAll()
    {
        $data = $this->connect()->prepare("SELECT
            *
              FROM $this->tableName ORDER BY id DESC
        ");

        $data->execute([]);

        return $data;
    }

    /**
    * @return $data The last review
    */
    public function getLast()
    {
        $data = $this->connect()->prepare("SELECT
            *
              FROM $this->tableName ORDER BY id DESC LIMIT 1
        ");

        $data->execute([]);

        $data = $data->fetch(PDO::FETCH_OBJ);

        return $data;
    }

    /**
    * Create a new review
    *
    * @param string $name
    * @param string $review
    */
    public function create(
        $name, $review, $ip
    )
    {
        $pre_insert = "INSERT INTO $this->tableName (

            name,
            message,
            ip,
            date

        ) VALUES (?, ?, ?, NOW())";

        $insert = $this->connect()->prepare($pre_insert);
        $insert->execute([

          $name, $review, $ip
        ]);

        return $insert->rowCount();
    }

    /**
     * Delete all reviews
     */
    public function destroy()
    {
        $pre_destroy = "DELETE FROM $this->tableName";

        $destroy = $this->connect()->prepare($pre_destroy);

        // if OK, return 'true'
        if ( $destroy->execute([]) ) {
            return TRUE;
        }
    }
}
