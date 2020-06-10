function showModal() {
	let timerTime = 0,
		popup = document.getElementById('popup-newsletter'),
		popupClose = document.getElementsByClassName('popup__close')[0];

	window.addEventListener('DOMContentLoaded', () => {
		let timer = setInterval(() => {
			timerTime += 1;
			
			if (timerTime == 3) {
				clearInterval(timer);
	
				popup.classList.add('active');

				popupClose.addEventListener('click', () => {
					popup.classList.remove('active');
				});
			}
		}, 1000);
	});
}

checkCookie();

function checkCookie() {
	let cookie = getCookie("newsletter-popup") || false;
	
	if (!cookie) {
		showModal();
		setCookie();
	}
}

function setCookie() {
	let currentDate = new Date();

	currentDate.setTime(currentDate.getTime() + (84600 * 1000 * 30));
	document.cookie = "newsletter-popup=true; expires=" + currentDate + "";
}

function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}