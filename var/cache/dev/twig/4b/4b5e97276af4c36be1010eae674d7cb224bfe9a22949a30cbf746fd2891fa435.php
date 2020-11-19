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
</style>

<div class=\"example-wrapper\">
    

    This friendly message is coming from:
    <ul>
        <li>Your controller at <code><a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->getFileLink("/var/www/html/GSB/src/Controller/VisiteurController.php", 0), "html", null, true);
        echo "\">src/Controller/VisiteurController.php</a></code></li>
        <li>Your template at <code><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\CodeExtension']->getFileLink("/var/www/html/GSB/templates/visiteur/index.html.twig", 0), "html", null, true);
        echo "\">templates/visiteur/index.html.twig</a></code></li>
    </ul>
    
    <p> Connecté : ";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["prenomV"]) || array_key_exists("prenomV", $context) ? $context["prenomV"] : (function () { throw new RuntimeError('Variable "prenomV" does not exist.', 20, $this->source); })()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["nomV"]) || array_key_exists("nomV", $context) ? $context["nomV"] : (function () { throw new RuntimeError('Variable "nomV" does not exist.', 20, $this->source); })()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["idVisiteur"]) || array_key_exists("idVisiteur", $context) ? $context["idVisiteur"] : (function () { throw new RuntimeError('Variable "idVisiteur" does not exist.', 20, $this->source); })()), "html", null, true);
        echo "  </p>
    
    <a href=\"";
        // line 22
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("visiteur/saisirMois");
        echo "\">Consulter</a>
    <br/>
    <a href=\"";
        // line 24
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("visiteur/renseigner");
        echo "\">Renseigner</a>
    
    </br>
    
    ";
        // line 28
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formulaire"]) || array_key_exists("formulaire", $context) ? $context["formulaire"] : (function () { throw new RuntimeError('Variable "formulaire" does not exist.', 28, $this->source); })()), 'form');
        echo "
    
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
        return array (  116 => 28,  109 => 24,  104 => 22,  95 => 20,  89 => 17,  85 => 16,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
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
    

    This friendly message is coming from:
    <ul>
        <li>Your controller at <code><a href=\"{{ '/var/www/html/GSB/src/Controller/VisiteurController.php'|file_link(0) }}\">src/Controller/VisiteurController.php</a></code></li>
        <li>Your template at <code><a href=\"{{ '/var/www/html/GSB/templates/visiteur/index.html.twig'|file_link(0) }}\">templates/visiteur/index.html.twig</a></code></li>
    </ul>
    
    <p> Connecté : {{ prenomV }} {{ nomV }} {{ idVisiteur }}  </p>
    
    <a href=\"{{ path( 'visiteur/saisirMois' ) }}\">Consulter</a>
    <br/>
    <a href=\"{{ path( 'visiteur/renseigner' ) }}\">Renseigner</a>
    
    </br>
    
    {{ form(formulaire) }}
    
</div>
{% endblock %}
", "visiteur/menu.html.twig", "/var/www/html/GSB/templates/visiteur/menu.html.twig");
    }
}
