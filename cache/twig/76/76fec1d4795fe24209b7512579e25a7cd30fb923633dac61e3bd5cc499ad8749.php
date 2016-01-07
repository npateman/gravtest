<?php

/* chapter.html.twig */
class __TwigTemplate_b85789b66d6fdddf6b6e1bccf5fb51cc216dad7984bc65ce68eedbd3d6e3c499 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("docs.html.twig", "chapter.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "docs.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "\t<div id=\"chapter\">
    \t<div id=\"body-inner\">
\t\t\t<p>
\t\t\t\t";
        // line 7
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array());
        echo "
\t\t\t</p>
\t\t</div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "chapter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'docs.html.twig' %}*/
/* */
/* {% block content %}*/
/* 	<div id="chapter">*/
/*     	<div id="body-inner">*/
/* 			<p>*/
/* 				{{ page.content }}*/
/* 			</p>*/
/* 		</div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
