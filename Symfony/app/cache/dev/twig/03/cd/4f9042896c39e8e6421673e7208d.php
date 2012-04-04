<?php

/* ProjetCoursBundle:Default:index.html.twig */
class __TwigTemplate_03cd4f9042896c39e8e6421673e7208d extends Twig_Template
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
        return "ProjetCoursBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
