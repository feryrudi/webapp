			<h1><?=$title;?></h1>

			<!-- Table (TABLE) -->
			<br />
			<?php
			   echo anchor(site_url('backend/employees/form/insert/'),'Add',' class="input-submit"');	
			?>
			<br />
			<table>
				<tr>
					<th>No</th>
					<th>Actions</th>					    
				    <th>Employees Name</th>
				    <th>Title</th>				   				   
				</tr>
				<?php
					$no=0;
					foreach($array_employees as $row):	
					$id=$row->EmployeeID;	
					$no++;	
					$css=($no%2==1)? '' : 'class="bg"';
				?>
				<tr <?=$css;?> >
					<td><?=$no;?>.</td>
				    <td><?=anchor(site_url('backend/employees/process/delete/'.$id),'[delete]').' | '.
				    	   anchor(site_url('backend/employees/form/update/'.$id),'[update]');?></td>				    
				    <td><?=$row->FirstName;?></td>
				    <td><?=$row->Title;?></td>				    
				</tr>
				<?php  endforeach; ?>
			</table>

		