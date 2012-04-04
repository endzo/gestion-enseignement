<?php

/* ProjetForumBundle:Default:index.html.twig */
class __TwigTemplate_b9d8aa9a577380de9772a094657395be extends Twig_Template
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
        return "ProjetForumBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
