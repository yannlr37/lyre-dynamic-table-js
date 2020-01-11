
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
	 * @returns {Array}
	 */
	this.getData = function() {
		return data;
	};

	/**
	 *
	 */
	this.loadData = function() {
		var self = this;
		$.ajax({
			url: 'data.json', // TODO: replace by php page in server-cide mode
			method: 'get',
			data: {}, // TODO: add filters here
			dataType: 'json'
		}).done(function(response) {
			data = response;
			self.fillData();
			self.render();
			self.bindEvents();
		}).fail(function(error) {
			console.log(error);
		}).always(function() {
			console.log(data); // TODO: remove
		});
	};

	/**
	 *
	 */
	this.bindEvents = function() {
		var self = this;
		// switch a line into edition mode
		$('body').on('click', '.lyre-btn-edit', function(event) {
			var index = $('body .lyre-table .lyre-btn-edit').index(this);
			var row = rows[index];
			$(this).closest('tr').find('.lyre-cell').each(function(index, element) {
				element.innerHTML = '<input type="text" value="' + element.innerText + '">';
			});

			$(this).closest('tr').find('.lyre-actions').each(function(index, element) {
				$(this).html(row.createActionsEditionMode());
			});
		});
		// quit edition mode
		$('body').on('click', '.lyre-btn-quit', function(event) {
			var index = $('body .lyre-table .lyre-btn-edit').index(this);
			var row = rows[index];
			$(this).closest('tr').find('.lyre-cell').each(function(index, element) {
				element.innerHTML = '<input type="text" value="' + element.innerText + '">';
			});

			$(this).closest('tr').find('.lyre-actions').each(function(index, element) {
				$(this).html(row.createActionsEditionMode());
			});
		});
	};

	/**
	 *
	 */
	this.fillData = function() {
		rows = [];
		for (var i = 0; i< data.length; i++) {
			var row = new Row();
			row.init(data[i], {});
			rows.push(row);
		}
	};

	/**
	 *
	 */
	this.render = function() {
		var self = this;
		var html = '<table class="lyre-table">';
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
		var firstRow = rows[0].getData();
		for (var key in firstRow) {
			html += '<th>' + key + '</th>';
		}
		html += '<th></th>'; // action column
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