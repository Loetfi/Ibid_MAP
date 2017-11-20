 <?php 
 $url="http://www.ibid.co.id/api/map/get_jadwal.php";
							
							$content=file_get_contents($url);  // add your url which contains json file
							$json = json_decode($content, true);
							$count=count($json);
								?><table><?php
										for($i=0;$i<$count;$i++)
										{
											//$string = $json[$i]['kode_jadwal'];
											//$pieces = explode(' ', $string);
											//$kt=preg_replace("/[^a-zA-Z]+/", "", $pieces);
											//$kota = array_pop($kt);	
										?>
											<tr>
											  <td align="center" vertical-align="middle"><?php echo $json[$i]['schedule_date'];?></td>
											  <td align="center" valign="middle"><?php echo $json[$i]['schedule_kota'];?><br><?php echo $json[$i]['schedule_location'];?></td>
											  <td align="center" valign="middle"><?php echo $json[$i]['schedule_openhouse_start'];?><br><?php echo $json[$i]['schedule_openhouse_location'];?></td>
											  <td align="center" valign="middle"><strong><?php echo $json[$i]['jml_lot'];?></strong><br><a href="auction_schedule_list.php?id=<?php echo $json[$i]['schedule_id'];?>&location=<?php echo $json[$i]['schedule_kota'];?>&tgl=<?php echo $json[$i]['schedule_date'];?>&lot=<?php echo $json[$i]['jml_lot'];?>&update=<?php echo $json[$i]['date_edit'];?>&loc=<?php echo $json[$i]['schedule_location'];?>&mulai=0&sampai=20" class="btn btn-success" target="_blank">Detail</a></td>
											 </tr>
                            
										<?php }?>
										</table>
										
                            