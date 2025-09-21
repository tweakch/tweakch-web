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

/* pages/homepage.html.twig */
class __TwigTemplate_23c849e4658efe2ed7c70d019b750ff3 extends Template
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
            'header_content' => [$this, 'block_header_content'],
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
    public function block_header_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "\t\t\t\t<!-- Banner -->
\t\t\t\t<section id=\"banner\">
\t\t\t\t\t<header>
\t\t\t\t\t\t<h2>";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["banner.title"], "method", false, false, false, 7), "html", null, true);
        yield "</h2>
\t\t\t\t\t\t<p>";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["banner.subtitle"], "method", false, false, false, 8), "html", null, true);
        yield "</p>
\t\t\t\t\t</header>
\t\t\t\t</section>

\t\t\t\t<!-- Intro -->
\t\t\t\t<section id=\"intro\" class=\"container\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["intro_sections"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 16
            yield "\t\t\t\t\t\t\t";
            $context["icon_class"] = "icon solid featured";
            // line 17
            yield "\t\t\t\t\t\t\t";
            $context["button_class"] = "button";
            // line 18
            yield "\t\t\t\t\t\t\t";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["section"], "class", [], "any", false, false, false, 18) == "middle")) {
                // line 19
                yield "\t\t\t\t\t\t\t\t";
                $context["icon_class"] = (($context["icon_class"] ?? null) . " alt");
                // line 20
                yield "\t\t\t\t\t\t\t\t";
                $context["button_class"] = (($context["button_class"] ?? null) . " alt");
                // line 21
                yield "\t\t\t\t\t\t\t";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["section"], "class", [], "any", false, false, false, 21) == "last")) {
                // line 22
                yield "\t\t\t\t\t\t\t\t";
                $context["icon_class"] = (($context["icon_class"] ?? null) . " alt2");
                // line 23
                yield "\t\t\t\t\t\t\t\t";
                $context["button_class"] = (($context["button_class"] ?? null) . " alt2");
                // line 24
                yield "\t\t\t\t\t\t\t";
            }
            // line 25
            yield "
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"col-4 col-12-medium\">
\t\t\t\t\t\t\t\t<section class=\"";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["section"], "class", [], "any", false, false, false, 28), "html", null, true);
            yield "\">
\t\t\t\t\t\t\t\t\t<i class=\"";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["icon_class"] ?? null), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["section"], "icon", [], "any", false, false, false, 29), "html", null, true);
            yield "\"></i>
\t\t\t\t\t\t\t\t\t<header><h2>";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["section"], "title", [], "any", false, false, false, 30), "html", null, true);
            yield "</h2></header>
\t\t\t\t\t\t\t\t\t<p>";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["section"], "desc", [], "any", false, false, false, 31), "html", null, true);
            yield "</p>
\t\t\t\t\t\t\t\t</section>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['section'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        yield "\t\t\t\t\t</div>
\t\t\t\t\t<!--
\t\t\t\t\t<footer>
\t\t\t\t\t\t<ul class=\"actions\">
\t\t\t\t\t\t\t<li><a href=\"#\" class=\"button large\">";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["sections.intro.get_started"], "method", false, false, false, 39), "html", null, true);
        yield "</a></li>
\t\t\t\t\t\t\t<li><a href=\"#\" class=\"button alt large\">";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["sections.intro.learn_more"], "method", false, false, false, 40), "html", null, true);
        yield "</a></li>
\t\t\t\t\t\t\t<li><a href=\"#\" class=\"button alt2 large\">";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["sections.intro.contact_me"], "method", false, false, false, 41), "html", null, true);
        yield "</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</footer>
\t\t\t\t\t-->
\t\t\t\t</section>
";
        yield from [];
    }

    // line 48
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 49
        yield "<!-- Main -->
<section id=\"main\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-12\">
\t\t\t\t<section>
\t\t\t\t\t<header class=\"major\"><h2>";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["sections.portfolio.title"], "method", false, false, false, 55), "html", null, true);
        yield "</h2></header>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t";
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["portfolio"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 58
            yield "\t\t\t\t\t\t<div class=\"col-4 col-6-medium col-12-small\">
\t\t\t\t\t\t\t<section class=\"box\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"image featured\"><img src=\"images/";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "img", [], "any", false, false, false, 60), "html", null, true);
            yield "\" alt=\"\" /></a>
\t\t\t\t\t\t\t\t<header><h3>";
            // line 61
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 61), "html", null, true);
            yield "</h3></header>
\t\t\t\t\t\t\t\t<p>";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "desc", [], "any", false, false, false, 62), "html", null, true);
            yield "</p>
\t\t\t\t\t\t\t\t<footer><ul class=\"actions\"><li><a href=\"#\" class=\"button alt\">";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["portfolio.find_out_more"], "method", false, false, false, 63), "html", null, true);
            yield "</a></li></ul></footer>
\t\t\t\t\t\t\t</section>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        yield "\t\t\t\t\t</div>
\t\t\t\t</section>
\t\t\t</div>
\t\t\t<div class=\"col-12\">
\t\t\t\t<section>
\t\t\t\t\t<header class=\"major\"><h2>";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["sections.blog.title"], "method", false, false, false, 72), "html", null, true);
        yield "</h2></header>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t";
        // line 74
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["blog_posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 75
            yield "\t\t\t\t\t\t<div class=\"col-6 col-12-small\">
\t\t\t\t\t\t\t<section class=\"box\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"image featured\"><img src=\"images/";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "img", [], "any", false, false, false, 77), "html", null, true);
            yield "\" alt=\"\" /></a>
\t\t\t\t\t\t\t\t<header><h3>";
            // line 78
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 78), "html", null, true);
            yield "</h3><p>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "time", [], "any", false, false, false, 78), "html", null, true);
            yield "</p></header>
\t\t\t\t\t\t\t\t<p>";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "desc", [], "any", false, false, false, 79), "html", null, true);
            yield "</p>
\t\t\t\t\t\t\t\t<footer>
\t\t\t\t\t\t\t\t\t<ul class=\"actions\">
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"button icon solid fa-file-alt\">";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["blog.continue_reading"], "method", false, false, false, 82), "html", null, true);
            yield "</a></li>
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"button alt icon solid fa-comment\">";
            // line 83
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "comments", [], "any", false, false, false, 83), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["blog.comments"], "method", false, false, false, 83), "html", null, true);
            yield "</a></li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</footer>
\t\t\t\t\t\t\t</section>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        yield "\t\t\t\t\t</div>
\t\t\t\t</section>
\t\t\t</div>
\t\t</div>
\t</div>
</section>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/homepage.html.twig";
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
        return array (  267 => 89,  253 => 83,  249 => 82,  243 => 79,  237 => 78,  233 => 77,  229 => 75,  225 => 74,  220 => 72,  213 => 67,  203 => 63,  199 => 62,  195 => 61,  191 => 60,  187 => 58,  183 => 57,  178 => 55,  170 => 49,  163 => 48,  152 => 41,  148 => 40,  144 => 39,  138 => 35,  128 => 31,  124 => 30,  118 => 29,  114 => 28,  109 => 25,  106 => 24,  103 => 23,  100 => 22,  97 => 21,  94 => 20,  91 => 19,  88 => 18,  85 => 17,  82 => 16,  78 => 15,  68 => 8,  64 => 7,  59 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"layouts/base.html.twig\" %}

{% block header_content %}
\t\t\t\t<!-- Banner -->
\t\t\t\t<section id=\"banner\">
\t\t\t\t\t<header>
\t\t\t\t\t\t<h2>{{ lang.get('banner.title') }}</h2>
\t\t\t\t\t\t<p>{{ lang.get('banner.subtitle') }}</p>
\t\t\t\t\t</header>
\t\t\t\t</section>

\t\t\t\t<!-- Intro -->
\t\t\t\t<section id=\"intro\" class=\"container\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t{% for section in intro_sections %}
\t\t\t\t\t\t\t{% set icon_class = 'icon solid featured' %}
\t\t\t\t\t\t\t{% set button_class = 'button' %}
\t\t\t\t\t\t\t{% if section.class == 'middle' %}
\t\t\t\t\t\t\t\t{% set icon_class = icon_class ~ ' alt' %}
\t\t\t\t\t\t\t\t{% set button_class = button_class ~ ' alt' %}
\t\t\t\t\t\t\t{% elseif section.class == 'last' %}
\t\t\t\t\t\t\t\t{% set icon_class = icon_class ~ ' alt2' %}
\t\t\t\t\t\t\t\t{% set button_class = button_class ~ ' alt2' %}
\t\t\t\t\t\t\t{% endif %}

\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"col-4 col-12-medium\">
\t\t\t\t\t\t\t\t<section class=\"{{ section.class }}\">
\t\t\t\t\t\t\t\t\t<i class=\"{{ icon_class }} {{ section.icon }}\"></i>
\t\t\t\t\t\t\t\t\t<header><h2>{{ section.title }}</h2></header>
\t\t\t\t\t\t\t\t\t<p>{{ section.desc }}</p>
\t\t\t\t\t\t\t\t</section>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t</div>
\t\t\t\t\t<!--
\t\t\t\t\t<footer>
\t\t\t\t\t\t<ul class=\"actions\">
\t\t\t\t\t\t\t<li><a href=\"#\" class=\"button large\">{{ lang.get('sections.intro.get_started') }}</a></li>
\t\t\t\t\t\t\t<li><a href=\"#\" class=\"button alt large\">{{ lang.get('sections.intro.learn_more') }}</a></li>
\t\t\t\t\t\t\t<li><a href=\"#\" class=\"button alt2 large\">{{ lang.get('sections.intro.contact_me') }}</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</footer>
\t\t\t\t\t-->
\t\t\t\t</section>
{% endblock %}

{% block content %}
<!-- Main -->
<section id=\"main\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-12\">
\t\t\t\t<section>
\t\t\t\t\t<header class=\"major\"><h2>{{ lang.get('sections.portfolio.title') }}</h2></header>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t{% for item in portfolio %}
\t\t\t\t\t\t<div class=\"col-4 col-6-medium col-12-small\">
\t\t\t\t\t\t\t<section class=\"box\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"image featured\"><img src=\"images/{{ item.img }}\" alt=\"\" /></a>
\t\t\t\t\t\t\t\t<header><h3>{{ item.title }}</h3></header>
\t\t\t\t\t\t\t\t<p>{{ item.desc }}</p>
\t\t\t\t\t\t\t\t<footer><ul class=\"actions\"><li><a href=\"#\" class=\"button alt\">{{ lang.get('portfolio.find_out_more') }}</a></li></ul></footer>
\t\t\t\t\t\t\t</section>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t</div>
\t\t\t\t</section>
\t\t\t</div>
\t\t\t<div class=\"col-12\">
\t\t\t\t<section>
\t\t\t\t\t<header class=\"major\"><h2>{{ lang.get('sections.blog.title') }}</h2></header>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t{% for post in blog_posts %}
\t\t\t\t\t\t<div class=\"col-6 col-12-small\">
\t\t\t\t\t\t\t<section class=\"box\">
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"image featured\"><img src=\"images/{{ post.img }}\" alt=\"\" /></a>
\t\t\t\t\t\t\t\t<header><h3>{{ post.title }}</h3><p>{{ post.time }}</p></header>
\t\t\t\t\t\t\t\t<p>{{ post.desc }}</p>
\t\t\t\t\t\t\t\t<footer>
\t\t\t\t\t\t\t\t\t<ul class=\"actions\">
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"button icon solid fa-file-alt\">{{ lang.get('blog.continue_reading') }}</a></li>
\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"button alt icon solid fa-comment\">{{ post.comments }} {{ lang.get('blog.comments') }}</a></li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</footer>
\t\t\t\t\t\t\t</section>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t</div>
\t\t\t\t</section>
\t\t\t</div>
\t\t</div>
\t</div>
</section>
{% endblock %}", "pages/homepage.html.twig", "/var/www/html/templates/pages/homepage.html.twig");
    }
}
