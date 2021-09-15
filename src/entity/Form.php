<?php
namespace App\entity;
class Form
{
    private $form_id;
    private $form_method = 'POST';
    private $form_action = '/';
    private $input = [];


    /**
     * Get the value of form_id
     */
    public function getForm_id()
    {
        return $this->form_id;
    }

    /**
     * Get the value of form_method
     */
    public function getForm_method()
    {
        return $this->form_method;
    }

    /**
     * Get the value of form_action
     */
    public function getForm_action()
    {
        return $this->form_action;
    }

    /**
     * Get the value of input
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Set the value of form_id
     *
     * @return  self
     */
    public function setForm_id($form_id)
    {
        $this->form_id = $form_id;

        return $this;
    }

    /**
     * Set the value of form_method
     *
     * @return  self
     */
    public function setForm_method($form_method)
    {
        $this->form_method = $form_method;

        return $this;
    }

    /**
     * Set the value of form_action
     *
     * @return  self
     */
    public function setForm_action($form_action)
    {
        $this->form_action = $form_action;

        return $this;
    }

    /**
     * Set the value of input
     *
     * @return  self
     */
    public function setInput($input)
    {
        $this->input[] = $input;

        return $this;
    }
}
