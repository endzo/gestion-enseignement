<?php

/* ProjetCoursBundle:Enseignement:show.html.twig */
class __TwigTemplate_11691e6d36d415e85a55c4f3f3c8c5f0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'Enseignement_body' => array($this, 'block_Enseignement_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ProjetCoursBundle::layout.html.twig";
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
    public function block_Enseignement_body($context, array $blocks = array())
    {
        // line 8
        echo "\t";
        // line 9
        echo "\t
\t<div id=\"menu\" class=\"span3\">
\t
\t\t";
        // line 12
        $this->env->loadTemplate("ProjetCoursBundle:Enseignement:outils.html.twig")->display($context);
        // line 13
        echo "\t\t
\t</div>
\t
\t
\t<table class=\"record_properties\">
\t    <tbody>
\t        <tr>
\t            <th>Nom</th>
\t            <td>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nom"), "html", null, true);
        echo "</td>
\t        </tr>
\t        <tr>
\t            <th>Description</th>
\t            <td>";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "description"), "html", null, true);
        echo "</td>
\t        </tr>
\t        <tr>
\t            <th>Visibilite</th>
\t            <td>";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "visibilite"), "html", null, true);
        echo "</td>
\t        </tr>
\t        <tr>
\t            <th>Actif</th>
\t            <td>";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "actif"), "html", null, true);
        echo "</td>
\t        </tr>
\t        <tr>
\t            <th>Created_at</th>
\t            <td>";
        // line 37
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "createdat"), "Y-m-d H:i:s"), "html", null, true);
        echo "</td>
\t        </tr>
\t    </tbody>
\t</table>
\t
\t<table class=\"table\">
\t\t<tr><th>Documents</th></tr>
\t\t<tr>
\t  \t\t<td>
\t\t\t\t";
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "documents"));
        foreach ($context['_seq'] as $context["_key"] => $context["document"]) {
            // line 47
            echo "\t\t\t\t<br /><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("document_show", array("id" => $this->getAttribute($this->getContext($context, "document"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "document"), "getNom"), "html", null, true);
            echo "</a>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['document'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 49
        echo "\t\t\t</td>
\t\t</tr>
\t</table>
\t
\t<table class=\"table\">
\t  
\t  ";
        // line 56
        echo "\t  <tr>
\t  \t\t<th>TPs</th>
\t  \t\t<th>TDs</th>
\t  \t\t<th>Exercices</th>
\t  \t\t<th>Projet</th>
\t  \t\t<th>Autres</th>
\t  </tr>
\t  
\t  <tr>
\t  \t<td>
\t\t  \t";
        // line 66
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tps"));
        foreach ($context['_seq'] as $context["_key"] => $context["tp"]) {
            // line 67
            echo "\t\t  \t\t\t<br />
\t\t    \t\t<a href=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("devoir_show", array("id" => $this->getAttribute($this->getContext($context, "tp"), "id"))), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "tp"), "nom"), "html", null, true);
            echo " </a>
\t\t  \t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tp'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 70
        echo "\t  \t</td>
\t  \t
\t  \t<td>
\t  \t\t";
        // line 73
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tds"));
        foreach ($context['_seq'] as $context["_key"] => $context["td"]) {
            // line 74
            echo "\t  \t\t\t\t<br />
\t    \t\t\t<a href=\"";
            // line 75
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("devoir_show", array("id" => $this->getAttribute($this->getContext($context, "td"), "id"))), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "td"), "nom"), "html", null, true);
            echo " </a>
\t  \t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['td'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 77
        echo "\t  \t</td>

\t  \t<td>
\t\t  ";
        // line 80
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "exercices"));
        foreach ($context['_seq'] as $context["_key"] => $context["exercice"]) {
            // line 81
            echo "\t\t  \t\t<br />
\t\t    \t<a href=\"";
            // line 82
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("devoir_show", array("id" => $this->getAttribute($this->getContext($context, "exercice"), "id"))), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "exercice"), "nom"), "html", null, true);
            echo " </a>
\t\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['exercice'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 84
        echo "\t\t</td>

\t\t<td>
\t\t  ";
        // line 87
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "projets"));
        foreach ($context['_seq'] as $context["_key"] => $context["projet"]) {
            // line 88
            echo "\t\t  \t\t<br />
\t\t    \t<a href=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("devoir_show", array("id" => $this->getAttribute($this->getContext($context, "projet"), "id"))), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "projet"), "nom"), "html", null, true);
            echo " </a>
\t\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['projet'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 91
        echo "\t\t</td>

\t\t<td>
\t\t  ";
        // line 94
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "autres"));
        foreach ($context['_seq'] as $context["_key"] => $context["autre"]) {
            // line 95
            echo "\t\t  \t\t<br />
\t\t    \t<a href=\"";
            // line 96
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("devoir_show", array("id" => $this->getAttribute($this->getContext($context, "autre"), "id"))), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "autre"), "nom"), "html", null, true);
            echo " </a>
\t\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['autre'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 98
        echo "\t\t</td>
\t</tr>
\t  \t  
\t</table>

";
    }

    public function getTemplateName()
    {
        return "ProjetCoursBundle:Enseignement:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
