<?php

/* ::menu.html.twig */
class __TwigTemplate_2835733fd7112802d73e28fa5c583a65 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
\t\t<ul class=\"nav nav-pills nav-stacked\">
\t\t\t";
        // line 5
        echo "\t\t\t<li><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enseignement"), "html", null, true);
        echo "\">Accueil des Cours </a></li>
\t\t\t<li><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enseignement_new"), "html", null, true);
        echo "\">Ajouter un Cours  </a></li>
\t\t</ul>

\t";
    }

    public function getTemplateName()
    {
        return "::menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
