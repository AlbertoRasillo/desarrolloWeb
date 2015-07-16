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
        $__internal_6d7d325d1dbcba8401b3772e32ea410e1555083fd8b408af44ed8b5144000801 = $this->env->getExtension("native_profiler");
        $__internal_6d7d325d1dbcba8401b3772e32ea410e1555083fd8b408af44ed8b5144000801->enter($__internal_6d7d325d1dbcba8401b3772e32ea410e1555083fd8b408af44ed8b5144000801_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6d7d325d1dbcba8401b3772e32ea410e1555083fd8b408af44ed8b5144000801->leave($__internal_6d7d325d1dbcba8401b3772e32ea410e1555083fd8b408af44ed8b5144000801_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_3833df5c17389a57d6bb86edd24e163a77796dfb8b33f94534bf130e2381e319 = $this->env->getExtension("native_profiler");
        $__internal_3833df5c17389a57d6bb86edd24e163a77796dfb8b33f94534bf130e2381e319->enter($__internal_3833df5c17389a57d6bb86edd24e163a77796dfb8b33f94534bf130e2381e319_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_3833df5c17389a57d6bb86edd24e163a77796dfb8b33f94534bf130e2381e319->leave($__internal_3833df5c17389a57d6bb86edd24e163a77796dfb8b33f94534bf130e2381e319_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_5cab5e0f3ac81f05a0e949882462a16c31399a25f46e82daa33ac2e2449d9c4c = $this->env->getExtension("native_profiler");
        $__internal_5cab5e0f3ac81f05a0e949882462a16c31399a25f46e82daa33ac2e2449d9c4c->enter($__internal_5cab5e0f3ac81f05a0e949882462a16c31399a25f46e82daa33ac2e2449d9c4c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_5cab5e0f3ac81f05a0e949882462a16c31399a25f46e82daa33ac2e2449d9c4c->leave($__internal_5cab5e0f3ac81f05a0e949882462a16c31399a25f46e82daa33ac2e2449d9c4c_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_23c079aeb1066d169a6ed0735bdc0e3468b56b830fff11853758f3219a2fe549 = $this->env->getExtension("native_profiler");
        $__internal_23c079aeb1066d169a6ed0735bdc0e3468b56b830fff11853758f3219a2fe549->enter($__internal_23c079aeb1066d169a6ed0735bdc0e3468b56b830fff11853758f3219a2fe549_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_23c079aeb1066d169a6ed0735bdc0e3468b56b830fff11853758f3219a2fe549->leave($__internal_23c079aeb1066d169a6ed0735bdc0e3468b56b830fff11853758f3219a2fe549_prof);

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
