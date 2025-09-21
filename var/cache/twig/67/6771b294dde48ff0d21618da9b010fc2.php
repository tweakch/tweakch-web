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

/* components/footer/about.html.twig */
class __TwigTemplate_fa4b2403704b070630d329ca86b2d40e extends Template
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.about.title"], "method", false, false, false, 3), "html", null, true);
        yield "</h2>
    </header>
    <a href=\"#\" class=\"image featured\">
        <img src=\"images/pic10.jpg\" alt=\"\" />
    </a>
    <p>";
        // line 8
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.about.description"], "method", false, false, false, 8);
        yield "</p>
    <footer>
        <ul class=\"actions\">
            <li>
                <a href=\"#\" class=\"button\">
                    ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.about.find_out_more"], "method", false, false, false, 13), "html", null, true);
        yield "
                </a>
            </li>
        </ul>
    </footer>
</section>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/footer/about.html.twig";
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
        return array (  62 => 13,  54 => 8,  46 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section>
    <header>
        <h2>{{ lang.get('footer.about.title') }}</h2>
    </header>
    <a href=\"#\" class=\"image featured\">
        <img src=\"images/pic10.jpg\" alt=\"\" />
    </a>
    <p>{{ lang.get('footer.about.description')|raw }}</p>
    <footer>
        <ul class=\"actions\">
            <li>
                <a href=\"#\" class=\"button\">
                    {{ lang.get('footer.about.find_out_more') }}
                </a>
            </li>
        </ul>
    </footer>
</section>", "components/footer/about.html.twig", "/var/www/html/templates/components/footer/about.html.twig");
    }
}
