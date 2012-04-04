<?php

/* ::layout.html.twig */
class __TwigTemplate_280a82c53d1d12b0fd07b09e189c4feb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'user_toolBar' => array($this, 'block_user_toolBar'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
<!DOCTYPE html>
<html>
\t<head>
\t\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />

\t\t<title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

\t\t";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "\t</head>

\t<body>
\t
\t\t<div id=\"userToolBar\" class=\"navbar navbar-fixed-top\">
\t\t\t<div class=\"navbar-inner\">
\t\t\t\t<div class=\"container\">
\t\t\t\t\t";
        // line 20
        $this->displayBlock('user_toolBar', $context, $blocks);
        // line 23
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t\t
\t\t<div class=\"container\">
\t\t\t<div id=\"header\" class=\"hero-unit\">
\t\t\t\t<h1 class=\"header\">Site d'éducation</h1>
\t\t\t\t<h2 class=\"slogon\">depot de cours et échange d'information ....</h2> 
\t\t\t</div>

\t\t\t<div class=\"row\">
\t\t\t\t<div id=\"menu\" class=\"span3\">
\t\t\t\t
\t\t\t \t\t<h3>Menu</h3>
\t\t\t \t\t";
        // line 38
        $this->env->loadTemplate("::menu.html.twig")->display($context);
        // line 39
        echo "\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t\t<div id=\"content\" class=\"span9\">
\t\t\t\t\t";
        // line 43
        $this->displayBlock('body', $context, $blocks);
        // line 45
        echo "\t\t\t\t</div>
\t\t\t</div>

\t\t\t<hr>

\t\t\t<footer>
\t\t\t\t<p>The sky's the limit &copy; 2012 and beyond.</p>
\t\t\t</div>
\t\t</div>
\t</body>

\t";
        // line 56
        $this->displayBlock('javascripts', $context, $blocks);
        // line 60
        echo "
</html>";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "Enseignement";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "\t\t\t<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
\t\t";
    }

    // line 20
    public function block_user_toolBar($context, array $blocks = array())
    {
        // line 21
        echo "\t\t\t\t\t\t";
        $this->env->loadTemplate("::toolBar.html.twig")->display($context);
        // line 22
        echo "\t\t\t\t\t";
    }

    // line 43
    public function block_body($context, array $blocks = array())
    {
        // line 44
        echo "\t\t\t\t\t";
    }

    // line 56
    public function block_javascripts($context, array $blocks = array())
    {
        // line 57
        echo "\t\t";
        // line 58
        echo "\t\t<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
\t";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
