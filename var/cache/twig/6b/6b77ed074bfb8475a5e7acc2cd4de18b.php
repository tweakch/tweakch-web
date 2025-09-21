<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* components/portfolio/_details.html.twig */
class __TwigTemplate_0c71fa29b223a2bd494741446fdf4fe2 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        $context["project"] = ((array_key_exists("project", $context)) ? (Twig\Extension\CoreExtension::default(($context["project"] ?? null), [])) : ([]));
        // line 2
        $context["hasTech"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "tech", [], "any", true, true, false, 2) && is_iterable(CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "tech", [], "any", false, false, false, 2))) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "tech", [], "any", false, false, false, 2)) > 0));
        // line 3
        $context["hasTags"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "tags", [], "any", true, true, false, 3) && is_iterable(CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "tags", [], "any", false, false, false, 3))) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "tags", [], "any", false, false, false, 3)) > 0));
        // line 4
        yield "<section class=\"box ";
        yield (((($context["placement"] ?? null) == "inline")) ? ("details-inline") : ("details-sidebar"));
        yield "\">
  <header><h3>Project Details</h3></header>
  <ul class=\"details-list\">
    ";
        // line 7
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "client", [], "any", false, false, false, 7)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<li><strong>Client:</strong> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "client", [], "any", false, false, false, 7), "html", null, true);
            yield "</li>";
        }
        // line 8
        yield "    ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "role", [], "any", false, false, false, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<li><strong>Role:</strong> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "role", [], "any", false, false, false, 8), "html", null, true);
            yield "</li>";
        }
        // line 9
        yield "    ";
        if ((($tmp = ($context["hasTech"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<li><strong>Tech:</strong>
      <span class=\"tech-list\">
        ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "tech", [], "any", false, false, false, 11));
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                yield "<span class=\"tech-item\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["t"], "html", null, true);
                yield "</span>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['t'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            yield "      </span>
    </li>";
        }
        // line 14
        yield "  </ul>
  ";
        // line 15
        if ((($tmp = ($context["hasTags"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 16
            yield "    <div class=\"details-tags\">
      ";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "tags", [], "any", false, false, false, 17));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                yield "<span class=\"tag-item\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["tag"], "html", null, true);
                yield "</span>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            yield "    </div>
  ";
        }
        // line 20
        yield "</section>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/portfolio/_details.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  112 => 20,  108 => 18,  97 => 17,  94 => 16,  92 => 15,  89 => 14,  85 => 12,  74 => 11,  68 => 9,  61 => 8,  55 => 7,  48 => 4,  46 => 3,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% set project = project|default({}) %}
{% set hasTech = project.tech is defined and project.tech is iterable and project.tech|length > 0 %}
{% set hasTags = project.tags is defined and project.tags is iterable and project.tags|length > 0 %}
<section class=\"box {{ placement == 'inline' ? 'details-inline' : 'details-sidebar' }}\">
  <header><h3>Project Details</h3></header>
  <ul class=\"details-list\">
    {% if project.client %}<li><strong>Client:</strong> {{ project.client }}</li>{% endif %}
    {% if project.role %}<li><strong>Role:</strong> {{ project.role }}</li>{% endif %}
    {% if hasTech %}<li><strong>Tech:</strong>
      <span class=\"tech-list\">
        {% for t in project.tech %}<span class=\"tech-item\">{{ t }}</span>{% endfor %}
      </span>
    </li>{% endif %}
  </ul>
  {% if hasTags %}
    <div class=\"details-tags\">
      {% for tag in project.tags %}<span class=\"tag-item\">{{ tag }}</span>{% endfor %}
    </div>
  {% endif %}
</section>
", "components/portfolio/_details.html.twig", "/var/www/html/templates/components/portfolio/_details.html.twig");
    }
}
