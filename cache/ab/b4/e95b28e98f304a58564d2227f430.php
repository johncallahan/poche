<?php

/* _footer.twig */
class __TwigTemplate_abb4e95b28e98f304a58564d2227f430 extends Twig_Template
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
        echo "        <footer class=\"w600p center mt3 smaller txtright\">
            <p>";
        // line 2
        echo gettext("powered by");
        echo " <a href=\"http://inthepoche.com\">poche</a></p>
            ";
        // line 3
        if ((twig_constant("DEBUG_POCHE") == 1)) {
            echo "<p><strong>";
            echo gettext("debug mode is on so cache is off.");
            echo " ";
            echo gettext("your poche version:");
            echo twig_escape_filter($this->env, twig_constant("POCHE_VERSION"), "html", null, true);
            echo ". ";
            echo gettext("storage:");
            echo " ";
            echo twig_escape_filter($this->env, twig_constant("STORAGE"), "html", null, true);
            echo "</strong></p>";
        }
        // line 4
        echo "        </footer>";
    }

    public function getTemplateName()
    {
        return "_footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 4,  26 => 3,  22 => 2,  37 => 12,  27 => 7,  19 => 1,  104 => 26,  100 => 24,  97 => 23,  94 => 22,  89 => 21,  84 => 20,  79 => 13,  74 => 30,  72 => 29,  68 => 27,  66 => 26,  63 => 25,  60 => 22,  57 => 21,  55 => 20,  52 => 19,  50 => 18,  46 => 16,  44 => 15,  42 => 14,  24 => 1,  38 => 13,  35 => 3,  29 => 2,);
    }
}
