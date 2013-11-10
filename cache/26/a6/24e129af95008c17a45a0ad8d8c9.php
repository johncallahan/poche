<?php

/* _bookmarklet.twig */
class __TwigTemplate_26a624e129af95008c17a45a0ad8d8c9 extends Twig_Template
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
        echo "        <script type=\"text/javascript\">
          top[\"bookmarklet-url@inthepoche.com\"]=\"\"+\"<!DOCTYPE html>\"+\"<html>\"+\"<head>\"+\"<title>poche it !</title>\"+'<link rel=\"icon\" href=\"";
        // line 2
        if (isset($context["poche_url"])) { $_poche_url_ = $context["poche_url"]; } else { $_poche_url_ = null; }
        echo twig_escape_filter($this->env, $_poche_url_, "html", null, true);
        echo "tpl/img/favicon.ico\" />'+\"</head>\"+\"<body>\"+\"<script>\"+\"window.onload=function(){\"+\"window.setTimeout(function(){\"+\"history.back();\"+\"},250);\"+\"};\"+\"</scr\"+\"ipt>\"+\"</body>\"+\"</html>\"
        </script>";
    }

    public function getTemplateName()
    {
        return "_bookmarklet.twig";
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
