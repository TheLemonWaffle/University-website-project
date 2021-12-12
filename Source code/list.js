//defines variables to be used later in the script
var rowData;
var htmlTable;
var cellData;
//when the page is loaded and a click is performed on the load button it starts using ajax to asynchronously load the data from a csv into a html table
$(document).ready(function() {
    $('#loadBtn').click(function() {
        $.ajax({
            url: "weatherdata.csv",
            dataType: "text",
            success: function(data) {
                //the text from the file is split at every new line and reassigned into the rowData array which stores each record
                rowData = data.split("\n");
                //the htmlTable string stores the start of the html tables aswell as the table headers
                htmlTable = '<table><tr><th>City</th><th>Country</th><th>Date</th></tr><tr>';
                //loops for every row stored in rowData
                for (var count = 0; count < rowData.length; count++) {
                    //the specific row for this iteration is split at the commas and assigned to cellData array which stores each item of data
                    cellData = rowData[count].split(",");
                    //starts the table row
                    htmlTable += '<tr>';
                    //loops for every data item stored in cellData
                    for (var cellCount = 0; cellCount < cellData.length; cellCount++) {
                        //this adds the relevant data from cells 0-2 or 1-3 to the htmlTable string. 
                        if (cellCount == 0) {
                            //The first data item(city) is linked to the display.php file with the index passed as a url parameter(url query) so the user can access a single record
                            htmlTable += '<td><a href="display.php?count=' + count + '">' + cellData[cellCount] + '</a></td>'
                        } else if (cellCount == 1) {
                            htmlTable += '<td>' + cellData[cellCount] + '</td>';
                        } else if (cellCount == 2) {
                            htmlTable += '<td>' + cellData[cellCount] + '</td>';
                        }
                    }
                    //end the table row
                    htmlTable += '</tr>';
                }
                //ends the table 
                htmlTable += '</table>';
                //adds the htmlTable string that the loop has created from the csv file to the element with the id tableContainer's inner html(basically adding a html table inside)
                $('#tableContainer').html(htmlTable);
            }
        })
    })
});