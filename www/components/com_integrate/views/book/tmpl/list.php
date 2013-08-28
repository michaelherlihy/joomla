<table cellpadding="0" cellspacing="0" width="100%" class="table table-striped">
	<thead>
		<tr>
			<th>ff<?php echo JText::_('COM_LENDR_DETAILS'); ?></th>
			<th>ff<?php echo JText::_('COM_LENDR_STATUS'); ?></th>
			<th>ff<?php echo JText::_('COM_LENDR_ACTIONS'); ?></th>
		</tr>
	</thead>
	<tbody id="book-list">
		<?php for($i=0, $n = count($this->books);$i<$n;$i++) { 
		        $this->_bookListView->book = $this->books[$i];
		        $this->_bookListView->type = 'book';
		        echo $this->_bookListView->render();
		} ?>
	</tbody>
</table>