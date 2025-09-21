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

/* components/footer/copyright.html.twig */
class __TwigTemplate_bba747811f699336f784745c85530dbd extends Template
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
        yield "<div id=\"copyright\">
    <ul class=\"links\">
        <li>";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.copyright"], "method", false, false, false, 3), "html", null, true);
        yield "</li>
        <li>
            ";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.designed_by"], "method", false, false, false, 5), "html", null, true);
        yield " 
            <a href=\"http://html5up.net\">";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.html5_up"], "method", false, false, false, 6), "html", null, true);
        yield "</a>
        </li>
    </ul>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/footer/copyright.html.twig";
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
        return array (  55 => 6,  51 => 5,  46 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div id=\"copyright\">
    <ul class=\"links\">
        <li>{{ lang.get('footer.copyright') }}</li>
        <li>
            {{ lang.get('footer.designed_by') }} 
            <a href=\"http://html5up.net\">{{ lang.get('footer.html5_up') }}</a>
        </li>
    </ul>
</div>", "components/footer/copyright.html.twig", "/var/www/html/templates/components/footer/copyright.html.twig");
    }
}
