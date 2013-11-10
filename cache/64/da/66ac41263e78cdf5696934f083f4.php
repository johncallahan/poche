<?php

/* _menu.twig */
class __TwigTemplate_64da66ac41263e78cdf5696934f083f4 extends Twig_Template
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
        echo "            <ul id=\"links\">
                <li><a href=\"./\" ";
        // line 2
        if (isset($context["view"])) { $_view_ = $context["view"]; } else { $_view_ = null; }
        if (($_view_ == "home")) {
            echo "class=\"current\"";
        }
        echo ">";
        echo gettext("home");
        echo "</a></li>
                <li><a href=\"./?view=fav\" ";
        // line 3
        if (isset($context["view"])) { $_view_ = $context["view"]; } else { $_view_ = null; }
        if (($_view_ == "fav")) {
            echo "class=\"current\"";
        }
        echo ">";
        echo gettext("favorites");
        echo "</a></li>
                <li><a href=\"./?view=archive\" ";
        // line 4
        if (isset($context["view"])) { $_view_ = $context["view"]; } else { $_view_ = null; }
        if (($_view_ == "archive")) {
            echo "class=\"current\"";
        }
        echo ">";
        echo gettext("archive");
        echo "</a></li>
                <li><a href=\"./?view=config\" ";
        // line 5
        if (isset($context["view"])) { $_view_ = $context["view"]; } else { $_view_ = null; }
        if (($_view_ == "config")) {
            echo "class=\"current\"";
        }
        echo ">";
        echo gettext("config");
        echo "</a></li>
                <li><a href=\"./?logout\" title=\"";
        // line 6
        echo gettext("logout");
        echo "\">";
        echo gettext("logout");
        echo "</a></li>
            </ul>";
    }

    public function getTemplateName()
    {
        return "_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 6,  49 => 5,  22 => 2,  19 => 1,  192 => 27,  174 => 24,  169 => 23,  163 => 21,  154 => 20,  140 => 19,  126 => 18,  117 => 16,  111 => 15,  106 => 14,  100 => 13,  97 => 12,  72 => 9,  50 => 8,  47 => 7,  44 => 6,  40 => 4,  37 => 3,  31 => 3,);
    }
}
