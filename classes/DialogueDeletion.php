<?php
require_once 'DatabaseConnection.php';

class DialogueDeletion
{
    protected $pdo = null;
    private $dialogue_id;

	public function __construct($dialogue_id)
    {
        $this->pdo = DatabaseConnection::instance();
		$this->dialogue_id = $dialogue_id;
	}

    public function deleteDialogue(): bool
    {
		$sql = 
            "DELETE FROM 
                dialogues 
            WHERE 
                dialogue_id = :dialogue_id";
		$stmt = $this->pdo->prepare($sql);
		$status = $stmt->execute(
			[
                'dialogue_id' => $this->dialogue_id
			]);

		return $status;
	}
}
?>
