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

/* components/blog/_toc.html.twig */
class __TwigTemplate_e7cb7448db766a60e047775011c18b7a extends Template
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
        if ((array_key_exists("toc_html", $context) && ($context["toc_html"] ?? null))) {
            // line 3
            yield "<section class=\"box\">
  <nav class=\"toc\" aria-label=\"Table of contents\">
    <h3>On this page</h3>
    <div class=\"toc-body\">
      ";
            // line 7
            yield ($context["toc_html"] ?? null);
            yield "
    </div>
  </nav>
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
        return "components/blog/_toc.html.twig";
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
        return array (  50 => 7,  44 => 3,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Reusable Table of Contents component #}
{% if toc_html is defined and toc_html %}
<section class=\"box\">
  <nav class=\"toc\" aria-label=\"Table of contents\">
    <h3>On this page</h3>
    <div class=\"toc-body\">
      {{ toc_html|raw }}
    </div>
  </nav>
</section>

{% endif %}
", "components/blog/_toc.html.twig", "/var/www/html/templates/components/blog/_toc.html.twig");
    }
}
