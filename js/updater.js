$(document).ready(function() {
	$.ajax({
		url: 'updater/count',
		dataType: 'json',
		success: function(data) {
			updateCompanies(0, data.companies, 20);
			updateBranches(0, data.branches, 20);
		}
	});
});

function updateCompanies(offset, total, step) {
	$.ajax({
		url: 'updater/companies/' + step + '/' + offset,
		success: function() {
			if(offset <= total) {
				updateCompanies(offset + step, total, step);
			}
		},
		context: this
	});
}

function updateBranches(offset, total, step) {
	$.ajax({
		url: 'updater/branches/' + step + '/' + offset,
		success: function() {
			if(offset <= total) {
				updateBranches(offset + step, total, step);
			}
		},
		context: this
	});
}