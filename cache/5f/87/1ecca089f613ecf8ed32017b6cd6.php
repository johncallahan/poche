<?php

/* home.twig */
class __TwigTemplate_5f871ecca089f613ecf8ed32017b6cd6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'menu' => array($this, 'block_menu'),
            'precontent' => array($this, 'block_precontent'),
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
        echo gettext("home");
    }

    // line 3
    public function block_menu($context, array $blocks = array())
    {
        // line 4
        $this->env->loadTemplate("_menu.twig")->display($context);
    }

    // line 6
    public function block_precontent($context, array $blocks = array())
    {
        // line 7
        echo "            <ul id=\"sort\">
                <li><a href=\"./?sort=ia&amp;view=";
        // line 8
        if (isset($context["view"])) { $_view_ = $context["view"]; } else { $_view_ = null; }
        echo twig_escape_filter($this->env, $_view_, "html", null, true);
        echo "\"><img src=\"./tpl/img/";
        echo twig_escape_filter($this->env, twig_constant("THEME"), "html", null, true);
        echo "/top.png\" alt=\"";
        echo gettext("by date asc");
        echo "\" title=\"";
        echo gettext("by date asc");
        echo "\" /></a> ";
        echo gettext("by date");
        echo " <a href=\"./?sort=id&amp;view=";
        if (isset($context["view"])) { $_view_ = $context["view"]; } else { $_view_ = null; }
        echo twig_escape_filter($this->env, $_view_, "html", null, true);
        echo "\"><img src=\"./tpl/img/";
        echo twig_escape_filter($this->env, twig_constant("THEME"), "html", null, true);
        echo "/down.png\" alt=\"";
        echo gettext("by date desc");
        echo "\" title=\"";
        echo gettext("by date desc");
        echo "\" /></a></li>
                <li><a href=\"./?sort=ta&amp;view=";
        // line 9
        if (isset($context["view"])) { $_view_ = $context["view"]; } else { $_view_ = null; }
        echo twig_escape_filter($this->env, $_view_, "html", null, true);
        echo "\"><img src=\"./tpl/img/";
        echo twig_escape_filter($this->env, twig_constant("THEME"), "html", null, true);
        echo "/top.png\" alt=\"";
        echo gettext("by title asc");
        echo "\" title=\"";
        echo gettext("by title asc");
        echo "\" /></a> ";
        echo gettext("by title");
        echo " <a href=\"./?sort=td&amp;view=";
        if (isset($context["view"])) { $_view_ = $context["view"]; } else { $_view_ = null; }
        echo twig_escape_filter($this->env, $_view_, "html", null, true);
        echo "\"><img src=\"./tpl/img/";
        echo twig_escape_filter($this->env, twig_constant("THEME"), "html", null, true);
        echo "/down.png\" alt=\"";
        echo gettext("by title desc");
        echo "\" title=\"";
        echo gettext("by title desc");
        echo "\" /></a></li>
            </ul>
";
    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
        // line 13
        echo "            ";
        if (isset($context["page_links"])) { $_page_links_ = $context["page_links"]; } else { $_page_links_ = null; }
        echo $_page_links_;
        echo "
            ";
        // line 14
        if (isset($context["entries"])) { $_entries_ = $context["entries"]; } else { $_entries_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_entries_);
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 15
            echo "            <div id=\"entry-";
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_entry_, "id"));
            echo "\" class=\"entrie\">
                <h2><a href=\"index.php?view=view&amp;id=";
            // line 16
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_entry_, "id"));
            echo "\">";
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            echo $this->getAttribute($_entry_, "title");
            echo "</a></h2>
                <ul class=\"tools\">
                    <li><a title=\"";
            // line 18
            echo gettext("toggle mark as read");
            echo "\" class=\"tool archive ";
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            if (($this->getAttribute($_entry_, "is_read") == 0)) {
                echo "archive-off";
            }
            echo "\" href=\"./?action=toggle_archive&amp;id=";
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_entry_, "id"));
            echo "\"><span>";
            echo gettext("toggle mark as read");
            echo "</span></a></li>
                    <li><a title=\"";
            // line 19
            echo gettext("toggle favorite");
            echo "\" class=\"tool fav ";
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            if (($this->getAttribute($_entry_, "is_fav") == 0)) {
                echo "fav-off";
            }
            echo "\" href=\"./?action=toggle_fav&amp;id=";
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_entry_, "id"));
            echo "\"><span>";
            echo gettext("toggle favorite");
            echo "</span></a></li>
                    <li><a title=\"";
            // line 20
            echo gettext("delete");
            echo "\" class=\"tool delete\" href=\"./?action=delete&amp;id=";
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_entry_, "id"));
            echo "\"><span>";
            echo gettext("delete");
            echo "</span></a></li>
                    <li class=\"reading-time\">";
            // line 21
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            echo twig_escape_filter($this->env, Tools::getReadingTime($this->getAttribute($_entry_, "content")), "html", null, true);
            echo " min</li>
                </ul>
                <p>";
            // line 23
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            echo twig_escape_filter($this->env, twig_slice($this->env, strip_tags($this->getAttribute($_entry_, "content")), 0, 300), "html", null, true);
            echo "...</p>
                <p class=\"vieworiginal txtright small\"><a href=\"";
            // line 24
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_entry_, "url"));
            echo "\" target=\"_blank\" title=\"";
            echo gettext("original");
            echo " : ";
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_entry_, "title"));
            echo "\">";
            if (isset($context["entry"])) { $_entry_ = $context["entry"]; } else { $_entry_ = null; }
            echo twig_escape_filter($this->env, Tools::getDomain(twig_escape_filter($this->env, $this->getAttribute($_entry_, "url"))), "html", null, true);
            echo "</a></p>
            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "            ";
        if (isset($context["page_links"])) { $_page_links_ = $context["page_links"]; } else { $_page_links_ = null; }
        echo $_page_links_;
        echo "
";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  192 => 27,  174 => 24,  169 => 23,  163 => 21,  154 => 20,  140 => 19,  126 => 18,  117 => 16,  111 => 15,  106 => 14,  100 => 13,  97 => 12,  72 => 9,  50 => 8,  47 => 7,  44 => 6,  40 => 4,  37 => 3,  31 => 2,);
    }
}
