<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_fdb787aeb6f58111b7cd22cb83324ce04ac1d347bfea269585b751a11cd3a310 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_02b9094353363c545ae8fa6cd5eb2769b8982ddb9e2f073704474385e02a5e37 = $this->env->getExtension("native_profiler");
        $__internal_02b9094353363c545ae8fa6cd5eb2769b8982ddb9e2f073704474385e02a5e37->enter($__internal_02b9094353363c545ae8fa6cd5eb2769b8982ddb9e2f073704474385e02a5e37_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_02b9094353363c545ae8fa6cd5eb2769b8982ddb9e2f073704474385e02a5e37->leave($__internal_02b9094353363c545ae8fa6cd5eb2769b8982ddb9e2f073704474385e02a5e37_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_2ccd121bb7319cef1194576de51a8b85daf894bb3ee138430b3fcdd2d26e487d = $this->env->getExtension("native_profiler");
        $__internal_2ccd121bb7319cef1194576de51a8b85daf894bb3ee138430b3fcdd2d26e487d->enter($__internal_2ccd121bb7319cef1194576de51a8b85daf894bb3ee138430b3fcdd2d26e487d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_2ccd121bb7319cef1194576de51a8b85daf894bb3ee138430b3fcdd2d26e487d->leave($__internal_2ccd121bb7319cef1194576de51a8b85daf894bb3ee138430b3fcdd2d26e487d_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_46a86cc26bb23e356138b8782b9e2f3062928e0babc1dc5fe7bd41e1b9fd2015 = $this->env->getExtension("native_profiler");
        $__internal_46a86cc26bb23e356138b8782b9e2f3062928e0babc1dc5fe7bd41e1b9fd2015->enter($__internal_46a86cc26bb23e356138b8782b9e2f3062928e0babc1dc5fe7bd41e1b9fd2015_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_46a86cc26bb23e356138b8782b9e2f3062928e0babc1dc5fe7bd41e1b9fd2015->leave($__internal_46a86cc26bb23e356138b8782b9e2f3062928e0babc1dc5fe7bd41e1b9fd2015_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_c75b141a985c706838891d1ddffe378c73344e0c399b9ae61cd786689e7ecfd6 = $this->env->getExtension("native_profiler");
        $__internal_c75b141a985c706838891d1ddffe378c73344e0c399b9ae61cd786689e7ecfd6->enter($__internal_c75b141a985c706838891d1ddffe378c73344e0c399b9ae61cd786689e7ecfd6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_c75b141a985c706838891d1ddffe378c73344e0c399b9ae61cd786689e7ecfd6->leave($__internal_c75b141a985c706838891d1ddffe378c73344e0c399b9ae61cd786689e7ecfd6_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
