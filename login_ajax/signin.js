var btn_sign = document.querySelector('#signin');

btn_sign.onclick = function(){
	var xml = new XMLHttpRequest();
	var username = document.querySelector('#username').value;
	var password = document.querySelector('#password').value;

    xml.open('POST', 'signin.php', true);
    xml.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xml.send('username=' + username + '&password=' + password);

    xml.onreadystatechange = function(){
    	if (xml.readyState === 4 && xml.status === 200) {
    		document.querySelector('#showInfo').innerHTML = xml.responseText;
    	};
    };
};