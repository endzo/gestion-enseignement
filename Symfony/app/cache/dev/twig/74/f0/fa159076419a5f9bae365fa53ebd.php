<?php

/* AmineForumBundle:Subject:show.html.twig */
class __TwigTemplate_74f0fa159076419a5f9bae365fa53ebd extends Twig_Template
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
        echo "\t<b> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "title"), "html", null, true);
        echo " </b> est cr&eacute;&eacute; par : <b> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "login"), "html", null, true);
        echo " </b>

\t<table class=\"record_properties\">
\t\t<tbody>
\t\t\t<tr>
\t\t\t\t<th>Id</th>
\t\t\t\t<td> ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo " </td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<th>Title</th>
\t\t\t\t<td> ";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "title"), "html", null, true);
        echo " </td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<th>Created_at</th>
\t\t\t\t<td> ";
        // line 22
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "createdat"), "Y-m-d H:i:s"), "html", null, true);
        echo " </td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<th>Visibility</th>
\t\t\t\t<td> ";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "visibility"), "html", null, true);
        echo " </td>
\t\t\t</tr>
\t\t</tbody>
\t</table>
\t
\t<table>
\t\t";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "comments"));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 33
            echo "\t\t\t<tr><td>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "comment"), "comm"), "html", null, true);
            echo "</td></tr>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 35
        echo "\t</table>
\t

\t<ul class=\"record_actions\">
\t\t<li>
\t\t\t<a href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("subject"), "html", null, true);
        echo "\">
\t\t\t\tBack to the list
\t\t\t</a>
\t\t</li>
\t\t<li>
\t\t\t<a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("subject_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">
\t\t\t\tEdit
\t\t\t</a>
\t\t</li>
\t\t<li>
\t\t\t<form action=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("subject_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\">
\t\t\t\t";
        // line 51
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "delete_form"));
        echo "
\t\t\t\t<button type=\"submit\">Delete</button>
\t\t\t</form>
\t\t</li>
\t</ul>
";
    }

    public function getTemplateName()
    {
        return "AmineForumBundle:Subject:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
