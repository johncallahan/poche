<?php

/* install.twig */
class __TwigTemplate_73ba5b0a226397be42226e3d6b7b7bcc extends Twig_Template
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
        echo gettext("installation");
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "        <form method=\"post\" action=\"?install\" name=\"loginform\">
            <fieldset class=\"w500p center\">
                <h2 class=\"mbs txtcenter\">";
        // line 6
        echo gettext("install your poche");
        echo "</h2>
                <p>
                    ";
        // line 8
        echo gettext("poche is still not installed. Please fill the below form to install it. Don't hesitate to <a href='http://inthepoche.com/?pages/Documentation'>read the documentation on poche website</a>.");
        // line 9
        echo "                </p>
                <p class=\"row\">
                    <label class=\"col w150p\" for=\"login\">";
        // line 11
        echo gettext("Login");
        echo "</label>
                    <input class=\"col\" type=\"text\" id=\"login\" name=\"login\" placeholder=\"Login\" tabindex=\"1\" autofocus />
                </p>
                <p class=\"row\">
                    <label class=\"col w150p\" for=\"password\">";
        // line 15
        echo gettext("Password");
        echo "</label>
                    <input class=\"col\" type=\"password\" id=\"password\" name=\"password\" placeholder=\"Password\" tabindex=\"2\">
                </p>
                <p class=\"row\">
                    <label class=\"col w150p\" for=\"password_repeat\">";
        // line 19
        echo gettext("Repeat your password");
        echo "</label>
                    <input class=\"col\" type=\"password\" id=\"password_repeat\" name=\"password_repeat\" placeholder=\"Password\" tabindex=\"3\">
                </p>
                <p class=\"row mts txtcenter\">
                    <button class=\"bouton\" type=\"submit\" tabindex=\"4\">";
        // line 23
        echo gettext("Install");
        echo "</button>
                </p>
            </fieldset>
            <input type=\"hidden\" name=\"token\" value=\"";
        // line 26
        if (isset($context["token"])) { $_token_ = $context["token"]; } else { $_token_ = null; }
        echo twig_escape_filter($this->env, $_token_, "html", null, true);
        echo "\">
        </form>
";
    }

    public function getTemplateName()
    {
        return "install.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 26,  74 => 23,  67 => 19,  60 => 15,  53 => 11,  49 => 9,  47 => 8,  42 => 6,  38 => 4,  35 => 3,  29 => 2,);
    }
}
