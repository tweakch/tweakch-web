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

/* layouts/flexible.html.twig */
class __TwigTemplate_b50c78a9d9382a7dcdc0e0d6a3c55457 extends Template
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
            'sidebar_left' => [$this, 'block_sidebar_left'],
            'main_content' => [$this, 'block_main_content'],
            'sidebar_right' => [$this, 'block_sidebar_right'],
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
        <div class=\"row flexible-layout\"
             data-has-left=\"";
        // line 11
        yield (((($tmp = ($context["sidebar_left"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("1") : ("0"));
        yield "\"
             data-has-right=\"";
        // line 12
        yield (((($tmp = ($context["sidebar_right"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("1") : ("0"));
        yield "\">
            ";
        // line 14
        yield "            ";
        if ((($tmp = ($context["sidebar_left"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 15
            yield "                <div id=\"sidebar-left\"
                     class=\"";
            // line 16
            if ((($tmp = ($context["sidebar_right"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "col-3";
            } else {
                yield "col-4";
            }
            yield " col-12-medium sidebar sidebar--left\">
                    ";
            // line 17
            yield from $this->unwrap()->yieldBlock('sidebar_left', $context, $blocks);
            // line 18
            yield "                </div>
            ";
        }
        // line 20
        yield "
            ";
        // line 22
        yield "            ";
        $context["main_classes"] = [];
        // line 23
        yield "            ";
        if (( !($context["sidebar_left"] ?? null) &&  !($context["sidebar_right"] ?? null))) {
            // line 24
            yield "                ";
            $context["main_classes"] = ["col-12"];
            // line 25
            yield "            ";
        } elseif ((($context["sidebar_left"] ?? null) && ($context["sidebar_right"] ?? null))) {
            // line 26
            yield "                ";
            $context["main_classes"] = ["col-6", "col-12-medium"];
            // line 27
            yield "            ";
        } else {
            // line 28
            yield "                ";
            $context["main_classes"] = ["col-8", "col-12-medium"];
            // line 29
            yield "            ";
        }
        // line 30
        yield "            <div class=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::join(($context["main_classes"] ?? null), " "), "html", null, true);
        yield " main-column\">
                ";
        // line 31
        yield from $this->unwrap()->yieldBlock('main_content', $context, $blocks);
        // line 32
        yield "            </div>

            ";
        // line 35
        yield "            ";
        if ((($tmp = ($context["sidebar_right"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 36
            yield "                <div id=\"sidebar-right\"
                     class=\"";
            // line 37
            if ((($tmp = ($context["sidebar_left"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "col-3";
            } else {
                yield "col-4";
            }
            yield " col-12-medium sidebar sidebar--right\">
                    ";
            // line 38
            yield from $this->unwrap()->yieldBlock('sidebar_right', $context, $blocks);
            // line 39
            yield "                </div>
            ";
        }
        // line 41
        yield "        </div>
    </div>
</section>
";
        yield from [];
    }

    // line 17
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_sidebar_left(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield ($context["sidebar_left"] ?? null);
        yield from [];
    }

    // line 31
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 38
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_sidebar_right(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield ($context["sidebar_right"] ?? null);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layouts/flexible.html.twig";
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
        return array (  181 => 38,  171 => 31,  160 => 17,  152 => 41,  148 => 39,  146 => 38,  138 => 37,  135 => 36,  132 => 35,  128 => 32,  126 => 31,  121 => 30,  118 => 29,  115 => 28,  112 => 27,  109 => 26,  106 => 25,  103 => 24,  100 => 23,  97 => 22,  94 => 20,  90 => 18,  88 => 17,  80 => 16,  77 => 15,  74 => 14,  70 => 12,  66 => 11,  61 => 8,  54 => 7,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/base.html.twig' %}

{# Flexible two-/three-column capable layout.
   Pass in optional raw HTML fragments: sidebar_left, sidebar_right.
   Child templates override blocks sidebar_left/sidebar_right/main_content if needed. #}

{% block content %}
<section id=\"main\">
    <div class=\"container\">
        <div class=\"row flexible-layout\"
             data-has-left=\"{{ sidebar_left ? '1':'0' }}\"
             data-has-right=\"{{ sidebar_right ? '1':'0' }}\">
            {# LEFT SIDEBAR #}
            {% if sidebar_left %}
                <div id=\"sidebar-left\"
                     class=\"{% if sidebar_right %}col-3{% else %}col-4{% endif %} col-12-medium sidebar sidebar--left\">
                    {% block sidebar_left %}{{ sidebar_left|raw }}{% endblock %}
                </div>
            {% endif %}

            {# MAIN COLUMN #}
            {% set main_classes = [] %}
            {% if not sidebar_left and not sidebar_right %}
                {% set main_classes = ['col-12'] %}
            {% elseif sidebar_left and sidebar_right %}
                {% set main_classes = ['col-6','col-12-medium'] %}
            {% else %}
                {% set main_classes = ['col-8','col-12-medium'] %}
            {% endif %}
            <div class=\"{{ main_classes|join(' ') }} main-column\">
                {% block main_content %}{% endblock %}
            </div>

            {# RIGHT SIDEBAR #}
            {% if sidebar_right %}
                <div id=\"sidebar-right\"
                     class=\"{% if sidebar_left %}col-3{% else %}col-4{% endif %} col-12-medium sidebar sidebar--right\">
                    {% block sidebar_right %}{{ sidebar_right|raw }}{% endblock %}
                </div>
            {% endif %}
        </div>
    </div>
</section>
{% endblock %}
", "layouts/flexible.html.twig", "/var/www/html/templates/layouts/flexible.html.twig");
    }
}
