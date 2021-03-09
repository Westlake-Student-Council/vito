<?php
require_once 'DatabaseConnection.php';

class DialogueUpdate
{
    protected $pdo = null;
    private $dialogue_id;
    private $inquirer_name;
    private $email_address;
    private $question;
    private $answer;
    private $is_answered;

    public function __construct($dialogue_id)
    {
        $this->pdo = DatabaseConnection::instance();
        $this->dialogue_id = $dialogue_id;
        $this->inquirer_name = "";
        $this->email_address = "";
        $this->question = "";
        $this->answer = "";
        $this->is_answered = 0;
    }

    public function loadCurrentDialogueDetails(): bool
    {
        $sql =
            "SELECT
                *
            FROM
                dialogues
            WHERE
                dialogue_id = :dialogue_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['dialogue_id' => $this->dialogue_id]);
        $dialogue = $stmt->fetch();

        if ($dialogue) {
            $this->inquirer_name = $dialogue["inquirer_name"];
            $this->email_address = $dialogue["email_address"];
            $this->question = $dialogue["question"];
            $this->answer = $dialogue["answer"];
            $this->is_answered = $dialogue["is_answered"];

            return true;
        } else {
            return false;
        }
    }

    public function setInquirerName(string $inquirer_name): string
    {
        if(empty($inquirer_name)) {
            return "Please enter the first name of the person asking the question.";
        }
        else {
            $this->inquirer_name = $inquirer_name;
            return "";
        }
    }


    public function setEmailAddress($email_address)
    {
        if(empty($email_address)) {
            return "Please enter the email address of the person asking the question.";
        }
        else {
            $this->email_address = $email_address;
            return "";
        }
    }

    public function setQuestion($question)
    {
        if(empty($question)) {
            return "Please enter the question.";
        }
        else {
            $this->question = $question;
            return "";
        }
    }

    public function setAnswer($answer)
    {
        $this->answer = $answer;
        return "";
    }

    public function setIsAnswered($is_answered)
    {
        if($is_answered == "0") {
            $this->is_answered = 0;
        } else {
            $this->is_answered = 1;
        }
        
        return "";
    }

    public function updateDialogue(): bool
    {
        $sql =
            "UPDATE dialogues
            SET
                inquirer_name = :inquirer_name,
                email_address = :email_address,
                question = :question,
                answer = :answer,
                is_answered = :is_answered
            WHERE
                dialogue_id = :dialogue_id";
        $stmt = $this->pdo->prepare($sql);
        $status = $stmt->execute(
            [
                'inquirer_name' => $this->inquirer_name,
                'email_address' => $this->email_address,
                'question' => $this->question,
                'answer' => $this->answer,
                'is_answered' => $this->is_answered,
                'dialogue_id' => $this->dialogue_id
            ]
        );
    
        return $status;
    }


    public function getInquirerName(): string
    {
        return $this->inquirer_name;
    }

    public function getEmailAddress(): string
    {
        return $this->email_address;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function getIsAnswered(): bool
    {
        return $this->is_answered;
    }

}
?>
