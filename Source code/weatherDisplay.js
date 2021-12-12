//it declares and intialises the daily forcast data for stoke+london and the forcast data for stoke+london as JSON parsed from string.
var dailyStoke = JSON.parse(dailydata_stoke);
var dailyLondon = JSON.parse(dailydata_london);
var forecast = JSON.parse(forecast_stoke);
var londonForecast = JSON.parse(forecast_london);
//the daily data label elements are gotten via their id and have the base data inserted into them
document.getElementById('lon').innerHTML = dailyStoke.coord.lon;
document.getElementById('lat').innerHTML = dailyStoke.coord.lat;
document.getElementById('loc').innerHTML = "Stoke";
document.getElementById('con1').innerHTML = "Temperature: " + dailyStoke.main.temp;
document.getElementById('con2').innerHTML = "Wind Speed:  " + dailyStoke.wind.speed;
document.getElementById('con3').innerHTML = "Humidity:    " + dailyStoke.main.humidity;

//sets the base state for the data and conditions
var dataState = 0;
var condState = 1;
//maps and returns each data item from the specified JSON data item for the first one its forcast.list.dt_txt this makes an array of all the dt_txt values
var dateList = forecast.list.map(list => {
    return list.dt_txt;
});
var temperatureList = forecast.list.map(list => {
    return list.main.temp;
});

var windList = forecast.list.map(list => {
    return list.wind.speed;
});

this.humidityList = forecast.list.map(list => {
    return list.main.humidity;
});
var londonDataList = londonForecast.list.map(list => {
    return list.dt_txt;
});
var londonTemperatureList = londonForecast.list.map(list => {
    return list.main.temp;
});
var londonWindList = londonForecast.list.map(list => {
    return list.wind.speed;
});
var longdonHumidityList = londonForecast.list.map(list => {
    return list.main.humidity;
});
//puts all of the arrays created from mapping the JSON into an array called forecastArray
var forecastArray = [
    [dateList, temperatureList, windList, humidityList],
    [londonDataList, londonTemperatureList, londonWindList, longdonHumidityList]
];

//the dropdown menus are gotten via their id and assigned to a variable
var selectCondition = document.getElementById('conditions');
var selectType = document.getElementById('type');
var selectData = document.getElementById('data');
var selectFontSize = document.getElementById('fontSize');
var selectLondonColour = document.getElementById('londonColour');
var selectStokeColour = document.getElementById('stokeColour');
//the context of the chart is gotten and assigned to the ctx variable
var ctx = document.getElementById('Chart').getContext('2d');
//the JSON for the chart is assigned to the myData variable so it can be edited at a later date
var myData = {
    labels: this.dateList,
    datasets: [{
        label: "Temperature",
        backgroundColor: "blue",
        borderColor: "blue",
        fill: false,
        data: this.temperatureList
    }]
};
//the default global font size and colour is set
Chart.defaults.font.size = 16;
Chart.defaults.color = '#3BBA9C';
//the chart is created with the base data
this.chart = new Chart(ctx, {
    type: "line",
    data: myData
});
//this is the function that is called when the dropdown menus are changed
function dropdownChange(e) {

    if (e.srcElement.id == "type") { //if the drop down changed's id is type then destroy the chart, reasign the chart variable with the new chart JSON definition
        chart.destroy();
        chart = new Chart(ctx, {
            type: e.srcElement.value.toLowerCase(),
            data: myData
        });
    } else if (e.srcElement.id == "conditions") { //if the drop down changed's id is conditions check if the data isnt both(3) else it is both
        if (dataState != 3) {
            //the condition state is assigned with the selected items index in the dropdown, the data is assigned using the dataState+condState as the index for forecastArray
            //,the labels are then set to the dates for the specific dataState your in and finally the label itself is changed to the value of the dropdown
            condState = e.srcElement.selectedIndex + 1;
            chart.data.datasets[0].data = forecastArray[dataState][condState];
            chart.data.labels = forecastArray[dataState][0];
            chart.data.datasets[0].label = e.srcElement.value;
        } else {
            //the condition state is updated with the selected items index in the dropdown, the condition and date data for 0/1+condState is assigned into index 0(stoke) 
            //then index 1(london) of the dataset and finally the labels are assigned to differenciate the two data sources e.g. one london one stoke
            condState = e.srcElement.selectedIndex + 1;
            chart.data.datasets[0].data = forecastArray[0][condState];
            chart.data.datasets[1].data = forecastArray[1][condState];
            chart.data.datasets[0].label = "Stoke " + e.srcElement.value;
            chart.data.datasets[1].label = "London " + e.srcElement.value;
        }
        //finally the chart is updated to reflect any changes
        chart.update();
    } else if (e.srcElement.id == "data") { //if the drop down changed's id is data check the dataState coming in(was it previously both), check if the index of the item in the 
        //dropdown+1 not the both index and if not it going to both
        if (dataState == 3) {
            //pops the extra dataset of the chart and reassigns the label for the original dataset for a single data source chart
            chart.data.datasets.pop();
            chart.data.datasets[0].label = selectCondition.value;
        }
        if (e.srcElement.selectedIndex + 1 != 3) {
            //the dataState is assigned, changed chart data using dataState(just changed from stoke or london) and condState as indexes and changed to the labels(dates) for the chart
            dataState = e.srcElement.selectedIndex;
            chart.data.datasets[0].data = forecastArray[dataState][condState];
            chart.data.labels = forecastArray[dataState][0];
            if (dataState == 0) {
                //if its dataState is stoke then change the colour to the colour selected in the stoke colour dropdown
                chart.data.datasets[0].borderColor = selectStokeColour.value;
                chart.data.datasets[0].backgroundColor = selectStokeColour.value;
                //resets all of the daily data on the side bar for Stoke data
                document.getElementById('con1').innerHTML = "Temperature: " + dailyStoke.main.temp;
                document.getElementById('con2').innerHTML = "Wind Speed:  " + dailyStoke.wind.speed;
                document.getElementById('con3').innerHTML = "Humidity:    " + dailyStoke.main.humidity;
                document.getElementById('lon').innerHTML = dailyStoke.coord.lon;
                document.getElementById('lat').innerHTML = dailyStoke.coord.lat;
                document.getElementById('loc').innerHTML = "Stoke";
            } else if (dataState == 1) {
                //if its dataState is london then change the colour to the colour selected in the london colour dropdown
                chart.data.datasets[0].borderColor = selectLondonColour.value;
                chart.data.datasets[0].backgroundColor = selectLondonColour.value;
                //resets all of the daily data on the side bar for London data
                document.getElementById('con1').innerHTML = "Temperature: " + dailyLondon.main.temp;
                document.getElementById('con2').innerHTML = "Wind Speed:  " + dailyLondon.wind.speed;
                document.getElementById('con3').innerHTML = "Humidity:    " + dailyLondon.main.humidity;
                document.getElementById('lon').innerHTML = dailyLondon.coord.lon;
                document.getElementById('lat').innerHTML = dailyLondon.coord.lat;
                document.getElementById('loc').innerHTML = "London";
            }
        } else {
            //the data is changing into the both so you need to assign the data, label and colours for stoke into index 0. Push the london dataset onto the chart and change the data state to 3
            chart.data.datasets[0].data = forecastArray[0][condState];
            chart.data.datasets[0].label = "Stoke " + selectCondition.value;
            chart.data.datasets[0].borderColor = selectStokeColour.value;
            chart.data.datasets[0].backgroundColor = selectStokeColour.value;
            chart.data.datasets.push({
                label: "London " + selectCondition.value,
                backgroundColor: selectLondonColour.value,
                borderColor: selectLondonColour.value,
                fill: false,
                data: forecastArray[1][condState]
            });
            dataState = 3;
        }
        //finally the chart is updated to reflect any changes
        chart.update();
    } else if (e.srcElement.id == "londonColour") { //if the drop down changed's id is londonColour then check the if the data is london/stoke or london+stoke 
        if (dataState == 1) {
            //if its dataState is london then change the colour to the colour selected in the london colour dropdown
            chart.data.datasets[0].borderColor = selectLondonColour.value;
            chart.data.datasets[0].backgroundColor = selectLondonColour.value;
        } else if (dataState == 3) {
            //if its dataState is stoke+london then change the london colour to the colour selected in the london colour dropdown
            chart.data.datasets[1].borderColor = selectLondonColour.value;
            chart.data.datasets[1].backgroundColor = selectLondonColour.value;
        }
        chart.update();
    } else if (e.srcElement.id == "stokeColour") { //if the drop down changed's id is stokeColour then check the if the data is london/stoke or london+stoke 
        if (dataState == 0) {
            //if its dataState is stoke then change the colour to the colour selected in the stoke colour dropdown
            chart.data.datasets[0].borderColor = selectStokeColour.value;
            chart.data.datasets[0].backgroundColor = selectStokeColour.value;
        } else if (dataState == 3) {
            //if its dataState is stoke+london then change the london colour to the colour selected in the london colour dropdown
            chart.data.datasets[0].borderColor = selectStokeColour.value;
            chart.data.datasets[0].backgroundColor = selectStokeColour.value;
        }
        chart.update();
    } else if (e.srcElement.id == "fontSize") { //if the drop down changed's id is fontSize then change the font size to the value of the fontsize dropdown and update the chart
        Chart.defaults.font.size = selectFontSize.value;
        chart.update();
    }
}
//attach change event listeners to every dropdown menu that triggers the dropdownChange method
selectStokeColour.addEventListener('change', dropdownChange);
selectLondonColour.addEventListener('change', dropdownChange);
selectType.addEventListener('change', dropdownChange);
selectData.addEventListener('change', dropdownChange);
selectCondition.addEventListener('change', dropdownChange);
selectFontSize.addEventListener('change', dropdownChange);