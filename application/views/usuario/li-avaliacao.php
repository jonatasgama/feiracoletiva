							<li class="list-group-item">
								
								<?php for($j = 0; $j < sizeof($avaliacao_media[$at]); $j++){ ;?>									
									<div class="post">
										<div class="post-action">
										<!-- Rating -->
											<select class='rating' id='rating_<?=$autonomos[$at]->id;?>' data-id='rating_<?=$autonomos[$at]->id;?>'>
											<option value="1" >1</option>
											<option value="2" >2</option>
											<option value="3" >3</option>
											<option value="4" >4</option>
											<option value="5" >5</option>
											</select>
										<div style='clear: both;'></div>
										Avaliação : <span id='avgrating_<?=$autonomos[$at]->id;?>'><?=$avaliacao_media[$at][$j]->averageRating;?></span>

										<!-- Set rating -->
										<script type='text/javascript'>
											$(document).ready(function(){
												let id = 'rating_<?=$autonomos[$at]->id;?>';
												let avaliacao = '<?=$avaliacao_media[$at][$j]->averageRating;?>';
												document.getElementById(id).value = avaliacao;
											});
										</script>
										</div>
									</div>									
								<?php } ;?>							
								
							</li>