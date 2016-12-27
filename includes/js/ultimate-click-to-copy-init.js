(function(){
	var clipboard = new Clipboard('#copy-button');

	clipboard.on('success', function(event) {
		event.trigger.innerHTML = '<i class="fa fa-check fa-fw"></i> Copied';
		/*window.setTimeout(function() {
        	event.trigger.innerHTML = '<i class="fa fa-copy fa-fw"></i> Copy';
    	}, 2000);*/

	});

	clipboard.on('error', function(event) {
		event.trigger.innerHTML = '<small><i class="fa fa-info fa-fw"></i> Cmd + C to copy</small>';
		/*window.setTimeout(function() {
        	event.trigger.textContent = 'Copy';
    	}, 2000);*/
	});
})();