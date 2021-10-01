<?php
// app/Database/MongoDatabase.php
namespace App\Database;

use App\Services\Contracts\NosqlServiceInterface;
use Psy\TabCompletion\Matcher\MongoClientMatcher;

class MongoDatabase implements NosqlServiceInterface
{
  private $connection;
  private $database;

  public function __construct($host, $port, $database)
  {
    $this->connection = new MongoClientMatcher( "mongodb://{$host}:{$port}" );
    $this->database = $this->connection->{$database};
  }

  /**
   * @see \App\Services\Contracts\NosqlServiceInterface::find()
   */
  public function find($collection, Array $criteria)
  {
    return $this->database->{$collection}->findOne($criteria);
  }

  public function create($collection, Array $document) {}
  public function update($collection, $id, Array $document) {}
  public function delete($collection, $id) {}
}
