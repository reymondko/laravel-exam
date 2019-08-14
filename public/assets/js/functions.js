
	document.querySelectorAll('#UsersTable tr').forEach(e => e.addEventListener("dblclick", function() {
		
    	console.log("clicked "+this.id); 
    	document.getElementById('taskListContainer').src = "tasklist/"+this.id;
   
    	document.getElementById("frameholder").style.display = "block";
    }));	
    

	