<?php

/* AmineForumBundle:Default:index.html.twig */
class __TwigTemplate_4b58220589a02c2a03647146ccfe171c extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Hello ";
        echo twig_escape_filter($this->env, $this->getContext($context, "name"), "html", null, true);
        echo "!
";
    }

    public function getTemplateName()
    {
        return "AmineForumBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
