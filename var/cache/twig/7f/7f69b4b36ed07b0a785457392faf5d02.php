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

/* pages/left-sidebar.html.twig */
class __TwigTemplate_488896b880397c86771d74c4a7980258 extends Template
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
        <div class=\"row\">
            <div class=\"col-4 col-12-medium\">
                <!-- Sidebar Content -->
                ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["sidebar_items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["sidebar_item"]) {
            // line 11
            yield "                <section class=\"box\">
                    ";
            // line 12
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["sidebar_item"], "image", [], "any", false, false, false, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 13
                yield "                        <a href=\"#\" class=\"image featured\"><img src=\"images/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sidebar_item"], "image", [], "any", false, false, false, 13), "html", null, true);
                yield "\" alt=\"\" /></a>
                    ";
            }
            // line 15
            yield "                    <header><h3>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sidebar_item"], "title", [], "any", false, false, false, 15), "html", null, true);
            yield "</h3></header>
                    <p>";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sidebar_item"], "description", [], "any", false, false, false, 16), "html", null, true);
            yield "</p>
                    ";
            // line 17
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["sidebar_item"], "links", [], "any", false, false, false, 17)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 18
                yield "                        <ul class=\"divided\">
                            ";
                // line 19
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["sidebar_item"], "links", [], "any", false, false, false, 19));
                foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                    // line 20
                    yield "                                <li><a href=\"#\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["link"], "html", null, true);
                    yield "</a></li>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['link'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 22
                yield "                        </ul>
                    ";
            }
            // line 24
            yield "                    <footer><a href=\"#\" class=\"button alt\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["sidebar_item"], "button_text", [], "any", false, false, false, 24), "html", null, true);
            yield "</a></footer>
                </section>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['sidebar_item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        yield "            </div>
            <div class=\"col-8 col-12-medium imp-medium\">
                <!-- Main Content -->
                <article class=\"box post\">
                    <a href=\"#\" class=\"image featured\"><img src=\"images/";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["main_content"] ?? null), "image", [], "any", false, false, false, 31), "html", null, true);
        yield "\" alt=\"\" /></a>
                    <header>
                        <h2>";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["main_content"] ?? null), "title", [], "any", false, false, false, 33), "html", null, true);
        yield "</h2>
                        <p>";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["main_content"] ?? null), "subtitle", [], "any", false, false, false, 34), "html", null, true);
        yield "</p>
                    </header>
                    ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["main_content"] ?? null), "paragraphs", [], "any", false, false, false, 36));
        foreach ($context['_seq'] as $context["_key"] => $context["paragraph"]) {
            // line 37
            yield "                        <p>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["paragraph"], "html", null, true);
            yield "</p>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['paragraph'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        yield "                    
                    ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["main_content"] ?? null), "sections", [], "any", false, false, false, 40));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 41
            yield "                        <section>
                            <header><h3>";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["section"], "title", [], "any", false, false, false, 42), "html", null, true);
            yield "</h3></header>
                            ";
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["section"], "paragraphs", [], "any", false, false, false, 43));
            foreach ($context['_seq'] as $context["_key"] => $context["paragraph"]) {
                // line 44
                yield "                                <p>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["paragraph"], "html", null, true);
                yield "</p>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['paragraph'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            yield "                        </section>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['section'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        yield "                </article>
            </div>
        </div>
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
        return "pages/left-sidebar.html.twig";
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
        return array (  189 => 48,  182 => 46,  173 => 44,  169 => 43,  165 => 42,  162 => 41,  158 => 40,  155 => 39,  146 => 37,  142 => 36,  137 => 34,  133 => 33,  128 => 31,  122 => 27,  112 => 24,  108 => 22,  99 => 20,  95 => 19,  92 => 18,  90 => 17,  86 => 16,  81 => 15,  75 => 13,  73 => 12,  70 => 11,  66 => 10,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/base.html.twig' %}

{% block content %}
<!-- Main -->
<section id=\"main\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-4 col-12-medium\">
                <!-- Sidebar Content -->
                {% for sidebar_item in sidebar_items %}
                <section class=\"box\">
                    {% if sidebar_item.image %}
                        <a href=\"#\" class=\"image featured\"><img src=\"images/{{ sidebar_item.image }}\" alt=\"\" /></a>
                    {% endif %}
                    <header><h3>{{ sidebar_item.title }}</h3></header>
                    <p>{{ sidebar_item.description }}</p>
                    {% if sidebar_item.links %}
                        <ul class=\"divided\">
                            {% for link in sidebar_item.links %}
                                <li><a href=\"#\">{{ link }}</a></li>
                            {% endfor %}
                        </ul>
                    {% endif %}
                    <footer><a href=\"#\" class=\"button alt\">{{ sidebar_item.button_text }}</a></footer>
                </section>
                {% endfor %}
            </div>
            <div class=\"col-8 col-12-medium imp-medium\">
                <!-- Main Content -->
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
        </div>
    </div>
</section>
{% endblock %}", "pages/left-sidebar.html.twig", "/var/www/html/templates/pages/left-sidebar.html.twig");
    }
}
