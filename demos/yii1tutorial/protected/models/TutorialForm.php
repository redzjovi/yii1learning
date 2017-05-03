<?php

class TutorialForm extends CFormModel
{
    public $id;
    public $username;
    public $password;
	
    public function rules()
    {
        return [
            ['id', 'required', 'on' => 'tutorial3'],
            ['password', 'passwordValidation', 'on' => 'tutorial3'],
        ];
    }

	public function attributeLabels()
	{
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
        ];
	}
    
    public function passwordHasRequired()
    {
        $required = true;
        
        if ($this->id == '1')
            $required = false;
        
        return $required;
    }
    
    public function passwordValidation($attribute, $params)
    {
        $required = $this->passwordHasRequired();
        
        if ($required === true) { 
            if (empty($this->$attribute)) { 
                $this->addError($attribute, sprintf('%s cannot be blank.', $this->getAttributeLabel($attribute))); 
            } 
        } 
    }
}
