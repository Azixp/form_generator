<?php

namespace App\controller;

use App\entity\Form;
use App\entity\Input;
use App\form\FormBuilder;
use App\model\FormManager;

class FormController
{
    protected $formManager;

    public function __construct(FormManager $formManager)
    {
        $this->formManager = $formManager;
    }

    public function showForm()
    {
        $form = $this->formManager->getForm($_GET['form']);
        $formBuilder = new FormBuilder($form);
        $htmlForm = $formBuilder->buildForm();
        require __DIR__ . '/../view/form.html.php';
    }

    public function showForms()
    {
        $forms = $this->formManager->getAllForms();
        require __DIR__ . '/../view/forms.html.php';
    }

    public function createForm()
    {
        if (isset($_POST['form'])) {
            $formData = $_POST['form'];
            $form = new Form;

            foreach ($formData as $field => $inputParams) {
                $input = new Input;
                $input->setInput_type($inputParams['inputType'])
                    ->setInput_name($inputParams['name']);
                if (isset($inputParams['label'])) {
                    $input->setInput_label($inputParams['label']);
                }
                if (isset($inputParams['value'])) {
                    $input->setInput_value($inputParams['value']);
                }

                $form->setInput($input);
            }
            $this->formManager->addForm($form);
            $message = 'Your new Form has been created !';
        }

        require __DIR__ . '/../view/create.html.php';
    }

    public function deleteForm()
    {
        $this->formManager->deleteForm($_GET['form']);
        header('location:/?action=showForms&deleteStatus=1');
    }
}
