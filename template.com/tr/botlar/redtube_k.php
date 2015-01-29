<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'botlar/cek/redtube_k.php', 
	data:$('#update').serialize(), 
	success:function(cevap)
		{ 
		$("#sonuc").html(cevap);
		$('#hepsiniekle').show();
		}})
	} 
	
	function allekle()
	{
		for ( var i = 0; i <= 30; i++ )
		{
			//kaydet1();
			window["kaydet" + i]();
			console.log( "try " + i );
		}
	}
</script>	
	
		
		<div class="sonucu basliks">REDTUBE.COM KATEGORİ BOTU</div>
		<div class="blok">
		
		<form id="update">
			<div id="form_alani">
				<div class="formlist"><span>Kategori / Sayfa</span>
					<select name="kategori" class="select">
						<option value="amateur" >Amateur</option>
						<option value="anal" >Anal</option>
						<option value="asian" >Asian</option>
						<option value="bigtits" >Big Tits</option>
						<option value="blowjob" >Blowjob</option>
						<option value="cumshot" >Cumshot</option>
						<option value="ebony" >Ebony</option>
						<option value="facials" >Facials</option>
						<option value="fetish" >Fetish</option>
						<option value="gangbang" >Gangbang</option>
						<option value="gay" >Gay</option>
						<option value="group" >Group</option>
						<option value="hentai" >Hentai</option>
						<option value="interracial" >Interracial</option>
						<option value="japanese" >Japanese</option>
						<option value="latina" >Latina</option>
						<option value="lesbian" >Lesbian</option>
						<option value="masturbation" >Masturbation</option>
						<option value="mature" >Mature</option>
						<option value="milf" >MILF</option>
						<option value="public" >Public</option>
						<option value="squirting" >Squirting</option>
						<option value="teens" >Teens</option>						
					</select>
					
					<select name="sayfa" class="select">
						<?php for ($c =1; $c<=100; $c++) {?>
							<option value="<?php echo $c +1;?>" >Sayfa <?php echo $c;?></option>
						<?php } ?>
					</select>
					
					<input onclick="gonder();" class="sub" type="button" value="Video Çek"/>
					
					<input onclick="allekle();" id="hepsiniekle" class="sub" type="button" style="float: right; display: none;" value="Tüm hepsini ekle"/>
				</div>
			
			</div>
		</form>
		
			
		</div>
		
		<div class="temizle"></div>
		
		<div id="sonuc"></div>
		
		
