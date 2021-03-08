<?php
require_once 'DatabaseConnection.php';

class DialogueCreation
{
    protected $pdo = null;
    private $question;
    private $inquirer_name;
    private $email_address;
    private $answer;
	private $isAnswered;

	public function __construct()
    {
        $this->pdo = DatabaseConnection::instance();
		$this->question = "";
        $this->inquirer_name = "";
		$this->email_address = "";
	}

	public function setQuestion(string $question): string
	{
		if(empty($question)) {
			return "Please ask a question.";
		}
		else {
			$this->question = $question;
			return "";
		}
	}

    public function setInquirerName(string $inquirer_name): string
	{
		if(empty($inquirer_name)) {
			return "Please enter your first name.";
		}
		else {
			$this->question = $inquirer_name;
			return "";
		}
	}

    public function setEmailAddress(string $email_address): string
	{
		if(empty($email_address)) {
			return "Please enter an email address.";
		}
		else {
			$this->email_address = $email_address;
			return "";
		}
	}

    public function addDialogue(): bool
    {
		$sql = "INSERT INTO dialogues (question, email_address)
			VALUES (:question, :email_address)";
		$stmt = $this->pdo->prepare($sql);
		$status = $stmt->execute(
			[
				'question' => $this->question,
				'email_address' => $this->email_address
			]);

		return $status;
	}
}
?>
