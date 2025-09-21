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

/* components/footer.html.twig */
class __TwigTemplate_ed8cf1ab6cbcb6dce0571ff163e52692 extends Template
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
        yield "<section id=\"footer\">
    <div class=\"container\">
        <div class=\"row\">
            ";
        // line 5
        yield "            <div class=\"col-8 col-12-medium\">
                ";
        // line 6
        yield from $this->load("components/footer/recent-posts.html.twig", 6)->unwrap()->yield($context);
        // line 7
        yield "            </div>
            
            ";
        // line 10
        yield "            <div class=\"col-4 col-12-medium\">
                ";
        // line 11
        yield from $this->load("components/footer/about.html.twig", 11)->unwrap()->yield($context);
        // line 12
        yield "            </div>
            
            ";
        // line 15
        yield "            <div class=\"col-4 col-6-medium col-12-small\">
                ";
        // line 16
        yield from $this->load("components/footer/links-section.html.twig", 16)->unwrap()->yield(CoreExtension::merge($context, ["section" => "section1"]));
        // line 19
        yield "            </div>
            
            <div class=\"col-4 col-6-medium col-12-small\">
                ";
        // line 22
        yield from $this->load("components/footer/links-section.html.twig", 22)->unwrap()->yield(CoreExtension::merge($context, ["section" => "section2"]));
        // line 25
        yield "            </div>
            
            ";
        // line 28
        yield "            <div class=\"col-4 col-12-medium\">
                ";
        // line 29
        yield from $this->load("components/footer/contact-social.html.twig", 29)->unwrap()->yield($context);
        // line 30
        yield "            </div>
            
            ";
        // line 33
        yield "            <div class=\"col-12\">
                ";
        // line 34
        yield from $this->load("components/footer/copyright.html.twig", 34)->unwrap()->yield($context);
        // line 35
        yield "            </div>
        </div>
    </div>
</section>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/footer.html.twig";
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
        return array (  95 => 35,  93 => 34,  90 => 33,  86 => 30,  84 => 29,  81 => 28,  77 => 25,  75 => 22,  70 => 19,  68 => 16,  65 => 15,  61 => 12,  59 => 11,  56 => 10,  52 => 7,  50 => 6,  47 => 5,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section id=\"footer\">
    <div class=\"container\">
        <div class=\"row\">
            {# Recent Posts Section #}
            <div class=\"col-8 col-12-medium\">
                {% include 'components/footer/recent-posts.html.twig' %}
            </div>
            
            {# About Section #}
            <div class=\"col-4 col-12-medium\">
                {% include 'components/footer/about.html.twig' %}
            </div>
            
            {# Links Sections #}
            <div class=\"col-4 col-6-medium col-12-small\">
                {% include 'components/footer/links-section.html.twig' with {
                    'section': 'section1'
                } %}
            </div>
            
            <div class=\"col-4 col-6-medium col-12-small\">
                {% include 'components/footer/links-section.html.twig' with {
                    'section': 'section2'
                } %}
            </div>
            
            {# Contact & Social Section #}
            <div class=\"col-4 col-12-medium\">
                {% include 'components/footer/contact-social.html.twig' %}
            </div>
            
            {# Copyright #}
            <div class=\"col-12\">
                {% include 'components/footer/copyright.html.twig' %}
            </div>
        </div>
    </div>
</section>", "components/footer.html.twig", "/var/www/html/templates/components/footer.html.twig");
    }
}
