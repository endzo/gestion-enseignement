<?php

/* ProjetCoursBundle:Enseignement:outils.html.twig */
class __TwigTemplate_af981f475877768d87e14412e14c26d0 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "


\t\t<ul class=\"nav nav-pills nav-stacked\">
\t\t\t<li><a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enseignement_addDocument", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">Ajouter un document</a></li>
\t\t\t<li><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enseignement_addDevoir", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">Ajouter un devoir  </a></li>
\t\t\t<li><a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enseignement_addSujet", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">Ajouter un sujet  </a></li>
    \t\t<li><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enseignement"), "html", null, true);
        echo "\">Back to the list</a></li>
    \t\t<li><a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enseignement_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">Edit</a></li>
    \t\t<li>
        \t\t<form action=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enseignement_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\">
            \t\t";
        // line 12
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "delete_form"));
        echo "
            \t\t<button type=\"submit\">Delete</button>
        \t\t</form>
    \t\t</li>
\t\t</ul>";
    }

    public function getTemplateName()
    {
        return "ProjetCoursBundle:Enseignement:outils.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
