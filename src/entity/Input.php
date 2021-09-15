<?php
namespace App\entity;
class Input
{
    private $input_id;
    private $form_fk;
    private $input_type;
    private $input_name;
    private $input_label;
    private $input_value;


    /**
     * Get the value of input_id
     */
    public function getInput_id()
    {
        return $this->input_id;
    }

    /**
     * Get the value of form_fk
     */
    public function getForm_fk()
    {
        return $this->form_fk;
    }

    /**
     * Get the value of input_type
     */
    public function getInput_type()
    {
        return $this->input_type;
    }

    /**
     * Get the value of input_name
     */
    public function getInput_name()
    {
        return $this->input_name;
    }

    /**
     * Get the value of input_label
     */
    public function getInput_label()
    {
        return $this->input_label;
    }

    /**
     * Get the value of input_value
     */
    public function getInput_value()
    {
        return $this->input_value;
    }

    /**
     * Set the value of input_id
     *
     * @return  self
     */
    public function setInput_id($input_id)
    {
        $this->input_id = $input_id;

        return $this;
    }

    /**
     * Set the value of form_fk
     *
     * @return  self
     */
    public function setForm_fk($form_fk)
    {
        $this->form_fk = $form_fk;

        return $this;
    }

    /**
     * Set the value of input_type
     *
     * @return  self
     */
    public function setInput_type($input_type)
    {
        $this->input_type = $input_type;

        return $this;
    }

    /**
     * Set the value of input_name
     *
     * @return  self
     */
    public function setInput_name($input_name)
    {
        $this->input_name = $input_name;

        return $this;
    }

    /**
     * Set the value of input_label
     *
     * @return  self
     */
    public function setInput_label($input_label)
    {
        $this->input_label = $input_label;

        return $this;
    }

    /**
     * Set the value of input_value
     *
     * @return  self
     */
    public function setInput_value($input_value)
    {
        $this->input_value = $input_value;

        return $this;
    }
}
