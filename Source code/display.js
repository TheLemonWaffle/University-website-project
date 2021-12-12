//defines variables to be used later in the script
var rowData;
var htmlTable;
var cellData;
var pageURL;
var urlVariable;
//when the page is loaded it starts using ajax to asynchronously load the specific record from the url parameter into a html table
$(document).ready(function() {
    $requested = $_GET['count'];
    $handle = fopen("weatherdata.csv", "r")
    while (($buffer = fgets($handle))) {
        $rows = explode('\n', $buffer);
        $cells = explode(',', $rows)
    }
    $.ajax({
        url: "weatherdata.csv",
        dataType: "text",
        success: function(data) {
            //the page url is assigned to the pageURL variable
            pageURL = window.location.search.substring(1);
            //there is only 1 variable that this needs and it doesnt need to be specific so it just splits the string by the = symbol so the second element of urlVariable will be the value
            urlVariable = pageURL.split('=');
            //the text from the file is split at every new line and reassigned into the rowData array which stores each record
            rowData = data.split("\n");
            //the htmlTable string stores the start of the html tables aswell as the table headers
            htmlTable = '<table><tr><th>City</th><th>Country</th><th>Date</th><th>Temperature</th><th>Humidity</th><th>Wind speed</th></tr><tr>';
            //the specific row defined by the value from the url parameter is split at the commas and assigned to cellData array which stores each item of data
            cellData = rowData[urlVariable[1]].split(",");
            //starts the row
            htmlTable += '<tr>';
            //loops for every data item stored in cellData
            for (var cellCount = 0; cellCount < cellData.length; cellCount++) {
                htmlTable += '<td>' + cellData[cellCount] + '</td>';
            }
            //end the table row
            htmlTable += '</tr>';
            //ends the table 
            htmlTable += '</table>';
            //adds the htmlTable string that the loop has created from the csv file to the element with the id tableContainer's inner html(basically adding a html table inside)
            $('#tableContainer').html(htmlTable);
        }
    })
});