<?php

/* SensioDistributionBundle::Configurator/layout.html.twig */
class __TwigTemplate_8850c5b039bb49f6a99863f00eddc24f67d18c053c22b1df83473808fe8a2d0b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "SensioDistributionBundle::Configurator/layout.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1520ec0ddffa1b9a80e3682815ff4828753927636b5dc02a7769cdb1f78679b1 = $this->env->getExtension("native_profiler");
        $__internal_1520ec0ddffa1b9a80e3682815ff4828753927636b5dc02a7769cdb1f78679b1->enter($__internal_1520ec0ddffa1b9a80e3682815ff4828753927636b5dc02a7769cdb1f78679b1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "SensioDistributionBundle::Configurator/layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1520ec0ddffa1b9a80e3682815ff4828753927636b5dc02a7769cdb1f78679b1->leave($__internal_1520ec0ddffa1b9a80e3682815ff4828753927636b5dc02a7769cdb1f78679b1_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_07acd84bd5ffefa413a476795cddebfbff2e97779e2152380cb48e4a3bf25229 = $this->env->getExtension("native_profiler");
        $__internal_07acd84bd5ffefa413a476795cddebfbff2e97779e2152380cb48e4a3bf25229->enter($__internal_07acd84bd5ffefa413a476795cddebfbff2e97779e2152380cb48e4a3bf25229_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/sensiodistribution/webconfigurator/css/configurator.css"), "html", null, true);
        echo "\" />
";
        
        $__internal_07acd84bd5ffefa413a476795cddebfbff2e97779e2152380cb48e4a3bf25229->leave($__internal_07acd84bd5ffefa413a476795cddebfbff2e97779e2152380cb48e4a3bf25229_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_56074cb8fe4c05188f872712fa24201a414f2d0f5374afe18d2553642f1187cb = $this->env->getExtension("native_profiler");
        $__internal_56074cb8fe4c05188f872712fa24201a414f2d0f5374afe18d2553642f1187cb->enter($__internal_56074cb8fe4c05188f872712fa24201a414f2d0f5374afe18d2553642f1187cb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Web Configurator Bundle";
        
        $__internal_56074cb8fe4c05188f872712fa24201a414f2d0f5374afe18d2553642f1187cb->leave($__internal_56074cb8fe4c05188f872712fa24201a414f2d0f5374afe18d2553642f1187cb_prof);

    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        $__internal_85d47e8926587a94b5c645465e8d65c37ced091b9c3f11298250cdc3fd7efc58 = $this->env->getExtension("native_profiler");
        $__internal_85d47e8926587a94b5c645465e8d65c37ced091b9c3f11298250cdc3fd7efc58->enter($__internal_85d47e8926587a94b5c645465e8d65c37ced091b9c3f11298250cdc3fd7efc58_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 10
        echo "    <div class=\"block\">
        ";
        // line 11
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "    </div>
    <div class=\"version\">Symfony Standard Edition v.";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["version"]) ? $context["version"] : $this->getContext($context, "version")), "html", null, true);
        echo "</div>
";
        
        $__internal_85d47e8926587a94b5c645465e8d65c37ced091b9c3f11298250cdc3fd7efc58->leave($__internal_85d47e8926587a94b5c645465e8d65c37ced091b9c3f11298250cdc3fd7efc58_prof);

    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        $__internal_62e8475a65128de707aad79ebea2ddbba50c6e2be7ac8fd87d9ce8c0d28444fb = $this->env->getExtension("native_profiler");
        $__internal_62e8475a65128de707aad79ebea2ddbba50c6e2be7ac8fd87d9ce8c0d28444fb->enter($__internal_62e8475a65128de707aad79ebea2ddbba50c6e2be7ac8fd87d9ce8c0d28444fb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_62e8475a65128de707aad79ebea2ddbba50c6e2be7ac8fd87d9ce8c0d28444fb->leave($__internal_62e8475a65128de707aad79ebea2ddbba50c6e2be7ac8fd87d9ce8c0d28444fb_prof);

    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle::Configurator/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 11,  79 => 13,  76 => 12,  74 => 11,  71 => 10,  65 => 9,  53 => 7,  43 => 4,  37 => 3,  11 => 1,);
    }
}
