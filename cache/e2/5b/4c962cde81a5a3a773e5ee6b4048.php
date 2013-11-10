<?php

/* config.twig */
class __TwigTemplate_e25b4c962cde81a5a3a773e5ee6b4048 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'menu' => array($this, 'block_menu'),
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
        echo gettext("config");
    }

    // line 4
    public function block_menu($context, array $blocks = array())
    {
        // line 5
        echo "            <ul id=\"links\">
                <li><a href=\"./\" ";
        // line 6
        if (isset($context["view"])) { $_view_ = $context["view"]; } else { $_view_ = null; }
        if (($_view_ == "home")) {
            echo "class=\"current\"";
        }
        echo ">";
        echo gettext("home");
        echo "</a></li>
                <li><a href=\"./?view=fav\" ";
        // line 7
        if (isset($context["view"])) { $_view_ = $context["view"]; } else { $_view_ = null; }
        if (($_view_ == "fav")) {
            echo "class=\"current\"";
        }
        echo ">";
        echo gettext("favorites");
        echo "</a></li>
                <li><a href=\"./?view=archive\" ";
        // line 8
        if (isset($context["view"])) { $_view_ = $context["view"]; } else { $_view_ = null; }
        if (($_view_ == "archive")) {
            echo "class=\"current\"";
        }
        echo ">";
        echo gettext("archive");
        echo "</a></li>
                <li><a href=\"./?view=config\" ";
        // line 9
        if (isset($context["view"])) { $_view_ = $context["view"]; } else { $_view_ = null; }
        if (($_view_ == "config")) {
            echo "class=\"current\"";
        }
        echo ">";
        echo gettext("config");
        echo "</a></li>
                <li><a href=\"./?logout\" title=\"";
        // line 10
        echo gettext("logout");
        echo "\">";
        echo gettext("logout");
        echo "</a></li>
            </ul>
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "            <h2>";
        echo gettext("Poching a link");
        echo "</h2>
            <p>You can poche a link by several methods: (<a href=\"http://www.inthepoche.com/?pages/Documentation\" title=\"";
        // line 15
        echo gettext("read the documentation");
        echo "\">?</a>)</p>
            <ul>
                <li>firefox: <a href=\"https://bitbucket.org/jogaulupeau/poche/downloads/poche.xpi\" title=\"download the firefox extension\">download the extension</a></li>
                <li>chrome: <a href=\"https://bitbucket.org/jogaulupeau/poche/downloads/poche.crx\" title=\"download the chrome extension\">download the extension</a></li>
                <li>android: <a href=\"https://bitbucket.org/jogaulupeau/poche/downloads/Poche.apk\" title=\"download the application\">download the application</a></li>
                <li>bookmarklet: drag & drop this link to your bookmarks bar <a id=\"bookmarklet\" ondragend=\"this.click();\" title=\"i am a bookmarklet, use me !\" href=\"javascript:if(top['bookmarklet-url@inthepoche.com']){top['bookmarklet-url@inthepoche.com'];}else{(function(){var%20url%20=%20location.href%20||%20url;window.open('";
        // line 20
        if (isset($context["poche_url"])) { $_poche_url_ = $context["poche_url"]; } else { $_poche_url_ = null; }
        echo twig_escape_filter($this->env, $_poche_url_, "html", null, true);
        echo "?action=add&url='%20+%20btoa(url),'_self');})();void(0);}\">";
        echo gettext("poche it!");
        echo "</a></li>
            </ul>

            <h2>";
        // line 23
        echo gettext("Updating poche");
        echo "</h2>
            <ul>
                <li>";
        // line 25
        echo gettext("your version");
        echo " : <strong>";
        echo twig_escape_filter($this->env, twig_constant("POCHE_VERSION"), "html", null, true);
        echo "</strong></li>
                <li>";
        // line 26
        echo gettext("latest stable version");
        echo " : ";
        if (isset($context["prod"])) { $_prod_ = $context["prod"]; } else { $_prod_ = null; }
        echo twig_escape_filter($this->env, $_prod_, "html", null, true);
        echo ". ";
        if (isset($context["compare_prod"])) { $_compare_prod_ = $context["compare_prod"]; } else { $_compare_prod_ = null; }
        if (($_compare_prod_ == (-1))) {
            echo "<strong><a href=\"http://inthepoche.com/?pages/T%C3%A9l%C3%A9charger-poche\">";
            echo gettext("a more recent stable version is available.");
            echo "</a></strong>";
        } else {
            echo gettext("you are up to date.");
        }
        echo "</li>
                ";
        // line 27
        if ((twig_constant("DEBUG_POCHE") == 1)) {
            echo "<li>";
            echo gettext("latest dev version");
            echo " : ";
            if (isset($context["dev"])) { $_dev_ = $context["dev"]; } else { $_dev_ = null; }
            echo twig_escape_filter($this->env, $_dev_, "html", null, true);
            echo ". ";
            if (isset($context["compare_dev"])) { $_compare_dev_ = $context["compare_dev"]; } else { $_compare_dev_ = null; }
            if (($_compare_dev_ == (-1))) {
                echo "<strong><a href=\"http://inthepoche.com/?pages/T%C3%A9l%C3%A9charger-poche\">";
                echo gettext("a more recent development version is available.");
                echo "</a></strong>";
            } else {
                echo gettext("you are up to date.");
            }
            echo "</li>";
        }
        // line 28
        echo "            </ul>

            <h2>";
        // line 30
        echo gettext("Change your password");
        echo "</h2>
            <form method=\"post\" action=\"?config\" name=\"loginform\">
                <fieldset class=\"w500p\">
                    <div class=\"row\">
                        <label class=\"col w150p\" for=\"password\">";
        // line 34
        echo gettext("New password:");
        echo "</label>
                        <input class=\"col\" type=\"password\" id=\"password\" name=\"password\" placeholder=\"";
        // line 35
        echo gettext("Password");
        echo "\" tabindex=\"2\">
                    </div>
                    <div class=\"row\">
                        <label class=\"col w150p\" for=\"password_repeat\">";
        // line 38
        echo gettext("Repeat your new password:");
        echo "</label>
                        <input class=\"col\" type=\"password\" id=\"password_repeat\" name=\"password_repeat\" placeholder=\"";
        // line 39
        echo gettext("Password");
        echo "\" tabindex=\"3\">
                    </div>
                    <div class=\"row mts txtcenter\">
                        <button class=\"bouton\" type=\"submit\" tabindex=\"4\">";
        // line 42
        echo gettext("Update");
        echo "</button>
                    </div>
                </fieldset>
                <input type=\"hidden\" name=\"returnurl\" value=\"";
        // line 45
        if (isset($context["referer"])) { $_referer_ = $context["referer"]; } else { $_referer_ = null; }
        echo twig_escape_filter($this->env, $_referer_, "html", null, true);
        echo "\">
                <input type=\"hidden\" name=\"token\" value=\"";
        // line 46
        if (isset($context["token"])) { $_token_ = $context["token"]; } else { $_token_ = null; }
        echo twig_escape_filter($this->env, $_token_, "html", null, true);
        echo "\">
            </form>

            <h2>";
        // line 49
        echo gettext("Import");
        echo "</h2>
            <p>";
        // line 50
        echo gettext("Please execute the import script locally, it can take a very long time.");
        echo "</p>
            <p>";
        // line 51
        echo gettext("More infos in the official doc:");
        echo " <a href=\"http://inthepoche.com/?pages/Documentation\">inthepoche.com</a></p>
            <ul>
                <li><a href=\"./?import&from=pocket\">";
        // line 53
        echo gettext("import from Pocket");
        echo "</a> (you must have a \"";
        echo twig_escape_filter($this->env, twig_constant("IMPORT_POCKET_FILE"), "html", null, true);
        echo "\" file on your server)</li>
            <li><a href=\"./?import&from=readability\">";
        // line 54
        echo gettext("import from Readability");
        echo "</a> (you must have a \"";
        echo twig_escape_filter($this->env, twig_constant("IMPORT_READABILITY_FILE"), "html", null, true);
        echo "\" file on your server)</li>
            <li><a href=\"./?import&from=instapaper\">";
        // line 55
        echo gettext("import from Instapaper");
        echo "</a> (you must have a \"";
        echo twig_escape_filter($this->env, twig_constant("IMPORT_INSTAPAPER_FILE"), "html", null, true);
        echo "\" file on your server)</li>
            </ul>

            <h2>";
        // line 58
        echo gettext("Export your poche datas");
        echo "</h2>
            <p><a href=\"./?export\" target=\"_blank\">";
        // line 59
        echo gettext("Click here");
        echo "</a> ";
        echo gettext("to export your poche datas.");
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "config.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 59,  239 => 58,  231 => 55,  225 => 54,  219 => 53,  214 => 51,  210 => 50,  206 => 49,  199 => 46,  194 => 45,  188 => 42,  182 => 39,  178 => 38,  172 => 35,  168 => 34,  161 => 30,  157 => 28,  139 => 27,  123 => 26,  117 => 25,  112 => 23,  103 => 20,  95 => 15,  90 => 14,  87 => 13,  78 => 10,  69 => 9,  60 => 8,  51 => 7,  42 => 6,  39 => 5,  36 => 4,  30 => 3,);
    }
}
