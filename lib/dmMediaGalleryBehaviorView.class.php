<?php
/**
 * @author TheCelavi
 */
class dmMediaGalleryBehaviorView extends dmBehaviorBaseView {
    
    public function configure() {
        $this->addRequiredVar(array('theme'));
    }
    
    public function filterBehaviorVars(array $vars = array()) {
        $vars = parent::filterBehaviorVars($vars);
        $vars['item_width'] = (isset($vars['item_width'])) ? $vars['item_width'] : false;
        $vars['item_height'] = (isset($vars['item_height'])) ? $vars['item_height'] : false;
        $vars['item_overflow'] = (isset($vars['item_overflow'])) ? $vars['item_overflow'] : false;
        $vars['container_width'] = (isset($vars['container_width'])) ? $vars['container_width'] : false;
        $vars['container_height'] = (isset($vars['container_height'])) ? $vars['container_height'] : false;
        $vars['container_overflow'] = (isset($vars['container_overflow'])) ? $vars['container_overflow'] : false;
        
        return $vars;
    }
    
    
    public function getJavascripts() {
        return array('dmMediaGalleryBehaviorPlugin.launch');
    }
    
    public function getStylesheets() {
        return array('dmMediaGalleryBehaviorPlugin.themes');
    }
}

