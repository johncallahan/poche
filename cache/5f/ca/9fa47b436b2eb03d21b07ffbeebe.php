<?php

/* layout.twig */
class __TwigTemplate_5fca9fa47b436b2eb03d21b07ffbeebe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'menu' => array($this, 'block_menu'),
            'precontent' => array($this, 'block_precontent'),
            'messages' => array($this, 'block_messages'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if lte IE 6]><html class=\"no-js ie6 ie67 ie678\" lang=\"en\"><![endif]-->
<!--[if lte IE 7]><html class=\"no-js ie7 ie67 ie678\" lang=\"en\"><![endif]-->
<!--[if IE 8]><html class=\"no-js ie8 ie678\" lang=\"en\"><![endif]-->
<!--[if gt IE 8]><html class=\"no-js\" lang=\"en\"><![endif]-->
<html>
    <head>
        <meta name=\"viewport\" content=\"initial-scale=1.0\">
        <meta charset=\"utf-8\">
        <!--[if IE]>
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=10\">
        <![endif]-->
        <title>";
        // line 13
        $this->displayBlock('title', $context, $blocks);
        echo " - poche</title>
";
        // line 14
        $this->env->loadTemplate("_head.twig")->display($context);
        // line 15
        $this->env->loadTemplate("_bookmarklet.twig")->display($context);
        // line 16
        echo "    </head>
    <body>
        ";
        // line 18
        $this->env->loadTemplate("_top.twig")->display($context);
        // line 19
        echo "        <div id=\"main\">
            ";
        // line 20
        $this->displayBlock('menu', $context, $blocks);
        // line 21
        echo "            ";
        $this->displayBlock('precontent', $context, $blocks);
        // line 22
        echo "            ";
        $this->displayBlock('messages', $context, $blocks);
        // line 25
        echo "            <div id=\"content\" class=\"w600p center\">
            ";
        // line 26
        $this->displayBlock('content', $context, $blocks);
        // line 27
        echo "            </div>
        </div>
";
        // line 29
        $this->env->loadTemplate("_footer.twig")->display($context);
        // line 30
        echo "    </body>
</html>";
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
    }

    // line 20
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 21
    public function block_precontent($context, array $blocks = array())
    {
    }

    // line 22
    public function block_messages($context, array $blocks = array())
    {
        // line 23
        echo "            ";
        $this->env->loadTemplate("_messages.twig")->display($context);
        // line 24
        echo "            ";
    }

    // line 26
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 26,  100 => 24,  97 => 23,  94 => 22,  89 => 21,  84 => 20,  79 => 13,  74 => 30,  72 => 29,  68 => 27,  66 => 26,  63 => 25,  60 => 22,  57 => 21,  55 => 20,  52 => 19,  50 => 18,  46 => 16,  44 => 15,  42 => 14,  24 => 1,  38 => 13,  35 => 3,  29 => 2,);
    }
}
