<?php

/* AmineForumBundle:Subject:new.html.twig */
class __TwigTemplate_370799d4334e4f8b9a812699d8093ca8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'Forum_body' => array($this, 'block_Forum_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AmineForumBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "\tAccueil - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_Forum_body($context, array $blocks = array())
    {
        // line 8
        echo "\t<h1>Cr&eacute;ation d'un nouveau Sujet</h1>

\t<form action=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("subject_create"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo ">
\t\t";
        // line 11
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
\t\t<p>
\t\t\t<button type=\"submit\">Create</button>
\t\t</p>
\t</form>

\t<ul class=\"record_actions\">
\t\t<li>
\t\t\t<a href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("subject"), "html", null, true);
        echo "\">
\t\t\t\tBack to the list
\t\t\t</a>
\t\t</li>
\t</ul>
";
    }

    public function getTemplateName()
    {
        return "AmineForumBundle:Subject:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
