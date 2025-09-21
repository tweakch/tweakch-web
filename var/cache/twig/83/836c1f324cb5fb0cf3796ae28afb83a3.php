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

/* components/blog/_metadata.html.twig */
class __TwigTemplate_b31e810baa7c75dc9892618b5e533d2d extends Template
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
        // line 2
        $context["hasTags"] = (CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "tags", [], "any", true, true, false, 2) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "tags", [], "any", false, false, false, 2)) > 0));
        // line 3
        $context["placement"] = ((array_key_exists("placement", $context)) ? (Twig\Extension\CoreExtension::default(($context["placement"] ?? null), "sidebar")) : ("sidebar"));
        // line 4
        $context["boxClass"] = (((($context["placement"] ?? null) == "inline")) ? ("box meta-box-inline") : ("box meta-box"));
        // line 5
        yield "
<section class=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["boxClass"] ?? null), "html", null, true);
        yield "\">
    <header><h3>Post Details</h3></header>
    <ul class=\"meta-list\">
        ";
        // line 9
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "author", [], "any", false, false, false, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<li><strong>Author:</strong> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "author", [], "any", false, false, false, 9), "html", null, true);
            yield "</li>";
        }
        // line 10
        yield "        ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "published", [], "any", false, false, false, 10)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<li><strong>Published:</strong> <time datetime=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "published", [], "any", false, false, false, 10), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "published", [], "any", false, false, false, 10), "html", null, true);
            yield "</time></li>";
        }
        // line 11
        yield "        ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "readingTime", [], "any", false, false, false, 11)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<li><strong>Reading Time:</strong> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "readingTime", [], "any", false, false, false, 11), "html", null, true);
            yield "</li>";
        }
        // line 12
        yield "        ";
        if (((!($context["hasTags"] ?? null)) && (( !CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "author", [], "any", false, false, false, 12) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "published", [], "any", false, false, false, 12)) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "readingTime", [], "any", false, false, false, 12)))) {
            // line 13
            yield "            <li>No metadata available.</li>
        ";
        }
        // line 15
        yield "    </ul>
</section>

";
        // line 18
        if ((($tmp = ($context["hasTags"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 19
            yield "<section class=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["boxClass"] ?? null), "html", null, true);
            yield "\">
    <header><h3>Tags</h3></header>
    <ul class=\"tag-list\">
        ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "tags", [], "any", false, false, false, 22));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 23
                yield "            <li class=\"tag-item\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["tag"], "html", null, true);
                yield "</li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            yield "    </ul>
</section>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/blog/_metadata.html.twig";
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
        return array (  113 => 25,  104 => 23,  100 => 22,  93 => 19,  91 => 18,  86 => 15,  82 => 13,  79 => 12,  72 => 11,  63 => 10,  57 => 9,  51 => 6,  48 => 5,  46 => 4,  44 => 3,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Redesigned metadata component (Option 2: two boxes). #}
{% set hasTags = post.tags is defined and post.tags|length > 0 %}
{% set placement = placement|default('sidebar') %}
{% set boxClass = placement == 'inline' ? 'box meta-box-inline' : 'box meta-box' %}

<section class=\"{{ boxClass }}\">
    <header><h3>Post Details</h3></header>
    <ul class=\"meta-list\">
        {% if post.author %}<li><strong>Author:</strong> {{ post.author }}</li>{% endif %}
        {% if post.published %}<li><strong>Published:</strong> <time datetime=\"{{ post.published }}\">{{ post.published }}</time></li>{% endif %}
        {% if post.readingTime %}<li><strong>Reading Time:</strong> {{ post.readingTime }}</li>{% endif %}
        {% if (not hasTags) and (not post.author and not post.published and not post.readingTime) %}
            <li>No metadata available.</li>
        {% endif %}
    </ul>
</section>

{% if hasTags %}
<section class=\"{{ boxClass }}\">
    <header><h3>Tags</h3></header>
    <ul class=\"tag-list\">
        {% for tag in post.tags %}
            <li class=\"tag-item\">{{ tag }}</li>
        {% endfor %}
    </ul>
</section>
{% endif %}
", "components/blog/_metadata.html.twig", "/var/www/html/templates/components/blog/_metadata.html.twig");
    }
}
