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
			FROM    events
            WHERE   isAnswered = true
			ORDER   BY date DESC";

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
