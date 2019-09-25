<?php

/* table/relation/internal_relational_row.twig */
class __TwigTemplate_c468b483aa5257383be1bdc2492335d49da077b1dc9d11b3d18ae9c3cb4a9cc5 extends Twig_Template
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
        // line 1
        echo "<tr>
    <td class=\"vmiddle\">
        <strong>";
        // line 3
        echo twig_escape_filter($this->env, ($context["myfield"] ?? null), "html", null, true);
        echo "</strong>
        <input type=\"hidden\" name=\"fields_name[";
        // line 4
        echo twig_escape_filter($this->env, ($context["myfield_md5"] ?? null), "html", null, true);
        echo "]\"
               value=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["myfield"] ?? null), "html", null, true);
        echo "\"/>
    </td>

    <td>
        ";
        // line 9
        $this->loadTemplate("table/relation/relational_dropdown.twig", "table/relation/internal_relational_row.twig", 9)->display(array("name" => (("destination_db[" .         // line 10
($context["myfield_md5"] ?? null)) . "]"), "title" => _gettext("Database"), "values" =>         // line 12
($context["databases"] ?? null), "foreign" =>         // line 13
($context["foreign_db"] ?? null)));
        // line 15
        echo "
        ";
        // line 16
        $this->loadTemplate("table/relation/relational_dropdown.twig", "table/relation/internal_relational_row.twig", 16)->display(array("name" => (("destination_table[" .         // line 17
($context["myfield_md5"] ?? null)) . "]"), "title" => _gettext("Table"), "values" =>         // line 19
($context["tables"] ?? null), "foreign" =>         // line 20
($context["foreign_table"] ?? null)));
        // line 22
        echo "
        ";
        // line 23
        $this->loadTemplate("table/relation/relational_dropdown.twig", "table/relation/internal_relational_row.twig", 23)->display(array("name" => (("destination_column[" .         // line 24
($context["myfield_md5"] ?? null)) . "]"), "title" => _gettext("Column"), "values" =>         // line 26
($context["columns"] ?? null), "foreign" =>         // line 27
($context["foreign_column"] ?? null)));
        // line 29
        echo "    </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "table/relation/internal_relational_row.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 29,  57 => 27,  56 => 26,  55 => 24,  54 => 23,  51 => 22,  49 => 20,  48 => 19,  47 => 17,  46 => 16,  43 => 15,  41 => 13,  40 => 12,  39 => 10,  38 => 9,  31 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/relation/internal_relational_row.twig", "C:\\xampp\\phpMyAdmin\\templates\\table\\relation\\internal_relational_row.twig");
    }
}
