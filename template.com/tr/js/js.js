	function checkUncheckAll(theElement) {
     var theForm = theElement.form, z = 0;
	 for(z=0; z<theForm.length;z++){
      if(theForm[z].type == 'checkbox' && theForm[z].name != 'checkall'){
	  theForm[z].checked = theElement.checked;
	  }
     }
    }

function checkUncheckSome(controller,theElements) {
	//Programmed by Shawn Olson
	//Copyright (c) 2006-2011
	//Updated on April 2, 2011
	//Permission to use this function provided that it always includes this credit text
	//  http://www.shawnolson.net
	//Find more JavaScripts at http://www.shawnolson.net/topics/Javascript/

	//theElements is an array of objects designated as a comma separated list of their IDs
	//If an element in theElements is not a checkbox, then it is assumed
	//that the function is recursive for that object and will check/uncheck
	//all checkboxes contained in that element

     var formElements = theElements.split(',');
	 var theController = document.getElementById(controller);
	 for(var z=0; z<formElements.length;z++){
	  theItem = document.getElementById(formElements[z]);
	  if(theItem.type && theItem.type=='checkbox'){

	    	theItem.checked=theController.checked;

	  } else {
	  	  theInputs = theItem.getElementsByTagName('input');
	  for(var y=0; y<theInputs.length; y++){
	  if(theInputs[y].type == 'checkbox' && theInputs[y].id != theController.id){
	     theInputs[y].checked = theController.checked;
	    }
	  }
	  }
    }
}

