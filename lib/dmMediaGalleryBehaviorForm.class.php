<?php

/**
 * @author TheCelavi
 */
class dmMediaGalleryBehaviorForm extends dmBehaviorBaseForm {

    protected $theme = array(
        'default' => 'Default'
    );

    protected $overflow = array(
        'visible' => 'Visible',
        'hidden' => 'Hidden',
        'scroll' => 'Scroll',
        'auto' => 'Auto',
        'inherit' => 'Inherit'
    );


    public function configure() {
        
        $this->widgetSchema['inner_target'] = new sfWidgetFormInputText();
        $this->validatorSchema['inner_target'] = new sfValidatorString(array(
            'required' => false
        ));
        
        $this->widgetSchema['theme'] = new sfWidgetFormChoice(array(
            'choices' => $this->getI18n()->translateArray($this->theme)
        ));
        $this->validatorSchema['theme'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->theme)
        ));
        
        $this->widgetSchema['item_width'] = new sfWidgetFormInputText();
        $this->validatorSchema['item_width'] = new sfValidatorInteger(array(
            'required' => false,
            'min' => 1
        ));
        
        $this->widgetSchema['item_height'] = new sfWidgetFormInputText();
        $this->validatorSchema['item_height'] = new sfValidatorInteger(array(
            'required' => false,
            'min' => 1
        ));
        
        $this->widgetSchema['item_overflow'] = new sfWidgetFormChoice(array(
            'choices' => $this->getI18n()->translateArray($this->overflow)
        ));
        $this->validatorSchema['item_overflow'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->overflow)
        ));
        
        $this->widgetSchema['container_width'] = new sfWidgetFormInputText();
        $this->validatorSchema['container_width'] = new sfValidatorInteger(array(
            'required' => false,
            'min' => 1
        ));
        
        $this->widgetSchema['container_height'] = new sfWidgetFormInputText();
        $this->validatorSchema['container_height'] = new sfValidatorInteger(array(
            'required' => false,
            'min' => 1
        ));
        
        $this->widgetSchema['container_overflow'] = new sfWidgetFormChoice(array(
            'choices' => $this->getI18n()->translateArray($this->overflow)
        ));
        $this->validatorSchema['container_overflow'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->overflow)
        ));
        
        if (!$this->getDefault('theme')) $this->setDefault ('theme', 'default');
        
        parent::configure();
    }

}
