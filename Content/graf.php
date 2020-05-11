<table id="histogramTable">
    <tr>
       <th id="histoGramTableHeader">
            <input type="button" value="Vis hyppighed" onclick="grafVaelger('Hyppighed')" />
             <input type="button" value="Vis frekvens" onclick="grafVaelger('Frekvens')" />
        </th>
    </tr>
    <tr>
        <td id="grafkage">
            <img id="grafBillede" src="Billeder/hyppighedgraf.php" alt="Hyppigheder" /> 
        </td>
    </tr>
</table>
<script> 
function grafVaelger(graf) 
{
    if(graf === "Hyppighed") 
    {
        document.getElementById("grafBillede").src = "Billeder/hyppighedgraf.php";
    }
    else if(graf === "Frekvens")
    {
        document.getElementById("grafBillede").src = "Billeder/frekvensgraf.php";
    }
}
</script>

