<?php

/* AmineForumBundle::layout.html.twig */
class __TwigTemplate_5411ba63a0a3efec7ff4d6b66d4f9a5f extends Twig_Template
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

    // line 5
    public function block_title($context, array $blocks = array())
    {
        // line 6
        echo "\tForum - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 24
    public function block_Forum_body($context, array $blocks = array())
    {
        // line 25
        echo "\t";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "
\t";
        // line 12
        echo "\t<h1>Forum</h1>

\t<hr>

\t";
        // line 17
        echo "\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "getFlashes", array(), "method"));
        foreach ($context['_seq'] as $context["key"] => $context["flash"]) {
            // line 18
            echo "\t\t<div class=\"alert alert-";
            echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
            echo "\">
\t\t\t";
            // line 19
            echo twig_escape_filter($this->env, $this->getContext($context, "flash"), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['flash'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 22
        echo "
\t";
        // line 24
        echo "\t";
        $this->displayBlock('Forum_body', $context, $blocks);
        // line 26
        echo "
";
    }

    public function getTemplateName()
    {
        return "AmineForumBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
