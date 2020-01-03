
function Row() {

	var options = {};
	var data = {};
	var editable = false;
	var changed = false;

	/**
	 *
	 */
	this.init = function(dataObj, opts) {
		data = dataObj;
		options = opts;
		this.render();
	};

	/**
	 * @returns {string}
	 */
	this.render = function() {
		var html = '<tr>';
		// fill with data
		for (var key in data) {
			html += '<td>' + data[key] + '</td>'
		}
		// create actions buttons
		if (!editable) {
			html += this.createActionsNormalMode();
		} else {
			html += this.createActionsEditionMode();
		}
		html += '</tr>';
		return html;
	};

	/**
	 * @returns {string}
	 */
	this.createActionsNormalMode = function() {
		var html = '<td>';
		html += '<i class="lyre-btn lyre-btn-edit fa fa-edit">Edit</i>';
		html += '&nbsp;|&nbsp;';
		html += '<i class="lyre-btn lyre-btn-delete fa fa-trash">Delete</i>';
		html += '</td>';
		return html;
	};

	/**
	 * @returns {string}
	 */
	this.createActionsEditionMode = function() {
		var html = '<td>';
		if (changed)
			html += '<i class="lyre-btn lyre-btn-save fa fa-save">Edit</i>';
		else
			html += '<i class="lyre-btn lyre-btn-save fa fa-times">Quit edit mode</i>';
		html += '</td>';
		return html;
	};

}