<?php
namespace App\model;

use \PDO;
use App\entity\Form;
use App\entity\Input;

class FormManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getDb();
    }

    public function addForm(Form $form): void
    {
        $insertForm = $this->pdo->prepare('INSERT INTO form VALUES(NULL, :form_method, :form_action)');
        $insertInput = $this->pdo->prepare('INSERT INTO input VALUES(NULL, :form_fk, :input_type, :input_name, :input_label, :input_value)');

        //Insert Form
        $insertForm->execute([
            'form_method' => $form->getForm_method(),
            'form_action' => $form->getForm_action()
        ]);
        $lastInsertFormId = $this->pdo->lastInsertId();
        $insertForm->closeCursor();

        //Insert input
        foreach ($form->getInput() as $key => $input) {
            $insertInput->execute([
                'form_fk' => $lastInsertFormId,
                'input_type' => $input->getInput_type(),
                'input_name' => $input->getInput_name(),
                'input_label' => $input->getInput_label(),
                'input_value' => json_encode($input->getInput_value())
            ]);
        }
        $insertInput->closeCursor();
    }

    public function getAllForms(): array
    {
        $selectForms = $this->pdo->prepare('SELECT * FROM form');
        // $selectInputs = $this->pdo->prepare('SELECT * FROM input');

        //select forms
        $selectForms->execute();
        $formsList = $selectForms->fetchAll(PDO::FETCH_CLASS, Form::class);
        $selectForms->closeCursor();

        // //select inputs
        // $selectInputs->execute();
        // $inputsList = $selectInputs->fetchAll(PDO::FETCH_CLASS, 'Input');
        // $selectInputs->closeCursor();

        // foreach ($formsList as $key => $form) {
        //     foreach ($inputsList as $key => $input) {
        //         if($form->getForm_id() == $input->getForm_fk()){
        //             $form->setInput($input);
        //         }
        //     }
        // }
        return $formsList;
    }

    public function getForm(int $formId): Form
    {
        $selectForm = $this->pdo->prepare('SELECT * FROM form WHERE form_id = :form_id');
        $selectInputs = $this->pdo->prepare('SELECT * FROM input WHERE form_fk = :form_id ORDER BY input_id');

        //select form
        $selectForm->execute([
            'form_id' => $formId
        ]);
        $selectForm->setFetchMode(PDO::FETCH_CLASS, Form::class);
        $form = $selectForm->fetch();
        $selectForm->closeCursor();

        //select inputs
        $selectInputs->execute([
            'form_id' => $formId
        ]);
        $selectInputs->setFetchMode(PDO::FETCH_CLASS, Input::class);
    
        while ($input = $selectInputs->fetch()) {
            $form->setInput($input);
        }

        $selectInputs->closeCursor();

        return $form;
    }

    public function deleteForm(int $formId)
    {
        $deleteFrom = $this->pdo->prepare(
            'DELETE f.*, i.* FROM form AS f
        INNER JOIN input AS i
        ON f.form_id = i.form_fk
        WHERE f.form_id = :form_id'
        );
        $deleteFrom->execute([
            'form_id' => $formId
        ]);
        $deleteFrom->closeCursor();
    }
}
