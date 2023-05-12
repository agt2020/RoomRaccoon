<?php

class Model
{
	protected $db = null;
	protected $dbStatement = null;

	public function __construct()
	{
		$this->db = new DB([]);
	}

	public function __destruct()
	{
		$this->db = null;
		$this->dbStatement = null;
	}

	public function prepare(string $sql): void
	{
		$this->dbStatement = $this->db->prepare($sql);
	}

	public function execute(array $params = [], int $type = PDO::FETCH_ASSOC): array
	{
		if ($this->dbStatement && $this->dbStatement->execute($params)) {
			return $this->dbStatement->fetch($type);
		}

		return [];
	}

	public function countAffected(): int
	{
		if ($this->dbStatement) {
			return $this->dbStatement->rowCount();
		}

		return 0;
	}

	public function getLastId(): mixed
	{
		return $this->db->lastInsertId();
	}
}