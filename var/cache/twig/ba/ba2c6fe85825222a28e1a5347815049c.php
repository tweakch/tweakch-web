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

/* components/footer/contact-social.html.twig */
class __TwigTemplate_54ba2c5d560c7590e4ec27fb0bcf63ec extends Template
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.social.title"], "method", false, false, false, 3), "html", null, true);
        yield "</h2>
    </header>
    
    ";
        // line 7
        yield "    <ul class=\"social\">
        ";
        // line 8
        $context["social_platforms"] = ["facebook-f" => "facebook", "twitter" => "twitter", "dribbble" => "dribbble", "tumblr" => "tumblr", "linkedin-in" => "linkedin"];
        // line 15
        yield "        
        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["social_platforms"] ?? null));
        foreach ($context['_seq'] as $context["icon"] => $context["platform"]) {
            // line 17
            yield "            <li>
                <a class=\"icon brands fa-";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["icon"], "html", null, true);
            yield "\" href=\"#\">
                    <span class=\"label\">
                        ";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", [("footer.social.platforms." . $context["platform"])], "method", false, false, false, 20), "html", null, true);
            yield "
                    </span>
                </a>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['icon'], $context['platform'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        yield "    </ul>
    
    ";
        // line 28
        yield "    <ul class=\"contact\">
        <li>
            <h3>";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.contact.address.label"], "method", false, false, false, 30), "html", null, true);
        yield "</h3>
            <p>
                ";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.contact.address.company"], "method", false, false, false, 32), "html", null, true);
        yield "<br />
                ";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.contact.address.street"], "method", false, false, false, 33), "html", null, true);
        yield "<br />
                ";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.contact.address.city"], "method", false, false, false, 34), "html", null, true);
        yield "
            </p>
        </li>
        <li>
            <h3>";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.contact.mail.label"], "method", false, false, false, 38), "html", null, true);
        yield "</h3>
            <p>
                <a href=\"mailto:";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.contact.mail.email"], "method", false, false, false, 40), "html", null, true);
        yield "\">
                    ";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.contact.mail.email"], "method", false, false, false, 41), "html", null, true);
        yield "
                </a>
            </p>
        </li>
        <li>
            <h3>";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.contact.phone.label"], "method", false, false, false, 46), "html", null, true);
        yield "</h3>
            <p>";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.contact.phone.number"], "method", false, false, false, 47), "html", null, true);
        yield "</p>
        </li>
    </ul>
</section>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/footer/contact-social.html.twig";
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
        return array (  132 => 47,  128 => 46,  120 => 41,  116 => 40,  111 => 38,  104 => 34,  100 => 33,  96 => 32,  91 => 30,  87 => 28,  83 => 25,  72 => 20,  67 => 18,  64 => 17,  60 => 16,  57 => 15,  55 => 8,  52 => 7,  46 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section>
    <header>
        <h2>{{ lang.get('footer.social.title') }}</h2>
    </header>
    
    {# Social Media Links #}
    <ul class=\"social\">
        {% set social_platforms = {
            'facebook-f': 'facebook',
            'twitter': 'twitter',
            'dribbble': 'dribbble',
            'tumblr': 'tumblr',
            'linkedin-in': 'linkedin'
        } %}
        
        {% for icon, platform in social_platforms %}
            <li>
                <a class=\"icon brands fa-{{ icon }}\" href=\"#\">
                    <span class=\"label\">
                        {{ lang.get('footer.social.platforms.' ~ platform) }}
                    </span>
                </a>
            </li>
        {% endfor %}
    </ul>
    
    {# Contact Information #}
    <ul class=\"contact\">
        <li>
            <h3>{{ lang.get('footer.contact.address.label') }}</h3>
            <p>
                {{ lang.get('footer.contact.address.company') }}<br />
                {{ lang.get('footer.contact.address.street') }}<br />
                {{ lang.get('footer.contact.address.city') }}
            </p>
        </li>
        <li>
            <h3>{{ lang.get('footer.contact.mail.label') }}</h3>
            <p>
                <a href=\"mailto:{{ lang.get('footer.contact.mail.email') }}\">
                    {{ lang.get('footer.contact.mail.email') }}
                </a>
            </p>
        </li>
        <li>
            <h3>{{ lang.get('footer.contact.phone.label') }}</h3>
            <p>{{ lang.get('footer.contact.phone.number') }}</p>
        </li>
    </ul>
</section>", "components/footer/contact-social.html.twig", "/var/www/html/templates/components/footer/contact-social.html.twig");
    }
}
