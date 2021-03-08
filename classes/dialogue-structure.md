# Dialogue Table Structure

column_name     | data_type     | additional_notes
------------    |------------   |------------
dialogue_id     | primary int   | primary id, auto-increment
inquirer_name   | varchar(50)   | first name of inquirer
email_address   | varchar(50)   | email address of the person asking the question
question        | varchar(500)  | text of the question content
answer          | varchar(500)  | text of the answer content
is_answered      | bool(tinyint) | true or false; whether or not the question has been answered. default: false
time_submitted  | timestamp     | auto-generated