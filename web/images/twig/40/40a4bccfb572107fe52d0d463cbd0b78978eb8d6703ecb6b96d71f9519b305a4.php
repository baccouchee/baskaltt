<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* event/details.html.twig */
class __TwigTemplate_03c5c6b293049433a781db1b0fab2217347d2e58d51b08792da40d6fa2729cd0 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "baseFront.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "event/details.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "event/details.html.twig"));

        $this->parent = $this->loadTemplate("baseFront.html.twig", "event/details.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "    <div class=\"ps-post--detail\" xmlns=\"http://www.w3.org/1999/html\">
        <div class=\"ps-post__thumbnail\"><img src=\"images/blog/11.png\" alt=\"\"></div>
        <div class=\"ps-post__header\">
            <h3 class=\"ps-post__title\">";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute(($context["event"] ?? $this->getContext($context, "event")), "nom", []), "html", null, true);
        echo "</h3>
            <p class=\"ps-post__meta\">Du <a>";
        // line 8
        if ($this->getAttribute(($context["event"] ?? $this->getContext($context, "event")), "dateDeb", [])) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["event"] ?? $this->getContext($context, "event")), "dateDeb", []), "d-m-Y"), "html", null, true);
        }
        echo "</a> au <a>";
        if ($this->getAttribute(($context["event"] ?? $this->getContext($context, "event")), "dateFin", [])) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["event"] ?? $this->getContext($context, "event")), "dateFin", []), "d-m-Y"), "html", null, true);
        }
        echo "</a></p>
            <div class=\"ps-post__thumbnail\"><a class=\"ps-post__overlay\" href=\"#\"></a><img src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl(("images/" . $this->getAttribute(($context["event"] ?? $this->getContext($context, "event")), "photo", []))), "html", null, true);
        echo "\"></div>
        </div>
        <div class=\"ps-post__content\">
            <blockquote>
                <p>";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute(($context["event"] ?? $this->getContext($context, "event")), "description", []), "html", null, true);
        echo "</p>
            </blockquote>
        </div>
        </br>
        <div class=\"ps-product__shopping\"><a class=\"ps-btn mb-10\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("event_res", ["id" => $this->getAttribute(($context["event"] ?? $this->getContext($context, "event")), "id", [])]), "html", null, true);
        echo "\">s'inscrire<i class=\"ps-icon-next\"></i></a>
        </div>
    </br>

        <div class=\"ps-post__footer\">
            <p class=\"ps-post__tags\"><i class=\"fa fa-tags\"></i><a href=\"";
        // line 22
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("event_liste");
        echo "\">Evénement</a></p>
            <div class=\"ps-post__actions\"><span><i class=\"fa fa-comments\"></i> 23 Comments</span><span><i class=\"fa fa-heart\"></i>  likes</span>
                <div class=\"ps-post__social\"><a>";
        // line 24
        echo $this->env->getExtension('Nomaya\SocialBundle\Twig\Extension\NomayaTwigSocialBar')->getFacebookLikeButton(["facebook" => ["locale" => "fr_FR", "send" => true]]);
        echo "</a>
                </div>
            </div>
        </div>

        <meteo-widget class=\"ps-post__meta\"lang=\"fr\" city=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute(($context["event"] ?? $this->getContext($context, "event")), "emplacement", []), "html", null, true);
        echo "\"></meteo-widget>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "event/details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 29,  106 => 24,  101 => 22,  93 => 17,  86 => 13,  79 => 9,  69 => 8,  65 => 7,  60 => 4,  51 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'baseFront.html.twig' %}

{% block content %}
    <div class=\"ps-post--detail\" xmlns=\"http://www.w3.org/1999/html\">
        <div class=\"ps-post__thumbnail\"><img src=\"images/blog/11.png\" alt=\"\"></div>
        <div class=\"ps-post__header\">
            <h3 class=\"ps-post__title\">{{ event.nom }}</h3>
            <p class=\"ps-post__meta\">Du <a>{% if event.dateDeb %}{{ event.dateDeb|date('d-m-Y') }}{% endif %}</a> au <a>{% if event.dateFin %}{{ event.dateFin|date('d-m-Y') }}{% endif %}</a></p>
            <div class=\"ps-post__thumbnail\"><a class=\"ps-post__overlay\" href=\"#\"></a><img src=\"{{ asset('images/' ~ event.photo) }}\"></div>
        </div>
        <div class=\"ps-post__content\">
            <blockquote>
                <p>{{ event.description }}</p>
            </blockquote>
        </div>
        </br>
        <div class=\"ps-product__shopping\"><a class=\"ps-btn mb-10\" href=\"{{ path('event_res', { 'id': event.id }) }}\">s'inscrire<i class=\"ps-icon-next\"></i></a>
        </div>
    </br>

        <div class=\"ps-post__footer\">
            <p class=\"ps-post__tags\"><i class=\"fa fa-tags\"></i><a href=\"{{ path('event_liste')}}\">Evénement</a></p>
            <div class=\"ps-post__actions\"><span><i class=\"fa fa-comments\"></i> 23 Comments</span><span><i class=\"fa fa-heart\"></i>  likes</span>
                <div class=\"ps-post__social\"><a>{{ facebookButton({ 'facebook': {'locale':'fr_FR', 'send':true}} ) }}</a>
                </div>
            </div>
        </div>

        <meteo-widget class=\"ps-post__meta\"lang=\"fr\" city=\"{{ event.emplacement }}\"></meteo-widget>
    </div>

{% endblock %}", "event/details.html.twig", "C:\\wamp64\\www\\baskeltt\\app\\Resources\\views\\event\\details.html.twig");
    }
}
