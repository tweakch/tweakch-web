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

/* components/scripts.html.twig */
class __TwigTemplate_471e45a898616eb9d085dd47ad00f8d6 extends Template
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
            'additional_scripts' => [$this, 'block_additional_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 2
        yield "<script src=\"assets/js/jquery.min.js\"></script>
<script src=\"assets/js/jquery.dropotron.min.js\"></script>
<script src=\"assets/js/browser.min.js\"></script>
<script src=\"assets/js/breakpoints.min.js\"></script>
<script src=\"assets/js/util.js\"></script>
<script src=\"assets/js/main.js\"></script>

";
        // line 10
        yield from $this->unwrap()->yieldBlock('additional_scripts', $context, $blocks);
        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_additional_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/scripts.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  52 => 10,  43 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Core Scripts #}
<script src=\"assets/js/jquery.min.js\"></script>
<script src=\"assets/js/jquery.dropotron.min.js\"></script>
<script src=\"assets/js/browser.min.js\"></script>
<script src=\"assets/js/breakpoints.min.js\"></script>
<script src=\"assets/js/util.js\"></script>
<script src=\"assets/js/main.js\"></script>

{# Additional scripts for specific pages #}
{% block additional_scripts %}{% endblock %}", "components/scripts.html.twig", "/var/www/html/templates/components/scripts.html.twig");
    }
}
