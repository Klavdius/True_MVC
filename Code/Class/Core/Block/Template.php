<?php

namespace Core\Block;

class Template
{
    const TEMPLATE_PATH = 'Code/Resources/Template';

    private $template;
    private $children = [];

    public function getTemplate()
    {
        return $this->template;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function getChild($name)
    {
        return isset($this->children[$name]) ? $this->children[$name] : null;
    }

    public function addChild($name, $child)
    {
        $this->children[$name] = $child;
        return $this;
    }

}