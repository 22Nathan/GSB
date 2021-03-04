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

/* visiteur/saisirMois.html.twig */
class __TwigTemplate_4ab17a970937cc82793efcba23d8997db18e9ab585747ea45e6e90eed0e659bb extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "visiteur/saisirMois.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "visiteur/saisirMois.html.twig", 1);
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
</style>

<div class=\"example-wrapper\">
   
<div>    
    <h1>Saisir la date</h1>
    
    <p style=\"color: greenyellow\"> Connecté : ";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["prenomV"]) || array_key_exists("prenomV", $context) ? $context["prenomV"] : (function () { throw new RuntimeError('Variable "prenomV" does not exist.', 16, $this->source); })()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["nomV"]) || array_key_exists("nomV", $context) ? $context["nomV"] : (function () { throw new RuntimeError('Variable "nomV" does not exist.', 16, $this->source); })()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["idVisiteur"]) || array_key_exists("idVisiteur", $context) ? $context["idVisiteur"] : (function () { throw new RuntimeError('Variable "idVisiteur" does not exist.', 16, $this->source); })()), "html", null, true);
        echo "  </p>
    
</div>    
    ";
        // line 19
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formulaire"]) || array_key_exists("formulaire", $context) ? $context["formulaire"] : (function () { throw new RuntimeError('Variable "formulaire" does not exist.', 19, $this->source); })()), 'form');
        echo "
    </br>
    <p style=\"color: red\">";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["mess"]) || array_key_exists("mess", $context) ? $context["mess"] : (function () { throw new RuntimeError('Variable "mess" does not exist.', 21, $this->source); })()), "html", null, true);
        echo "</p>
    </br>
    ";
        // line 23
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formulaire2"]) || array_key_exists("formulaire2", $context) ? $context["formulaire2"] : (function () { throw new RuntimeError('Variable "formulaire2" does not exist.', 23, $this->source); })()), 'form');
        echo "
    </br>
    <a id=\"btn_delete\" href=\"";
        // line 25
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("visiteur/menu");
        echo "\">Retour au menu</a>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "visiteur/saisirMois.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 25,  105 => 23,  100 => 21,  95 => 19,  85 => 16,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello VisiteurController!{% endblock %}

{% block body %}
<style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
</style>

<div class=\"example-wrapper\">
   
<div>    
    <h1>Saisir la date</h1>
    
    <p style=\"color: greenyellow\"> Connecté : {{ prenomV }} {{ nomV }} {{ idVisiteur }}  </p>
    
</div>    
    {{ form(formulaire) }}
    </br>
    <p style=\"color: red\">{{ mess }}</p>
    </br>
    {{ form(formulaire2) }}
    </br>
    <a id=\"btn_delete\" href=\"{{ path( 'visiteur/menu' ) }}\">Retour au menu</a>
</div>
{% endblock %}
", "visiteur/saisirMois.html.twig", "/var/www/html/GSB/templates/visiteur/saisirMois.html.twig");
    }
}
