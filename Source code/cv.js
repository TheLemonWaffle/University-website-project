//declare variables to add the list items html to 
var year1List;
var year2List;
//initialise the year of study dropdown variable and the modules list variable
var selectYearOfStudy = document.getElementById('yearOfStudy');
var list = document.getElementById('moduleList');
//assign the year 1 and year 2 list item html
year1List = '<li><a href="https://www.keele.ac.uk/catalogue/current/csc-10024.htm">CSC-10024 - Programming I - Programming Fundamentals</a></li>';
year1List += '<li><a href="https://www.keele.ac.uk/catalogue/current/csc-10029.htm">CSC-10029 - Fundamentals of Computing</a></li>';
year1List += '<li><a href="https://www.keele.ac.uk/catalogue/current/csc-10026.htm">CSC-10026 - Computer Animation and Multimedia</a></li>';
year1List += '<li><a href="https://www.keele.ac.uk/catalogue/current/csc-10035.htm">CSC-10035 - Natural Computation</a></li>';
year1List += '<li><a href="https://www.keele.ac.uk/catalogue/current/csc-10040.htm">CSC-10040 - Introduction to Interaction Design</a></li>';
year1List += '<li><a href="https://www.keele.ac.uk/catalogue/current/csc-10056.htm">CSC-10056 - Communication, Confidence and Competence</a></li>';
year1List += '<li><a href="https://www.keele.ac.uk/catalogue/current/csc-10025.htm">CSC-10025 - Cybercrime</a></li>';
year1List += '<li><a href="https://www.keele.ac.uk/catalogue/current/csc-10033.htm">CSC-10033 - Systems and Architecture</a></li>';
year2List = '<li><a href="https://www.keele.ac.uk/catalogue/current/csc-20021.htm">CSC-20021 - Web Technologies</a></li>';
year2List += '<li><a href="https://www.keele.ac.uk/catalogue/current/csc-20037.htm">CSC-20037 - Programming II - Data Structures and Algorithms</a></li>';
year2List += '<li><a href="https://www.keele.ac.uk/catalogue/current/csc-20038.htm">CSC-20038 - Mobile Application Development</a></li>';
//sets the inner html of the list to the year1 list items
list.innerHTML = year1List;
//when the year of study dropdown is changed it checks if 1st year or 2nd year was selected the sets the innerHTML to the relevant items string
function yearChange(e) {
    if (e.srcElement.value == 1) {
        list.innerHTML = year1List;
    } else {
        list.innerHTML = year2List;
    }
}
//attaches a change event listener to the dropdown menu to call the yearChange function
selectYearOfStudy.addEventListener('change', yearChange);