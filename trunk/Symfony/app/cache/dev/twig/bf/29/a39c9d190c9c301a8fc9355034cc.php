<?php

/* ProjetTestBundle:Default:index.html.twig */
class __TwigTemplate_bf29a39c9d190c9c301a8fc9355034cc extends Twig_Template
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
        return "ProjetTestBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
