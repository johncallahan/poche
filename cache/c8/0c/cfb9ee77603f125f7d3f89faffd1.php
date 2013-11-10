<?php

/* _head.twig */
class __TwigTemplate_c80ccfb9ee77603f125f7d3f89faffd1 extends Twig_Template
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
        echo "        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"./tpl/img/favicon.ico\" />
        <link rel=\"apple-touch-icon-precomposed\" sizes=\"144x144\" href=\"./tpl/img/apple-touch-icon-144x144-precomposed.png\">
        <link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"./tpl/img/apple-touch-icon-72x72-precomposed.png\">
        <link rel=\"apple-touch-icon-precomposed\" href=\"./tpl/img/apple-touch-icon-precomposed.png\">
        <link rel=\"stylesheet\" href=\"./tpl/css/knacss.css\" media=\"all\">
        <link rel=\"stylesheet\" href=\"./tpl/css/style.css\" media=\"all\">
        <link rel=\"stylesheet\" href=\"./tpl/css/style-";
        // line 7
        echo twig_escape_filter($this->env, twig_constant("THEME"), "html", null, true);
        echo ".css\" media=\"all\" title=\"";
        echo twig_escape_filter($this->env, twig_constant("THEME"), "html", null, true);
        echo " theme\">
        <link rel=\"stylesheet\" href=\"./tpl/css/messages.css\" media=\"all\">
        <link rel=\"stylesheet\" href=\"./tpl/css/print.css\" media=\"print\">
        <link href='//fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <script src=\"./tpl/js/jquery-2.0.3.min.js\"></script>
        <script type=\"text/javascript\">\$(document).ready(function(){\$(\"body\").prepend('<a href=\"#top\" class=\"top_link\" title=\"";
        // line 12
        echo gettext("back to top");
        echo "\"><img src=\"./tpl/img/";
        echo twig_escape_filter($this->env, twig_constant("THEME"), "html", null, true);
        echo "/backtotop.png\" alt=";
        echo gettext("back to top");
        echo "\"/></a>');\$(window).scroll(function(){posScroll=\$(document).scrollTop();if(posScroll>=400)\$(\".top_link\").fadeIn(600);else \$(\".top_link\").fadeOut(600)})})</script>";
    }

    public function getTemplateName()
    {
        return "_head.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 12,  27 => 7,  19 => 1,  104 => 26,  100 => 24,  97 => 23,  94 => 22,  89 => 21,  84 => 20,  79 => 13,  74 => 30,  72 => 29,  68 => 27,  66 => 26,  63 => 25,  60 => 22,  57 => 21,  55 => 20,  52 => 19,  50 => 18,  46 => 16,  44 => 15,  42 => 14,  24 => 1,  38 => 13,  35 => 3,  29 => 2,);
    }
}
