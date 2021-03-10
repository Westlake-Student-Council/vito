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
			$this->inquirer_name = $inquirer_name;
			return "";
		}
	}

    public function setEmailAddress(string $email_address): string
	{
		if(empty($email_address)) {
			return "Please enter an email address.";
		}
        else if(!strpos($email_address, '@eanesisd.net')) {
            return "Sorry, form is only open to Westlake Chaps.";
        }
		else {
			$this->email_address = $email_address;
			return "";
		}
	}

    public function addDialogue(): bool
    {
		$sql = "INSERT INTO dialogues (inquirer_name, question, email_address)
			VALUES (:inquirer_name, :question, :email_address)";
		$stmt = $this->pdo->prepare($sql);
		$status = $stmt->execute(
			[
                'inquirer_name' => $this->inquirer_name,
				'question' => $this->question,
				'email_address' => $this->email_address
			]);

		return $status;
	}
}
?>
