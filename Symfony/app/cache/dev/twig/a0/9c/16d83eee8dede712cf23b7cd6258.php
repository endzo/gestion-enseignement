<?php

/* ProjetForumBundle::layout.html.twig */
class __TwigTemplate_a09c16d83eee8dede712cf23b7cd6258 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'Forum_body' => array($this, 'block_Forum_body'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "\tForum - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 22
    public function block_Forum_body($context, array $blocks = array())
    {
        // line 23
        echo "\t";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "
\t";
        // line 10
        echo "\t<h1>Forum</h1>

\t<hr>

\t";
        // line 15
        echo "\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "getFlashes", array(), "method"));
        foreach ($context['_seq'] as $context["key"] => $context["flash"]) {
            // line 16
            echo "\t\t<div class=\"alert alert-";
            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
            echo "\">
\t\t\t";
            // line 17
            echo twig_escape_filter($this->env, $this->getContext($context, "flash"), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['flash'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 20
        echo "
\t";
        // line 22
        echo "\t";
        $this->displayBlock('Forum_body', $context, $blocks);
        // line 24
        echo "
";
    }

    public function getTemplateName()
    {
        return "ProjetForumBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}