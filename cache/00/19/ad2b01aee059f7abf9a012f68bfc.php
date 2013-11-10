<?php

/* error.twig */
class __TwigTemplate_0019ad2b01aee059f7abf9a012f68bfc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo gettext("plop");
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "        ";
        if (isset($context["msg"])) { $_msg_ = $context["msg"]; } else { $_msg_ = null; }
        echo $_msg_;
        echo "
        <p>Don't forget <a href=\"http://inthepoche.com/?pages/Documentation\">the documentation</a>.</p>
";
    }

    public function getTemplateName()
    {
        return "error.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 4,  35 => 3,  29 => 2,);
    }
}
