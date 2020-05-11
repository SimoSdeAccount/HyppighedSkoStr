<?php?>
<form method="POST" action="index.php">
    <table id="dataFormTable">
        <tr>
            <th id=dataFormTableHeader" colspan="2">
                <h4 id="dataformTableH4">Registrer skostørrelse</h4>
            </th>
        </tr>
        <tr class="dataFormTableTrs">
            <td class="dataFormTableTds">
                Navn: 
            </td>
            <td class="dataFormTableTds">
                <input class="dataFormInputs" type="text" name="navn" value="" /> 
            </td>
        </tr>
        <tr class="dataFormTableTrs">
            <td class="dataFormTableTds">
                Email: 
            </td>
            <td class="dataFormTableTds">
                <input class="dataFormInputs" type="text" name="email" value="" /> 
            </td>
        </tr>
        <tr class="dataFormTableTrs">
            <td class="dataFormTableTds">
                Alder: 
            </td>
            <td class="dataFormTableTds">
                <input class="dataFormInputs" type="text" name="alder" value="" /> 
            </td>
        </tr>
        <tr class="dataFormTableTrs">
            <td class="dataFormTableTds">
                Skostørrelse: 
            </td>
            <td class="dataFormTableTds">
                <input  class="dataFormInputs" type="text" name="skostoerrelse" value="" /> 
            </td>
        </tr>
        <tr class="dataFormTableTrs">
            <td colspan="2" id="dataFormTableFooter" class="dataFormTableTds">
                <input id="registrerBtn" type="submit" name="skodataSubmit" value="registrer" />  
            </td>
        </tr>
    </table>
</form>


