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

/* components/footer/links-section.html.twig */
class __TwigTemplate_d273ec384a67e34502da7d2a1aa288b7 extends Template
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
        yield "<section>
    <header>
        <h2>";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", [(("footer.links." . ($context["section"] ?? null)) . ".title")], "method", false, false, false, 3), "html", null, true);
        yield "</h2>
    </header>
    <ul class=\"divided\">
        ";
        // line 6
        $context["links"] = CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", [(("footer.links." . ($context["section"] ?? null)) . ".links")], "method", false, false, false, 6);
        // line 7
        yield "        ";
        if (is_iterable(($context["links"] ?? null))) {
            // line 8
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["links"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                // line 9
                yield "                <li><a href=\"#\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["link"], "html", null, true);
                yield "</a></li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['link'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            yield "        ";
        } else {
            // line 12
            yield "            ";
            // line 13
            yield "            ";
            $context["fallback_links"] = (((($context["section"] ?? null) == "section1")) ? (["Lorem ipsum dolor sit amet sit veroeros", "Sed et blandit consequat sed tlorem blandit", "Adipiscing feugiat phasellus sed tempus", "Hendrerit tortor vitae mattis tempor sapien", "Sem feugiat sapien id suscipit magna felis nec", "Elit class aptent taciti sociosqu ad litora"]) : (["Lorem ipsum dolor sit amet sit veroeros", "Sed et blandit consequat sed tlorem blandit", "Adipiscing feugiat phasellus sed tempus", "Hendrerit tortor vitae mattis tempor sapien", "Sem feugiat sapien id suscipit magna felis nec", "Elit class aptent taciti sociosqu ad litora"]));
            // line 30
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["fallback_links"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                // line 31
                yield "                <li><a href=\"#\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["link"], "html", null, true);
                yield "</a></li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['link'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            yield "        ";
        }
        // line 34
        yield "    </ul>
</section>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/footer/links-section.html.twig";
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
        return array (  96 => 34,  93 => 33,  84 => 31,  79 => 30,  76 => 13,  74 => 12,  71 => 11,  62 => 9,  57 => 8,  54 => 7,  52 => 6,  46 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section>
    <header>
        <h2>{{ lang.get('footer.links.' ~ section ~ '.title') }}</h2>
    </header>
    <ul class=\"divided\">
        {% set links = lang.get('footer.links.' ~ section ~ '.links') %}
        {% if links is iterable %}
            {% for link in links %}
                <li><a href=\"#\">{{ link }}</a></li>
            {% endfor %}
        {% else %}
            {# Fallback content based on section #}
            {% set fallback_links = section == 'section1' ? 
                [
                    'Lorem ipsum dolor sit amet sit veroeros',
                    'Sed et blandit consequat sed tlorem blandit',
                    'Adipiscing feugiat phasellus sed tempus',
                    'Hendrerit tortor vitae mattis tempor sapien',
                    'Sem feugiat sapien id suscipit magna felis nec',
                    'Elit class aptent taciti sociosqu ad litora'
                ] : 
                [
                    'Lorem ipsum dolor sit amet sit veroeros',
                    'Sed et blandit consequat sed tlorem blandit',
                    'Adipiscing feugiat phasellus sed tempus',
                    'Hendrerit tortor vitae mattis tempor sapien',
                    'Sem feugiat sapien id suscipit magna felis nec',
                    'Elit class aptent taciti sociosqu ad litora'
                ] %}
            {% for link in fallback_links %}
                <li><a href=\"#\">{{ link }}</a></li>
            {% endfor %}
        {% endif %}
    </ul>
</section>", "components/footer/links-section.html.twig", "/var/www/html/templates/components/footer/links-section.html.twig");
    }
}
