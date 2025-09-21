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

/* components/navigation.html.twig */
class __TwigTemplate_dd09db07ace93d2c6276294e80c9ca39 extends Template
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
        yield "<nav id=\"nav\">
    <ul>
        ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["navigation_items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 4
            yield "            <li";
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "route", [], "any", false, false, false, 4) == ($context["current_page"] ?? null))) ? (" class=\"current\"") : (""));
            yield ">
                <a href=\"";
            // line 5
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 5), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", [CoreExtension::getAttribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 5)], "method", false, false, false, 5), "html", null, true);
            yield "</a>
                ";
            // line 6
            if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "children", [], "any", true, true, false, 6)) {
                // line 7
                yield "                    <ul>
                        ";
                // line 8
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "children", [], "any", false, false, false, 8));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 9
                    yield "                            <li>
                                <a href=\"";
                    // line 10
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["child"], "url", [], "any", false, false, false, 10), "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["child"], "label", [], "any", false, false, false, 10), "html", null, true);
                    yield "</a>
                                ";
                    // line 11
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["child"], "children", [], "any", true, true, false, 11)) {
                        // line 12
                        yield "                                    <ul>
                                        ";
                        // line 13
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["child"], "children", [], "any", false, false, false, 13));
                        foreach ($context['_seq'] as $context["_key"] => $context["grandchild"]) {
                            // line 14
                            yield "                                            <li><a href=\"";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["grandchild"], "url", [], "any", false, false, false, 14), "html", null, true);
                            yield "\">";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["grandchild"], "label", [], "any", false, false, false, 14), "html", null, true);
                            yield "</a></li>
                                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['grandchild'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 16
                        yield "                                    </ul>
                                ";
                    }
                    // line 18
                    yield "                            </li>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['child'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 20
                yield "                    </ul>
                ";
            }
            // line 22
            yield "            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        yield "        
        ";
        // line 26
        yield "        <li>
            <a href=\"#\" class=\"icon solid fa-globe\">";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["language.switch_to"], "method", false, false, false, 27), "html", null, true);
        yield "</a>
            <ul>
                <li";
        // line 29
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "currentLanguage", [], "any", false, false, false, 29) == "en")) ? (" class=\"active\"") : (""));
        yield ">
                    <a href=\"?lang=en\">";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["language.english"], "method", false, false, false, 30), "html", null, true);
        yield "</a>
                </li>
                <li";
        // line 32
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "currentLanguage", [], "any", false, false, false, 32) == "de")) ? (" class=\"active\"") : (""));
        yield ">
                    <a href=\"?lang=de\">";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["language.german"], "method", false, false, false, 33), "html", null, true);
        yield "</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/navigation.html.twig";
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
        return array (  145 => 33,  141 => 32,  136 => 30,  132 => 29,  127 => 27,  124 => 26,  121 => 24,  114 => 22,  110 => 20,  103 => 18,  99 => 16,  88 => 14,  84 => 13,  81 => 12,  79 => 11,  73 => 10,  70 => 9,  66 => 8,  63 => 7,  61 => 6,  55 => 5,  50 => 4,  46 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<nav id=\"nav\">
    <ul>
        {% for item in navigation_items %}
            <li{{ item.route == current_page ? ' class=\"current\"' : '' }}>
                <a href=\"{{ item.url }}\">{{ lang.get(item.label) }}</a>
                {% if item.children is defined %}
                    <ul>
                        {% for child in item.children %}
                            <li>
                                <a href=\"{{ child.url }}\">{{ child.label }}</a>
                                {% if child.children is defined %}
                                    <ul>
                                        {% for grandchild in child.children %}
                                            <li><a href=\"{{ grandchild.url }}\">{{ grandchild.label }}</a></li>
                                        {% endfor %}
                                    </ul>
                                {% endif %}
                            </li>
                        {% endfor %}
                    </ul>
                {% endif %}
            </li>
        {% endfor %}
        
        {# Language Switcher #}
        <li>
            <a href=\"#\" class=\"icon solid fa-globe\">{{ lang.get('language.switch_to') }}</a>
            <ul>
                <li{{ lang.currentLanguage == 'en' ? ' class=\"active\"' : '' }}>
                    <a href=\"?lang=en\">{{ lang.get('language.english') }}</a>
                </li>
                <li{{ lang.currentLanguage == 'de' ? ' class=\"active\"' : '' }}>
                    <a href=\"?lang=de\">{{ lang.get('language.german') }}</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>", "components/navigation.html.twig", "/var/www/html/templates/components/navigation.html.twig");
    }
}
