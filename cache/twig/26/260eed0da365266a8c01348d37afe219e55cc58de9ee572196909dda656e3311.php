<?php

/* partials/base.html.twig */
class __TwigTemplate_bc615bfeb3be52261f436a7351c33c772cde98b787831ee0feee5cd9cd8d6aa3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'sidebar' => array($this, 'block_sidebar'),
            'body' => array($this, 'block_body'),
            'topbar' => array($this, 'block_topbar'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
            'navigation' => array($this, 'block_navigation'),
            'analytics' => array($this, 'block_analytics'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["theme_config"] = $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "themes", array()), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "system", array()), "pages", array()), "theme", array()));
        // line 2
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    ";
        // line 5
        $this->displayBlock('head', $context, $blocks);
        // line 41
        echo "</head>
<body class=\"searchbox-hidden ";
        // line 42
        echo $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array()), "body_classes", array());
        echo "\" data-url=\"";
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "route", array());
        echo "\">
    ";
        // line 43
        $this->displayBlock('sidebar', $context, $blocks);
        // line 59
        echo "
    ";
        // line 60
        $this->displayBlock('body', $context, $blocks);
        // line 93
        echo "    ";
        $this->displayBlock('analytics', $context, $blocks);
        // line 98
        echo " </body>
</html>
";
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "    <meta charset=\"utf-8\" />
    <title>";
        // line 7
        if ($this->getAttribute((isset($context["header"]) ? $context["header"] : null), "title", array())) {
            echo $this->getAttribute((isset($context["header"]) ? $context["header"] : null), "title", array());
            echo " | ";
        }
        echo $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "title", array());
        echo "</title>
    ";
        // line 8
        $this->loadTemplate("partials/metadata.html.twig", "partials/base.html.twig", 8)->display($context);
        // line 9
        echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" />
    <link rel=\"alternate\" type=\"application/atom+xml\" href=\"";
        // line 10
        echo (isset($context["base_url_absolute"]) ? $context["base_url_absolute"] : null);
        echo "/feed:atom\" title=\"Atom Feed\" />
    <link rel=\"alternate\" type=\"application/rss+xml\" href=\"";
        // line 11
        echo (isset($context["base_url_absolute"]) ? $context["base_url_absolute"] : null);
        echo "/feed:rss\" title=\"RSS Feed\" />
    <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 12
        echo $this->env->getExtension('GravTwigExtension')->urlFunc("theme://images/favicon.png");
        echo "\">

    ";
        // line 14
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 29
        echo "
    ";
        // line 30
        $this->displayBlock('javascripts', $context, $blocks);
        // line 39
        echo "
    ";
    }

    // line 14
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 15
        echo "        ";
        $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addCss", array(0 => "theme://css-compiled/nucleus.css", 1 => 102), "method");
        // line 16
        echo "        ";
        $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addCss", array(0 => "theme://css-compiled/theme.css", 1 => 101), "method");
        // line 17
        echo "        ";
        $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addCss", array(0 => "theme://css/custom.css", 1 => 100), "method");
        // line 18
        echo "        ";
        $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addCss", array(0 => "theme://css/font-awesome.min.css", 1 => 100), "method");
        // line 19
        echo "        ";
        $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addCss", array(0 => "theme://css/featherlight.min.css"), "method");
        // line 20
        echo "
        ";
        // line 21
        if (((($this->getAttribute((isset($context["browser"]) ? $context["browser"] : null), "getBrowser", array()) == "msie") && ($this->getAttribute((isset($context["browser"]) ? $context["browser"] : null), "getVersion", array()) >= 8)) && ($this->getAttribute((isset($context["browser"]) ? $context["browser"] : null), "getVersion", array()) <= 9))) {
            // line 22
            echo "            ";
            $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addCss", array(0 => "theme://css/nucleus-ie9.css"), "method");
            // line 23
            echo "            ";
            $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addCss", array(0 => "theme://css/pure-0.5.0/grids-min.css"), "method");
            // line 24
            echo "            ";
            $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addJs", array(0 => "theme://js/html5shiv-printshiv.min.js"), "method");
            // line 25
            echo "        ";
        }
        // line 26
        echo "
        ";
        // line 27
        echo $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "css", array(), "method");
        echo "
    ";
    }

    // line 30
    public function block_javascripts($context, array $blocks = array())
    {
        // line 31
        echo "        ";
        $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addJs", array(0 => "jquery", 1 => 101), "method");
        // line 32
        echo "        ";
        $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addJs", array(0 => "theme://js/modernizr.custom.71422.js", 1 => 100), "method");
        // line 33
        echo "        ";
        $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addJs", array(0 => "theme://js/featherlight.min.js"), "method");
        // line 34
        echo "        ";
        $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addJs", array(0 => "theme://js/clipboard.min.js"), "method");
        // line 35
        echo "        ";
        $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addJs", array(0 => "theme://js/jquery.scrollbar.min.js"), "method");
        // line 36
        echo "        ";
        $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "addJs", array(0 => "theme://js/learn.js"), "method");
        // line 37
        echo "        ";
        echo $this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "js", array(), "method");
        echo "
    ";
    }

    // line 43
    public function block_sidebar($context, array $blocks = array())
    {
        // line 44
        echo "    <nav id=\"sidebar\">
        <div id=\"header-wrapper\">
            <div id=\"header\">
                <a id=\"logo\" href=\"";
        // line 47
        echo (($this->getAttribute((isset($context["theme_config"]) ? $context["theme_config"] : null), "home_url", array())) ? ($this->getAttribute((isset($context["theme_config"]) ? $context["theme_config"] : null), "home_url", array())) : ((isset($context["base_url_absolute"]) ? $context["base_url_absolute"] : null)));
        echo "\">";
        $this->loadTemplate("partials/logo.html.twig", "partials/base.html.twig", 47)->display($context);
        echo "</a>
                <div class=\"searchbox\">
                    <label for=\"search-by\"><i class=\"fa fa-search\"></i></label>
                    <input id=\"search-by\" type=\"text\" placeholder=\"";
        // line 50
        echo $this->env->getExtension('GravTwigExtension')->translate("THEME_LEARN2_SEARCH_DOCUMENTATION");
        echo "\"
                           data-search-input=\"";
        // line 51
        echo (isset($context["base_url_relative"]) ? $context["base_url_relative"] : null);
        echo "/search.json/query\"/>
                    <span data-search-clear><i class=\"fa fa-close\"></i></span>
                </div>
            </div>
        </div>
        ";
        // line 56
        $this->loadTemplate("partials/sidebar.html.twig", "partials/base.html.twig", 56)->display($context);
        // line 57
        echo "    </nav>
    ";
    }

    // line 60
    public function block_body($context, array $blocks = array())
    {
        // line 61
        echo "    <section id=\"body\">
        <div id=\"overlay\"></div>

        <div class=\"padding highlightable\">
            <a href=\"#\" id=\"sidebar-toggle\" data-sidebar-toggle><i class=\"fa fa-2x fa-bars\"></i></a>

            ";
        // line 67
        $this->displayBlock('topbar', $context, $blocks);
        // line 80
        echo "
            ";
        // line 81
        $this->displayBlock('content', $context, $blocks);
        // line 82
        echo "
            ";
        // line 83
        $this->displayBlock('footer', $context, $blocks);
        // line 88
        echo "
        </div>
        ";
        // line 90
        $this->displayBlock('navigation', $context, $blocks);
        // line 91
        echo "    </section>
    ";
    }

    // line 67
    public function block_topbar($context, array $blocks = array())
    {
        if ((($this->getAttribute($this->getAttribute((isset($context["theme_config"]) ? $context["theme_config"] : null), "github", array()), "position", array()) == "top") || $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "plugins", array()), "breadcrumbs", array()), "enabled", array()))) {
            // line 68
            echo "            <div id=\"top-bar\">
                ";
            // line 69
            if (($this->getAttribute($this->getAttribute((isset($context["theme_config"]) ? $context["theme_config"] : null), "github", array()), "position", array()) == "top")) {
                // line 70
                echo "                <div id=\"top-github-link\">
                ";
                // line 71
                $this->loadTemplate("partials/github_link.html.twig", "partials/base.html.twig", 71)->display($context);
                // line 72
                echo "                </div>
                ";
            }
            // line 74
            echo "
                ";
            // line 75
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "plugins", array()), "breadcrumbs", array()), "enabled", array())) {
                // line 76
                echo "                ";
                $this->loadTemplate("partials/breadcrumbs.html.twig", "partials/base.html.twig", 76)->display($context);
                // line 77
                echo "                ";
            }
            // line 78
            echo "            </div>
            ";
        }
    }

    // line 81
    public function block_content($context, array $blocks = array())
    {
    }

    // line 83
    public function block_footer($context, array $blocks = array())
    {
        // line 84
        echo "                ";
        if (($this->getAttribute($this->getAttribute((isset($context["theme_config"]) ? $context["theme_config"] : null), "github", array()), "position", array()) == "bottom")) {
            // line 85
            echo "                ";
            $this->loadTemplate("partials/github_note.html.twig", "partials/base.html.twig", 85)->display($context);
            // line 86
            echo "                ";
        }
        // line 87
        echo "            ";
    }

    // line 90
    public function block_navigation($context, array $blocks = array())
    {
    }

    // line 93
    public function block_analytics($context, array $blocks = array())
    {
        // line 94
        echo "        ";
        if ($this->getAttribute((isset($context["theme_config"]) ? $context["theme_config"] : null), "google_analytics_code", array())) {
            // line 95
            echo "        ";
            $this->loadTemplate("partials/analytics.html.twig", "partials/base.html.twig", 95)->display($context);
            // line 96
            echo "        ";
        }
        // line 97
        echo "    ";
    }

    public function getTemplateName()
    {
        return "partials/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  321 => 97,  318 => 96,  315 => 95,  312 => 94,  309 => 93,  304 => 90,  300 => 87,  297 => 86,  294 => 85,  291 => 84,  288 => 83,  283 => 81,  277 => 78,  274 => 77,  271 => 76,  269 => 75,  266 => 74,  262 => 72,  260 => 71,  257 => 70,  255 => 69,  252 => 68,  248 => 67,  243 => 91,  241 => 90,  237 => 88,  235 => 83,  232 => 82,  230 => 81,  227 => 80,  225 => 67,  217 => 61,  214 => 60,  209 => 57,  207 => 56,  199 => 51,  195 => 50,  187 => 47,  182 => 44,  179 => 43,  172 => 37,  169 => 36,  166 => 35,  163 => 34,  160 => 33,  157 => 32,  154 => 31,  151 => 30,  145 => 27,  142 => 26,  139 => 25,  136 => 24,  133 => 23,  130 => 22,  128 => 21,  125 => 20,  122 => 19,  119 => 18,  116 => 17,  113 => 16,  110 => 15,  107 => 14,  102 => 39,  100 => 30,  97 => 29,  95 => 14,  90 => 12,  86 => 11,  82 => 10,  79 => 9,  77 => 8,  69 => 7,  66 => 6,  63 => 5,  57 => 98,  54 => 93,  52 => 60,  49 => 59,  47 => 43,  41 => 42,  38 => 41,  36 => 5,  31 => 2,  29 => 1,);
    }
}
/* {% set theme_config = attribute(config.themes, config.system.pages.theme) %}*/
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     {% block head %}*/
/*     <meta charset="utf-8" />*/
/*     <title>{% if header.title %}{{ header.title }} | {% endif %}{{ site.title }}</title>*/
/*     {% include 'partials/metadata.html.twig' %}*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />*/
/*     <link rel="alternate" type="application/atom+xml" href="{{ base_url_absolute}}/feed:atom" title="Atom Feed" />*/
/*     <link rel="alternate" type="application/rss+xml" href="{{ base_url_absolute}}/feed:rss" title="RSS Feed" />*/
/*     <link rel="icon" type="image/png" href="{{ url('theme://images/favicon.png') }}">*/
/* */
/*     {% block stylesheets %}*/
/*         {% do assets.addCss('theme://css-compiled/nucleus.css',102) %}*/
/*         {% do assets.addCss('theme://css-compiled/theme.css',101) %}*/
/*         {% do assets.addCss('theme://css/custom.css',100) %}*/
/*         {% do assets.addCss('theme://css/font-awesome.min.css',100) %}*/
/*         {% do assets.addCss('theme://css/featherlight.min.css') %}*/
/* */
/*         {% if browser.getBrowser == 'msie' and browser.getVersion >= 8 and browser.getVersion <= 9 %}*/
/*             {% do assets.addCss('theme://css/nucleus-ie9.css') %}*/
/*             {% do assets.addCss('theme://css/pure-0.5.0/grids-min.css') %}*/
/*             {% do assets.addJs('theme://js/html5shiv-printshiv.min.js') %}*/
/*         {% endif %}*/
/* */
/*         {{ assets.css() }}*/
/*     {% endblock %}*/
/* */
/*     {% block javascripts %}*/
/*         {% do assets.addJs('jquery',101) %}*/
/*         {% do assets.addJs('theme://js/modernizr.custom.71422.js',100) %}*/
/*         {% do assets.addJs('theme://js/featherlight.min.js') %}*/
/*         {% do assets.addJs('theme://js/clipboard.min.js') %}*/
/*         {% do assets.addJs('theme://js/jquery.scrollbar.min.js') %}*/
/*         {% do assets.addJs('theme://js/learn.js') %}*/
/*         {{ assets.js() }}*/
/*     {% endblock %}*/
/* */
/*     {% endblock %}*/
/* </head>*/
/* <body class="searchbox-hidden {{ page.header.body_classes }}" data-url="{{ page.route }}">*/
/*     {% block sidebar %}*/
/*     <nav id="sidebar">*/
/*         <div id="header-wrapper">*/
/*             <div id="header">*/
/*                 <a id="logo" href="{{ theme_config.home_url ?: base_url_absolute }}">{% include 'partials/logo.html.twig' %}</a>*/
/*                 <div class="searchbox">*/
/*                     <label for="search-by"><i class="fa fa-search"></i></label>*/
/*                     <input id="search-by" type="text" placeholder="{{ 'THEME_LEARN2_SEARCH_DOCUMENTATION'|t }}"*/
/*                            data-search-input="{{ base_url_relative }}/search.json/query"/>*/
/*                     <span data-search-clear><i class="fa fa-close"></i></span>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*         {% include 'partials/sidebar.html.twig' %}*/
/*     </nav>*/
/*     {% endblock %}*/
/* */
/*     {% block body %}*/
/*     <section id="body">*/
/*         <div id="overlay"></div>*/
/* */
/*         <div class="padding highlightable">*/
/*             <a href="#" id="sidebar-toggle" data-sidebar-toggle><i class="fa fa-2x fa-bars"></i></a>*/
/* */
/*             {% block topbar %}{% if theme_config.github.position == 'top' or config.plugins.breadcrumbs.enabled %}*/
/*             <div id="top-bar">*/
/*                 {% if theme_config.github.position == 'top' %}*/
/*                 <div id="top-github-link">*/
/*                 {% include 'partials/github_link.html.twig' %}*/
/*                 </div>*/
/*                 {% endif %}*/
/* */
/*                 {% if config.plugins.breadcrumbs.enabled %}*/
/*                 {% include 'partials/breadcrumbs.html.twig' %}*/
/*                 {% endif %}*/
/*             </div>*/
/*             {% endif %}{% endblock %}*/
/* */
/*             {% block content %}{% endblock %}*/
/* */
/*             {% block footer %}*/
/*                 {% if theme_config.github.position == 'bottom' %}*/
/*                 {% include 'partials/github_note.html.twig' %}*/
/*                 {% endif %}*/
/*             {% endblock %}*/
/* */
/*         </div>*/
/*         {% block navigation %}{% endblock %}*/
/*     </section>*/
/*     {% endblock %}*/
/*     {% block analytics %}*/
/*         {% if theme_config.google_analytics_code %}*/
/*         {% include 'partials/analytics.html.twig' %}*/
/*         {% endif %}*/
/*     {% endblock %}*/
/*  </body>*/
/* </html>*/
/* */
