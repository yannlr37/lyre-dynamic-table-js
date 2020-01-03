
function Table() {

	var $wrapper = null;
	var options = {};
	var header = null;
	var footer = null;
	var pagination = null;
	var panel = null;
	var rows = [];
	var data = [];

	/**
	 *
	 */
	this.init = function(container) {
		$wrapper = $(container);
		this.loadData();
	};

	/**
	 *
	 */
	this.loadData = function() {
		var self = this;
		$.ajax({
			url: 'data.json',
			method: 'get',
			data: {},
			dataType: 'json'
		}).done(function(response) {
			data = response;
			console.log(response);
			self.render();
		}).fail(function(error) {
			console.log(error);
		}).always(function() {
			//console.log('Données récupérées');
		});
	};

	/**
	 *
	 */
	this.render = function() {
		var self = this;
		var html = '<table>';
		for (var i = 0; i< data.length; i++) {
			var row = new Row();
			row.init(data[i], {});
			rows.push(row);
		}
		html += self.generateHeader();
		html += self.generateBody();
		html += '</table>';
		$wrapper.append(html);
	};

	/**
	 * @returns {string}
	 */
	this.generateHeader = function() {
		var html = '<thead>';
		var firstRow = rows[0];
		for (var key in firstRow) {
			html += '<th>' + key + '</th>';
		}
		html += '</thead>';
		return html;
	};

	/**
	 * @returns {string}
	 */
	this.generateBody = function() {
		var html = '<tbody>';
		for (var i = 0; i< rows.length; i++) {
			var row = rows[i];
			html += row.render();
		}
		html += '</tbody>';
		return html;
	};
}