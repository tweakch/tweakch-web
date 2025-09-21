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

/* pages/portfolio-index.html.twig */
class __TwigTemplate_bf631b46e5fc68a8a7111f25c949ecb2 extends Template
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
            'content' => [$this, 'block_content'],
            'page_styles' => [$this, 'block_page_styles'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "layouts/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("layouts/base.html.twig", 1);
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
        yield "  <meta name=\"description\" content=\"Portfolio projects showcase\" />
";
        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 8
        yield "<section id=\"main\">
  <div class=\"container\">
    <header class=\"major\"><h2>Portfolio</h2><p>Selected projects & work</p></header>
    <div class=\"row\">
      ";
        // line 12
        if ((($tmp = ($context["projects"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 13
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["projects"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
                // line 14
                yield "          <div class=\"col-4 col-12-small\" style=\"margin-bottom:1.5rem;\">
            <section class=\"box\">
              <a href=\"portfolio.php?project=";
                // line 16
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "slug", [], "any", false, false, false, 16), "html", null, true);
                yield "\" class=\"image featured\"><img src=\"images/pic0";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 16) % 10) + 1), "html", null, true);
                yield ".jpg\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "title", [], "any", false, false, false, 16), "html", null, true);
                yield "\"></a>
              <header><h3><a href=\"portfolio.php?project=";
                // line 17
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "slug", [], "any", false, false, false, 17), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "title", [], "any", false, false, false, 17), "html", null, true);
                yield "</a></h3></header>
              ";
                // line 18
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["project"], "client", [], "any", false, false, false, 18) || CoreExtension::getAttribute($this->env, $this->source, $context["project"], "role", [], "any", false, false, false, 18))) {
                    // line 19
                    yield "                <p class=\"project-meta\">
                  ";
                    // line 20
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["project"], "client", [], "any", false, false, false, 20)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "<strong>";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "client", [], "any", false, false, false, 20), "html", null, true);
                        yield "</strong>";
                    }
                    // line 21
                    yield "                  ";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["project"], "role", [], "any", false, false, false, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield " <span class=\"sep\">•</span> ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "role", [], "any", false, false, false, 21), "html", null, true);
                    }
                    // line 22
                    yield "                </p>
              ";
                }
                // line 24
                yield "              <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["project"], "description", [], "any", false, false, false, 24), 0, 160), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["project"], "description", [], "any", false, false, false, 24)) > 160)) {
                    yield "...";
                }
                yield "</p>
              ";
                // line 25
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["project"], "tech", [], "any", false, false, false, 25)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 26
                    yield "                <div class=\"tech-chips\">
                  ";
                    // line 27
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["project"], "tech", [], "any", false, false, false, 27), 0, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                        yield "<span class=\"tech-chip\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["t"], "html", null, true);
                        yield "</span>";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['t'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 28
                    yield "                  ";
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["project"], "tech", [], "any", false, false, false, 28)) > 5)) {
                        yield "<span class=\"tech-chip more\">+";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["project"], "tech", [], "any", false, false, false, 28)) - 5), "html", null, true);
                        yield "</span>";
                    }
                    // line 29
                    yield "                </div>
              ";
                }
                // line 31
                yield "              <footer><ul class=\"actions\"><li><a href=\"portfolio.php?project=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "slug", [], "any", false, false, false, 31), "html", null, true);
                yield "\" class=\"button alt\">View</a></li></ul></footer>
            </section>
          </div>
        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            yield "      ";
        } else {
            // line 36
            yield "        <div class=\"col-12\"><p>No projects available yet.</p></div>
      ";
        }
        // line 38
        yield "    </div>
  </div>
</section>
";
        yield from [];
    }

    // line 43
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_styles(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 44
        yield "<style>
.project-meta{color:#666;font-size:.8rem;margin:.25rem 0 .75rem}
.tech-chips{margin:.5rem 0 .75rem;display:flex;flex-wrap:wrap;gap:.4rem}
.tech-chip{background:#f0f2f5;padding:.25rem .55rem;border-radius:2px;font-size:.65rem;line-height:1;font-weight:500;color:#333}
.tech-chip.more{background:#e2e8f0;color:#555}
@media (max-width:736px){.col-4{width:100%!important}}
</style>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/portfolio-index.html.twig";
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
        return array (  214 => 44,  207 => 43,  199 => 38,  195 => 36,  192 => 35,  173 => 31,  169 => 29,  162 => 28,  151 => 27,  148 => 26,  146 => 25,  138 => 24,  134 => 22,  128 => 21,  122 => 20,  119 => 19,  117 => 18,  111 => 17,  103 => 16,  99 => 14,  81 => 13,  79 => 12,  73 => 8,  66 => 7,  60 => 4,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/base.html.twig' %}

{% block page_meta %}
  <meta name=\"description\" content=\"Portfolio projects showcase\" />
{% endblock %}

{% block content %}
<section id=\"main\">
  <div class=\"container\">
    <header class=\"major\"><h2>Portfolio</h2><p>Selected projects & work</p></header>
    <div class=\"row\">
      {% if projects %}
        {% for project in projects %}
          <div class=\"col-4 col-12-small\" style=\"margin-bottom:1.5rem;\">
            <section class=\"box\">
              <a href=\"portfolio.php?project={{ project.slug }}\" class=\"image featured\"><img src=\"images/pic0{{ loop.index % 10 + 1 }}.jpg\" alt=\"{{ project.title }}\"></a>
              <header><h3><a href=\"portfolio.php?project={{ project.slug }}\">{{ project.title }}</a></h3></header>
              {% if project.client or project.role %}
                <p class=\"project-meta\">
                  {% if project.client %}<strong>{{ project.client }}</strong>{% endif %}
                  {% if project.role %} <span class=\"sep\">•</span> {{ project.role }}{% endif %}
                </p>
              {% endif %}
              <p>{{ project.description|slice(0,160) }}{% if project.description|length > 160 %}...{% endif %}</p>
              {% if project.tech %}
                <div class=\"tech-chips\">
                  {% for t in project.tech|slice(0,5) %}<span class=\"tech-chip\">{{ t }}</span>{% endfor %}
                  {% if project.tech|length > 5 %}<span class=\"tech-chip more\">+{{ project.tech|length - 5 }}</span>{% endif %}
                </div>
              {% endif %}
              <footer><ul class=\"actions\"><li><a href=\"portfolio.php?project={{ project.slug }}\" class=\"button alt\">View</a></li></ul></footer>
            </section>
          </div>
        {% endfor %}
      {% else %}
        <div class=\"col-12\"><p>No projects available yet.</p></div>
      {% endif %}
    </div>
  </div>
</section>
{% endblock %}

{% block page_styles %}
<style>
.project-meta{color:#666;font-size:.8rem;margin:.25rem 0 .75rem}
.tech-chips{margin:.5rem 0 .75rem;display:flex;flex-wrap:wrap;gap:.4rem}
.tech-chip{background:#f0f2f5;padding:.25rem .55rem;border-radius:2px;font-size:.65rem;line-height:1;font-weight:500;color:#333}
.tech-chip.more{background:#e2e8f0;color:#555}
@media (max-width:736px){.col-4{width:100%!important}}
</style>
{% endblock %}
", "pages/portfolio-index.html.twig", "/var/www/html/templates/pages/portfolio-index.html.twig");
    }
}
