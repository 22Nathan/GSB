<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* visiteur/menu.html.twig */
class __TwigTemplate_fff8744b5102305bb305a06da6b6f162666b2305edaca587daec3da77e65e853 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "visiteur/menu.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "visiteur/menu.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Hello VisiteurController!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }

    a:link, a:visited {
    background-color: #f44336;
    color: white;
    padding: 12px 21px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    }

    a:hover, a:active {
    background-color: red;
    }

</style>

<div class=\"example-wrapper\">
    
    <h1>Menu</h1>
    
    <p style=
    \"
    border-left: 6px solid yellowgreen;
    background-color: #e6ffe6;
    text-indent: 1.5%;
    text-max-width: 40%;
    color: yellowgreen;
    \"
    > Connecté : ";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["prenomV"]) || array_key_exists("prenomV", $context) ? $context["prenomV"] : (function () { throw new RuntimeError('Variable "prenomV" does not exist.', 37, $this->source); })()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["nomV"]) || array_key_exists("nomV", $context) ? $context["nomV"] : (function () { throw new RuntimeError('Variable "nomV" does not exist.', 37, $this->source); })()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["idVisiteur"]) || array_key_exists("idVisiteur", $context) ? $context["idVisiteur"] : (function () { throw new RuntimeError('Variable "idVisiteur" does not exist.', 37, $this->source); })()), "html", null, true);
        echo "  </p>

    ";
        // line 39
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formulaire"]) || array_key_exists("formulaire", $context) ? $context["formulaire"] : (function () { throw new RuntimeError('Variable "formulaire" does not exist.', 39, $this->source); })()), 'form');
        echo "
    <br/>
    
    <span><a href=\"";
        // line 42
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("visiteur/saisirMois");
        echo "\" class=\"btn\">Consulter</a></span>

    <span><a href=\"";
        // line 44
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("visiteur/renseigner");
        echo "\" class=\"btn\">Renseigner</a></span>
    
    </br><br/>
    
    
    
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "visiteur/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 44,  121 => 42,  115 => 39,  106 => 37,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello VisiteurController!{% endblock %}

{% block body %}
<style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }

    a:link, a:visited {
    background-color: #f44336;
    color: white;
    padding: 12px 21px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    }

    a:hover, a:active {
    background-color: red;
    }

</style>

<div class=\"example-wrapper\">
    
    <h1>Menu</h1>
    
    <p style=
    \"
    border-left: 6px solid yellowgreen;
    background-color: #e6ffe6;
    text-indent: 1.5%;
    text-max-width: 40%;
    color: yellowgreen;
    \"
    > Connecté : {{ prenomV }} {{ nomV }} {{ idVisiteur }}  </p>

    {{ form(formulaire) }}
    <br/>
    
    <span><a href=\"{{ path( 'visiteur/saisirMois' ) }}\" class=\"btn\">Consulter</a></span>

    <span><a href=\"{{ path( 'visiteur/renseigner' ) }}\" class=\"btn\">Renseigner</a></span>
    
    </br><br/>
    
    
    
</div>
{% endblock %}
", "visiteur/menu.html.twig", "/var/www/html/GSB/templates/visiteur/menu.html.twig");
    }
}
