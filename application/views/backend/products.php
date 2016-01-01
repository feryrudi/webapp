			<h1><?=$title;?></h1>

			<!-- Table (TABLE) -->
			<br />
			<?php
			   echo anchor(site_url('backend/products/form/insert/'),'Add',' class="input-submit"');	
			?>
			<br />
			<table>
				<tr>
					<th>No</th>
					<th>Actions</th>					    
				    <th>products Name</th>
				    <th>QuantityPerUnit</th>				   				   
				</tr>
				<?php
					$no=0;
					foreach($array_products as $row):	
					$id=$row->ProductID;	
					$no++;	
					$css=($no%2==1)? '' : 'class="bg"';
				?>
				<tr <?=$css;?> >
					<td><?=$no;?>.</td>
				    <td><?=anchor(site_url('backend/products/process/delete/'.$id),'[delete]').' | '.
				    	   anchor(site_url('backend/products/form/update/'.$id),'[update]');?></td>				    
				    <td><?=$row->ProductName;?></td>
				    <td><?=$row->QuantityPerUnit;?></td>				    
				</tr>
				<?php  endforeach; ?>
			</table>

		