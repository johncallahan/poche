<?php

/* _messages.twig */
class __TwigTemplate_dc2452b734d8e82a17036ea033f6ab7c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "                ";
        if (isset($context["messages"])) { $_messages_ = $context["messages"]; } else { $_messages_ = null; }
        echo $_messages_;
    }

    public function getTemplateName()
    {
        return "_messages.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  37 => 12,  27 => 7,  19 => 1,  104 => 26,  100 => 24,  97 => 23,  94 => 22,  89 => 21,  84 => 20,  79 => 13,  74 => 30,  72 => 29,  68 => 27,  66 => 26,  63 => 25,  60 => 22,  57 => 21,  55 => 20,  52 => 19,  50 => 18,  46 => 16,  44 => 15,  42 => 14,  24 => 1,  38 => 13,  35 => 3,  29 => 2,);
    }
}
