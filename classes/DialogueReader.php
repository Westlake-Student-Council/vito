<?php
require_once 'DatabaseConnection.php';

class DialogueReader {
	protected $pdo = null;

	public function __construct()
	{
		$this->pdo = DatabaseConnection::instance();
	}

	public function getAnsweredDialogues(): ?array
	{
		$sql =
		   "SELECT  *
			FROM    dialogues
            WHERE   is_answered = true
			ORDER   BY question DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $dialogues = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(!$dialogues) {
			return null;
		}
		else {
			return $dialogues;
		}
    }

}
?>
