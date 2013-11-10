<?php

/* login.twig */
class __TwigTemplate_4b957888dabb116692ff8be998c78457 extends Twig_Template
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo gettext("login to your poche");
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "            <form method=\"post\" action=\"?login\" name=\"loginform\">
                <fieldset class=\"w500p center\">
                    <h2 class=\"mbs txtcenter\">";
        // line 7
        echo gettext("login to your poche");
        echo "</h2>
                    ";
        // line 8
        if ((twig_constant("MODE_DEMO") == 1)) {
            echo "<p>";
            echo gettext("you are in demo mode, some features may be disabled.");
            echo "</p>";
        }
        // line 9
        echo "\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<label class=\"col w150p\" for=\"login\">";
        // line 10
        echo gettext("Login");
        echo "</label>
\t\t\t\t\t\t<input class=\"col\" type=\"text\" id=\"login\" name=\"login\" placeholder=\"Login\" tabindex=\"1\" autofocus ";
        // line 11
        if ((twig_constant("MODE_DEMO") == 1)) {
            echo "value=\"poche\"";
        }
        echo " />
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<label class=\"col w150p\" for=\"password\">";
        // line 15
        echo gettext("Password");
        echo "</label>
\t\t\t\t\t\t<input class=\"col\" type=\"password\" id=\"password\" name=\"password\" placeholder=\"Password\" tabindex=\"2\" ";
        // line 16
        if ((twig_constant("MODE_DEMO") == 1)) {
            echo "value=\"poche\"";
        }
        echo " />
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<label class=\"col w150p\" for=\"longlastingsession\">";
        // line 19
        echo gettext("Stay signed in");
        echo "</label>
\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"longlastingsession\" name=\"longlastingsession\" tabindex=\"3\">
\t\t\t\t\t\t\t<small class=\"inbl\">";
        // line 22
        echo gettext("(Do not check on public computers)");
        echo "</small>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row mts txtcenter\">
\t\t\t\t\t\t<button class=\"bouton\" type=\"submit\" tabindex=\"4\">";
        // line 26
        echo gettext("Sign in");
        echo "</button>
\t\t\t\t\t</div>
                </fieldset>
                <input type=\"hidden\" name=\"returnurl\" value=\"";
        // line 29
        if (isset($context["referer"])) { $_referer_ = $context["referer"]; } else { $_referer_ = null; }
        echo twig_escape_filter($this->env, $_referer_, "html", null, true);
        echo "\">
                <input type=\"hidden\" name=\"token\" value=\"";
        // line 30
        if (isset($context["token"])) { $_token_ = $context["token"]; } else { $_token_ = null; }
        echo twig_escape_filter($this->env, $_token_, "html", null, true);
        echo "\">
            </form>
";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 30,  99 => 29,  93 => 26,  86 => 22,  80 => 19,  72 => 16,  68 => 15,  59 => 11,  55 => 10,  52 => 9,  46 => 8,  42 => 7,  38 => 5,  35 => 4,  29 => 3,);
    }
}
