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

/* pages/no-sidebar.html.twig */
class __TwigTemplate_782474496c5d31fbb0a2d071c50d651c extends Template
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
            'content' => [$this, 'block_content'],
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
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "<!-- Main -->
<section id=\"main\">
    <div class=\"container\">
        <article class=\"box post\">
            <a href=\"#\" class=\"image featured\"><img src=\"images/";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["main_content"] ?? null), "image", [], "any", false, false, false, 8), "html", null, true);
        yield "\" alt=\"\" /></a>
            <header>
                <h2>";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["main_content"] ?? null), "title", [], "any", false, false, false, 10), "html", null, true);
        yield "</h2>
                <p>";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["main_content"] ?? null), "subtitle", [], "any", false, false, false, 11), "html", null, true);
        yield "</p>
            </header>
            ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["main_content"] ?? null), "paragraphs", [], "any", false, false, false, 13));
        foreach ($context['_seq'] as $context["_key"] => $context["paragraph"]) {
            // line 14
            yield "                <p>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["paragraph"], "html", null, true);
            yield "</p>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['paragraph'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        yield "            
            ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["main_content"] ?? null), "sections", [], "any", false, false, false, 17));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 18
            yield "                <section>
                    <header><h3>";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["section"], "title", [], "any", false, false, false, 19), "html", null, true);
            yield "</h3></header>
                    ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["section"], "paragraphs", [], "any", false, false, false, 20));
            foreach ($context['_seq'] as $context["_key"] => $context["paragraph"]) {
                // line 21
                yield "                        <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["paragraph"], "html", null, true);
                yield "</p>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['paragraph'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            yield "                </section>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['section'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        yield "        </article>
    </div>
</section>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/no-sidebar.html.twig";
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
        return array (  125 => 25,  118 => 23,  109 => 21,  105 => 20,  101 => 19,  98 => 18,  94 => 17,  91 => 16,  82 => 14,  78 => 13,  73 => 11,  69 => 10,  64 => 8,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/base.html.twig' %}

{% block content %}
<!-- Main -->
<section id=\"main\">
    <div class=\"container\">
        <article class=\"box post\">
            <a href=\"#\" class=\"image featured\"><img src=\"images/{{ main_content.image }}\" alt=\"\" /></a>
            <header>
                <h2>{{ main_content.title }}</h2>
                <p>{{ main_content.subtitle }}</p>
            </header>
            {% for paragraph in main_content.paragraphs %}
                <p>{{ paragraph }}</p>
            {% endfor %}
            
            {% for section in main_content.sections %}
                <section>
                    <header><h3>{{ section.title }}</h3></header>
                    {% for paragraph in section.paragraphs %}
                        <p>{{ paragraph }}</p>
                    {% endfor %}
                </section>
            {% endfor %}
        </article>
    </div>
</section>
{% endblock %}", "pages/no-sidebar.html.twig", "/var/www/html/templates/pages/no-sidebar.html.twig");
    }
}
