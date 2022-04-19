<?php
defined('_JEXEC') or die;
use Joomla\CMS\Plugin\CMSPlugin;
class plgSystemTask extends CMSPlugin {

public function __construct($name, array $argumens = array())
{
    parent::__construct($name, $arguments);
    
}
public function onAfterDispatch(){
    $app = JFactory::getapplication();
    $isAdmin = $app->isClient('administrator');
    $heading_text = $this->params->get('heading_text', 1);
    if ($isAdmin) {
        JFactory::getDocument()->addScriptDeclaration("var page_task_container.innerHTML= '$heading_text' ");
        return;
    }
}
}