/* ======= DEMO THEME CONFIG (Remove This File On Production Site) ====== */

const configTrigger = document.getElementById('config-trigger');
const configClose = document.getElementById('config-close');
const configPanel = document.getElementById('config-panel');
const colorOptionsContainer = document.getElementById('color-options');
const colorOptions = document.querySelectorAll('#color-options a');
const themeStyleSheet = document.getElementById('theme-style');
const themeLogoImage = document.getElementById('site-logo');



configTrigger.addEventListener('click', (e) => {
	
	e.preventDefault();
	
	console.log('clicked');
	
	if (configPanel.classList.contains('config-panel-open')) {		
        configPanel.classList.remove('config-panel-open');
        configPanel.classList.add('config-panel-hide');

    }
    else {      	    			
        configPanel.classList.remove('config-panel-hide');
        configPanel.classList.add('config-panel-open');  
    }
	
	
});


configClose.addEventListener('click', (e) => {
	
	e.preventDefault();
	configPanel.classList.remove('config-panel-open');
    configPanel.classList.add('config-panel-hide');
	
});



colorOptions.forEach((colorOption) => {	
	
	
	colorOption.addEventListener('click', (e) => {
		
		e.preventDefault();
		
		
		let style = colorOption.getAttribute('data-style');
		let logo = colorOption.getAttribute('data-logo');
		
		themeStyleSheet.setAttribute('href', style);
		themeLogoImage.setAttribute('src', logo);
		
		//$('#logo').attr('src', $logoImage);		
		
		
	    for (let siblingColorOption of colorOptionsContainer.children) {
	        siblingColorOption.classList.remove('active');
	    }
	    
	    colorOption.parentElement.classList.add('active');

	    
	});
	
});


