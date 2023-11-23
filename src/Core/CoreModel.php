<?php
namespace App\Core;

use Opis\Database\Database;
use PDO;
use App\Model\ModelInterface;


abstract class CoreModel implements ModelInterface
{
    protected static PDO $dth;
    protected static string $tableName;

    public Database $db;
    public string $table;
    protected string $primaryKey='id';

    public function setPrimaryKey(string $primaryKey): void
    {
        $this->primaryKey = $primaryKey;
    }

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function all(): array
    {
        return $this->db->from($this->table)
            ->select()
            ->fetchAssoc()
            ->all();
    }

    public function find(int $id): mixed
    {
        return $this->db->from($this->table)
            ->where('id')->is($id)
            ->select()
            ->fetchAssoc()
            ->first();
    }

    public function count(): int
    {
        return $this->db->from($this->table)->count();
    }

    public function insert(array $properties)
    {
        $result = $this->db->insert($properties)
            ->into($this->table);
    }
}