<?php

/* TwigBundle:Exception:traces.txt.twig */
class __TwigTemplate_5a56a0453bf611ede30967e7b59919088925204b28fa7b255580a91b09fc3aa3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_44fd8bd068b1a1a775c01185e2bfe6190296e07691b13ac013980cd500d9a3fc = $this->env->getExtension("native_profiler");
        $__internal_44fd8bd068b1a1a775c01185e2bfe6190296e07691b13ac013980cd500d9a3fc->enter($__internal_44fd8bd068b1a1a775c01185e2bfe6190296e07691b13ac013980cd500d9a3fc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()))) {
            // line 2
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 3
                $this->loadTemplate("TwigBundle:Exception:trace.txt.twig", "TwigBundle:Exception:traces.txt.twig", 3)->display(array("trace" => $context["trace"]));
                // line 4
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_44fd8bd068b1a1a775c01185e2bfe6190296e07691b13ac013980cd500d9a3fc->leave($__internal_44fd8bd068b1a1a775c01185e2bfe6190296e07691b13ac013980cd500d9a3fc_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  28 => 3,  24 => 2,  22 => 1,);
    }
}
