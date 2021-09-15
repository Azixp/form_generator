<?php

namespace App\form;

use App\entity\Form;


class FormBuilder
{
    protected $form;

    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function buildForm(): string
    {
        $template = "<form action=" . $this->form->getForm_action() . " method=" . $this->form->getForm_method() . ">";
        $template .= "<div class=\"w-50 mx-auto\">";
        foreach ($this->form->getInput() as $key => $input) {
            $inputTypeName = 'App\form\\' . ucfirst($input->getInput_Type()) . 'Type';
            $inputType = new $inputTypeName($input);
            $template .= $inputType->createHtmlField();
        }
        $template .= "</div></form>";

        return $template;
    }
}
