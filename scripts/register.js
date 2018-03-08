	function agree(){
		if(document.getElementById('cb').checked)
			document.getElementById('register').disabled=false;
		else
			document.getElementById('register').disabled='disabled';  
	}

	function showprotocol(){
		var protocol = document.getElementById('protocol');
		protocol.style.display='block';
	}

	function hideprotocol(){
		var protocol = document.getElementById('protocol');
		protocol.style.display='none';
		document.getElementById('cb').checked=true;
		document.getElementById('register').disabled=false;
	}
