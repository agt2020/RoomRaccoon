<?php

class Shopping extends Model
{
	public function all()
	{
		$this->prepare("SELECT * FROM " . strtolower(strtolower(__CLASS__)) . ";");
		return $this->execute();
	}

	public function save(array $data): int
	{
		$this->prepare("INSERT INTO " . strtolower(__CLASS__) . " (name, is_checked) VALUES (:name, :is_checked);");
		$this->execute($data);
		return $this->getLastId();
	}

	public function update(int $id, array $data)
	{
		$data['id'] = $id;

		$this->prepare("UPDATE " . strtolower(__CLASS__) . " name=:name, is_checked=:is_checked WHERE id=:id;");
		$this->execute($data);
		return $this->getLastId();
	}

	public function delete(int $id)
	{
		$this->prepare("DELETE FROM " . strtolower(__CLASS__) . " WHERE id=:id");
		$this->execute(['id' => $id]);
		return $this->countAffected() > 0;
	}
}