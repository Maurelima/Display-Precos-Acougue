var tableData = [{id:1,first_name:"Zechariah"},
{id:2,first_name:"Ivett"},
{id:3,first_name:"Tremayne"},
{id:4,first_name:"Thibaud"},
{id:5,first_name:"Patrica"},
{id:6,first_name:"Carmina"},
{id:7,first_name:"Feliks"},
{id:8,first_name:"Beryle"},
{id:9,first_name:"Blondy"},
{id:10,first_name:"Humbert"},
{id:11,first_name:"Maighdiln"},
{id:12,first_name:"Beret"},
{id:13,first_name:"Eugenio"},
{id:14,first_name:"Kellen"},
{id:15,first_name:"Urson"},
{id:16,first_name:"Huntley"},
{id:17,first_name:"Iolanthe"},
{id:18,first_name:"Bernardo"},
{id:19,first_name:"Park"},
{id:20,first_name:"Ame"}];

var maxItems = 5;
var table = document.getElementsByTagName('tbody')[0];
var tableContainer = document.getElementById('products');
var activePage = 1;
var totalPages = Math.ceil(tableData.length / maxItems);
var myInterval;

// insert left arrow
var leftArrow = document.createElement('BUTTON');
var leftArrowContent = document.createTextNode('PREV');
leftArrow.appendChild(leftArrowContent);
tableContainer.appendChild(leftArrow);
leftArrow.addEventListener('click', function(){
  // check if we got to the last page
  if (activePage === 1) {
    activePage = totalPages;
  } else {
    activePage--;
  }

  insertTable();
});

// insert right arrow
var rightArrow = document.createElement('BUTTON');
var rightArrowContent = document.createTextNode('NEXT');
rightArrow.appendChild(rightArrowContent);
tableContainer.appendChild(rightArrow);
rightArrow.addEventListener('click', function(){
  // check if we got to the last page
  if (activePage === totalPages) {
    activePage = 1;
  } else {
    activePage++;
  }

  insertTable();

  
  clearInterval(myInterval);
  myInterval = setInterval(function(){
    rightArrow.click();
  }, 10000);
});

// insert page counter
var pageCounter = document.createElement('SPAN');
tableContainer.appendChild(pageCounter);

// automate the switch interval
myInterval = setInterval(function(){
  rightArrow.click();
}, 10000);

function insertTable() {
	var slicedData = tableData.slice((activePage - 1) * maxItems, activePage * maxItems);

	// empty the previous table
	table.innerHTML = '';

	// insert tr/td's
	for (var index = 0; index < slicedData.length; index++) {
		var tableTr = document.createElement('TR'); 
		table.appendChild(tableTr);

		for (var key in slicedData[index]) {
			var tableTd = document.createElement('TD');
			var tdContent = document.createTextNode(slicedData[index][key]);
			tableTd.appendChild(tdContent)
			tableTr.appendChild(tableTd);
		}
	}

	// update page counter content
	var pageCounterContent = document.createTextNode('Page ' + activePage + '/' + totalPages);
	pageCounter.innerHTML = '';
	pageCounter.appendChild(pageCounterContent);
}

insertTable(tableData);