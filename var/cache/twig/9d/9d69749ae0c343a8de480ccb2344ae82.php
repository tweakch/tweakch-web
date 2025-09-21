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

/* pages/portfolio-project.html.twig */
class __TwigTemplate_501b3e34b2932db947c6b0466d0178e8 extends Template
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

        $this->blocks = [
            'page_meta' => [$this, 'block_page_meta'],
            'page_styles' => [$this, 'block_page_styles'],
            'main_content' => [$this, 'block_main_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "layouts/flexible.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("layouts/flexible.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_meta(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "  ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "description", [], "any", false, false, false, 4)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<meta name=\"description\" content=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "description", [], "any", false, false, false, 4), "html", null, true);
            yield "\" />";
        }
        // line 5
        yield "  ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["seo"] ?? null), "keywords", [], "any", false, false, false, 5)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<meta name=\"keywords\" content=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["seo"] ?? null), "keywords", [], "any", false, false, false, 5), "html", null, true);
            yield "\" />";
        }
        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_styles(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 9
        yield "<style>
.details-inline{padding:1rem 1.25rem}
.details-list{list-style:none;margin:0 0 .75rem;padding:0;font-size:.85rem}
.details-list li{margin:.35rem 0}
.tech-list{display:inline-flex;flex-wrap:wrap;gap:.35rem;margin-left:.25rem}
.tech-item{background:#e2e8f0;color:#2d3748;padding:.3rem .55rem;border-radius:3px;font-size:.6rem;font-weight:500;line-height:1}
.details-tags{margin-top:.75rem;display:flex;flex-wrap:wrap;gap:.4rem}
.details-tags .tag-item{background:#edf2f7;color:#2d3748;padding:.3rem .5rem;border-radius:3px;font-size:.55rem;font-weight:500;line-height:1}
article.portfolio-content h1,article.portfolio-content h2{line-height:1.3}
@media (max-width:736px){.details-inline{padding:1rem}}
</style>
";
        yield from [];
    }

    // line 22
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 23
        yield "<article class=\"box post portfolio-content\">
  <header>
    <h2>";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "title", [], "any", false, false, false, 25), "html", null, true);
        yield "</h2>
    ";
        // line 26
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "client", [], "any", false, false, false, 26) || CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "role", [], "any", false, false, false, 26))) {
            yield "<p>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "client", [], "any", false, false, false, 26), "html", null, true);
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "client", [], "any", false, false, false, 26) && CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "role", [], "any", false, false, false, 26))) {
                yield " • ";
            }
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "role", [], "any", false, false, false, 26), "html", null, true);
            yield "</p>";
        }
        // line 27
        yield "  </header>

  ";
        // line 30
        yield "  ";
        if ((($context["details_variant"] ?? null) == "inline")) {
            // line 31
            yield "    ";
            yield from $this->load("components/portfolio/_details.html.twig", 31)->unwrap()->yield(CoreExtension::merge($context, ["placement" => "inline"]));
            // line 32
            yield "  ";
        }
        // line 33
        yield "
  <div class=\"project-content\">";
        // line 34
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["project"] ?? null), "content", [], "any", false, false, false, 34);
        yield "</div>

  <div style=\"margin-top:2rem;padding-top:1.5rem;border-top:1px solid #e2e8f0;\">
    <div class=\"row\">
      <div class=\"col-6 col-12-small\"><a href=\"portfolio.php\" class=\"button\">&larr; Back to Portfolio</a></div>
      <div class=\"col-6 col-12-small\"><a href=\"#top\" class=\"button alt\">Top &uarr;</a></div>
    </div>
  </div>
</article>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/portfolio-project.html.twig";
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
        return array (  141 => 34,  138 => 33,  135 => 32,  132 => 31,  129 => 30,  125 => 27,  115 => 26,  111 => 25,  107 => 23,  100 => 22,  84 => 9,  77 => 8,  67 => 5,  60 => 4,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/flexible.html.twig' %}

{% block page_meta %}
  {% if project.description %}<meta name=\"description\" content=\"{{ project.description }}\" />{% endif %}
  {% if seo.keywords %}<meta name=\"keywords\" content=\"{{ seo.keywords }}\" />{% endif %}
{% endblock %}

{% block page_styles %}
<style>
.details-inline{padding:1rem 1.25rem}
.details-list{list-style:none;margin:0 0 .75rem;padding:0;font-size:.85rem}
.details-list li{margin:.35rem 0}
.tech-list{display:inline-flex;flex-wrap:wrap;gap:.35rem;margin-left:.25rem}
.tech-item{background:#e2e8f0;color:#2d3748;padding:.3rem .55rem;border-radius:3px;font-size:.6rem;font-weight:500;line-height:1}
.details-tags{margin-top:.75rem;display:flex;flex-wrap:wrap;gap:.4rem}
.details-tags .tag-item{background:#edf2f7;color:#2d3748;padding:.3rem .5rem;border-radius:3px;font-size:.55rem;font-weight:500;line-height:1}
article.portfolio-content h1,article.portfolio-content h2{line-height:1.3}
@media (max-width:736px){.details-inline{padding:1rem}}
</style>
{% endblock %}

{% block main_content %}
<article class=\"box post portfolio-content\">
  <header>
    <h2>{{ project.title }}</h2>
    {% if project.client or project.role %}<p>{{ project.client }}{% if project.client and project.role %} • {% endif %}{{ project.role }}</p>{% endif %}
  </header>

  {# Inline details if variant demands #}
  {% if details_variant == 'inline' %}
    {% include 'components/portfolio/_details.html.twig' with { placement: 'inline' } %}
  {% endif %}

  <div class=\"project-content\">{{ project.content|raw }}</div>

  <div style=\"margin-top:2rem;padding-top:1.5rem;border-top:1px solid #e2e8f0;\">
    <div class=\"row\">
      <div class=\"col-6 col-12-small\"><a href=\"portfolio.php\" class=\"button\">&larr; Back to Portfolio</a></div>
      <div class=\"col-6 col-12-small\"><a href=\"#top\" class=\"button alt\">Top &uarr;</a></div>
    </div>
  </div>
</article>
{% endblock %}
", "pages/portfolio-project.html.twig", "/var/www/html/templates/pages/portfolio-project.html.twig");
    }
}
