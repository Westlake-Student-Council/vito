<?php
require_once 'DatabaseConnection.php';

class QuestionReader {
	protected $pdo = null;

	public function __construct()
	{
		$this->pdo = DatabaseConnection::instance();
	}

	public function getAnsweredQuestions(): ?array
	{
		$sql =
		   "SELECT  *
			FROM    events
            WHERE   isAnswered = true
			ORDER   BY date DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(!$questions) {
			return null;
		}
		else {
			return $questions;
		}
    }

}
?>
