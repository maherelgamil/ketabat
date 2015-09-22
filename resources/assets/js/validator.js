function changeInput(selector, type, message) {
	reset(selector);
	$('[data-toggle="popover"]').popover();
	if (message != "")
	{
		$(selector).attr({
			'data-container': "body",
			'data-toggle': "popover",
			'data-placement': "right",
			'data-content': message
		});
	}

	if (type == 'success') 
	{
		$(selector).parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="' + selector + 'Status"></span>');
		$(selector).parent().addClass('has-success has-feedback');
		$(selector).popover('destroy');
	}
	else if (type == 'warning') 
	{
		$(selector).parent().append('<span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span><span id="' + selector + 'Status"></span>');
		$(selector).parent().addClass('has-warning has-feedback');
		$(selector).popover('show');
	}
	else if (type == 'error')
	{
		$(selector).parent().append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span id="' + selector + 'Status"></span>');
		$(selector).parent().addClass('has-error has-feedback');
		$(selector).popover('show');
	}
	else if (type == 'wait')
	{
		$(selector).parent().append('<span class="form-control-feedback" aria-hidden="true"><i class="fa fa-circle-o-notch fa-spin fa-fw"></i></span><span id="' + selector + 'Status"></span>');
		$(selector).parent().addClass('has-warning has-feedback');
		$(selector).popover('show');
	}

}

function reset(selector)
{
	$(selector).parent().find('.form-control-feedback').remove();
	$(selector).parent().removeClass('has-error has-warning has-success');
}