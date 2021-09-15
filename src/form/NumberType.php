<?php
namespace App\form;

use App\entity\Input;

class NumberType
{
    protected $type;
    protected $name;
    protected $label;
    protected $value;

    public function __construct(Input $input)
    {
        $this->type = $input->getInput_type();
        $this->name = $input->getInput_name();
        $this->value = $input->getInput_value();
        $this->label = $input->getInput_label();
    }

    public function createHtmlField() : string
    {
        $template =<<<EOD
<div class="form-group">
<label for="$this->name" class="form-label">$this->label</label>
<input type="$this->type" name="$this->name" id="$this->name" class="form-control">
</div>
EOD;
        return $template;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the value of label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }


    /**
     * Set the value of label
     *
     * @return  self
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }
}
