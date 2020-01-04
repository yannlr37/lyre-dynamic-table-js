
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
	 * @returns {*}
	 */
	this.getData = function() {
		return data;
	};

	/**
	 * @returns {string}
	 */
	this.render = function() {
		var html = '<tr class="lyre-line">';
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
		var html = '<td class="text-center">';
		html += '<i class="lyre-btn lyre-btn-edit fa fa-edit text-blue" title="Edit"></i>';
		html += '&nbsp;|&nbsp;';
		html += '<i class="lyre-btn lyre-btn-delete fa fa-trash text-red" title="Delete"></i>';
		html += '</td>';
		return html;
	};

	/**
	 * @returns {string}
	 */
	this.createActionsEditionMode = function() {
		var html = '<td>';
		if (changed)
			html += '<i class="lyre-btn lyre-btn-save fa fa-save text-green" title="Save"></i>';
		else
			html += '<i class="lyre-btn lyre-btn-save fa fa-times text-red" title="Quit edition mode"></i>';
		html += '</td>';
		return html;
	};

}